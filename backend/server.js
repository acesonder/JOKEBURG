const express = require('express');
const cors = require('cors');
const helmet = require('helmet');
const morgan = require('morgan');
const path = require('path');
require('dotenv').config();

const app = express();
const PORT = process.env.PORT || 5000;

// Middleware
app.use(helmet());
app.use(cors());
app.use(morgan('combined'));
app.use(express.json({ limit: '10mb' }));
app.use(express.urlencoded({ extended: true }));

// Static files
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

// Routes
app.use('/api/auth', require('./routes/auth'));
app.use('/api/users', require('./routes/users'));
app.use('/api/clients', require('./routes/clients'));
app.use('/api/assessments', require('./routes/assessments'));
app.use('/api/messages', require('./routes/messages'));
app.use('/api/resources', require('./routes/resources'));
app.use('/api/supplies', require('./routes/supplies'));

// Health check
app.get('/api/health', (req, res) => {
  res.json({ 
    status: 'OK', 
    timestamp: new Date().toISOString(),
    service: 'JOKEBURG API' 
  });
});

// Error handling
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(500).json({ 
    message: 'Internal server error',
    error: process.env.NODE_ENV === 'development' ? err.message : {}
  });
});

// 404 handler
app.use('*', (req, res) => {
  res.status(404).json({ message: 'Route not found' });
});

// Start server
const server = app.listen(PORT, () => {
  console.log(`JOKEBURG Backend server running on port ${PORT}`);
}).on('error', (err) => {
  if (err.code === 'EADDRINUSE') {
    console.error('\n❌ ERROR: Port conflict detected!');
    console.error(`Port ${PORT} is already in use by another process.`);
    console.error('\n📋 To fix this issue, try one of the following:');
    console.error('1. Kill the existing process using the port:');
    console.error(`   • Find the process: lsof -ti:${PORT}`);
    console.error(`   • Kill the process: kill -9 $(lsof -ti:${PORT})`);
    console.error('2. Use a different port by setting the PORT environment variable:');
    console.error(`   • PORT=3001 npm run dev`);
    console.error('3. Check if you have another instance of this server running\n');
    process.exit(1);
  } else {
    console.error('❌ Server error:', err);
    process.exit(1);
  }
});

// Socket.IO setup
const io = require('socket.io')(server, {
  cors: {
    origin: process.env.FRONTEND_URL || 'http://localhost:3000',
    methods: ['GET', 'POST']
  }
});

// Socket.IO connection handling
io.on('connection', (socket) => {
  console.log('User connected:', socket.id);
  
  socket.on('join_room', (room) => {
    socket.join(room);
    console.log(`User ${socket.id} joined room ${room}`);
  });
  
  socket.on('disconnect', () => {
    console.log('User disconnected:', socket.id);
  });
});

module.exports = { app, io };

// Graceful shutdown handling
const gracefulShutdown = (signal) => {
  console.log(`\n📥 Received ${signal}. Starting graceful shutdown...`);
  
  server.close(() => {
    console.log('✅ HTTP server closed.');
    
    // Close Socket.IO connections
    io.close(() => {
      console.log('✅ Socket.IO server closed.');
      process.exit(0);
    });
  });
  
  // Force close server after 30 seconds
  setTimeout(() => {
    console.error('❌ Could not close connections in time, forcefully shutting down');
    process.exit(1);
  }, 30000);
};

// Listen for termination signals
process.on('SIGTERM', () => gracefulShutdown('SIGTERM'));
process.on('SIGINT', () => gracefulShutdown('SIGINT'));