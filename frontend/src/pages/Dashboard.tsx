import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

interface DashboardStats {
  activeClients: number;
  pendingAssessments: number;
  unreadMessages: number;
  supplyOrders: number;
  successStories: number;
  communityResources: number;
}

interface Activity {
  id: string;
  type: 'assessment' | 'message' | 'supply' | 'client' | 'milestone';
  description: string;
  time: string;
  priority: 'low' | 'medium' | 'high';
  icon: string;
}

interface UrgentAction {
  id: string;
  type: 'high-risk' | 'supply-low' | 'appointment' | 'follow-up';
  description: string;
  priority: 'warning' | 'danger' | 'info';
  action: string;
  link?: string;
}

const Dashboard: React.FC = () => {
  const [stats] = useState<DashboardStats>({
    activeClients: 25,
    pendingAssessments: 8,
    unreadMessages: 12,
    supplyOrders: 5,
    successStories: 18,
    communityResources: 12,
  });

  const [recentActivity] = useState<Activity[]>([
    {
      id: '1',
      type: 'assessment',
      description: 'Smart assessment completed for John D. - Low risk score',
      time: '2 hours ago',
      priority: 'medium',
      icon: '📋',
    },
    {
      id: '2',
      type: 'message',
      description: 'Message from Sarah M. requesting housing support',
      time: '4 hours ago',
      priority: 'high',
      icon: '💬',
    },
    {
      id: '3',
      type: 'supply',
      description: 'Naloxone kit delivered to Transition House clinic',
      time: '6 hours ago',
      priority: 'low',
      icon: '📦',
    },
    {
      id: '4',
      type: 'client',
      description: 'New client registration: Mike R. - Initial intake scheduled',
      time: '1 day ago',
      priority: 'medium',
      icon: '👤',
    },
    {
      id: '5',
      type: 'milestone',
      description: 'Emma T. reached 30-day sobriety milestone',
      time: '1 day ago',
      priority: 'low',
      icon: '🎉',
    },
  ]);

  const [urgentActions] = useState<UrgentAction[]>([
    {
      id: '1',
      type: 'high-risk',
      description: 'High-risk assessment requires immediate follow-up',
      priority: 'danger',
      action: 'Review Assessment',
      link: '/assessment/urgent',
    },
    {
      id: '2',
      type: 'supply-low',
      description: 'Naloxone kit inventory running low (3 remaining)',
      priority: 'warning',
      action: 'Order Supplies',
      link: '/supplies/order',
    },
    {
      id: '3',
      type: 'appointment',
      description: '3 appointments scheduled for today',
      priority: 'info',
      action: 'View Schedule',
      link: '/schedule',
    },
    {
      id: '4',
      type: 'follow-up',
      description: '5 clients need weekly check-in',
      priority: 'warning',
      action: 'Contact Clients',
      link: '/clients/follow-up',
    },
  ]);

  const [currentTime, setCurrentTime] = useState(new Date());

  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentTime(new Date());
    }, 60000); // Update every minute

    return () => clearInterval(timer);
  }, []);

  const formatTime = (date: Date) => {
    return date.toLocaleTimeString('en-US', {
      hour: '2-digit',
      minute: '2-digit',
      hour12: true,
    });
  };

  const formatDate = (date: Date) => {
    return date.toLocaleDateString('en-US', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric',
    });
  };

  const getPriorityClass = (priority: string) => {
    switch (priority) {
      case 'danger':
        return 'status-indicator danger';
      case 'warning':
        return 'status-indicator warning';
      case 'info':
        return 'status-indicator info';
      case 'high':
        return 'status-indicator danger';
      case 'medium':
        return 'status-indicator warning';
      default:
        return 'status-indicator info';
    }
  };

  return (
    <div className="page fade-in">
      {/* Welcome Header */}
      <div className="flex items-center justify-between mb-6">
        <div>
          <h2 className="text-xl md:text-2xl font-bold text-gray-900 mb-2">
            Welcome to JOKEBURG Dashboard
          </h2>
          <p className="text-gray-600">
            {formatDate(currentTime)} • {formatTime(currentTime)}
          </p>
        </div>
        <div className="hidden md:block">
          <p className="text-sm text-gray-500 mb-1">Cobourg Community Success</p>
          <p className="text-lg font-semibold text-primary-600">
            Creating Our Future Together
          </p>
        </div>
      </div>

      {/* Quick Stats Grid */}
      <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <div className="card">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-2xl font-bold text-primary-600">{stats.activeClients}</p>
              <p className="text-sm text-gray-600">Active Clients</p>
            </div>
            <span className="text-2xl">👥</span>
          </div>
        </div>

        <div className="card">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-2xl font-bold text-warning-600">{stats.pendingAssessments}</p>
              <p className="text-sm text-gray-600">Pending Assessments</p>
            </div>
            <span className="text-2xl">📋</span>
          </div>
        </div>

        <div className="card">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-2xl font-bold text-info-600">{stats.unreadMessages}</p>
              <p className="text-sm text-gray-600">Messages</p>
            </div>
            <span className="text-2xl">💬</span>
          </div>
        </div>

        <div className="card">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-2xl font-bold text-danger-600">{stats.supplyOrders}</p>
              <p className="text-sm text-gray-600">Supply Orders</p>
            </div>
            <span className="text-2xl">📦</span>
          </div>
        </div>

        <div className="card">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-2xl font-bold text-success-600">{stats.successStories}</p>
              <p className="text-sm text-gray-600">Success Stories</p>
            </div>
            <span className="text-2xl">🌟</span>
          </div>
        </div>

        <div className="card">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-2xl font-bold text-gray-600">{stats.communityResources}</p>
              <p className="text-sm text-gray-600">Resources</p>
            </div>
            <span className="text-2xl">📚</span>
          </div>
        </div>
      </div>

      {/* Main Content Grid */}
      <div className="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        
        {/* Recent Activity */}
        <div className="card lg:col-span-1">
          <div className="flex items-center justify-between mb-4">
            <h3 className="text-lg font-semibold">Recent Activity</h3>
            <Link to="/activity" className="text-sm text-primary-600 hover:text-primary-700">
              View All
            </Link>
          </div>
          <div className="space-y-3">
            {recentActivity.map((activity) => (
              <div key={activity.id} className="flex items-start gap-3 p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                <span className="text-lg flex-shrink-0">{activity.icon}</span>
                <div className="flex-1 min-w-0">
                  <p className="text-sm text-gray-900 font-medium truncate">
                    {activity.description}
                  </p>
                  <div className="flex items-center gap-2 mt-1">
                    <p className="text-xs text-gray-500">{activity.time}</p>
                    <span className={`text-xs ${getPriorityClass(activity.priority)}`}>
                      {activity.priority}
                    </span>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* Urgent Actions */}
        <div className="card">
          <div className="flex items-center justify-between mb-4">
            <h3 className="text-lg font-semibold">Urgent Actions</h3>
            <span className="status-indicator danger">
              {urgentActions.filter(a => a.priority === 'danger').length} Critical
            </span>
          </div>
          <div className="space-y-3">
            {urgentActions.map((action) => (
              <div key={action.id} className="border rounded-lg p-4 border-gray-200 hover:border-gray-300 transition-colors">
                <div className="flex items-start justify-between mb-2">
                  <p className="text-sm font-medium text-gray-900">
                    {action.description}
                  </p>
                  <span className={getPriorityClass(action.priority)}>
                    {action.priority}
                  </span>
                </div>
                {action.link ? (
                  <Link 
                    to={action.link}
                    className="btn btn-sm btn-primary"
                  >
                    {action.action}
                  </Link>
                ) : (
                  <button className="btn btn-sm btn-primary">
                    {action.action}
                  </button>
                )}
              </div>
            ))}
          </div>
        </div>

        {/* Community Resources */}
        <div className="card">
          <h3 className="text-lg font-semibold mb-4">Emergency Resources</h3>
          <p className="text-sm text-gray-600 mb-4">
            Quick access to essential services in Cobourg:
          </p>
          <div className="space-y-2">
            <a 
              href="tel:9053770378" 
              className="btn btn-outline btn-secondary flex items-center gap-2 text-left justify-start"
            >
              <span className="text-lg">🏠</span>
              <div className="text-left">
                <p className="font-medium">Transition House</p>
                <p className="text-xs opacity-75">(905) 377-0378</p>
              </div>
            </a>
            
            <a 
              href="tel:9053779891" 
              className="btn btn-outline btn-secondary flex items-center gap-2 text-left justify-start"
            >
              <span className="text-lg">🏥</span>
              <div className="text-left">
                <p className="font-medium">Mental Health Services</p>
                <p className="text-xs opacity-75">(905) 377-9891</p>
              </div>
            </a>
            
            <a 
              href="tel:9058858700" 
              className="btn btn-outline btn-secondary flex items-center gap-2 text-left justify-start"
            >
              <span className="text-lg">🤝</span>
              <div className="text-left">
                <p className="font-medium">Green Wood Coalition</p>
                <p className="text-xs opacity-75">(905) 885-8700</p>
              </div>
            </a>
            
            <a 
              href="tel:911" 
              className="btn btn-danger flex items-center gap-2 text-left justify-start"
            >
              <span className="text-lg">🚨</span>
              <div className="text-left">
                <p className="font-medium">Emergency Services</p>
                <p className="text-xs opacity-75">Call 911</p>
              </div>
            </a>
          </div>
          
          <div className="mt-4 pt-4 border-t border-gray-200">
            <Link 
              to="/resources" 
              className="btn btn-primary btn-sm w-full"
            >
              View All Resources
            </Link>
          </div>
        </div>
      </div>

      {/* Quick Actions */}
      <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
        <Link to="/client/new" className="btn btn-primary">
          <span className="text-lg mr-2">👤</span>
          New Client
        </Link>
        
        <Link to="/assessment" className="btn btn-secondary">
          <span className="text-lg mr-2">📋</span>
          Assessment
        </Link>
        
        <Link to="/supplies/order" className="btn btn-warning">
          <span className="text-lg mr-2">📦</span>
          Order Supplies
        </Link>
        
        <Link to="/messages" className="btn btn-success">
          <span className="text-lg mr-2">💬</span>
          Messages {stats.unreadMessages > 0 && `(${stats.unreadMessages})`}
        </Link>
      </div>
    </div>
  );
};

export default Dashboard;