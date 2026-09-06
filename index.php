<?php
// 1. Fetch Top 10 Scores for the Leaderboard Modal
require_once 'includes/db.php';
try {
    $stmt = $pdo->query("SELECT users.username, quiz_scores.score 
                         FROM quiz_scores 
                         JOIN users ON quiz_scores.user_id = users.id 
                         ORDER BY quiz_scores.score DESC 
                         LIMIT 10");
    $top10 = $stmt->fetchAll();
} catch(PDOException $e) {
    $top10 = []; // Failsafe if the database isn't ready
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz-Verse | Explore the Universe of Knowledge</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Quiz-Verse is a dynamic trivia game with instant feedback and a live leaderboard.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

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
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link js-scroll" href="#categories">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#leaderboardModal">Leaderboard</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-outline-qv btn-sm px-3" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
          <button type="button" class="btn btn-accent btn-sm px-3" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
        </div>
      </div>
    </div>
  </nav>

  <header class="hero">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <span class="eyebrow">150+ QUIZZES</span>
          <h1>Explore the whole universe of knowledge, one quiz at a time.</h1>
          <p class="lead my-3">Pick a category, answer against the clock, and see exactly how you scored — every game is generated fresh, so there's always something new to play.</p>
          <div class="d-flex flex-wrap gap-3 mt-4">
            <a href="quiz.php" class="btn btn-accent px-4 py-2">Start a Quiz</a>
            <a href="#categories" class="btn btn-outline-qv px-4 py-2 js-scroll">Browse Categories</a>
          </div>
          <p class="text-muted small mt-3">1,200+ players already exploring</p>
        </div>
        <div class="col-lg-6">
         <div class="orbit-wrap">
  
          <div class="orbit-ring">
            <div class="orbit-dot" style="top: 0; left: 50%; transform: translate(-50%, -50%);"></div>
          </div>
          <div class="orbit-ring ring-2">
            <div class="orbit-dot" style="top: 50%; left: 0; transform: translate(-50%, -50%);"></div>
          </div>
          <div class="orbit-ring ring-3">
            <div class="orbit-dot" style="top: 100%; left: 50%; background: var(--accent); transform: translate(-50%, -50%);"></div>
          </div>
          <div class="orbit-core"></div>
        </div>
        </div>
      </div>
    </div>
  </header>

  <section class="stats-strip">
    <div class="container">
      <div class="row text-center g-3">
        <div class="col-6 col-md-3">
          <div class="stat-num">40+</div><div class="stat-label">Quizzes</div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-num">4</div><div class="stat-label">Categories</div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-num">-</div><div class="stat-label">Players</div>
        </div>
        <div class="col-6 col-md-3">
          <div class="stat-num">0.0★</div><div class="stat-label">Avg Rating</div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5" id="categories">
    <div class="container">
      <h2 class="section-title text-center">Popular categories</h2>
      <p class="section-sub text-center">Pick a topic to jump straight into a quiz</p>
      <div class="row g-4">
        
        <!-- GEOGRAPHY -->
        <div class="col-6 col-lg-3">
          <a href="quiz.php?category=geography" style="text-decoration: none; color: inherit;">
            <div class="qv-card">
              <div class="category-icon">GE</div>
              <h3 class="h6 mb-1">Geography</h3>
              <p class="text-muted small mb-0">Countries, capitals & landmarks</p>
            </div>
          </a>
        </div>

        <!-- HISTORY -->
        <div class="col-6 col-lg-3">
          <a href="quiz.php?category=history" style="text-decoration: none; color: inherit;">
            <div class="qv-card">
              <div class="category-icon">HI</div>
              <h3 class="h6 mb-1">History</h3>
              <p class="text-muted small mb-0">People, events & eras</p>
            </div>
          </a>
        </div>

        <!-- SCIENCE -->
        <div class="col-6 col-lg-3">
          <a href="quiz.php?category=science" style="text-decoration: none; color: inherit;">
            <div class="qv-card">
              <div class="category-icon">SC</div>
              <h3 class="h6 mb-1">Science</h3>
              <p class="text-muted small mb-0">Space, biology & physics</p>
            </div>
          </a>
        </div>

        <!-- ICT -->
        <div class="col-6 col-lg-3">
          <a href="quiz.php?category=ict" style="text-decoration: none; color: inherit;">
            <div class="qv-card">
              <div class="category-icon">IT</div>
              <h3 class="h6 mb-1">ICT</h3>
              <p class="text-muted small mb-0">Web, hardware & logic</p>
            </div>
          </a>
        </div>

      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <h2 class="section-title text-center">How it works</h2>
      <p class="section-sub text-center">Three steps to your score</p>
      <div class="row g-4 text-center">
        <div class="col-md-4">
          <div class="step-circle">01</div>
          <h3 class="h6">Pick a category</h3>
          <p class="text-muted small">Choose a topic and difficulty that suits you.</p>
        </div>
        <div class="col-md-4">
          <div class="step-circle">02</div>
          <h3 class="h6">Answer the questions</h3>
          <p class="text-muted small">Beat the timer and get instant feedback.</p>
        </div>
        <div class="col-md-4">
          <div class="step-circle">03</div>
          <h3 class="h6">Get your score</h3>
          <p class="text-muted small">See your result and climb the leaderboard.</p>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="quiz.php" class="btn btn-accent px-4 py-2">Start a Quiz</a>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="cta-band">
        <h2 class="mb-3">Ready to test what you know?</h2>
        <a href="quiz.php" class="btn btn-accent px-4 py-2">Start a Quiz</a>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6">
          <a class="navbar-brand" href="index.php"><span class="brand-mark"><span></span></span> Quiz-Verse</a>
          <p class="small mt-2">A mini project exploring dynamic trivia and timed quizzes.</p>
        </div>
        <div class="col-6 col-md-3">
          <h3 class="h6 text-light">Explore</h3>
          <p class="small mb-1"><a href="index.php">Home</a></p>
          <p class="small mb-1"><a href="#categories" class="js-scroll">Categories</a></p>
          <p class="small mb-1"><a href="#" data-bs-toggle="modal" data-bs-target="#leaderboardModal">Leaderboard</a></p>
        </div>
        <div class="col-6 col-md-3">
          <h3 class="h6 text-light">Support</h3>
          <p class="small mb-1"><a href="contact.php">Contact Us</a></p>
          <p class="small mb-1"><a href="contact.php#faq">FAQ</a></p>
        </div>
      </div>
      <hr style="border-color: var(--border);">
      <div class="col-12 d-flex justify-content-between align-items-center pt-2">
        <p class="small mb-0">&copy; 2026 Quiz-Verse</p>
        <div class="d-flex align-items-center gap-2">
          <span class="text-muted small text-uppercase me-2">Follow us</span>
          <a href="#" class="contact-icon d-inline-flex align-items-center justify-content-center text-decoration-none" style="width: 32px; height: 32px; font-size: 0.85rem;">f</a>
          <a href="#" class="contact-icon d-inline-flex align-items-center justify-content-center text-decoration-none" style="width: 32px; height: 32px; font-size: 0.85rem;">x</a>
          <a href="#" class="contact-icon d-inline-flex align-items-center justify-content-center text-decoration-none" style="width: 32px; height: 32px; font-size: 0.85rem;">in</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-card); border-color: var(--border);">
        <div class="modal-header" style="border-bottom-color: var(--border);">
          <h5 class="modal-title" id="loginModalLabel" style="font-family: 'Sora', sans-serif;">Log In</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="auth/login.php" method="POST">
            <div class="mb-3">
              <label for="loginEmail" class="form-label text-muted">Email address</label>
              <input type="email" class="form-control form-control-qv" id="loginEmail" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label text-muted">Password</label>
              <input type="password" class="form-control form-control-qv" id="loginPassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-accent w-100 mt-3">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Signup Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-card); border-color: var(--border);">
        <div class="modal-header" style="border-bottom-color: var(--border);">
          <h5 class="modal-title" id="signupModalLabel" style="font-family: 'Sora', sans-serif;">Create an Account</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="auth/register.php" method="POST">
            <div class="mb-3">
              <label for="signupName" class="form-label text-muted">Full Name</label>
              <input type="text" class="form-control form-control-qv" id="signupName" name="username" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
              <label for="signupEmail" class="form-label text-muted">Email address</label>
              <input type="email" class="form-control form-control-qv" id="signupEmail" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
              <label for="signupPassword" class="form-label text-muted">Password</label>
              <input type="password" class="form-control form-control-qv" id="signupPassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-accent w-100 mt-3">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Dynamic Leaderboard Modal -->
  <div class="modal fade" id="leaderboardModal" tabindex="-1" aria-labelledby="leaderboardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-card); border-color: var(--border);">
        <div class="modal-header" style="border-bottom-color: var(--border);">
          <h5 class="modal-title" id="leaderboardModalLabel" style="font-family: 'Sora', sans-serif; color: var(--accent);">🏆 Top 10 Explorers</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <table class="table table-dark table-hover mb-0 text-center" style="background-color: transparent;">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Player</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($top10)): ?>
                    <?php $rank = 1; foreach ($top10 as $row): ?>
                        <tr>
                            <td>#<?= $rank++ ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td style="color: var(--accent); font-weight: bold;"><?= htmlspecialchars($row['score']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-muted py-3">No scores yet. Be the first!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>