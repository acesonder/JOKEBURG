import React from 'react';
import { useParams } from 'react-router-dom';

const ClientProfile: React.FC = () => {
  const { id } = useParams<{ id: string }>();

  return (
    <div className="page">
      <h2>Client Profile {id ? `- Client #${id}` : '- New Client'}</h2>
      
      <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '2rem' }}>
        <div>
          <div className="card">
            <h3>Personal Information</h3>
            <div className="form-group">
              <label>Full Name</label>
              <input type="text" placeholder="Enter full name" />
            </div>
            <div className="form-group">
              <label>Preferred Name</label>
              <input type="text" placeholder="Enter preferred name" />
            </div>
            <div className="form-group">
              <label>Date of Birth</label>
              <input type="date" />
            </div>
            <div className="form-group">
              <label>Contact Phone</label>
              <input type="tel" placeholder="Enter phone number" />
            </div>
            <div className="form-group">
              <label>Email</label>
              <input type="email" placeholder="Enter email address" />
            </div>
            <div className="form-group">
              <label>Preferred Pronouns</label>
              <select>
                <option value="">Select pronouns</option>
                <option value="he/him">He/Him</option>
                <option value="she/her">She/Her</option>
                <option value="they/them">They/Them</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>

          <div className="card">
            <h3>Housing Status</h3>
            <div className="form-group">
              <label>Current Housing</label>
              <select>
                <option value="secure">Secure Housing</option>
                <option value="temporary">Temporary Housing</option>
                <option value="shelter">Shelter/Emergency Housing</option>
                <option value="unsheltered">Unsheltered/Homeless</option>
              </select>
            </div>
            <div className="form-group">
              <label>Current Address</label>
              <textarea placeholder="Enter current address or location details"></textarea>
            </div>
          </div>
        </div>

        <div>
          <div className="card">
            <h3>Health Information</h3>
            <div className="form-group">
              <label>Known Health Conditions</label>
              <textarea placeholder="List any known health conditions"></textarea>
            </div>
            <div className="form-group">
              <label>Allergies</label>
              <textarea placeholder="List any allergies"></textarea>
            </div>
            <div className="form-group">
              <label>Current Medications</label>
              <textarea placeholder="List current medications"></textarea>
            </div>
            <div className="form-group">
              <label>Primary Healthcare Provider</label>
              <input type="text" placeholder="Enter healthcare provider" />
            </div>
          </div>

          <div className="card">
            <h3>Progress Overview</h3>
            <div style={{ marginBottom: '1rem' }}>
              <label style={{ display: 'block', marginBottom: '0.5rem' }}>Housing Stability</label>
              <div style={{ backgroundColor: '#e5e7eb', height: '20px', borderRadius: '10px', overflow: 'hidden' }}>
                <div style={{ backgroundColor: '#3b82f6', height: '100%', width: '60%' }}></div>
              </div>
              <small style={{ color: '#6b7280' }}>60% - Improving</small>
            </div>
            
            <div style={{ marginBottom: '1rem' }}>
              <label style={{ display: 'block', marginBottom: '0.5rem' }}>Mental Health</label>
              <div style={{ backgroundColor: '#e5e7eb', height: '20px', borderRadius: '10px', overflow: 'hidden' }}>
                <div style={{ backgroundColor: '#10b981', height: '100%', width: '75%' }}></div>
              </div>
              <small style={{ color: '#6b7280' }}>75% - Good progress</small>
            </div>

            <div style={{ marginBottom: '1rem' }}>
              <label style={{ display: 'block', marginBottom: '0.5rem' }}>Employment</label>
              <div style={{ backgroundColor: '#e5e7eb', height: '20px', borderRadius: '10px', overflow: 'hidden' }}>
                <div style={{ backgroundColor: '#f59e0b', height: '100%', width: '30%' }}></div>
              </div>
              <small style={{ color: '#6b7280' }}>30% - Needs support</small>
            </div>
          </div>
        </div>
      </div>

      <div style={{ marginTop: '2rem', display: 'flex', gap: '1rem' }}>
        <button className="btn btn-primary">Save Changes</button>
        <button className="btn btn-secondary">Schedule Assessment</button>
        <button className="btn btn-secondary">Send Message</button>
      </div>
    </div>
  );
};

export default ClientProfile;