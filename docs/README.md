# JOKEBURG - Setup and Development Guide

## Overview
JOKEBURG is a comprehensive web application for the Cobourg Community Success platform, designed to coordinate efforts addressing homelessness, addiction, and mental health challenges in Cobourg.

## Project Structure
```
JOKEBURG/
├── backend/                 # Node.js/Express API server
│   ├── config/             # Database and configuration files
│   ├── models/             # Database models (Sequelize)
│   ├── routes/             # API route handlers
│   ├── middleware/         # Custom middleware
│   └── uploads/            # File upload storage
├── frontend/               # React TypeScript application
│   ├── src/
│   │   ├── components/     # Reusable UI components
│   │   ├── pages/          # Application pages
│   │   ├── services/       # API service functions
│   │   ├── contexts/       # React contexts
│   │   └── types/          # TypeScript type definitions
└── docs/                   # Documentation
```

## Tech Stack

### Backend
- **Node.js** with **Express.js** - API server and routing
- **PostgreSQL** with **Sequelize ORM** - Database layer
- **Socket.io** - Real-time messaging and notifications
- **JWT** - Authentication and authorization
- **Multer** - File upload handling
- **Helmet** - Security middleware

### Frontend
- **React** with **TypeScript** - User interface
- **React Router** - Client-side routing
- **Axios** - HTTP client for API calls
- **Socket.io Client** - Real-time communication
- **CSS3** - Responsive styling

## Getting Started

### Prerequisites
- Node.js 16+ and npm
- PostgreSQL 12+ (for production)
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd JOKEBURG
   ```

2. **Install dependencies**
   ```bash
   # Install root dependencies
   npm install
   
   # Install all project dependencies
   npm run install-all
   ```

3. **Set up environment variables**
   ```bash
   # Backend environment
   cp backend/.env.example backend/.env
   # Edit backend/.env with your database credentials
   ```

4. **Start development servers**
   ```bash
   # Start both frontend and backend
   npm run dev
   
   # Or start individually:
   npm run dev:backend    # Backend only (port 5000)
   npm run dev:frontend   # Frontend only (port 3000)
   ```

## User Roles and Features

### 1. Clients
- **Secure Portal**: Personal dashboard with care plan access
- **Self-Assessment**: Smart needs assessment tools
- **Goal Tracking**: Visual progress indicators and milestones
- **Messaging**: Secure communication with care team
- **Resource Access**: Directory of local services
- **Appointment Management**: Scheduling and reminders

### 2. Outreach Workers
- **Mobile Case Management**: Field-ready tools for client interactions
- **Real-time Data Entry**: Notes, assessments, and incident logging
- **Client Communication**: Secure messaging and SMS notifications
- **Supply Distribution**: Harm reduction supply ordering and tracking
- **Geolocation Tools**: Mapping and location-based services
- **Quick Referrals**: Streamlined service provider connections

### 3. Service Providers
- **Referral Management**: Accept and process client referrals
- **Secure Communication**: Multi-party conversations
- **Analytics Dashboard**: Service usage and outcome metrics
- **Document Management**: Secure file storage and sharing
- **Appointment Coordination**: Integrated scheduling system

### 4. Administrative Staff
- **Oversight Dashboard**: System-wide analytics and reporting
- **User Management**: Role assignments and permissions
- **Compliance Monitoring**: Report generation and audit trails
- **Resource Management**: Service directory maintenance
- **Supply Chain**: Inventory and distribution oversight

## Core Features

### Case Management
- Detailed client profiles with housing, health, and history tracking
- Automated follow-up alerts and progress monitoring
- Goal setting and milestone tracking
- Integrated care plan management

### Smart Assessment System
- Dynamic, trauma-informed needs assessments
- Real-time scoring and risk level calculation
- Branching logic based on responses
- Mobile-optimized interface

### Communication Hub
- Role-based secure messaging
- Real-time notifications
- File sharing and document management
- Crisis intervention alerts

### Resource Directory
- Comprehensive local service database
- Interactive mapping and directions
- Emergency contact quick access
- Referral workflow integration

### Harm Reduction Platform
- Supply inventory management
- Order processing and delivery tracking
- Low stock alerts and reorder automation
- Distribution analytics

## API Endpoints

### Authentication
- `POST /api/auth/register` - User registration
- `POST /api/auth/login` - User login
- `POST /api/auth/logout` - User logout
- `GET /api/auth/me` - Get current user

### Clients
- `GET /api/clients` - List all clients
- `POST /api/clients` - Create new client
- `GET /api/clients/:id` - Get client details
- `PUT /api/clients/:id` - Update client
- `GET /api/clients/:id/progress` - Get client progress

### Assessments
- `POST /api/assessments` - Create assessment
- `GET /api/assessments/client/:clientId` - Get client assessments
- `GET /api/assessments/:id` - Get assessment details
- `PUT /api/assessments/:id` - Update assessment

### Resources
- `GET /api/resources` - Get community resources
- `POST /api/resources` - Add new resource
- `PUT /api/resources/:id` - Update resource

### Supplies
- `GET /api/supplies/inventory` - Get inventory status
- `POST /api/supplies/orders` - Create supply order
- `GET /api/supplies/orders` - Get supply orders
- `PUT /api/supplies/orders/:id/delivered` - Mark order delivered

### Messages
- `GET /api/messages/conversations` - Get user conversations
- `POST /api/messages/conversations` - Create conversation
- `GET /api/messages/conversations/:id/messages` - Get messages
- `POST /api/messages/conversations/:id/messages` - Send message

## Development Workflow

### Code Organization
- **Components**: Reusable UI components in `/frontend/src/components/`
- **Pages**: Full page components in `/frontend/src/pages/`
- **Services**: API integration in `/frontend/src/services/`
- **Routes**: Backend API routes in `/backend/routes/`
- **Models**: Database models in `/backend/models/`

### Testing
```bash
# Run backend tests
cd backend && npm test

# Run frontend tests
cd frontend && npm test

# Run all tests
npm run test
```

### Building for Production
```bash
# Build frontend for production
npm run build

# Start production server
npm start
```

## Security Considerations

### Data Protection
- Encrypted data transmission (HTTPS)
- JWT-based authentication
- Role-based access control
- Secure file upload validation
- Input sanitization and validation

### Privacy Compliance
- Client consent management
- Data anonymization options
- Audit trail logging
- Configurable data retention
- GDPR-compliant data handling

## Deployment

### Environment Variables
Required environment variables for production:
- `NODE_ENV=production`
- `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`
- `JWT_SECRET` (strong, unique secret)
- `FRONTEND_URL` (production domain)

### Database Setup
1. Create PostgreSQL database
2. Run migrations: `npm run db:migrate`
3. Seed initial data: `npm run db:seed`

## Support and Maintenance

### Monitoring
- Application health checks at `/api/health`
- Database connection monitoring
- Real-time error logging
- Performance metrics collection

### Backup Strategy
- Automated database backups
- File upload backup to cloud storage
- Configuration backup procedures
- Disaster recovery planning

## Contributing

### Code Standards
- TypeScript for type safety
- ESLint for code quality
- Prettier for code formatting
- Conventional commit messages

### Pull Request Process
1. Create feature branch from main
2. Implement changes with tests
3. Update documentation
4. Submit pull request for review

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Contact
For technical support or questions about this implementation, please contact the development team.