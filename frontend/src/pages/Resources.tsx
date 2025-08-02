import React, { useState } from 'react';

interface Resource {
  id: number;
  name: string;
  description: string;
  phone: string;
  website: string;
  category: string;
  address?: string;
  hours?: string;
}

const Resources: React.FC = () => {
  const [selectedCategory, setSelectedCategory] = useState<string>('all');
  const [searchTerm, setSearchTerm] = useState('');

  const resources: Resource[] = [
    {
      id: 1,
      name: 'Transition House Emergency Shelter',
      description: 'Shelter services, meals, referrals',
      phone: '(905) 377-0378',
      website: 'transitionhouse.ca',
      category: 'shelter',
      address: '123 Emergency Lane, Cobourg, ON',
      hours: '24/7'
    },
    {
      id: 2,
      name: 'Northumberland Hills Hospital Community Mental Health',
      description: 'Counseling, addiction services',
      phone: '(905) 377-9891',
      website: 'nhh.ca',
      category: 'mental-health',
      address: '1000 DePalma Dr, Cobourg, ON',
      hours: 'Mon-Fri 8:00 AM - 5:00 PM'
    },
    {
      id: 3,
      name: 'Fourcast Addiction Services',
      description: 'Counseling, addiction support',
      phone: '(905) 377-9111',
      website: 'fourcast.ca',
      category: 'addiction',
      address: '55 King St W, Cobourg, ON',
      hours: 'Mon-Fri 9:00 AM - 5:00 PM'
    },
    {
      id: 4,
      name: 'Salvation Army Cobourg',
      description: 'Food bank, emergency supplies',
      phone: '(905) 373-9440',
      website: 'salvationarmy.ca',
      category: 'food-assistance',
      address: '16 Spring St, Cobourg, ON',
      hours: 'Tue, Thu 10:00 AM - 12:00 PM'
    },
    {
      id: 5,
      name: 'Cornerstone Family Violence Prevention Centre',
      description: 'Crisis support, shelter for families',
      phone: '(905) 372-0746',
      website: 'cornerstonenorthumberland.ca',
      category: 'crisis-support',
      address: 'Confidential Location, Cobourg, ON',
      hours: '24/7 Crisis Line'
    },
    {
      id: 6,
      name: 'Green Wood Coalition',
      description: 'Street outreach, harm reduction, peer support',
      phone: '(905) 885-8700',
      website: 'greenwoodcoalition.com',
      category: 'outreach',
      address: '200 Division St, Cobourg, ON',
      hours: 'Mon-Fri 9:00 AM - 5:00 PM'
    },
    {
      id: 7,
      name: 'Cobourg Employment Services',
      description: 'Job search assistance, skills training',
      phone: '(905) 372-2531',
      website: 'cobourg.ca/employment',
      category: 'employment',
      address: '55 King St W, Cobourg, ON',
      hours: 'Mon-Fri 8:30 AM - 4:30 PM'
    },
    {
      id: 8,
      name: 'Cobourg Community Health Centre',
      description: 'Primary healthcare, walk-in clinic',
      phone: '(905) 372-5855',
      website: 'cchc.ca',
      category: 'healthcare',
      address: '509 Division St, Cobourg, ON',
      hours: 'Mon-Fri 8:00 AM - 5:00 PM'
    }
  ];

  const categories = [
    { value: 'all', label: 'All Resources' },
    { value: 'shelter', label: 'Shelter & Housing' },
    { value: 'mental-health', label: 'Mental Health' },
    { value: 'addiction', label: 'Addiction Services' },
    { value: 'healthcare', label: 'Healthcare' },
    { value: 'food-assistance', label: 'Food Assistance' },
    { value: 'employment', label: 'Employment' },
    { value: 'crisis-support', label: 'Crisis Support' },
    { value: 'outreach', label: 'Outreach & Support' }
  ];

  const filteredResources = resources.filter(resource => {
    const matchesCategory = selectedCategory === 'all' || resource.category === selectedCategory;
    const matchesSearch = resource.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                         resource.description.toLowerCase().includes(searchTerm.toLowerCase());
    return matchesCategory && matchesSearch;
  });

  const getCategoryIcon = (category: string) => {
    const icons: Record<string, string> = {
      'shelter': '🏠',
      'mental-health': '🧠',
      'addiction': '💊',
      'healthcare': '🏥',
      'food-assistance': '🍽️',
      'employment': '💼',
      'crisis-support': '🆘',
      'outreach': '🤝'
    };
    return icons[category] || '📋';
  };

  return (
    <div className="page">
      <h2>Community Resources</h2>
      <p style={{ color: '#6b7280', marginBottom: '2rem' }}>
        Comprehensive directory of local services and support available in Cobourg
      </p>

      {/* Search and Filter */}
      <div style={{ marginBottom: '2rem', display: 'flex', gap: '1rem', flexWrap: 'wrap' }}>
        <div style={{ flex: '1', minWidth: '300px' }}>
          <input
            type="text"
            placeholder="Search resources..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            style={{
              width: '100%',
              padding: '0.75rem',
              border: '1px solid #d1d5db',
              borderRadius: '0.375rem',
              fontSize: '1rem'
            }}
          />
        </div>
        <div style={{ minWidth: '200px' }}>
          <select
            value={selectedCategory}
            onChange={(e) => setSelectedCategory(e.target.value)}
            style={{
              width: '100%',
              padding: '0.75rem',
              border: '1px solid #d1d5db',
              borderRadius: '0.375rem',
              fontSize: '1rem'
            }}
          >
            {categories.map(category => (
              <option key={category.value} value={category.value}>
                {category.label}
              </option>
            ))}
          </select>
        </div>
      </div>

      {/* Resource Cards */}
      <div style={{ 
        display: 'grid', 
        gridTemplateColumns: 'repeat(auto-fill, minmax(400px, 1fr))', 
        gap: '1.5rem' 
      }}>
        {filteredResources.map(resource => (
          <div key={resource.id} className="card">
            <div style={{ display: 'flex', alignItems: 'flex-start', marginBottom: '1rem' }}>
              <span style={{ fontSize: '2rem', marginRight: '1rem' }}>
                {getCategoryIcon(resource.category)}
              </span>
              <div style={{ flex: 1 }}>
                <h3 style={{ margin: '0 0 0.5rem 0', color: '#1f2937' }}>
                  {resource.name}
                </h3>
                <p style={{ color: '#6b7280', margin: '0 0 1rem 0' }}>
                  {resource.description}
                </p>
              </div>
            </div>

            <div style={{ marginBottom: '1rem' }}>
              <div style={{ display: 'flex', alignItems: 'center', marginBottom: '0.5rem' }}>
                <span style={{ marginRight: '0.5rem' }}>📞</span>
                <a href={`tel:${resource.phone}`} style={{ color: '#3b82f6', textDecoration: 'none' }}>
                  {resource.phone}
                </a>
              </div>
              
              {resource.website && (
                <div style={{ display: 'flex', alignItems: 'center', marginBottom: '0.5rem' }}>
                  <span style={{ marginRight: '0.5rem' }}>🌐</span>
                  <a 
                    href={`https://${resource.website}`} 
                    target="_blank" 
                    rel="noopener noreferrer"
                    style={{ color: '#3b82f6', textDecoration: 'none' }}
                  >
                    {resource.website}
                  </a>
                </div>
              )}

              {resource.address && (
                <div style={{ display: 'flex', alignItems: 'center', marginBottom: '0.5rem' }}>
                  <span style={{ marginRight: '0.5rem' }}>📍</span>
                  <span style={{ color: '#374151' }}>{resource.address}</span>
                </div>
              )}

              {resource.hours && (
                <div style={{ display: 'flex', alignItems: 'center', marginBottom: '0.5rem' }}>
                  <span style={{ marginRight: '0.5rem' }}>🕒</span>
                  <span style={{ color: '#374151' }}>{resource.hours}</span>
                </div>
              )}
            </div>

            <div style={{ display: 'flex', gap: '0.5rem', flexWrap: 'wrap' }}>
              <button className="btn btn-primary" style={{ fontSize: '0.875rem' }}>
                Refer Client
              </button>
              <button className="btn btn-secondary" style={{ fontSize: '0.875rem' }}>
                Get Directions
              </button>
              <button className="btn btn-secondary" style={{ fontSize: '0.875rem' }}>
                Save to Favorites
              </button>
            </div>
          </div>
        ))}
      </div>

      {filteredResources.length === 0 && (
        <div style={{ 
          textAlign: 'center', 
          padding: '3rem', 
          color: '#6b7280' 
        }}>
          <p style={{ fontSize: '1.125rem' }}>
            No resources found matching your criteria.
          </p>
          <p>
            Try adjusting your search terms or category filter.
          </p>
        </div>
      )}

      {/* Emergency Contacts */}
      <div style={{ marginTop: '3rem' }} className="card">
        <h3 style={{ color: '#ef4444', marginBottom: '1rem' }}>🚨 Emergency Contacts</h3>
        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(250px, 1fr))', gap: '1rem' }}>
          <div>
            <strong>Emergency Services</strong><br />
            <a href="tel:911" style={{ color: '#ef4444', fontSize: '1.125rem' }}>911</a>
          </div>
          <div>
            <strong>Crisis & Suicide Prevention</strong><br />
            <a href="tel:988" style={{ color: '#ef4444', fontSize: '1.125rem' }}>988</a>
          </div>
          <div>
            <strong>Ontario Mental Health Helpline</strong><br />
            <a href="tel:1-866-531-2600" style={{ color: '#ef4444', fontSize: '1.125rem' }}>1-866-531-2600</a>
          </div>
          <div>
            <strong>Addictions & Mental Health Helpline</strong><br />
            <a href="tel:1-800-463-2338" style={{ color: '#ef4444', fontSize: '1.125rem' }}>1-800-463-2338</a>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Resources;