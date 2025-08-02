import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const Login: React.FC = () => {
  const [credentials, setCredentials] = useState({
    email: '',
    password: '',
    role: 'outreach-worker'
  });

  const [isLoading, setIsLoading] = useState(false);
  const [showPassword, setShowPassword] = useState(false);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setIsLoading(true);
    
    // Simulate login process
    setTimeout(() => {
      console.log('Login attempt:', credentials);
      setIsLoading(false);
      // TODO: Implement actual login logic
    }, 1500);
  };

  const roleOptions = [
    { value: 'client', label: 'Client', icon: '👤', description: 'Access your personal profile and progress' },
    { value: 'outreach-worker', label: 'Outreach Worker', icon: '🤝', description: 'Manage client cases and assessments' },
    { value: 'service-provider', label: 'Service Provider', icon: '🏥', description: 'Coordinate services and referrals' },
    { value: 'admin', label: 'Administrator', icon: '⚙️', description: 'System administration and oversight' }
  ];

  return (
    <div className="min-h-screen bg-gradient-to-br from-primary-50 via-white to-primary-100 flex items-center justify-center p-4">
      <div className="w-full max-w-md">
        {/* Logo/Header Section */}
        <div className="text-center mb-8">
          <div className="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl mb-4 shadow-lg">
            <span className="text-2xl text-white font-bold">J</span>
          </div>
          <h1 className="text-2xl font-bold text-gray-900 mb-2">JOKEBURG</h1>
          <p className="text-gray-600">Cobourg Community Success Platform</p>
          <p className="text-sm text-primary-600 font-medium mt-1">
            Confronting Our Past, Creating Our Future
          </p>
        </div>

        {/* Login Form */}
        <div className="card shadow-xl border-0 bg-white/80 backdrop-blur-sm">
          <h2 className="text-xl font-semibold text-gray-900 mb-6 text-center">
            Welcome Back
          </h2>
          
          <form onSubmit={handleSubmit} className="space-y-6">
            {/* Email Field */}
            <div className="form-group">
              <label htmlFor="email" className="text-sm font-medium text-gray-700">
                Email Address
              </label>
              <div className="relative">
                <input
                  type="email"
                  id="email"
                  value={credentials.email}
                  onChange={(e) => setCredentials({...credentials, email: e.target.value})}
                  className="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-all"
                  placeholder="Enter your email"
                  required
                  autoComplete="email"
                />
                <span className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                  📧
                </span>
              </div>
            </div>

            {/* Password Field */}
            <div className="form-group">
              <label htmlFor="password" className="text-sm font-medium text-gray-700">
                Password
              </label>
              <div className="relative">
                <input
                  type={showPassword ? "text" : "password"}
                  id="password"
                  value={credentials.password}
                  onChange={(e) => setCredentials({...credentials, password: e.target.value})}
                  className="w-full pl-10 pr-12 py-3 border-2 border-gray-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-all"
                  placeholder="Enter your password"
                  required
                  autoComplete="current-password"
                />
                <span className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                  🔒
                </span>
                <button
                  type="button"
                  onClick={() => setShowPassword(!showPassword)}
                  className="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                >
                  {showPassword ? '🙈' : '👁️'}
                </button>
              </div>
            </div>

            {/* Role Selection */}
            <div className="form-group">
              <label className="text-sm font-medium text-gray-700 mb-3 block">
                Select Your Role
              </label>
              <div className="grid grid-cols-1 gap-2">
                {roleOptions.map((option) => (
                  <label
                    key={option.value}
                    className={`flex items-center p-3 border-2 rounded-lg cursor-pointer transition-all hover:bg-gray-50 ${
                      credentials.role === option.value
                        ? 'border-primary-500 bg-primary-50'
                        : 'border-gray-200'
                    }`}
                  >
                    <input
                      type="radio"
                      name="role"
                      value={option.value}
                      checked={credentials.role === option.value}
                      onChange={(e) => setCredentials({...credentials, role: e.target.value})}
                      className="sr-only"
                    />
                    <span className="text-lg mr-3">{option.icon}</span>
                    <div className="flex-1">
                      <div className="font-medium text-gray-900">{option.label}</div>
                      <div className="text-xs text-gray-500 mt-0.5">{option.description}</div>
                    </div>
                    {credentials.role === option.value && (
                      <span className="text-primary-500 ml-2">✓</span>
                    )}
                  </label>
                ))}
              </div>
            </div>

            {/* Submit Button */}
            <button
              type="submit"
              disabled={isLoading}
              className="btn btn-primary w-full py-3 text-base font-semibold"
            >
              {isLoading ? (
                <div className="flex items-center justify-center gap-2">
                  <div className="loading-spinner w-5 h-5"></div>
                  Signing In...
                </div>
              ) : (
                'Sign In'
              )}
            </button>
          </form>

          {/* Additional Links */}
          <div className="mt-6 pt-6 border-t border-gray-200 text-center space-y-3">
            <p className="text-sm text-gray-600">
              <Link to="/forgot-password" className="text-primary-600 hover:text-primary-700 font-medium">
                Forgot your password?
              </Link>
            </p>
            
            <div className="text-xs text-gray-500">
              <p>Need access? Contact your system administrator.</p>
              <p className="mt-2">
                <strong>Emergency:</strong> Call{' '}
                <a href="tel:911" className="text-danger-600 font-medium">911</a>
                {' '}or{' '}
                <a href="tel:9053770378" className="text-primary-600 font-medium">
                  Transition House: (905) 377-0378
                </a>
              </p>
            </div>
          </div>
        </div>

        {/* Footer */}
        <div className="text-center mt-8 text-xs text-gray-500">
          <p>
            © 2024 JOKEBURG. Serving the Cobourg Community.
          </p>
          <p className="mt-1">
            <Link to="/privacy" className="hover:text-gray-700">Privacy Policy</Link>
            {' • '}
            <Link to="/terms" className="hover:text-gray-700">Terms of Service</Link>
          </p>
        </div>
      </div>
    </div>
  );
};

export default Login;