import React, { useState } from 'react';

interface AssessmentQuestion {
  id: string;
  question: string;
  options: { value: string; label: string; points: number }[];
  category: string;
}

const Assessment: React.FC = () => {
  const [currentStep, setCurrentStep] = useState(0);
  const [answers, setAnswers] = useState<Record<string, string>>({});

  const questions: AssessmentQuestion[] = [
    {
      id: 'housing_situation',
      question: 'What is your current housing situation?',
      category: 'Housing Stability',
      options: [
        { value: 'secure', label: 'Secure Housing', points: 0 },
        { value: 'temporary', label: 'Temporary Housing', points: 1 },
        { value: 'shelter', label: 'Shelter/Emergency Housing', points: 2 },
        { value: 'unsheltered', label: 'Unsheltered/Homeless', points: 3 }
      ]
    },
    {
      id: 'housing_duration',
      question: 'How long have you been in your current housing situation?',
      category: 'Housing Stability',
      options: [
        { value: 'over_year', label: 'Over a year', points: 0 },
        { value: '6_12_months', label: '6-12 months', points: 1 },
        { value: '1_6_months', label: '1-6 months', points: 2 },
        { value: 'less_30_days', label: 'Less than 30 days', points: 3 }
      ]
    },
    {
      id: 'emotional_wellbeing',
      question: 'How would you rate your current emotional well-being?',
      category: 'Mental Health',
      options: [
        { value: 'excellent', label: 'Excellent', points: 0 },
        { value: 'stable_stressed', label: 'Stable, but stressed', points: 1 },
        { value: 'frequently_distressed', label: 'Frequently distressed/anxious', points: 2 },
        { value: 'constantly_overwhelmed', label: 'Constantly overwhelmed/crisis mode', points: 3 }
      ]
    },
    {
      id: 'mental_health_treatment',
      question: 'Have you had mental health treatment/support in the past 3 months?',
      category: 'Mental Health',
      options: [
        { value: 'yes_regular', label: 'Yes, regular', points: 0 },
        { value: 'yes_irregular', label: 'Yes, irregular', points: 1 },
        { value: 'no_want_to_start', label: 'No, but want to start', points: 2 },
        { value: 'no_not_interested', label: 'No, not interested', points: 1 }
      ]
    },
    {
      id: 'substance_use_frequency',
      question: 'How often are you currently using substances?',
      category: 'Substance Use',
      options: [
        { value: 'not_using', label: 'Not currently using', points: 0 },
        { value: 'occasionally', label: 'Occasionally (monthly)', points: 1 },
        { value: 'weekly', label: 'Weekly', points: 2 },
        { value: 'daily', label: 'Daily or nearly daily', points: 3 }
      ]
    },
    {
      id: 'employment_status',
      question: 'What is your current employment status?',
      category: 'Employment',
      options: [
        { value: 'full_time', label: 'Full-time employed', points: 0 },
        { value: 'part_time', label: 'Part-time/unstable work', points: 1 },
        { value: 'unemployed_searching', label: 'Unemployed, actively searching', points: 2 },
        { value: 'not_working', label: 'Not working, not searching', points: 2 }
      ]
    }
  ];

  const handleAnswer = (value: string) => {
    setAnswers({ ...answers, [questions[currentStep].id]: value });
  };

  const nextStep = () => {
    if (currentStep < questions.length - 1) {
      setCurrentStep(currentStep + 1);
    }
  };

  const prevStep = () => {
    if (currentStep > 0) {
      setCurrentStep(currentStep - 1);
    }
  };

  const calculateScore = () => {
    let totalScore = 0;
    questions.forEach(question => {
      const answer = answers[question.id];
      if (answer) {
        const option = question.options.find(opt => opt.value === answer);
        if (option) {
          totalScore += option.points;
        }
      }
    });
    return totalScore;
  };

  const getRiskLevel = (score: number) => {
    if (score >= 12) return { level: 'High Need (Urgent)', color: '#ef4444' };
    if (score >= 6) return { level: 'Moderate Need', color: '#f59e0b' };
    return { level: 'Low Need', color: '#10b981' };
  };

  const isComplete = Object.keys(answers).length === questions.length;
  const currentQuestion = questions[currentStep];

  if (isComplete) {
    const score = calculateScore();
    const riskLevel = getRiskLevel(score);
    
    return (
      <div className="page">
        <h2>Assessment Complete</h2>
        <div className="card">
          <h3>Results Summary</h3>
          <div style={{ textAlign: 'center', marginBottom: '2rem' }}>
            <div style={{ 
              fontSize: '2rem', 
              fontWeight: 'bold', 
              color: riskLevel.color,
              marginBottom: '1rem' 
            }}>
              Score: {score}/18
            </div>
            <div style={{ 
              fontSize: '1.5rem', 
              color: riskLevel.color,
              marginBottom: '2rem'
            }}>
              {riskLevel.level}
            </div>
          </div>
          
          <h4>Recommended Actions:</h4>
          <ul style={{ marginBottom: '2rem' }}>
            {score >= 12 && (
              <>
                <li>Immediate case worker assignment required</li>
                <li>Emergency housing assessment</li>
                <li>Crisis intervention services</li>
                <li>Daily check-ins for the first week</li>
              </>
            )}
            {score >= 6 && score < 12 && (
              <>
                <li>Regular case management support</li>
                <li>Weekly progress check-ins</li>
                <li>Resource coordination and referrals</li>
                <li>Goal setting and planning session</li>
              </>
            )}
            {score < 6 && (
              <>
                <li>Monthly check-ins</li>
                <li>Preventive resource access</li>
                <li>Peer support group participation</li>
                <li>Self-directed goal management</li>
              </>
            )}
          </ul>

          <div className="flex flex-col sm:flex-row gap-3">
            <button className="btn btn-primary">Save Assessment</button>
            <button className="btn btn-secondary">Schedule Follow-up</button>
            <button className="btn btn-secondary" onClick={() => {
              setCurrentStep(0);
              setAnswers({});
            }}>
              Start New Assessment
            </button>
          </div>
        </div>
      </div>
    );
  }

  return (
    <div className="page">
      <h2>Smart Needs Assessment</h2>
      
      <div style={{ marginBottom: '2rem' }}>
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '1rem' }}>
          <span>Question {currentStep + 1} of {questions.length}</span>
          <span style={{ color: '#6b7280' }}>{currentQuestion.category}</span>
        </div>
        <div style={{ backgroundColor: '#e5e7eb', height: '8px', borderRadius: '4px' }}>
          <div 
            style={{ 
              backgroundColor: '#3b82f6', 
              height: '100%', 
              width: `${((currentStep + 1) / questions.length) * 100}%`,
              borderRadius: '4px',
              transition: 'width 0.3s ease'
            }}
          ></div>
        </div>
      </div>

      <div className="card">
        <h3 style={{ marginBottom: '2rem' }}>{currentQuestion.question}</h3>
        
        <div style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
          {currentQuestion.options.map((option) => (
            <label 
              key={option.value}
              style={{
                display: 'flex',
                alignItems: 'center',
                padding: '1rem',
                border: '2px solid',
                borderColor: answers[currentQuestion.id] === option.value ? '#3b82f6' : '#e5e7eb',
                borderRadius: '0.5rem',
                cursor: 'pointer',
                transition: 'border-color 0.2s'
              }}
            >
              <input
                type="radio"
                name={currentQuestion.id}
                value={option.value}
                checked={answers[currentQuestion.id] === option.value}
                onChange={(e) => handleAnswer(e.target.value)}
                style={{ marginRight: '1rem' }}
              />
              <span style={{ fontSize: '1.1rem' }}>{option.label}</span>
            </label>
          ))}
        </div>

        <div style={{ marginTop: '2rem', display: 'flex', justifyContent: 'space-between' }}>
          <button 
            className="btn btn-secondary" 
            onClick={prevStep}
            disabled={currentStep === 0}
          >
            Previous
          </button>
          <button 
            className="btn btn-primary" 
            onClick={nextStep}
            disabled={!answers[currentQuestion.id]}
          >
            {currentStep === questions.length - 1 ? 'Complete Assessment' : 'Next'}
          </button>
        </div>
      </div>
    </div>
  );
};

export default Assessment;