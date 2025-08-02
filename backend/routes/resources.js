const express = require('express');
const router = express.Router();

// Resource directory routes
router.get('/', (req, res) => {
  res.json({ 
    message: 'Get all resources endpoint',
    sampleData: [
      {
        id: 1,
        name: 'Transition House Emergency Shelter',
        description: 'Shelter services, meals, referrals',
        phone: '(905) 377-0378',
        website: 'transitionhouse.ca',
        category: 'shelter'
      },
      {
        id: 2,
        name: 'Northumberland Hills Hospital Community Mental Health',
        description: 'Counseling, addiction services',
        phone: '(905) 377-9891',
        website: 'nhh.ca',
        category: 'mental-health'
      }
    ]
  });
});

router.post('/', (req, res) => {
  res.json({ message: 'Create new resource endpoint - to be implemented' });
});

router.get('/:id', (req, res) => {
  res.json({ message: `Get resource ${req.params.id} endpoint - to be implemented` });
});

router.put('/:id', (req, res) => {
  res.json({ message: `Update resource ${req.params.id} endpoint - to be implemented` });
});

module.exports = router;