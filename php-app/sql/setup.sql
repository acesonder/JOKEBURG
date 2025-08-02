-- JOKEBURG Database Setup and Demo Data
-- File: /php-app/sql/setup.sql

-- Create database
CREATE DATABASE IF NOT EXISTS jokeburg CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE jokeburg;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('client', 'outreach', 'provider', 'admin') NOT NULL DEFAULT 'client',
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    phone VARCHAR(20),
    is_active BOOLEAN DEFAULT TRUE,
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Clients table
CREATE TABLE clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT REFERENCES users(id),
    preferred_name VARCHAR(100),
    date_of_birth DATE,
    pronouns VARCHAR(50),
    emergency_contact_name VARCHAR(100),
    emergency_contact_phone VARCHAR(20),
    current_housing_status ENUM('secure', 'temporary', 'shelter', 'unsheltered') DEFAULT 'unsheltered',
    housing_duration ENUM('over_year', '6_12_months', '1_6_months', 'less_30_days') DEFAULT 'less_30_days',
    current_address TEXT,
    health_conditions TEXT,
    allergies TEXT,
    medications TEXT,
    primary_healthcare_provider VARCHAR(200),
    mental_health_diagnoses TEXT,
    substance_use_history TEXT,
    employment_status ENUM('full_time', 'part_time', 'unemployed_searching', 'not_working') DEFAULT 'not_working',
    education_background TEXT,
    skills_interests TEXT,
    consent_data_sharing BOOLEAN DEFAULT FALSE,
    consent_updated_at TIMESTAMP NULL,
    assigned_worker_id INT REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Remember tokens table
CREATE TABLE remember_tokens (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    token VARCHAR(255) NOT NULL,
    expires_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Assessments table
CREATE TABLE assessments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    assessor_id INT NOT NULL,
    assessment_type VARCHAR(50) DEFAULT 'needs_assessment',
    responses JSON NOT NULL,
    total_score INT,
    risk_level ENUM('low', 'moderate', 'high') NOT NULL,
    recommendations TEXT,
    follow_up_date DATE,
    completed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY (assessor_id) REFERENCES users(id)
);

-- Goals table
CREATE TABLE goals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    category ENUM('housing', 'mental_health', 'substance_use', 'employment', 'healthcare', 'other'),
    title VARCHAR(200) NOT NULL,
    description TEXT,
    target_date DATE,
    status ENUM('not_started', 'in_progress', 'completed', 'paused') DEFAULT 'not_started',
    progress_percentage INT DEFAULT 0,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Resources table
CREATE TABLE resources (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    category ENUM('shelter', 'mental-health', 'addiction', 'healthcare', 'food-assistance', 'employment', 'crisis-support', 'outreach') NOT NULL,
    phone VARCHAR(20),
    website VARCHAR(200),
    email VARCHAR(100),
    address TEXT,
    hours_of_operation TEXT,
    eligibility_criteria TEXT,
    services_offered JSON,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Supply items table
CREATE TABLE supply_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category ENUM('overdose-prevention', 'injection-safety', 'disposal', 'medical', 'hygiene', 'sexual-health') NOT NULL,
    current_quantity INT DEFAULT 0,
    low_stock_threshold INT DEFAULT 10,
    unit_cost DECIMAL(10,2),
    supplier VARCHAR(200),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Messages/conversations system
CREATE TABLE conversations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject VARCHAR(200),
    is_group BOOLEAN DEFAULT FALSE,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE conversation_participants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    conversation_id INT NOT NULL,
    user_id INT NOT NULL,
    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    left_at TIMESTAMP NULL,
    FOREIGN KEY (conversation_id) REFERENCES conversations(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_participant (conversation_id, user_id)
);

CREATE TABLE messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    conversation_id INT NOT NULL,
    sender_id INT NOT NULL,
    content TEXT NOT NULL,
    message_type ENUM('text', 'file', 'system') DEFAULT 'text',
    file_url VARCHAR(500),
    is_urgent BOOLEAN DEFAULT FALSE,
    read_by JSON DEFAULT '{}',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (conversation_id) REFERENCES conversations(id) ON DELETE CASCADE,
    FOREIGN KEY (sender_id) REFERENCES users(id)
);

-- Activity log table
CREATE TABLE activity_log (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    client_id INT,
    action VARCHAR(100) NOT NULL,
    entity_type VARCHAR(50),
    entity_id INT,
    details JSON,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (client_id) REFERENCES clients(id)
);

