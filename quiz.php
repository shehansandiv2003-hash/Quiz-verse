<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Play a Quiz | Quiz-Verse</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">

  <nav class="navbar navbar-expand-lg navbar-qv sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <span class="brand-mark"><span></span></span> Quiz-Verse
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="quiz.php">Quiz</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>
        <a href="index.php" class="btn btn-outline-qv btn-sm px-3">Exit Quiz</a>
      </div>
    </div>
  </nav>

  <main class="container py-5 flex-grow-1" id="quizRoot">

    <p id="quizLoading" class="text-center text-muted">Loading questions&hellip; </p>

    <div id="quizPanel">

      
      <div class="d-flex justify-content-center gap-3 mb-5 d-none d-md-flex" id="topProgressBubbles">
        
      </div>

      <div class="row g-4 align-items-start">
        
      
        <div class="col-lg-7">
          
          <div id="quizQuestionArea">
            <p id="qNumber" class="text-muted small text-uppercase mb-2">Question 1 of 10</p>
            <h2 id="qText" class="h5 mb-4 fw-semibold mt-3"></h2>
            <div id="answerOptions"></div>
            <div id="feedbackBox" class="feedback-box mt-3"></div>
            <div class="d-flex justify-content-between mt-5">
              <button id="prevBtn" class="btn btn-outline-qv px-4">Previous</button>
              <button id="nextBtn" class="btn btn-accent px-4 text-white">Next Question</button>
            </div>
          </div>

          <div id="resultPanel" class="text-center mt-5" style="display:none;"> 
            <div class="qv-card mx-auto" style="padding: 3rem 1.5rem;">
              
              <div class="d-flex flex-column align-items-center justify-content-center mx-auto mb-4"
                   style="border: 2px solid var(--border); border-radius: 50%; width: 140px; height: 140px;">
                <div id="resultPercent" class="h3 fw-semibold mb-0">0%</div>
                <div id="resultFraction" class="text-muted small mt-1">0/10</div>
              </div>
              
              <p class="mt-3 mb-1 fw-semibold">Nice work - check your rank on the leaderboard!</p>
              <p class="text-muted small mb-4 pb-2">Your result has been added to today's board.</p>
              
              <div class="d-flex justify-content-center gap-3">
                <button id="retryBtn" class="btn btn-outline-qv px-4">Try Another Quiz</button>
                <a href="index.php" class="btn btn-accent text-white px-4">Back Home</a>
              </div>

            </div>
          </div>

        </div> 

        <div class="col-lg-5">

          <div class="qv-card mb-4 text-center">
            <p class="text-muted small text-uppercase mb-3">Time left</p>
            <div class="timer-ring-wrap mx-auto position-relative" style="width: 130px; height: 130px;">
              <svg width="130" height="130">
                <circle cx="65" cy="65" r="54" stroke-width="8" stroke="var(--border)" fill="none"/>
                <circle id="timerRingProgress" cx="65" cy="65" r="54"
                        stroke-width="8" stroke="var(--accent)" fill="none"
                        stroke-dasharray="339.29" stroke-dashoffset="0"
                        style="transition: stroke-dashoffset 1s linear;"/>
              </svg>
              <div class="position-absolute top-50 start-50 translate-middle d-flex flex-column">
                <span id="timerNum" class="t-num fw-bold fs-4">20</span>
              </div>
            </div>
          </div>

    
          
          <div class="qv-card mb-4">
            <div class="d-flex justify-content-between small text-muted mb-2">
              <span class="text-uppercase">Live score</span>
              <span>Correct so far</span>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <span id="liveScore" class="h5 mb-0">0/10</span>
            </div>
            <div class="progress mt-2" style="height:6px; background:var(--border);">
              <div id="scoreBar" class="progress-bar" style="width:0%; background:var(--accent);"></div>
            </div>
          </div>

          <div class="qv-card ">
            <p class="text-muted small text-uppercase mb-3">Jump to question</p>
            <div id="questionNav" class="d-flex flex-wrap gap-2">
               
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
               <div class="rounded-circle bg-white" style="width:24px; height:24px;"></div>
            </div>
          </div>

        </div> 
      </div> 
    </div> 
  </main>

 <footer>
  <div class="container d-flex justify-content-between align-items-center py-3">
    <p class="small mb-0">&copy; 2026 Quiz-Verse</p>
    <div class="d-flex align-items-center gap-2">
      <span class="text-muted small text-uppercase me-2">Follow us</span>
      <a href="#" class="contact-icon" style="width: 32px; height: 32px; font-size: 0.85rem;">f</a>
      <a href="#" class="contact-icon" style="width: 32px; height: 32px; font-size: 0.85rem;">x</a>
      <a href="#" class="contact-icon" style="width: 32px; height: 32px; font-size: 0.85rem;">in</a>
    </div>
  </div>
</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- THE CACHE BUSTER FIX IS RIGHT HERE -->
  <script src="js/script.js?v=2"></script>

</body>
</html>