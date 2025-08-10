# JOKEBURG - Cobourg Community Success Web Application

JOKEBURG is a comprehensive case management web application designed to address homelessness, addiction, and mental health challenges in the Cobourg community. The platform enables coordinated support between clients, outreach workers, service providers, and administrators.

**Always reference these instructions first and fallback to search or bash commands only when you encounter unexpected information that does not match the info here.**

## Working Effectively

### Bootstrap and Setup
- Install Node.js 18+ and npm (current system has Node.js 20.19.4, npm 10.8.2)
- Clone repository: `git clone https://github.com/acesonder/JOKEBURG.git`
- Install all dependencies: `npm run install-all` -- takes 3-4 minutes. NEVER CANCEL. Set timeout to 10+ minutes.
- Set up environment: `cd backend && cp .env.example .env`
- Configure PostgreSQL database (required for backend):
  - Start PostgreSQL service: `sudo systemctl start postgresql`
  - Create database: `sudo -u postgres createdb jokeburg_db`

### Development Servers
- **RECOMMENDED**: Run both frontend and backend concurrently: `npm run dev`
  - Frontend runs on http://localhost:3000 (React app)
  - Backend runs on http://localhost:5000 (Node.js API)
  - Takes 45-60 seconds to fully start both services. NEVER CANCEL.
- **Alternative**: Run services separately:
  - Frontend only: `npm run dev:frontend`
  - Backend only: `npm run dev:backend`
- **PHP Alternative**: The php-app/ directory contains an alternative PHP implementation
  - Start with: `cd php-app && php -S localhost:8080`
  - Access at http://localhost:8080

### Build Process
- Build frontend for production: `npm run build` -- takes 10-15 seconds. Set timeout to 2+ minutes.
- Production build creates optimized files in `frontend/build/`
- Start production backend: `npm start` (serves backend on port 5000)

### Testing
- **Known Issue**: Test suites currently have configuration issues
  - Backend tests fail with "No tests found"
  - Frontend tests fail with react-router-dom import issues
  - **DO NOT** spend time fixing test issues unless specifically requested
  - Focus on manual testing via browser instead

### Code Quality
- Run ESLint on frontend: `npx eslint src/ --max-warnings 0` in frontend/ directory
- ESLint runs successfully with no errors (takes ~2 seconds)
- **Warning**: TypeScript version 5.9.2 exceeds officially supported version but works fine

## Validation

### Always Test Application Functionality
After making changes:
1. **MANDATORY**: Start development servers and verify both endpoints respond:
   - `curl http://localhost:5000/api/health` should return JSON with status "OK"
   - `curl -I http://localhost:3000` should return HTTP 200
2. **MANDATORY**: Access the application in browser at http://localhost:3000
3. **MANDATORY**: Test navigation between major sections:
   - Dashboard (/) - Shows metrics, recent activity, urgent actions, emergency resources
   - Messages (/messages) - Real-time messaging interface with conversation threads
   - Resources (/resources) - Comprehensive community service directory
   - Assessment (/assessment) - Smart needs assessment forms
   - Supplies (/supplies) - Harm reduction supply management
4. **MANDATORY**: Verify main application features are working:
   - Navigation sidebar functions correctly
   - Dashboard displays stats and activity feed
   - Resources directory shows Cobourg community services with contact info
   - Messaging interface displays conversation threads
5. **ALWAYS** take screenshots when making UI changes to document the impact

### Performance Expectations
- Dependency installation: 3-4 minutes (NEVER CANCEL - set 10+ minute timeout)
- Frontend development server startup: 30-60 seconds
- Backend development server startup: 5-10 seconds
- Concurrent startup: 45-60 seconds total (NEVER CANCEL - set 2+ minute timeout)
- Frontend production build: 10-15 seconds
- ESLint execution: 2-3 seconds

## Architecture Overview

### Technology Stack
- **Frontend**: React 19.1.1, TypeScript, React Router, Socket.IO client, Axios
- **Backend**: Node.js, Express, PostgreSQL with Sequelize ORM, Socket.IO, JWT auth
- **Build Tools**: Create React App (React Scripts), npm workspaces
- **Alternative**: PHP application with traditional LAMP stack architecture

