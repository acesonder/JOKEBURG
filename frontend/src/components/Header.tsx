import React from 'react';

const Header: React.FC = () => {
  return (
    <header className="header">
      <h1>JOKEBURG - Cobourg Community Success</h1>
      <div className="header-nav">
        <span>Welcome, User</span>
        <button>Profile</button>
        <button>Logout</button>
      </div>
    </header>
  );
};

export default Header;