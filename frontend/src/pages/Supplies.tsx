import React, { useState } from 'react';

interface SupplyItem {
  id: number;
  name: string;
  quantity: number;
  category: string;
  description: string;
  lowStockThreshold: number;
}

interface SupplyOrder {
  id: string;
  clientName: string;
  items: { itemId: number; quantity: number; itemName: string }[];
  status: 'pending' | 'delivered' | 'cancelled';
  orderDate: string;
  deliveredDate?: string;
  notes?: string;
}

const Supplies: React.FC = () => {
  const [activeTab, setActiveTab] = useState<'inventory' | 'orders' | 'new-order'>('inventory');
  const [selectedItems, setSelectedItems] = useState<Record<number, number>>({});
  const [clientName, setClientName] = useState('');
  const [orderNotes, setOrderNotes] = useState('');

  const supplies: SupplyItem[] = [
    {
      id: 1,
      name: 'Naloxone kits',
      quantity: 25,
      category: 'overdose-prevention',
      description: 'Emergency overdose reversal medication',
      lowStockThreshold: 10
    },
    {
      id: 2,
      name: 'Sterile needles and syringes',
      quantity: 150,
      category: 'injection-safety',
      description: 'Various sizes for safe injection',
      lowStockThreshold: 50
    },
    {
      id: 3,
      name: 'Safe disposal containers',
      quantity: 10,
      category: 'disposal',
      description: 'Sharp containers for safe disposal',
      lowStockThreshold: 5
    },
    {
      id: 4,
      name: 'Wound care kits',
      quantity: 30,
      category: 'medical',
      description: 'Basic wound cleaning and bandaging supplies',
      lowStockThreshold: 15
    },
    {
      id: 5,
      name: 'Sanitary/hygiene products',
      quantity: 40,
      category: 'hygiene',
      description: 'Personal hygiene essentials',
      lowStockThreshold: 20
    },
    {
      id: 6,
      name: 'Alcohol swabs',
      quantity: 200,
      category: 'injection-safety',
      description: 'Pre-injection site cleaning',
      lowStockThreshold: 100
    },
    {
      id: 7,
      name: 'Condoms',
      quantity: 75,
      category: 'sexual-health',
      description: 'Safe sex protection',
      lowStockThreshold: 30
    },
    {
      id: 8,
      name: 'Basic first aid supplies',
      quantity: 20,
      category: 'medical',
      description: 'Bandages, antiseptic, gauze',
      lowStockThreshold: 10
    }
  ];

  const orders: SupplyOrder[] = [
    {
      id: '1',
      clientName: 'John D.',
      items: [
        { itemId: 1, quantity: 2, itemName: 'Naloxone kits' },
        { itemId: 4, quantity: 1, itemName: 'Wound care kits' }
      ],
      status: 'delivered',
      orderDate: '2024-01-15 10:30',
      deliveredDate: '2024-01-15 14:20',
      notes: 'Client requested additional wound care information'
    },
    {
      id: '2',
      clientName: 'Sarah M.',
      items: [
        { itemId: 2, quantity: 10, itemName: 'Sterile needles and syringes' },
        { itemId: 6, quantity: 20, itemName: 'Alcohol swabs' }
      ],
      status: 'pending',
      orderDate: '2024-01-16 09:15',
      notes: 'Regular weekly supply pickup'
    },
    {
      id: '3',
      clientName: 'Mike R.',
      items: [
        { itemId: 5, quantity: 3, itemName: 'Sanitary/hygiene products' },
        { itemId: 7, quantity: 10, itemName: 'Condoms' }
      ],
      status: 'pending',
      orderDate: '2024-01-16 11:45'
    }
  ];

  const getCategoryIcon = (category: string) => {
    const icons: Record<string, string> = {
      'overdose-prevention': '🚨',
      'injection-safety': '💉',
      'disposal': '🗑️',
      'medical': '🏥',
      'hygiene': '🧼',
      'sexual-health': '💕'
    };
    return icons[category] || '📦';
  };

  const getStockStatus = (item: SupplyItem) => {
    if (item.quantity === 0) return { status: 'out-of-stock', color: '#ef4444', text: 'Out of Stock' };
    if (item.quantity <= item.lowStockThreshold) return { status: 'low', color: '#f59e0b', text: 'Low Stock' };
    return { status: 'good', color: '#10b981', text: 'In Stock' };
  };

  const handleItemQuantityChange = (itemId: number, quantity: number) => {
    if (quantity <= 0) {
      const { [itemId]: removed, ...rest } = selectedItems;
      setSelectedItems(rest);
    } else {
      setSelectedItems({ ...selectedItems, [itemId]: quantity });
    }
  };

  const createOrder = () => {
    if (!clientName.trim() || Object.keys(selectedItems).length === 0) {
      alert('Please enter client name and select at least one item');
      return;
    }
    
    // TODO: Implement actual order creation
    console.log('Creating order:', {
      clientName,
      items: selectedItems,
      notes: orderNotes
    });
    
    // Reset form
    setClientName('');
    setSelectedItems({});
    setOrderNotes('');
    setActiveTab('orders');
    alert('Order created successfully!');
  };

  const markAsDelivered = (orderId: string) => {
    // TODO: Implement actual order status update
    console.log('Marking order as delivered:', orderId);
    alert('Order marked as delivered!');
  };

  return (
    <div className="page">
      <h2>Harm Reduction Supplies</h2>
      
      {/* Tab Navigation */}
      <div style={{ 
        display: 'flex', 
        borderBottom: '1px solid #e5e7eb', 
        marginBottom: '2rem' 
      }}>
        {[
          { key: 'inventory', label: 'Inventory', icon: '📦' },
          { key: 'orders', label: 'Orders', icon: '📋' },
          { key: 'new-order', label: 'New Order', icon: '➕' }
        ].map(tab => (
          <button
            key={tab.key}
            onClick={() => setActiveTab(tab.key as any)}
            style={{
              padding: '1rem 2rem',
              border: 'none',
              background: 'none',
              borderBottom: activeTab === tab.key ? '2px solid #3b82f6' : '2px solid transparent',
              color: activeTab === tab.key ? '#3b82f6' : '#6b7280',
              cursor: 'pointer',
              fontSize: '1rem',
              fontWeight: activeTab === tab.key ? '600' : '400'
            }}
          >
            {tab.icon} {tab.label}
          </button>
        ))}
      </div>

      {/* Inventory Tab */}
      {activeTab === 'inventory' && (
        <div>
          <div style={{ marginBottom: '2rem' }}>
            <h3>Current Inventory Status</h3>
            <p style={{ color: '#6b7280' }}>
              Monitor supply levels and reorder when necessary
            </p>
          </div>

          <div style={{ 
            display: 'grid', 
            gridTemplateColumns: 'repeat(auto-fill, minmax(300px, 1fr))', 
            gap: '1rem' 
          }}>
            {supplies.map(item => {
              const stockStatus = getStockStatus(item);
              return (
                <div key={item.id} className="card">
                  <div style={{ display: 'flex', alignItems: 'center', marginBottom: '1rem' }}>
                    <span style={{ fontSize: '2rem', marginRight: '1rem' }}>
                      {getCategoryIcon(item.category)}
                    </span>
                    <div style={{ flex: 1 }}>
                      <h4 style={{ margin: '0 0 0.25rem 0' }}>{item.name}</h4>
                      <p style={{ color: '#6b7280', margin: 0, fontSize: '0.875rem' }}>
                        {item.description}
                      </p>
                    </div>
                  </div>

                  <div style={{ 
                    display: 'flex', 
                    justifyContent: 'space-between', 
                    alignItems: 'center',
                    marginBottom: '1rem'
                  }}>
                    <div>
                      <span style={{ fontSize: '1.5rem', fontWeight: 'bold' }}>
                        {item.quantity}
                      </span>
                      <span style={{ color: '#6b7280', marginLeft: '0.5rem' }}>
                        units
                      </span>
                    </div>
                    <div style={{
                      padding: '0.25rem 0.75rem',
                      borderRadius: '1rem',
                      backgroundColor: stockStatus.color + '20',
                      color: stockStatus.color,
                      fontSize: '0.875rem',
                      fontWeight: '500'
                    }}>
                      {stockStatus.text}
                    </div>
                  </div>

                  <div style={{ fontSize: '0.875rem', color: '#6b7280' }}>
                    Low stock threshold: {item.lowStockThreshold} units
                  </div>

                  {stockStatus.status !== 'good' && (
                    <button 
                      className="btn btn-primary" 
                      style={{ marginTop: '1rem', width: '100%', fontSize: '0.875rem' }}
                    >
                      Request Reorder
                    </button>
                  )}
                </div>
              );
            })}
          </div>
        </div>
      )}

      {/* Orders Tab */}
      {activeTab === 'orders' && (
        <div>
          <div style={{ marginBottom: '2rem' }}>
            <h3>Supply Orders</h3>
            <p style={{ color: '#6b7280' }}>
              Track and manage supply distribution to clients
            </p>
          </div>

          <div style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
            {orders.map(order => (
              <div key={order.id} className="card">
                <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start' }}>
                  <div style={{ flex: 1 }}>
                    <div style={{ display: 'flex', alignItems: 'center', marginBottom: '0.5rem' }}>
                      <h4 style={{ margin: 0, marginRight: '1rem' }}>
                        Order #{order.id} - {order.clientName}
                      </h4>
                      <div style={{
                        padding: '0.25rem 0.75rem',
                        borderRadius: '1rem',
                        backgroundColor: order.status === 'delivered' ? '#10b981' : order.status === 'pending' ? '#f59e0b' : '#ef4444',
                        color: 'white',
                        fontSize: '0.75rem',
                        fontWeight: '500'
                      }}>
                        {order.status.toUpperCase()}
                      </div>
                    </div>

                    <div style={{ marginBottom: '1rem' }}>
                      <strong>Items:</strong>
                      <ul style={{ margin: '0.5rem 0', paddingLeft: '1.5rem' }}>
                        {order.items.map((item, index) => (
                          <li key={index}>
                            {item.quantity}x {item.itemName}
                          </li>
                        ))}
                      </ul>
                    </div>

                    <div style={{ fontSize: '0.875rem', color: '#6b7280' }}>
                      <div>Ordered: {order.orderDate}</div>
                      {order.deliveredDate && (
                        <div>Delivered: {order.deliveredDate}</div>
                      )}
                      {order.notes && (
                        <div style={{ marginTop: '0.5rem' }}>
                          <strong>Notes:</strong> {order.notes}
                        </div>
                      )}
                    </div>
                  </div>

                  <div style={{ marginLeft: '1rem' }}>
                    {order.status === 'pending' && (
                      <div style={{ display: 'flex', flexDirection: 'column', gap: '0.5rem' }}>
                        <button 
                          className="btn btn-primary"
                          onClick={() => markAsDelivered(order.id)}
                          style={{ fontSize: '0.875rem' }}
                        >
                          Mark Delivered
                        </button>
                        <button 
                          className="btn btn-secondary"
                          style={{ fontSize: '0.875rem' }}
                        >
                          Edit Order
                        </button>
                      </div>
                    )}
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      )}

      {/* New Order Tab */}
      {activeTab === 'new-order' && (
        <div>
          <div style={{ marginBottom: '2rem' }}>
            <h3>Create New Supply Order</h3>
            <p style={{ color: '#6b7280' }}>
              Select items and quantities for client distribution
            </p>
          </div>

          <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '2rem' }}>
            <div>
              <div className="card">
                <h4>Client Information</h4>
                <div className="form-group">
                  <label>Client Name/ID</label>
                  <input
                    type="text"
                    value={clientName}
                    onChange={(e) => setClientName(e.target.value)}
                    placeholder="Enter client name or ID"
                  />
                </div>
                <div className="form-group">
                  <label>Notes (Optional)</label>
                  <textarea
                    value={orderNotes}
                    onChange={(e) => setOrderNotes(e.target.value)}
                    placeholder="Any special instructions or notes"
                    rows={3}
                  />
                </div>
              </div>
            </div>

            <div>
              <div className="card">
                <h4>Order Summary</h4>
                {Object.keys(selectedItems).length === 0 ? (
                  <p style={{ color: '#6b7280' }}>No items selected</p>
                ) : (
                  <div>
                    {Object.entries(selectedItems).map(([itemId, quantity]) => {
                      const item = supplies.find(s => s.id === parseInt(itemId));
                      return item ? (
                        <div key={itemId} style={{ 
                          display: 'flex', 
                          justifyContent: 'space-between',
                          marginBottom: '0.5rem'
                        }}>
                          <span>{item.name}</span>
                          <span>{quantity}x</span>
                        </div>
                      ) : null;
                    })}
                    <hr style={{ margin: '1rem 0' }} />
                    <button 
                      className="btn btn-primary"
                      onClick={createOrder}
                      style={{ width: '100%' }}
                    >
                      Create Order
                    </button>
                  </div>
                )}
              </div>
            </div>
          </div>

          <div style={{ marginTop: '2rem' }}>
            <h4>Select Items</h4>
            <div style={{ 
              display: 'grid', 
              gridTemplateColumns: 'repeat(auto-fill, minmax(300px, 1fr))', 
              gap: '1rem' 
            }}>
              {supplies.map(item => {
                const stockStatus = getStockStatus(item);
                const selectedQuantity = selectedItems[item.id] || 0;
                
                return (
                  <div key={item.id} className="card">
                    <div style={{ display: 'flex', alignItems: 'center', marginBottom: '1rem' }}>
                      <span style={{ fontSize: '1.5rem', marginRight: '1rem' }}>
                        {getCategoryIcon(item.category)}
                      </span>
                      <div style={{ flex: 1 }}>
                        <h5 style={{ margin: '0 0 0.25rem 0' }}>{item.name}</h5>
                        <p style={{ color: '#6b7280', margin: 0, fontSize: '0.875rem' }}>
                          Available: {item.quantity}
                        </p>
                      </div>
                    </div>

                    <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem' }}>
                      <label style={{ fontSize: '0.875rem', marginBottom: 0 }}>Quantity:</label>
                      <input
                        type="number"
                        min="0"
                        max={item.quantity}
                        value={selectedQuantity}
                        onChange={(e) => handleItemQuantityChange(item.id, parseInt(e.target.value) || 0)}
                        style={{
                          width: '80px',
                          padding: '0.5rem',
                          border: '1px solid #d1d5db',
                          borderRadius: '0.375rem'
                        }}
                      />
                    </div>

                    {stockStatus.status !== 'good' && (
                      <div style={{
                        marginTop: '0.5rem',
                        padding: '0.5rem',
                        backgroundColor: '#fef3c7',
                        borderRadius: '0.375rem',
                        fontSize: '0.875rem',
                        color: '#92400e'
                      }}>
                        ⚠️ {stockStatus.text}
                      </div>
                    )}
                  </div>
                );
              })}
            </div>
          </div>
        </div>
      )}
    </div>
  );
};

export default Supplies;