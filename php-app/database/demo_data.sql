-- Demo data for JOKEBURG application
-- Sample users, clients, and content for testing

-- Insert demo users
INSERT INTO `users` (`email`, `password_hash`, `role`, `first_name`, `last_name`, `phone`, `is_active`) VALUES
('admin@jokeburg.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'System', 'Administrator', '(905) 123-0001', 1),
('worker1@jokeburg.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'outreach-worker', 'Sarah', 'Johnson', '(905) 123-0002', 1),
('worker2@jokeburg.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'outreach-worker', 'Michael', 'Chen', '(905) 123-0003', 1),
('provider1@jokeburg.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'service-provider', 'Dr. Emily', 'Martinez', '(905) 123-0004', 1),
('client1@example.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'client', 'Alex', 'Thompson', '(905) 123-0005', 1),
('client2@example.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'client', 'Jordan', 'Williams', '(905) 123-0006', 1),
('client3@example.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'client', 'Sam', 'Brown', '(905) 123-0007', 1);

-- Insert demo clients
INSERT INTO `clients` (`user_id`, `preferred_name`, `date_of_birth`, `pronouns`, `emergency_contact_name`, `emergency_contact_phone`, `current_housing_status`, `housing_duration`, `current_address`, `health_conditions`, `employment_status`, `consent_data_sharing`, `assigned_worker_id`) VALUES
(5, 'Alex', '1985-03-15', 'they/them', 'Taylor Thompson', '(905) 234-5678', 'temporary', '1_6_months', '123 Temporary Housing, Cobourg, ON', 'Anxiety, Depression', 'unemployed_searching', 1, 2),
(6, 'Jordan', '1990-07-22', 'she/her', 'Pat Williams', '(905) 345-6789', 'shelter', 'less_30_days', 'Transition House Emergency Shelter', 'Substance use disorder', 'not_working', 1, 2),
(7, 'Sam', '1978-11-08', 'he/him', 'Jamie Brown', '(905) 456-7890', 'secure', 'over_year', '456 Stable St, Cobourg, ON', 'Chronic pain, PTSD', 'part_time', 1, 3);

-- Insert demo resources
INSERT INTO `resources` (`name`, `description`, `category`, `phone`, `website`, `email`, `address`, `hours_of_operation`, `eligibility_criteria`, `services_offered`) VALUES
('Transition House Emergency Shelter', 'Emergency shelter services, meals, and support for individuals experiencing homelessness in Cobourg', 'shelter', '(905) 377-0378', 'https://transitionhouse.ca', 'info@transitionhouse.ca', '123 Victoria St, Cobourg, ON K9A 2G9', 'Mon-Sun: 24 hours', 'Adults 18+ experiencing homelessness', '["Emergency shelter", "Meals", "Case management", "Referrals"]'),
('Northumberland Hills Hospital Community Mental Health', 'Mental health counseling and addiction support services', 'mental-health', '(905) 377-9891', 'https://nhh.ca', 'mentalhealth@nhh.ca', '1000 DePalma Dr, Cobourg, ON K9A 5W6', 'Mon-Fri: 8:30 AM - 4:30 PM', 'All ages, referral required', '["Individual counseling", "Group therapy", "Crisis intervention", "Psychiatric services"]'),
('Fourcast Addiction Services', 'Comprehensive addiction treatment and recovery support', 'addiction', '(905) 377-9111', 'https://fourcast.ca', 'help@fourcast.ca', '200 Strathy Rd, Cobourg, ON K9A 0A2', 'Mon-Fri: 9:00 AM - 5:00 PM', 'Adults seeking addiction support', '["Counseling", "Detox support", "Methadone program", "Peer support"]'),
('Salvation Army Cobourg', 'Food bank, emergency supplies, and community support programs', 'food-assistance', '(905) 373-9440', 'https://salvationarmy.ca', 'cobourg@salvationarmy.ca', '16 Spring St, Cobourg, ON K9A 1Z9', 'Mon-Fri: 9:00 AM - 4:00 PM', 'Low income individuals and families', '["Food bank", "Emergency supplies", "Utility assistance", "Community programs"]'),
('Green Wood Coalition', 'Street outreach, harm reduction, and peer support services', 'outreach', '(905) 885-8700', 'https://greenwoodcoalition.com', 'outreach@greenwoodcoalition.com', 'Mobile services throughout Cobourg', 'Mon-Sun: Variable hours', 'All individuals, street accessible', '["Harm reduction supplies", "Peer support", "Mobile outreach", "Crisis support"]');

-- Insert demo supply items
INSERT INTO `supply_items` (`name`, `description`, `category`, `current_quantity`, `low_stock_threshold`, `unit_cost`, `supplier`) VALUES
('Naloxone Kit', 'Emergency overdose reversal medication', 'overdose-prevention', 50, 10, 15.00, 'Health Canada'),
('Sterile Needles (1ml)', 'Single-use sterile injection needles', 'injection-safety', 200, 50, 0.25, 'Medical Supply Co.'),
('Sharps Container', 'Safe disposal container for used needles', 'disposal', 25, 5, 8.50, 'Safety First Medical'),
('Wound Care Kit', 'Basic wound cleaning and bandaging supplies', 'medical', 30, 8, 12.00, 'First Aid Plus'),
('Hygiene Kit', 'Personal hygiene items including soap, toothbrush, etc.', 'hygiene', 40, 10, 6.50, 'Community Care Supplies'),
('Safe Use Kits', 'Complete harm reduction kit with multiple items', 'injection-safety', 75, 15, 18.00, 'Harm Reduction Supply');

-- Insert demo goals
INSERT INTO `goals` (`client_id`, `category`, `title`, `description`, `target_date`, `status`, `progress_percentage`, `created_by`) VALUES
(1, 'housing', 'Secure Permanent Housing', 'Find and maintain stable long-term housing', '2024-06-30', 'in_progress', 60, 2),
(1, 'employment', 'Find Part-time Work', 'Obtain part-time employment to support independence', '2024-04-15', 'in_progress', 25, 2),
(2, 'mental_health', 'Regular Counseling', 'Attend weekly mental health counseling sessions', '2024-12-31', 'in_progress', 80, 2),
(3, 'healthcare', 'Pain Management Plan', 'Develop comprehensive pain management strategy', '2024-05-30', 'in_progress', 40, 3);

-- Insert demo case notes
INSERT INTO `case_notes` (`client_id`, `author_id`, `note_type`, `content`, `location`) VALUES
(1, 2, 'interaction', 'Met with Alex at the community center. Discussed housing applications and provided support with paperwork. Client is motivated and has submitted 3 applications this week.', 'Community Center'),
(1, 2, 'follow_up', 'Follow-up call regarding housing application status. One application shows promise - interview scheduled for next week.', 'Phone Call'),
(2, 2, 'interaction', 'Street outreach contact with Jordan. Provided harm reduction supplies and information about shelter availability. Client expressed interest in counseling services.', 'King Street West'),
(3, 3, 'observation', 'Sam attended group session and participated actively. Showing improvement in coping strategies and peer support engagement.', 'Mental Health Center');

-- Insert demo messages
INSERT INTO `messages` (`sender_id`, `receiver_id`, `subject`, `content`, `message_type`) VALUES
(2, 5, 'Housing Update', 'Hi Alex, just wanted to let you know that the housing application for Maple Street Apartments looks very promising. The interview is scheduled for Thursday at 2 PM. Let me know if you need help preparing!', 'text'),
(5, 2, 'Re: Housing Update', 'Thank you Sarah! I\'m nervous but excited. Could we meet beforehand to go over what questions they might ask?', 'text'),
(3, 6, 'Group Session Reminder', 'Hi Jordan, this is a reminder about the peer support group meeting tomorrow at 3 PM at the community center. Hope to see you there!', 'text'),
(4, 7, 'Appointment Confirmation', 'Hi Sam, confirming your appointment for pain management consultation on Friday at 10 AM. Please bring your current medication list.', 'text');

-- Insert demo appointments
INSERT INTO `appointments` (`client_id`, `provider_id`, `resource_id`, `appointment_type`, `scheduled_at`, `duration_minutes`, `status`, `notes`) VALUES
(1, 4, 1, 'assessment', '2024-02-15 14:00:00', 60, 'scheduled', 'Initial assessment for housing program'),
(2, 2, 2, 'follow_up', '2024-02-16 10:30:00', 30, 'confirmed', 'Weekly check-in and support'),
(3, 4, 2, 'service_referral', '2024-02-17 15:00:00', 45, 'scheduled', 'Pain management referral'),
(1, 2, 5, 'group_session', '2024-02-18 15:00:00', 90, 'confirmed', 'Peer support group meeting');

-- Demo password is "password123" for all accounts (hashed with bcrypt)