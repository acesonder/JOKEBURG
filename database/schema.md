# Database Schema Design for JOKEBURG

## Overview
This document outlines the database schema for the JOKEBURG application, designed to support comprehensive case management for Cobourg's community success platform.

## Core Entities

### Users
Primary user authentication and role management.

```sql
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('client', 'outreach-worker', 'service-provider', 'admin') NOT NULL,
  first_name VARCHAR(100),
  last_name VARCHAR(100),
  phone VARCHAR(20),
  is_active BOOLEAN DEFAULT true,
  last_login TIMESTAMP,
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW()
);
```

### Clients
Detailed client information and demographics.

```sql
CREATE TABLE clients (
  id SERIAL PRIMARY KEY,
  user_id INTEGER REFERENCES users(id),
  preferred_name VARCHAR(100),
  date_of_birth DATE,
  pronouns VARCHAR(50),
  emergency_contact_name VARCHAR(100),
  emergency_contact_phone VARCHAR(20),
  current_housing_status ENUM('secure', 'temporary', 'shelter', 'unsheltered'),
  housing_duration ENUM('over_year', '6_12_months', '1_6_months', 'less_30_days'),
  current_address TEXT,
  health_conditions TEXT,
  allergies TEXT,
  medications TEXT,
  primary_healthcare_provider VARCHAR(200),
  mental_health_diagnoses TEXT,
  substance_use_history TEXT,
  employment_status ENUM('full_time', 'part_time', 'unemployed_searching', 'not_working'),
  education_background TEXT,
  skills_interests TEXT,
  consent_data_sharing BOOLEAN DEFAULT false,
  consent_updated_at TIMESTAMP,
  assigned_worker_id INTEGER REFERENCES users(id),
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW()
);
```

### Assessments
Smart needs assessment responses and scoring.

```sql
CREATE TABLE assessments (
  id SERIAL PRIMARY KEY,
  client_id INTEGER REFERENCES clients(id) NOT NULL,
  assessor_id INTEGER REFERENCES users(id) NOT NULL,
  assessment_type VARCHAR(50) DEFAULT 'needs_assessment',
  responses JSONB NOT NULL,
  total_score INTEGER,
  risk_level ENUM('low', 'moderate', 'high') NOT NULL,
  recommendations TEXT,
  follow_up_date DATE,
  completed_at TIMESTAMP DEFAULT NOW(),
  created_at TIMESTAMP DEFAULT NOW()
);
```

### Goals
Client goal setting and progress tracking.

```sql
CREATE TABLE goals (
  id SERIAL PRIMARY KEY,
  client_id INTEGER REFERENCES clients(id) NOT NULL,
  category ENUM('housing', 'mental_health', 'substance_use', 'employment', 'healthcare', 'other'),
  title VARCHAR(200) NOT NULL,
  description TEXT,
  target_date DATE,
  status ENUM('not_started', 'in_progress', 'completed', 'paused') DEFAULT 'not_started',
  progress_percentage INTEGER DEFAULT 0,
  created_by INTEGER REFERENCES users(id),
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW()
);
```

### Goal Milestones
Sub-goals and milestone tracking.

```sql
CREATE TABLE goal_milestones (
  id SERIAL PRIMARY KEY,
  goal_id INTEGER REFERENCES goals(id) NOT NULL,
  title VARCHAR(200) NOT NULL,
  description TEXT,
  due_date DATE,
  completed_at TIMESTAMP,
  created_at TIMESTAMP DEFAULT NOW()
);
```

### Conversations
Messaging system conversations.

```sql
CREATE TABLE conversations (
  id SERIAL PRIMARY KEY,
  subject VARCHAR(200),
  is_group BOOLEAN DEFAULT false,
  created_by INTEGER REFERENCES users(id),
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW()
);
```

### Conversation Participants
Users participating in conversations.

