

document.addEventListener('DOMContentLoaded', function () {

  
  document.querySelectorAll('a.js-scroll').forEach(function (link) {
    link.addEventListener('click', function (e) {
      const targetId = link.getAttribute('href');
      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  const quizRoot = document.getElementById('quizRoot');
  if (quizRoot) initQuiz();

  function initQuiz() {
    const QUESTION_TIME = 20;
    const TOTAL_QUESTIONS = 10;
 
// 1. Group 40 questions by category using your exact format
const CATEGORIZED_QUESTIONS = {
    geography: [
        { question: 'Which is the largest ocean on Earth?', correct_answer: 'Pacific Ocean', incorrect_answers: ['Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean'] },
        { question: 'Which island nation in the Indian Ocean is located just off the southeastern coast of India?', correct_answer: 'Sri Lanka', incorrect_answers: ['Maldives', 'Madagascar', 'Mauritius'] },
        { question: 'What is the capital of Japan?', correct_answer: 'Tokyo', incorrect_answers: ['Kyoto', 'Osaka', 'Seoul'] },
        { question: 'Which is the longest river in the world?', correct_answer: 'Nile', incorrect_answers: ['Amazon', 'Yangtze', 'Mississippi'] },
        { question: 'What is the smallest country in the world by land area?', correct_answer: 'Vatican City', incorrect_answers: ['Monaco', 'San Marino', 'Liechtenstein'] },
        { question: 'Mount Everest is located in which mountain range?', correct_answer: 'Himalayas', incorrect_answers: ['Andes', 'Alps', 'Rockies'] },
        { question: 'The Sahara Desert is located on which continent?', correct_answer: 'Africa', incorrect_answers: ['Asia', 'South America', 'Australia'] },
        { question: 'What is the capital of Australia?', correct_answer: 'Canberra', incorrect_answers: ['Sydney', 'Melbourne', 'Brisbane'] },
        { question: 'Which country has the most natural lakes?', correct_answer: 'Canada', incorrect_answers: ['United States', 'Russia', 'Finland'] },
        { question: 'The Great Barrier Reef is off the coast of which country?', correct_answer: 'Australia', incorrect_answers: ['New Zealand', 'South Africa', 'Philippines'] }
    ],
    science: [
        { question: 'What is the chemical formula for water?', correct_answer: 'H2O', incorrect_answers: ['CO2', 'O2', 'NaCl'] },
        { question: 'What is the hardest naturally occurring substance on Earth?', correct_answer: 'Diamond', incorrect_answers: ['Gold', 'Iron', 'Quartz'] },
        { question: 'Which planet is known as the Red Planet?', correct_answer: 'Mars', incorrect_answers: ['Venus', 'Jupiter', 'Saturn'] },
        { question: 'What force keeps us on the ground?', correct_answer: 'Gravity', incorrect_answers: ['Magnetism', 'Friction', 'Inertia'] },
        { question: 'What gas do plants primarily absorb from the atmosphere?', correct_answer: 'Carbon Dioxide', incorrect_answers: ['Oxygen', 'Nitrogen', 'Helium'] },
        { question: 'What is known as the powerhouse of the cell?', correct_answer: 'Mitochondria', incorrect_answers: ['Nucleus', 'Ribosome', 'Membrane'] },
        { question: 'What is the most abundant gas in Earths atmosphere?', correct_answer: 'Nitrogen', incorrect_answers: ['Oxygen', 'Carbon Dioxide', 'Hydrogen'] },
        { question: 'What is at the center of an atom?', correct_answer: 'Nucleus', incorrect_answers: ['Electron', 'Proton', 'Neutron'] },
        { question: 'Which is the closest star to Earth?', correct_answer: 'The Sun', incorrect_answers: ['Sirius', 'Proxima Centauri', 'Alpha Centauri'] },
        { question: 'By what process do plants make their own food?', correct_answer: 'Photosynthesis', incorrect_answers: ['Respiration', 'Digestion', 'Fermentation'] }
    ],
    ict: [
        { question: 'What does "WWW" stand for in a web address?', correct_answer: 'World Wide Web', incorrect_answers: ['World Wide Window', 'World Web Wide', 'Web World Wide'] },
        { question: 'Which tech company develops the Windows operating system?', correct_answer: 'Microsoft', incorrect_answers: ['Apple', 'Google', 'IBM'] },
        { question: 'What does HTML stand for?', correct_answer: 'Hyper Text Markup Language', incorrect_answers: ['High Text Machine Language', 'Hyperlink and Text Markup', 'Home Tool Markup Language'] },
   { question: 'Which of the following is used for version control?', correct_answer: 'Git', incorrect_answers: ['Photoshop', 'XAMPP', 'Word'] },
        { question: 'What does PHP stand for?', correct_answer: 'PHP: Hypertext Preprocessor', incorrect_answers: ['Personal Home Page', 'Private Hosting Protocol', 'Programming Hypertext Page'] },
        { question: 'Which language is primarily used for styling web pages?', correct_answer: 'CSS', incorrect_answers: ['HTML', 'JavaScript', 'Python'] },
        { question: 'In database management, what does SQL stand for?', correct_answer: 'Structured Query Language', incorrect_answers: ['Simple Query Language', 'Standard Query Logic', 'System Query Language'] },
        { question: 'Which of these is a popular code editor?', correct_answer: 'Visual Studio Code', incorrect_answers: ['Chrome', 'Discord', 'MySQL'] },
        { question: 'What does CSS stand for?', correct_answer: 'Cascading Style Sheets', incorrect_answers: ['Creative Style System', 'Computer Style Sheets', 'Colorful Style Sheets'] },
        { question: 'Which HTTP method is used to send sensitive form data securely?', correct_answer: 'POST', incorrect_answers: ['GET', 'FETCH', 'PULL'] }
    ],
    history: [
        { question: 'Who was the first President of the United States?', correct_answer: 'George Washington', incorrect_answers: ['Abraham Lincoln', 'Thomas Jefferson', 'John Adams'] },
        { question: 'The Great Wall was built primarily to protect which ancient civilization?', correct_answer: 'China', incorrect_answers: ['Egypt', 'Rome', 'Greece'] },
        { question: 'In what year did World War II end?', correct_answer: '1945', incorrect_answers: ['1941', '1939', '1950'] },
        { question: 'Which ancient civilization built the pyramids?', correct_answer: 'Egyptians', incorrect_answers: ['Mayans', 'Aztecs', 'Romans'] },
        { question: 'Who discovered penicillin?', correct_answer: 'Alexander Fleming', incorrect_answers: ['Marie Curie', 'Isaac Newton', 'Albert Einstein'] },
        { question: 'The Titanic sank during its maiden voyage in which year?', correct_answer: '1912', incorrect_answers: ['1905', '1920', '1898'] },
        { question: 'The ancient rock fortress of Sigiriya is located in which country?', correct_answer: 'Sri Lanka', incorrect_answers: ['India', 'Cambodia', 'Thailand'] },
        { question: 'Who painted the Mona Lisa?', correct_answer: 'Leonardo da Vinci', incorrect_answers: ['Vincent van Gogh', 'Pablo Picasso', 'Claude Monet'] },
        { question: 'Which empire was ruled by Julius Caesar?', correct_answer: 'Roman Empire', incorrect_answers: ['Ottoman Empire', 'British Empire', 'Mongol Empire'] },
        { question: 'What was the name of the first artificial Earth satellite launched in 1957?', correct_answer: 'Sputnik 1', incorrect_answers: ['Apollo 11', 'Voyager 1', 'Hubble'] }
    ]
};

// 2. Check the URL for the clicked category (e.g., ?category=science)
const urlParams = new URLSearchParams(window.location.search);
let selectedCategory = urlParams.get('category');

// 3. Failsafe: Default to 'ict' if the category is missing or typed incorrectly
if (!selectedCategory || !CATEGORIZED_QUESTIONS[selectedCategory]) {
    selectedCategory = 'ict'; 
}

// 4. Assign the filtered category to your original variable
const FALLBACK_QUESTIONS = CATEGORIZED_QUESTIONS[selectedCategory];
        let questions = [];
    let current = 0;
    let score = 0;
    let timeLeft = QUESTION_TIME;
    let timerId = null;
    let answers = [];

    const els = {
      qNumber: document.getElementById('qNumber'),
      qText: document.getElementById('qText'),
      options: document.getElementById('answerOptions'),
      navGrid: document.getElementById('questionNav'),
      liveScore: document.getElementById('liveScore'),
      scoreBar: document.getElementById('scoreBar'),
      timerNum: document.getElementById('timerNum'),
      timerRing: document.getElementById('timerRingProgress'),
      feedback: document.getElementById('feedbackBox'),
      prevBtn: document.getElementById('prevBtn'),
      nextBtn: document.getElementById('nextBtn'),
      resultPanel: document.getElementById('resultPanel'),
      quizPanel: document.getElementById('quizQuestionArea'),
      resultPercent: document.getElementById('resultPercent'),
      resultFraction: document.getElementById('resultFraction'),
      loadingMsg: document.getElementById('quizLoading')
    };

    
    function decodeHtml(str) {
      const txt = document.createElement('textarea');
      txt.innerHTML = str;
      return txt.value;
    }

    function shuffle(arr) {
      return arr.map(v => [Math.random(), v]).sort((a, b) => a[0] - b[0]).map(v => v[1]);
    }

   
questions = FALLBACK_QUESTIONS;



    function startQuiz() {
      if (els.loadingMsg) els.loadingMsg.style.display = 'none';
      els.quizPanel.style.display = 'block';
      answers = new Array(questions.length).fill(null);
      buildNavGrid();
      renderQuestion(0);
    }

    function buildNavGrid() {
      els.navGrid.innerHTML = '';
      questions.forEach((_, i) => {
        const pill = document.createElement('button');
        pill.type = 'button';
        pill.className = 'q-pill';
        pill.textContent = i + 1;
        pill.addEventListener('click', () => renderQuestion(i));
        els.navGrid.appendChild(pill);
      });
    }

    function refreshNavGrid() {
      const pills = els.navGrid.querySelectorAll('.q-pill');
      pills.forEach((pill, i) => {
        pill.classList.toggle('current', i === current);
        pill.classList.toggle('answered', answers[i] !== null);
      });
    }

    function renderQuestion(index) {
      clearInterval(timerId);
      current = index;
      const q = questions[current];

      els.qNumber.textContent = `Question ${current + 1} of ${questions.length}`;
      els.qText.textContent = q.question;
      els.feedback.className = 'feedback-box';
      els.feedback.textContent = '';

      
      if (!q._options) {
        q._options = shuffle([q.correct_answer, ...q.incorrect_answers]);
      }

      els.options.innerHTML = '';
      const letters = ['A', 'B', 'C', 'D'];
      q._options.forEach((optionText, i) => {
        const row = document.createElement('div');
        row.className = 'answer-option';
        row.innerHTML = `<span class="answer-letter">${letters[i]}</span><span>${optionText}</span>`;
        row.addEventListener('click', () => selectAnswer(optionText));
        if (answers[current] !== null) {
          markAnswered(row, optionText, q);
        }
        els.options.appendChild(row);
      });

      els.prevBtn.disabled = current === 0;
      els.nextBtn.textContent = current === questions.length - 1 ? 'Finish Quiz' : 'Next Question';
      refreshNavGrid();
      updateLiveScore();

      if (answers[current] === null) {
        startTimer();
      } else {
        stopTimerVisual();
      }
    }

    function markAnswered(row, optionText, q) {
      row.classList.add('selected');
      if (optionText === q.correct_answer) row.classList.add('correct');
      if (optionText === answers[current] && optionText !== q.correct_answer) row.classList.add('incorrect');
    }

    function selectAnswer(optionText) {
      if (answers[current] !== null) return; 
      clearInterval(timerId);
      answers[current] = optionText;

      const q = questions[current];
      const correct = optionText === q.correct_answer;
      if (correct) score++;

      
      renderQuestion(current);

      els.feedback.classList.add('show', correct ? 'correct' : 'incorrect');
      els.feedback.textContent = correct
        ? 'Correct! Nice work.'
        : `Not quite — the correct answer is "${q.correct_answer}".`;

      updateLiveScore();
      refreshNavGrid();
    }

    function updateLiveScore() {
      const answeredCount = answers.filter(a => a !== null).length;
      els.liveScore.textContent = `${score}/${questions.length}`;
      const pct = questions.length ? Math.round((answeredCount / questions.length) * 100) : 0;
      els.scoreBar.style.width = pct + '%';
    }

    const RING_CIRCUMFERENCE = 2 * Math.PI * 54; 

    function startTimer() {
      timeLeft = QUESTION_TIME;
      updateTimerDisplay();
      timerId = setInterval(() => {
        timeLeft--;
        updateTimerDisplay();
        if (timeLeft <= 0) {
          clearInterval(timerId);
          autoSubmit();
        }
      }, 1000);
    }

    function stopTimerVisual() {
      els.timerNum.textContent = '--';
      els.timerRing.style.strokeDashoffset = 0;
    }

    function updateTimerDisplay() {
      els.timerNum.textContent = timeLeft;
      const offset = RING_CIRCUMFERENCE * (1 - timeLeft / QUESTION_TIME);
      els.timerRing.style.strokeDashoffset = offset;
      els.timerRing.style.stroke = timeLeft <= 5 ? 'var(--danger)' : 'var(--accent)';
    }

    function autoSubmit() {
      
      answers[current] = '__timeout__';
      renderQuestion(current);
      els.feedback.classList.add('show', 'incorrect');
      els.feedback.textContent = `Time's up! The correct answer was "${questions[current].correct_answer}".`;
      refreshNavGrid();
    }

    els.prevBtn.addEventListener('click', () => {
      if (current > 0) renderQuestion(current - 1);
    });

    els.nextBtn.addEventListener('click', () => {
      if (current < questions.length - 1) {
        renderQuestion(current + 1);
      } else {
        finishQuiz();
      }
    });

  function finishQuiz() {
  clearInterval(timerId);

  const questionArea = document.getElementById('quizQuestionArea');
  if (questionArea) {
    questionArea.style.display = 'none';
  }

  const resultPanel = document.getElementById('resultPanel');
  if (resultPanel) {
    resultPanel.style.display = 'block';
  }

  const pct = Math.round((score / questions.length) * 100);
  const resultPercent = document.getElementById('resultPercent');
  const resultFraction = document.getElementById('resultFraction');

  if (resultPercent) resultPercent.textContent = pct + '%';
  if (resultFraction) resultFraction.textContent = `${score}/${questions.length}`;

  const retryBtn = document.getElementById('retryBtn');
  if (retryBtn) {
    retryBtn.addEventListener('click', () => window.location.reload());
  }
}
startQuiz();
  }

});

  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    const fields = {
      name: { el: document.getElementById('cfName'), rule: (v) => v.trim().length >= 2 },
      email: { el: document.getElementById('cfEmail'), rule: (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) },
      topic: { el: document.getElementById('cfTopic'), rule: (v) => v.trim().length >= 3 },
      message: { el: document.getElementById('cfMessage'), rule: (v) => v.trim().length >= 10 }
    };

    function validateField(key) {
      const field = fields[key];
      const valid = field.rule(field.el.value);
      const feedback = field.el.parentElement.querySelector('.invalid-feedback-qv');
      field.el.classList.toggle('is-invalid', !valid);
      if (feedback) feedback.classList.toggle('show', !valid);
      return valid;
    }

    Object.keys(fields).forEach(function (key) {
      fields[key].el.addEventListener('input', function () { validateField(key); });
    });

    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const allValid = Object.keys(fields)
        .map(validateField)
        .every(Boolean);

      if (allValid) {
        contactForm.reset();
        document.getElementById('formSuccessMsg').style.display = 'block';
        setTimeout(function () {
          document.getElementById('formSuccessMsg').style.display = 'none';
        }, 4000);
      }
    });
  }