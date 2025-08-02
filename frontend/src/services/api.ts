import axios, { AxiosResponse } from 'axios';

const API_BASE_URL = process.env.REACT_APP_API_URL || 'http://localhost:5000/api';

// Create axios instance
const api = axios.create({
  baseURL: API_BASE_URL,
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json',
  },
});

// Request interceptor to add auth token
api.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

// Response interceptor for error handling
api.interceptors.response.use(
  (response: AxiosResponse) => {
    return response;
  },
  (error) => {
    if (error.response?.status === 401) {
      // Unauthorized - remove token and redirect to login
      localStorage.removeItem('token');
      window.location.href = '/login';
    }
    return Promise.reject(error);
  }
);

// Auth API
export const authApi = {
  login: (credentials: { email: string; password: string; role: string }) =>
    api.post('/auth/login', credentials),
  
  register: (userData: any) =>
    api.post('/auth/register', userData),
  
  logout: () =>
    api.post('/auth/logout'),
  
  getCurrentUser: () =>
    api.get('/auth/me'),
};

// Users API
export const usersApi = {
  getAll: () =>
    api.get('/users'),
  
  getById: (id: number) =>
    api.get(`/users/${id}`),
  
  update: (id: number, data: any) =>
    api.put(`/users/${id}`, data),
  
  delete: (id: number) =>
    api.delete(`/users/${id}`),
};

// Clients API
export const clientsApi = {
  getAll: () =>
    api.get('/clients'),
  
  create: (clientData: any) =>
    api.post('/clients', clientData),
  
  getById: (id: number) =>
    api.get(`/clients/${id}`),
  
  update: (id: number, data: any) =>
    api.put(`/clients/${id}`, data),
  
  delete: (id: number) =>
    api.delete(`/clients/${id}`),
  
  getProgress: (id: number) =>
    api.get(`/clients/${id}/progress`),
};

// Assessments API
export const assessmentsApi = {
  create: (assessmentData: any) =>
    api.post('/assessments', assessmentData),
  
  getByClientId: (clientId: number) =>
    api.get(`/assessments/client/${clientId}`),
  
  getById: (id: number) =>
    api.get(`/assessments/${id}`),
  
  update: (id: number, data: any) =>
    api.put(`/assessments/${id}`, data),
};

// Messages API
export const messagesApi = {
  getConversations: () =>
    api.get('/messages/conversations'),
  
  createConversation: (data: any) =>
    api.post('/messages/conversations', data),
  
  getMessages: (conversationId: number) =>
    api.get(`/messages/conversations/${conversationId}/messages`),
  
  sendMessage: (conversationId: number, content: string) =>
    api.post(`/messages/conversations/${conversationId}/messages`, { content }),
  
  markAsRead: (messageId: number) =>
    api.put(`/messages/${messageId}/read`),
};

// Resources API
export const resourcesApi = {
  getAll: () =>
    api.get('/resources'),
  
  create: (resourceData: any) =>
    api.post('/resources', resourceData),
  
  getById: (id: number) =>
    api.get(`/resources/${id}`),
  
  update: (id: number, data: any) =>
    api.put(`/resources/${id}`, data),
  
  delete: (id: number) =>
    api.delete(`/resources/${id}`),
};

// Supplies API
export const suppliesApi = {
  getInventory: () =>
    api.get('/supplies/inventory'),
  
  createOrder: (orderData: any) =>
    api.post('/supplies/orders', orderData),
  
  getOrders: () =>
    api.get('/supplies/orders'),
  
  markOrderDelivered: (orderId: string) =>
    api.put(`/supplies/orders/${orderId}/delivered`),
};

// Health check
export const healthApi = {
  check: () =>
    api.get('/health'),
};

export default api;