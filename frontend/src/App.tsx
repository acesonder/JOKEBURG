import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import './App.css';

// Import pages (to be created)
import Dashboard from './pages/Dashboard';
import Login from './pages/Login';
import ClientProfile from './pages/ClientProfile';
import Assessment from './pages/Assessment';
import Messages from './pages/Messages';
import Resources from './pages/Resources';
import Supplies from './pages/Supplies';
import HomelessnessInfo from './pages/HomelessnessInfo';

// Import components
import Header from './components/Header';
import Sidebar from './components/Sidebar';

function App() {
  return (
    <Router>
      <div className="App">
        <Header />
        <div className="app-content">
          <Sidebar />
          <main className="main-content">
            <Routes>
              <Route path="/" element={<Dashboard />} />
              <Route path="/login" element={<Login />} />
              <Route path="/client/:id" element={<ClientProfile />} />
              <Route path="/assessment" element={<Assessment />} />
              <Route path="/messages" element={<Messages />} />
              <Route path="/resources" element={<Resources />} />
              <Route path="/supplies" element={<Supplies />} />
              <Route path="/homelessness" element={<HomelessnessInfo />} />
            </Routes>
          </main>
        </div>
      </div>
    </Router>
  );
}

export default App;