### Project Structure
```
JOKEBURG/
├── frontend/           # React TypeScript application
├── backend/            # Node.js Express API server
├── php-app/           # Alternative PHP implementation
├── database/          # Schema documentation
├── docs/              # Project documentation
└── package.json       # Root workspace configuration
```

### Key Features Implemented
- **Dashboard**: Metrics, activity feed, urgent actions, emergency contacts
- **Case Management**: Client profiles, progress tracking, goal setting
- **Smart Assessment**: Dynamic needs assessment with risk scoring
- **Messaging System**: Real-time secure communication
- **Resource Directory**: Comprehensive Cobourg community services
- **Supply Management**: Harm reduction supplies ordering and tracking
- **Multi-Role Support**: Clients, outreach workers, service providers, administrators

## Database Schema
- Uses PostgreSQL with Sequelize ORM
- Comprehensive schema documented in `database/schema.md`
- Core entities: Users, Clients, Assessments, Goals, Messages, Resources, Supplies
- Role-based access control and audit logging implemented

## Common Tasks

### Starting Fresh Development Session
1. `npm run install-all` (if dependencies changed)
2. Ensure PostgreSQL is running: `sudo systemctl start postgresql`
3. `npm run dev` (starts both frontend and backend)
4. Verify health: `curl http://localhost:5000/api/health`
5. Open browser to http://localhost:3000
6. Test key navigation and features

### Making Code Changes
1. **ALWAYS** run linting before committing: `cd frontend && npx eslint src/`
2. **ALWAYS** verify application still runs after changes
3. **ALWAYS** test the user workflow affected by your changes
4. **ALWAYS** check both frontend and backend logs for errors

### Debugging Issues
- Frontend logs: Check browser console at http://localhost:3000
- Backend logs: Check terminal output from `npm run dev:backend`
- API testing: Use `curl http://localhost:5000/api/health` and other endpoints
- Database connection: Verify PostgreSQL service is running

### Environment Configuration
- Backend environment variables defined in `backend/.env` (copy from `.env.example`)
- Default ports: Frontend 3000, Backend 5000, PHP 8080
- Database: PostgreSQL on default port 5432, database name `jokeburg_db`

## Troubleshooting

### Port Conflicts
- If "address already in use" error occurs, kill existing processes:
  - `pkill -f "node server.js"` for backend
  - `pkill -f "react-scripts start"` for frontend
- Wait 2-3 seconds before restarting services

### PostgreSQL Issues
- If database connection fails: `sudo systemctl start postgresql`
- If database doesn't exist: `sudo -u postgres createdb jokeburg_db`
- Check connection in backend logs when starting

### Build Failures
- Clear node_modules if dependency issues: `rm -rf node_modules package-lock.json && npm install`
- Check Node.js version compatibility (requires 18+)

### TypeScript Warnings
- TypeScript 5.9.2 warnings can be ignored - application works correctly
- ESLint deprecation warnings are non-critical

## Critical Reminders
- **NEVER CANCEL** dependency installation (3-4 minutes is normal)
- **NEVER CANCEL** server startup (up to 60 seconds is normal)
- **ALWAYS** verify application functionality after changes
- **ALWAYS** test in browser, not just API endpoints
- **ALWAYS** check that navigation and core features work
- Set appropriate timeouts: 10+ minutes for npm install, 2+ minutes for server startup
- Use manual testing since automated tests are not fully configured
- Both React and PHP implementations are available for development flexibility

## Validated Commands Reference
All commands below have been tested and work correctly:

```bash
# Setup and Dependencies
npm run install-all                    # 3-4 minutes, installs all workspace dependencies
cd backend && cp .env.example .env     # Setup environment variables

# Development
npm run dev                            # Start both frontend and backend (45-60 seconds)
npm run dev:frontend                   # Frontend only (30-60 seconds)
npm run dev:backend                    # Backend only (5-10 seconds)

# Alternative PHP Development
cd php-app && php -S localhost:8080   # Start PHP server

# Building
npm run build                          # Production build (10-15 seconds)

# Code Quality
cd frontend && npx eslint src/         # Lint frontend code (2-3 seconds)

# Health Checks
curl http://localhost:5000/api/health  # Test backend API
curl -I http://localhost:3000          # Test frontend server

# Database
sudo systemctl start postgresql        # Start PostgreSQL service
sudo -u postgres createdb jokeburg_db  # Create database
```

All timing estimates include 50% buffer for safety. Always wait for completion.