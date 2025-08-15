import React, { useState, useEffect } from 'react';
import { mgtDocumentData } from '../types/mgtDocument';

interface TimelineItem {
  id: string;
  date: string;
  title: string;
  description: string;
  category: 'story' | 'issue' | 'advocacy';
  source?: string;
}

const HomelessnessInfo: React.FC = () => {
  const [timelineItems, setTimelineItems] = useState<TimelineItem[]>([]);
  const [selectedCategory, setSelectedCategory] = useState<'all' | 'story' | 'issue' | 'advocacy'>('all');

  // Sample timeline data - this would eventually come from the MGT Document and other sources
  useEffect(() => {
    const sampleData: TimelineItem[] = [
      {
        id: '1',
        date: '2024-01-15',
        title: 'Community Housing Initiative Launch',
        description: 'Launch of the comprehensive housing support program for Cobourg residents experiencing homelessness.',
        category: 'advocacy',
        source: 'Cobourg Community Services'
      },
      {
        id: '2',
        date: '2024-02-20',
        title: 'Sarah\'s Recovery Journey',
        description: 'Sarah M. celebrates 18 months of recovery with support from peer services and harm reduction programs.',
        category: 'story',
        source: 'Client Success Story'
      },
      {
        id: '3',
        date: '2024-03-10',
        title: 'Housing Shortage Crisis',
        description: 'Critical shortage of affordable housing units identified, affecting over 150 individuals in the community.',
        category: 'issue',
        source: 'Housing Assessment Report'
      },
      {
        id: '4',
        date: '2024-04-05',
        title: 'Mental Health Support Expansion',
        description: 'New mental health outreach program launched to address untreated conditions in the homeless population.',
        category: 'advocacy',
        source: 'Northumberland Hills Hospital'
      },
      {
        id: '5',
        date: '2024-05-12',
        title: 'Alex\'s Housing Success',
        description: 'Alex Thompson successfully transitioned from emergency shelter to permanent housing through integrated support services.',
        category: 'story',
        source: 'Case Management Team'
      }
    ];
    setTimelineItems(sampleData);
  }, []);

  const filteredItems = selectedCategory === 'all' 
    ? timelineItems 
    : timelineItems.filter(item => item.category === selectedCategory);

  const getCategoryColor = (category: string) => {
    switch (category) {
      case 'story': return 'bg-success';
      case 'issue': return 'bg-danger';
      case 'advocacy': return 'bg-primary';
      default: return 'bg-info';
    }
  };

  const getCategoryIcon = (category: string) => {
    switch (category) {
      case 'story': return '🌟';
      case 'issue': return '⚠️';
      case 'advocacy': return '📢';
      default: return '📝';
    }
  };

  return (
    <div className="page fade-in">
      <div className="page-header mb-6">
        <h1 className="text-3xl font-bold text-gray-900 mb-2">
          Information About Homelessness
        </h1>
        <p className="text-gray-600">
          A comprehensive timeline of stories, issues, and advocacy efforts in our community
        </p>
      </div>

      {/* MGT Document Section */}
      <div className="card mb-6">
        <div className="card-header bg-warning">
          <h2 className="text-xl font-bold mb-0">
            📜 Master Gold Toilet (MGT) Document
          </h2>
        </div>
        <div className="card-body">
          <p className="text-gray-700 mb-3">
            The Master Gold Toilet (MGT) Document serves as a central repository of critical information 
            about homelessness in Cobourg, containing comprehensive data, stories, and insights.
          </p>
          <div className="alert alert-info">
            <strong>Note:</strong> Document integration pending. This section will display the contents 
            of the uploaded out99.txt file once processed.
            {mgtDocumentData && (
              <p className="mb-0 mt-2">
                MGT Document loaded: {mgtDocumentData.title} (Version {mgtDocumentData.version})
              </p>
            )}
          </div>
        </div>
      </div>

      {/* Filter Buttons */}
      <div className="mb-6">
        <div className="flex flex-wrap gap-2">
          <button 
            className={`btn ${selectedCategory === 'all' ? 'btn-primary' : 'btn-outline-primary'}`}
            onClick={() => setSelectedCategory('all')}
          >
            All Items ({timelineItems.length})
          </button>
          <button 
            className={`btn ${selectedCategory === 'story' ? 'btn-success' : 'btn-outline-success'}`}
            onClick={() => setSelectedCategory('story')}
          >
            🌟 Stories ({timelineItems.filter(i => i.category === 'story').length})
          </button>
          <button 
            className={`btn ${selectedCategory === 'issue' ? 'btn-danger' : 'btn-outline-danger'}`}
            onClick={() => setSelectedCategory('issue')}
          >
            ⚠️ Issues ({timelineItems.filter(i => i.category === 'issue').length})
          </button>
          <button 
            className={`btn ${selectedCategory === 'advocacy' ? 'btn-primary' : 'btn-outline-primary'}`}
            onClick={() => setSelectedCategory('advocacy')}
          >
            📢 Advocacy ({timelineItems.filter(i => i.category === 'advocacy').length})
          </button>
        </div>
      </div>

      {/* Timeline */}
      <div className="card">
        <div className="card-header">
          <h2 className="text-xl font-bold mb-0">
            📅 Community Timeline
          </h2>
        </div>
        <div className="card-body">
          {filteredItems.length === 0 ? (
            <div className="text-center py-8">
              <p className="text-gray-500">No items found for the selected category.</p>
            </div>
          ) : (
            <div className="timeline">
              {filteredItems.map((item, index) => (
                <div key={item.id} className="timeline-item">
                  <div className={`timeline-marker ${getCategoryColor(item.category)}`}>
                    <span className="text-white text-xs">
                      {getCategoryIcon(item.category)}
                    </span>
                  </div>
                  <div className="timeline-content">
                    <div className="flex justify-between items-start mb-2">
                      <h3 className="font-bold text-lg">{item.title}</h3>
                      <span className="text-sm text-gray-500">
                        {new Date(item.date).toLocaleDateString()}
                      </span>
                    </div>
                    <p className="text-gray-700 mb-2">{item.description}</p>
                    {item.source && (
                      <span className={`badge ${getCategoryColor(item.category)}`}>
                        {item.source}
                      </span>
                    )}
                  </div>
                </div>
              ))}
            </div>
          )}
        </div>
      </div>

      {/* Additional Information */}
      <div className="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div className="card">
          <div className="card-body text-center">
            <h3 className="font-bold text-lg mb-2">🏠 Housing Support</h3>
            <p className="text-sm text-gray-600">
              Comprehensive housing assistance and emergency shelter services
            </p>
          </div>
        </div>
        <div className="card">
          <div className="card-body text-center">
            <h3 className="font-bold text-lg mb-2">🧠 Mental Health</h3>
            <p className="text-sm text-gray-600">
              Mental health support and counseling services for vulnerable populations
            </p>
          </div>
        </div>
        <div className="card">
          <div className="card-body text-center">
            <h3 className="font-bold text-lg mb-2">💊 Harm Reduction</h3>
            <p className="text-sm text-gray-600">
              Essential supplies and peer support for addiction recovery
            </p>
          </div>
        </div>
      </div>
    </div>
  );
};

export default HomelessnessInfo;