import React, { useState } from 'react';

const Login: React.FC = () => {
  const [credentials, setCredentials] = useState({
    email: '',
    password: '',
    role: 'outreach-worker'
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    console.log('Login attempt:', credentials);
    // TODO: Implement actual login logic
  };

  return (
    <div className="page" style={{ maxWidth: '400px', margin: '2rem auto' }}>
      <h2>Login to JOKEBURG</h2>
      <p style={{ color: '#6b7280', marginBottom: '2rem' }}>
        Access the Cobourg Community Success platform
      </p>
      
      <form onSubmit={handleSubmit}>
        <div className="form-group">
          <label htmlFor="email">Email</label>
          <input
            type="email"
            id="email"
            value={credentials.email}
            onChange={(e) => setCredentials({...credentials, email: e.target.value})}
            required
          />
        </div>

        <div className="form-group">
          <label htmlFor="password">Password</label>
          <input
            type="password"
            id="password"
            value={credentials.password}
            onChange={(e) => setCredentials({...credentials, password: e.target.value})}
            required
          />
        </div>

        <div className="form-group">
          <label htmlFor="role">Role</label>
          <select
            id="role"
            value={credentials.role}
            onChange={(e) => setCredentials({...credentials, role: e.target.value})}
          >
            <option value="client">Client</option>
            <option value="outreach-worker">Outreach Worker</option>
            <option value="service-provider">Service Provider</option>
            <option value="admin">Administrator</option>
          </select>
        </div>

        <button type="submit" className="btn btn-primary" style={{ width: '100%' }}>
          Login
        </button>
      </form>

      <div style={{ marginTop: '2rem', textAlign: 'center' }}>
        <p style={{ color: '#6b7280' }}>
          Need access? Contact your system administrator.
        </p>
      </div>
    </div>
  );
};

export default Login;