-- Insert demo users
INSERT INTO users (email, password_hash, role, first_name, last_name, phone) VALUES
('admin@jokeburg.demo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'System', 'Administrator', '905-555-0001'),
('provider@jokeburg.demo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'provider', 'Dr. Sarah', 'Johnson', '905-555-0002'),
('client@jokeburg.demo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'client', 'John', 'Doe', '905-555-0003'),
('outreach@jokeburg.demo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'outreach', 'Michael', 'Smith', '905-555-0004'),
('client2@jokeburg.demo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'client', 'Jane', 'Wilson', '905-555-0005');

-- Note: All demo passwords are "password123" for easy testing

-- Insert demo clients
INSERT INTO clients (user_id, preferred_name, date_of_birth, current_housing_status, housing_duration, consent_data_sharing, assigned_worker_id) VALUES
(3, 'John', '1985-03-15', 'shelter', '1_6_months', TRUE, 4),
(5, 'Jane', '1990-07-22', 'temporary', 'less_30_days', TRUE, 4);

-- Insert demo resources
INSERT INTO resources (name, description, category, phone, website, address, hours_of_operation) VALUES
('Transition House Emergency Shelter', 'Emergency shelter services, meals, and referrals for homeless individuals and families', 'shelter', '905-377-0378', 'https://transitionhouse.ca', '1 George St, Cobourg, ON', '24/7'),
('Northumberland Hills Hospital Mental Health', 'Comprehensive mental health and addiction services', 'mental-health', '905-377-9891', 'https://nhh.ca', '1000 DePalma Dr, Cobourg, ON', 'Mon-Fri 8am-8pm'),
('Fourcast Addiction Services', 'Addiction counseling and support services', 'addiction', '905-377-9111', 'https://fourcast.ca', '905 Division St, Cobourg, ON', 'Mon-Fri 9am-5pm'),
('Salvation Army Cobourg', 'Food bank and emergency supplies', 'food-assistance', '905-373-9440', 'https://salvationarmy.ca', '16 King St W, Cobourg, ON', 'Tue, Thu 10am-2pm'),
('Green Wood Coalition', 'Street outreach, harm reduction, and peer support', 'outreach', '905-885-8700', 'https://greenwoodcoalition.com', 'Cobourg Community', '24/7 Crisis Support');

-- Insert demo supply items
INSERT INTO supply_items (name, description, category, current_quantity, low_stock_threshold) VALUES
('Naloxone Kits', 'Life-saving overdose reversal medication', 'overdose-prevention', 25, 10),
('Sterile Needles (10-pack)', 'Clean injection equipment for harm reduction', 'injection-safety', 100, 20),
('Sharps Containers', 'Safe disposal containers for used needles', 'disposal', 15, 5),
('Basic First Aid Kits', 'Wound care and basic medical supplies', 'medical', 30, 10),
('Hygiene Kits', 'Personal care items including soap, toothbrush, deodorant', 'hygiene', 50, 15);

-- Insert demo goals
INSERT INTO goals (client_id, category, title, description, target_date, status, progress_percentage, created_by) VALUES
(1, 'housing', 'Secure Permanent Housing', 'Find and maintain stable, affordable housing', '2024-06-30', 'in_progress', 40, 4),
(1, 'mental_health', 'Regular Counseling Sessions', 'Attend weekly therapy sessions for anxiety management', '2024-12-31', 'in_progress', 60, 4),
(2, 'employment', 'Job Search and Training', 'Complete job training program and secure employment', '2024-08-15', 'not_started', 0, 4),
(2, 'healthcare', 'Primary Care Connection', 'Establish relationship with family doctor', '2024-05-01', 'completed', 100, 4);

-- Create indexes for better performance
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_users_role ON users(role);
CREATE INDEX idx_clients_user_id ON clients(user_id);
CREATE INDEX idx_clients_assigned_worker ON clients(assigned_worker_id);
CREATE INDEX idx_assessments_client_id ON assessments(client_id);
CREATE INDEX idx_goals_client_id ON goals(client_id);
CREATE INDEX idx_messages_conversation_id ON messages(conversation_id);
CREATE INDEX idx_messages_created_at ON messages(created_at);
CREATE INDEX idx_activity_log_user_id ON activity_log(user_id);
CREATE INDEX idx_activity_log_created_at ON activity_log(created_at);

-- Demo Assessment Data
INSERT INTO assessments (client_id, assessor_id, responses, total_score, risk_level, recommendations) VALUES
(1, 4, '{"housing": 2, "mental_health": 2, "substance_use": 1, "employment": 2}', 7, 'moderate', 'Focus on housing stability and continued mental health support'),
(2, 4, '{"housing": 3, "mental_health": 1, "substance_use": 0, "employment": 2}', 6, 'moderate', 'Priority on emergency housing and employment services');

-- Demo conversation and messages
INSERT INTO conversations (subject, created_by) VALUES
('Weekly Check-in: John Doe', 4),
('Housing Update: Jane Wilson', 4);

INSERT INTO conversation_participants (conversation_id, user_id) VALUES
(1, 3), (1, 4),  -- John and Michael
(2, 5), (2, 4);  -- Jane and Michael

INSERT INTO messages (conversation_id, sender_id, content) VALUES
(1, 4, 'Hi John, how are you settling in at the shelter?'),
(1, 3, 'Its going okay, thank you for checking in. The staff here are really helpful.'),
(1, 4, 'Thats great to hear! Lets schedule your next appointment to discuss permanent housing options.'),
(2, 4, 'Jane, I have some good news about housing options. Can we meet this week?'),
(2, 5, 'Yes, that would be wonderful! I am available Tuesday or Wednesday afternoon.');

-- Activity log entries
INSERT INTO activity_log (user_id, client_id, action, entity_type, entity_id) VALUES
(4, 1, 'Assessment completed', 'assessment', 1),
(4, 2, 'Assessment completed', 'assessment', 2),
(3, 1, 'Profile updated', 'client', 1),
(5, 2, 'Goal completed', 'goal', 4);