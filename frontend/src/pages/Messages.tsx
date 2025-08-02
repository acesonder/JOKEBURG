import React, { useState } from 'react';

interface Message {
  id: string;
  sender: string;
  content: string;
  timestamp: string;
  isOwn: boolean;
}

interface Conversation {
  id: string;
  name: string;
  lastMessage: string;
  unreadCount: number;
  timestamp: string;
}

const Messages: React.FC = () => {
  const [selectedConversation, setSelectedConversation] = useState<string | null>('1');
  const [newMessage, setNewMessage] = useState('');

  const conversations: Conversation[] = [
    {
      id: '1',
      name: 'John Doe (Client)',
      lastMessage: 'Thank you for the resources!',
      unreadCount: 0,
      timestamp: '10:30 AM'
    },
    {
      id: '2',
      name: 'Sarah Miller (Service Provider)',
      lastMessage: 'Assessment completed for client #425',
      unreadCount: 2,
      timestamp: '9:15 AM'
    },
    {
      id: '3',
      name: 'Mike Rodriguez (Client)',
      lastMessage: 'Can we schedule a follow-up?',
      unreadCount: 1,
      timestamp: 'Yesterday'
    },
    {
      id: '4',
      name: 'Admin Team',
      lastMessage: 'New supplies have arrived',
      unreadCount: 0,
      timestamp: 'Monday'
    }
  ];

  const messages: Record<string, Message[]> = {
    '1': [
      {
        id: '1',
        sender: 'John Doe',
        content: 'Hi, I wanted to update you on my housing situation.',
        timestamp: '10:15 AM',
        isOwn: false
      },
      {
        id: '2',
        sender: 'You',
        content: 'That\'s great to hear! Please tell me more about the updates.',
        timestamp: '10:20 AM',
        isOwn: true
      },
      {
        id: '3',
        sender: 'John Doe',
        content: 'I was able to secure temporary housing at the transition house. They have space for the next 30 days.',
        timestamp: '10:25 AM',
        isOwn: false
      },
      {
        id: '4',
        sender: 'You',
        content: 'That\'s wonderful news! I\'ll update your profile and we can work on finding more permanent solutions. Here are some resources that might help: [Resource Link]',
        timestamp: '10:28 AM',
        isOwn: true
      },
      {
        id: '5',
        sender: 'John Doe',
        content: 'Thank you for the resources!',
        timestamp: '10:30 AM',
        isOwn: false
      }
    ],
    '2': [
      {
        id: '1',
        sender: 'Sarah Miller',
        content: 'Assessment completed for client #425',
        timestamp: '9:15 AM',
        isOwn: false
      },
      {
        id: '2',
        sender: 'Sarah Miller',
        content: 'Risk level: Moderate. Recommend weekly check-ins.',
        timestamp: '9:16 AM',
        isOwn: false
      }
    ]
  };

  const sendMessage = () => {
    if (newMessage.trim() && selectedConversation) {
      // TODO: Implement actual message sending
      console.log('Sending message:', newMessage);
      setNewMessage('');
    }
  };

  const handleKeyPress = (e: React.KeyboardEvent) => {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendMessage();
    }
  };

  return (
    <div className="page" style={{ padding: 0, height: 'calc(100vh - 200px)' }}>
      <div style={{ display: 'flex', height: '100%' }}>
        
        {/* Conversations List */}
        <div style={{ 
          width: '300px', 
          borderRight: '1px solid #e5e7eb',
          backgroundColor: 'white'
        }}>
          <div style={{ padding: '1rem', borderBottom: '1px solid #e5e7eb' }}>
            <h3 style={{ margin: 0 }}>Messages</h3>
          </div>
          
          <div style={{ overflowY: 'auto', height: 'calc(100% - 60px)' }}>
            {conversations.map((conversation) => (
              <div
                key={conversation.id}
                onClick={() => setSelectedConversation(conversation.id)}
                style={{
                  padding: '1rem',
                  borderBottom: '1px solid #f3f4f6',
                  cursor: 'pointer',
                  backgroundColor: selectedConversation === conversation.id ? '#eff6ff' : 'white'
                }}
              >
                <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start' }}>
                  <div style={{ flex: 1 }}>
                    <div style={{ fontWeight: '600', marginBottom: '0.25rem' }}>
                      {conversation.name}
                    </div>
                    <div style={{ 
                      color: '#6b7280', 
                      fontSize: '0.875rem',
                      overflow: 'hidden',
                      textOverflow: 'ellipsis',
                      whiteSpace: 'nowrap'
                    }}>
                      {conversation.lastMessage}
                    </div>
                  </div>
                  <div style={{ marginLeft: '1rem', textAlign: 'right' }}>
                    <div style={{ fontSize: '0.75rem', color: '#6b7280', marginBottom: '0.25rem' }}>
                      {conversation.timestamp}
                    </div>
                    {conversation.unreadCount > 0 && (
                      <div style={{
                        backgroundColor: '#ef4444',
                        color: 'white',
                        borderRadius: '50%',
                        width: '20px',
                        height: '20px',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        fontSize: '0.75rem',
                        fontWeight: '600'
                      }}>
                        {conversation.unreadCount}
                      </div>
                    )}
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* Message View */}
        <div style={{ flex: 1, display: 'flex', flexDirection: 'column' }}>
          {selectedConversation ? (
            <>
              {/* Message Header */}
              <div style={{ 
                padding: '1rem', 
                borderBottom: '1px solid #e5e7eb',
                backgroundColor: 'white'
              }}>
                <h3 style={{ margin: 0 }}>
                  {conversations.find(c => c.id === selectedConversation)?.name}
                </h3>
              </div>

              {/* Messages */}
              <div style={{ 
                flex: 1, 
                overflowY: 'auto', 
                padding: '1rem',
                backgroundColor: '#f9fafb'
              }}>
                {messages[selectedConversation]?.map((message) => (
                  <div
                    key={message.id}
                    style={{
                      display: 'flex',
                      justifyContent: message.isOwn ? 'flex-end' : 'flex-start',
                      marginBottom: '1rem'
                    }}
                  >
                    <div
                      style={{
                        maxWidth: '70%',
                        padding: '0.75rem 1rem',
                        borderRadius: '1rem',
                        backgroundColor: message.isOwn ? '#3b82f6' : 'white',
                        color: message.isOwn ? 'white' : '#1f2937',
                        boxShadow: '0 1px 2px rgba(0,0,0,0.1)'
                      }}
                    >
                      <div style={{ marginBottom: '0.25rem' }}>
                        {message.content}
                      </div>
                      <div style={{ 
                        fontSize: '0.75rem', 
                        opacity: 0.7,
                        textAlign: message.isOwn ? 'right' : 'left'
                      }}>
                        {message.timestamp}
                      </div>
                    </div>
                  </div>
                ))}
              </div>

              {/* Message Input */}
              <div style={{ 
                padding: '1rem', 
                borderTop: '1px solid #e5e7eb',
                backgroundColor: 'white'
              }}>
                <div style={{ display: 'flex', gap: '0.5rem' }}>
                  <textarea
                    value={newMessage}
                    onChange={(e) => setNewMessage(e.target.value)}
                    onKeyPress={handleKeyPress}
                    placeholder="Type your message..."
                    style={{
                      flex: 1,
                      padding: '0.75rem',
                      border: '1px solid #d1d5db',
                      borderRadius: '0.5rem',
                      resize: 'none',
                      height: '60px'
                    }}
                  />
                  <button 
                    onClick={sendMessage}
                    className="btn btn-primary"
                    style={{ alignSelf: 'flex-end' }}
                  >
                    Send
                  </button>
                </div>
              </div>
            </>
          ) : (
            <div style={{ 
              display: 'flex', 
              alignItems: 'center', 
              justifyContent: 'center',
              height: '100%',
              color: '#6b7280'
            }}>
              Select a conversation to start messaging
            </div>
          )}
        </div>
      </div>
    </div>
  );
};

export default Messages;