```sql
CREATE TABLE conversation_participants (
  id SERIAL PRIMARY KEY,
  conversation_id INTEGER REFERENCES conversations(id) NOT NULL,
  user_id INTEGER REFERENCES users(id) NOT NULL,
  joined_at TIMESTAMP DEFAULT NOW(),
  left_at TIMESTAMP,
  UNIQUE(conversation_id, user_id)
);
```

### Messages
Individual messages within conversations.

```sql
CREATE TABLE messages (
  id SERIAL PRIMARY KEY,
  conversation_id INTEGER REFERENCES conversations(id) NOT NULL,
  sender_id INTEGER REFERENCES users(id) NOT NULL,
  content TEXT NOT NULL,
  message_type ENUM('text', 'file', 'system') DEFAULT 'text',
  file_url VARCHAR(500),
  is_urgent BOOLEAN DEFAULT false,
  read_by JSONB DEFAULT '{}',
  created_at TIMESTAMP DEFAULT NOW()
);
```

### Resources
Community resource directory.

```sql
CREATE TABLE resources (
  id SERIAL PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  description TEXT,
  category ENUM('shelter', 'mental-health', 'addiction', 'healthcare', 'food-assistance', 'employment', 'crisis-support', 'outreach') NOT NULL,
  phone VARCHAR(20),
  website VARCHAR(200),
  email VARCHAR(100),
  address TEXT,
  hours_of_operation TEXT,
  eligibility_criteria TEXT,
  services_offered TEXT[],
  is_active BOOLEAN DEFAULT true,
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW()
);
```

### Supply Items
Harm reduction supply inventory.

```sql
CREATE TABLE supply_items (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT,
  category ENUM('overdose-prevention', 'injection-safety', 'disposal', 'medical', 'hygiene', 'sexual-health') NOT NULL,
  current_quantity INTEGER DEFAULT 0,
  low_stock_threshold INTEGER DEFAULT 10,
  unit_cost DECIMAL(10,2),
  supplier VARCHAR(200),
  is_active BOOLEAN DEFAULT true,
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW()
);
```

### Supply Orders
Orders for harm reduction supplies.

```sql
CREATE TABLE supply_orders (
  id SERIAL PRIMARY KEY,
  client_id INTEGER REFERENCES clients(id),
  ordered_by INTEGER REFERENCES users(id) NOT NULL,
  status ENUM('pending', 'delivered', 'cancelled') DEFAULT 'pending',
  notes TEXT,
  ordered_at TIMESTAMP DEFAULT NOW(),
  delivered_at TIMESTAMP,
  delivered_by INTEGER REFERENCES users(id)
);
```

### Supply Order Items
Items within supply orders.

```sql
CREATE TABLE supply_order_items (
  id SERIAL PRIMARY KEY,
  order_id INTEGER REFERENCES supply_orders(id) NOT NULL,
  item_id INTEGER REFERENCES supply_items(id) NOT NULL,
  quantity INTEGER NOT NULL,
  unit_cost DECIMAL(10,2)
);
```

### Case Notes
Worker notes and observations.

```sql
CREATE TABLE case_notes (
  id SERIAL PRIMARY KEY,
  client_id INTEGER REFERENCES clients(id) NOT NULL,
  author_id INTEGER REFERENCES users(id) NOT NULL,
  note_type ENUM('interaction', 'observation', 'incident', 'follow_up', 'referral') NOT NULL,
  content TEXT NOT NULL,
  is_confidential BOOLEAN DEFAULT false,
  location VARCHAR(200),
  tags VARCHAR(50)[],
  created_at TIMESTAMP DEFAULT NOW()
);
```

### Appointments
Scheduling and appointment management.

