const express = require('express');
const router = express.Router();

// Harm reduction supply routes
router.get('/inventory', (req, res) => {
  res.json({ 
    message: 'Get inventory endpoint',
    sampleData: [
      { id: 1, name: 'Naloxone kits', quantity: 25, category: 'overdose-prevention' },
      { id: 2, name: 'Sterile needles and syringes', quantity: 150, category: 'injection-safety' },
      { id: 3, name: 'Safe disposal containers', quantity: 10, category: 'disposal' },
      { id: 4, name: 'Wound care kits', quantity: 30, category: 'medical' },
      { id: 5, name: 'Sanitary/hygiene products', quantity: 40, category: 'hygiene' }
    ]
  });
});

router.post('/orders', (req, res) => {
  res.json({ message: 'Create supply order endpoint - to be implemented' });
});

router.get('/orders', (req, res) => {
  res.json({ message: 'Get supply orders endpoint - to be implemented' });
});

router.put('/orders/:id/delivered', (req, res) => {
  res.json({ message: `Mark order ${req.params.id} as delivered - to be implemented` });
});

module.exports = router;