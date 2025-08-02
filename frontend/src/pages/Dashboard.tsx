import React from 'react';

const Dashboard: React.FC = () => {
  return (
    <div className="page">
      <h2>Dashboard</h2>
      <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))', gap: '1rem' }}>
        
        <div className="card">
          <h3>Quick Stats</h3>
          <p>Active Clients: <strong>25</strong></p>
          <p>Pending Assessments: <strong>8</strong></p>
          <p>Messages: <strong>12</strong></p>
          <p>Supply Orders: <strong>5</strong></p>
        </div>

        <div className="card">
          <h3>Recent Activity</h3>
          <ul style={{ listStyle: 'none', padding: 0 }}>
            <li style={{ marginBottom: '0.5rem' }}>📋 New assessment completed for John D.</li>
            <li style={{ marginBottom: '0.5rem' }}>💬 Message from Sarah M.</li>
            <li style={{ marginBottom: '0.5rem' }}>📦 Naloxone kit delivered to clinic</li>
            <li style={{ marginBottom: '0.5rem' }}>👤 New client registration: Mike R.</li>
          </ul>
        </div>

        <div className="card">
          <h3>Urgent Actions</h3>
          <ul style={{ listStyle: 'none', padding: 0 }}>
            <li style={{ marginBottom: '0.5rem', color: '#ef4444' }}>🚨 High-risk assessment requires immediate follow-up</li>
            <li style={{ marginBottom: '0.5rem', color: '#f59e0b' }}>⚠️ Supply inventory running low</li>
            <li style={{ marginBottom: '0.5rem', color: '#3b82f6' }}>📅 3 appointments scheduled for today</li>
          </ul>
        </div>

        <div className="card">
          <h3>Community Resources</h3>
          <p>Quick access to essential services:</p>
          <div style={{ display: 'flex', flexDirection: 'column', gap: '0.5rem' }}>
            <a href="tel:9053770378" className="btn btn-secondary" style={{ textAlign: 'left' }}>
              📞 Transition House: (905) 377-0378
            </a>
            <a href="tel:9053779891" className="btn btn-secondary" style={{ textAlign: 'left' }}>
              🏥 Mental Health Services: (905) 377-9891
            </a>
            <a href="tel:9058858700" className="btn btn-secondary" style={{ textAlign: 'left' }}>
              🤝 Green Wood Coalition: (905) 885-8700
            </a>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Dashboard;