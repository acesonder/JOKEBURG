export interface User {
  id: number;
  email: string;
  role: 'client' | 'outreach-worker' | 'service-provider' | 'admin';
  firstName: string;
  lastName: string;
  phone?: string;
  isActive: boolean;
  lastLogin?: string;
  createdAt: string;
  updatedAt: string;
}

export interface Client {
  id: number;
  userId?: number;
  preferredName?: string;
  dateOfBirth?: string;
  pronouns?: string;
  emergencyContactName?: string;
  emergencyContactPhone?: string;
  currentHousingStatus: 'secure' | 'temporary' | 'shelter' | 'unsheltered';
  housingDuration: 'over_year' | '6_12_months' | '1_6_months' | 'less_30_days';
  currentAddress?: string;
  healthConditions?: string;
  allergies?: string;
  medications?: string;
  primaryHealthcareProvider?: string;
  mentalHealthDiagnoses?: string;
  substanceUseHistory?: string;
  employmentStatus: 'full_time' | 'part_time' | 'unemployed_searching' | 'not_working';
  educationBackground?: string;
  skillsInterests?: string;
  consentDataSharing: boolean;
  consentUpdatedAt?: string;
  assignedWorkerId?: number;
  createdAt: string;
  updatedAt: string;
}

export interface Assessment {
  id: number;
  clientId: number;
  assessorId: number;
  assessmentType: string;
  responses: Record<string, any>;
  totalScore: number;
  riskLevel: 'low' | 'moderate' | 'high';
  recommendations?: string;
  followUpDate?: string;
  completedAt: string;
  createdAt: string;
}

export interface Goal {
  id: number;
  clientId: number;
  category: 'housing' | 'mental_health' | 'substance_use' | 'employment' | 'healthcare' | 'other';
  title: string;
  description?: string;
  targetDate?: string;
  status: 'not_started' | 'in_progress' | 'completed' | 'paused';
  progressPercentage: number;
  createdBy: number;
  createdAt: string;
  updatedAt: string;
}

export interface Message {
  id: number;
  conversationId: number;
  senderId: number;
  content: string;
  messageType: 'text' | 'file' | 'system';
  fileUrl?: string;
  isUrgent: boolean;
  readBy: Record<string, string>;
  createdAt: string;
}

export interface Conversation {
  id: number;
  subject?: string;
  isGroup: boolean;
  createdBy: number;
  participants: User[];
  lastMessage?: Message;
  unreadCount: number;
  createdAt: string;
  updatedAt: string;
}

export interface Resource {
  id: number;
  name: string;
  description?: string;
  category: 'shelter' | 'mental-health' | 'addiction' | 'healthcare' | 'food-assistance' | 'employment' | 'crisis-support' | 'outreach';
  phone?: string;
  website?: string;
  email?: string;
  address?: string;
  hoursOfOperation?: string;
  eligibilityCriteria?: string;
  servicesOffered: string[];
  isActive: boolean;
  createdAt: string;
  updatedAt: string;
}

export interface SupplyItem {
  id: number;
  name: string;
  description?: string;
  category: 'overdose-prevention' | 'injection-safety' | 'disposal' | 'medical' | 'hygiene' | 'sexual-health';
  currentQuantity: number;
  lowStockThreshold: number;
  unitCost?: number;
  supplier?: string;
  isActive: boolean;
  createdAt: string;
  updatedAt: string;
}

export interface SupplyOrder {
  id: number;
  clientId?: number;
  orderedBy: number;
  status: 'pending' | 'delivered' | 'cancelled';
  notes?: string;
  items: SupplyOrderItem[];
  orderedAt: string;
  deliveredAt?: string;
  deliveredBy?: number;
}

export interface SupplyOrderItem {
  id: number;
  orderId: number;
  itemId: number;
  quantity: number;
  unitCost?: number;
  item: SupplyItem;
}

export interface CaseNote {
  id: number;
  clientId: number;
  authorId: number;
  noteType: 'interaction' | 'observation' | 'incident' | 'follow_up' | 'referral';
  content: string;
  isConfidential: boolean;
  location?: string;
  tags: string[];
  author: User;
  createdAt: string;
}

export interface Appointment {
  id: number;
  clientId: number;
  providerId: number;
  resourceId?: number;
  appointmentType: 'assessment' | 'follow_up' | 'service_referral' | 'group_session' | 'crisis_intervention';
  scheduledAt: string;
  durationMinutes: number;
  status: 'scheduled' | 'confirmed' | 'completed' | 'cancelled' | 'no_show';
  notes?: string;
  reminderSent: boolean;
  provider: User;
  resource?: Resource;
  createdAt: string;
  updatedAt: string;
}

export interface ActivityLogEntry {
  id: number;
  userId?: number;
  clientId?: number;
  action: string;
  entityType?: string;
  entityId?: number;
  details?: Record<string, any>;
  ipAddress?: string;
  userAgent?: string;
  user?: User;
  createdAt: string;
}

// API Response types
export interface ApiResponse<T> {
  data?: T;
  message?: string;
  error?: string;
  status: number;
}

export interface PaginatedResponse<T> {
  data: T[];
  pagination: {
    page: number;
    limit: number;
    total: number;
    pages: number;
  };
}

// Form types
export interface LoginCredentials {
  email: string;
  password: string;
  role: string;
}

export interface AssessmentFormData {
  responses: Record<string, string>;
  clientId?: number;
}

export interface ClientFormData {
  personalInfo: Partial<Client>;
  housingInfo: {
    currentHousingStatus: string;
    housingDuration: string;
    currentAddress?: string;
  };
  healthInfo: {
    healthConditions?: string;
    allergies?: string;
    medications?: string;
    primaryHealthcareProvider?: string;
  };
  mentalHealthInfo: {
    mentalHealthDiagnoses?: string;
    substanceUseHistory?: string;
  };
  employmentInfo: {
    employmentStatus: string;
    educationBackground?: string;
    skillsInterests?: string;
  };
  consent: {
    consentDataSharing: boolean;
  };
}