```sql
CREATE TABLE appointments (
  id SERIAL PRIMARY KEY,
  client_id INTEGER REFERENCES clients(id) NOT NULL,
  provider_id INTEGER REFERENCES users(id) NOT NULL,
  resource_id INTEGER REFERENCES resources(id),
  appointment_type ENUM('assessment', 'follow_up', 'service_referral', 'group_session', 'crisis_intervention'),
  scheduled_at TIMESTAMP NOT NULL,
  duration_minutes INTEGER DEFAULT 60,
  status ENUM('scheduled', 'confirmed', 'completed', 'cancelled', 'no_show') DEFAULT 'scheduled',
  notes TEXT,
  reminder_sent BOOLEAN DEFAULT false,
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW()
);
```

### Activity Log
System activity and audit trail.

```sql
CREATE TABLE activity_log (
  id SERIAL PRIMARY KEY,
  user_id INTEGER REFERENCES users(id),
  client_id INTEGER REFERENCES clients(id),
  action VARCHAR(100) NOT NULL,
  entity_type VARCHAR(50),
  entity_id INTEGER,
  details JSONB,
  ip_address INET,
  user_agent TEXT,
  created_at TIMESTAMP DEFAULT NOW()
);
```

## Indexes

```sql
-- Performance indexes
CREATE INDEX idx_clients_user_id ON clients(user_id);
CREATE INDEX idx_clients_assigned_worker ON clients(assigned_worker_id);
CREATE INDEX idx_assessments_client_id ON assessments(client_id);
CREATE INDEX idx_assessments_completed_at ON assessments(completed_at);
CREATE INDEX idx_goals_client_id ON goals(client_id);
CREATE INDEX idx_messages_conversation_id ON messages(conversation_id);
CREATE INDEX idx_messages_created_at ON messages(created_at);
CREATE INDEX idx_case_notes_client_id ON case_notes(client_id);
CREATE INDEX idx_case_notes_created_at ON case_notes(created_at);
CREATE INDEX idx_appointments_client_id ON appointments(client_id);
CREATE INDEX idx_appointments_scheduled_at ON appointments(scheduled_at);
CREATE INDEX idx_activity_log_user_id ON activity_log(user_id);
CREATE INDEX idx_activity_log_created_at ON activity_log(created_at);

-- Search indexes
CREATE INDEX idx_resources_category ON resources(category);
CREATE INDEX idx_resources_name_text ON resources USING gin(to_tsvector('english', name));
CREATE INDEX idx_supply_items_category ON supply_items(category);
```

## Relationships Summary

1. **Users** → **Clients** (One-to-One for client users)
2. **Users** → **Clients** (One-to-Many for assigned workers)
3. **Clients** → **Assessments** (One-to-Many)
4. **Clients** → **Goals** (One-to-Many)
5. **Goals** → **Goal Milestones** (One-to-Many)
6. **Users** → **Conversations** (Many-to-Many through participants)
7. **Conversations** → **Messages** (One-to-Many)
8. **Clients** → **Supply Orders** (One-to-Many)
9. **Supply Orders** → **Supply Items** (Many-to-Many through order items)
10. **Clients** → **Case Notes** (One-to-Many)
11. **Clients** → **Appointments** (One-to-Many)

## Data Privacy and Security

### Encryption
- Sensitive fields (health conditions, substance use history) should be encrypted at rest
- All communication encrypted in transit (HTTPS/WSS)

### Access Control
- Role-based permissions enforced at database and application level
- Client data access logged in activity_log table
- Consent tracking for data sharing

### Audit Trail
- All client data modifications logged
- User login/logout tracking
- File access and sharing logged

### Data Retention
- Configurable retention periods by data type
- Automatic archival of old records
- Secure deletion procedures

## Migration Strategy

### Phase 1: Core Tables
1. Users and authentication
2. Clients and basic demographics
3. Simple case notes

### Phase 2: Assessment System
1. Assessments table
2. Goals and milestones
3. Basic reporting

### Phase 3: Communication
1. Conversations and messages
2. File attachments
3. Notifications

### Phase 4: Resource Management
1. Resources directory
2. Supply management
3. Appointment scheduling

### Phase 5: Advanced Features
1. Analytics and reporting
2. Integration APIs
3. Advanced security features