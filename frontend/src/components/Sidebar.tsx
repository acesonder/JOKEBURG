import React from 'react';
import { Link, useLocation } from 'react-router-dom';

const Sidebar: React.FC = () => {
  const location = useLocation();

  const navItems = [
    { path: '/', label: 'Dashboard', icon: '🏠' },
    { path: '/client/new', label: 'New Client', icon: '👤' },
    { path: '/assessment', label: 'Assessment', icon: '📋' },
    { path: '/messages', label: 'Messages', icon: '💬' },
    { path: '/resources', label: 'Resources', icon: '📚' },
    { path: '/supplies', label: 'Supplies', icon: '📦' },
  ];

  return (
    <aside className="sidebar">
      <nav>
        <ul className="sidebar-nav">
          {navItems.map((item) => (
            <li key={item.path}>
              <Link 
                to={item.path} 
                className={location.pathname === item.path ? 'active' : ''}
              >
                <span style={{ marginRight: '10px' }}>{item.icon}</span>
                {item.label}
              </Link>
            </li>
          ))}
        </ul>
      </nav>
    </aside>
  );
};

export default Sidebar;