<?php
session_start();
require_once 'includes/functions.php';
require_once 'includes/db.php'; 

// Protect the page: kick them out if they are not logged in!
if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

// Fetch the Top 5 scores for the dashboard leaderboard
try {
    $sql = "SELECT users.username, quiz_scores.score 
            FROM quiz_scores 
            JOIN users ON quiz_scores.user_id = users.id 
            ORDER BY quiz_scores.score DESC 
            LIMIT 5";
    $stmt = $pdo->query($sql);
    $top_scores = $stmt->fetchAll();
} catch(PDOException $e) {
    $top_scores = []; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Quiz-Verse</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body class="text-light" style="background-color: #0D1B2A;">

    <div class="container mt-5 text-center py-5">
        
        <!-- INLINE AVATAR SVG (Guaranteed to load instantly) -->
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120" class="rounded-circle mb-4 shadow">
            <circle cx="60" cy="60" r="60" fill="#0D1B2A" stroke="#FF8C00" stroke-width="6"/>
            <circle cx="60" cy="45" r="24" fill="#FF8C00"/>
            <path d="M25 110 Q 60 70 95 110" stroke="#FF8C00" stroke-width="20" fill="none" stroke-linecap="round"/>
        </svg>
        
        <h1 class="mb-3" style="color: #FF8C00;">Welcome to the Quiz-Verse Dashboard!</h1>
        <p class="lead mb-5" style="color: #bdc3c7;">You are successfully authenticated and securely logged in.</p>
       <img src="images/galaxy.svg" alt="Quiz-Verse Galaxy" class="img-fluid mt-4 mb-5 shadow rounded" style="max-width: 400px;">
        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mb-5">
            <a href="quiz.php" class="btn btn-lg px-4 gap-3 text-dark fw-bold" style="background-color: #FF8C00; border: none;">Start the Quiz</a>
            <a href="logout.php" class="btn btn-outline-light btn-lg px-4">Log Out</a>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8 col-lg-6">
                <div class="card border-secondary shadow" style="background-color: #1A365D;">
                    <div class="card-header border-secondary text-center py-3">
                        <h4 class="mb-0 d-flex align-items-center justify-content-center" style="color: #FF8C00;">
                            
                            <!-- INLINE TROPHY SVG (Guaranteed to load instantly) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FF8C00" viewBox="0 0 16 16" style="margin-right: 12px;">
                                <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.521c.16-.12.343-.207.537-.255l1.425-.356v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
                            </svg>
                            
                            Top 5 High Scores
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <!-- Added specific inline styles to completely strip out the white background -->
                        <table class="table table-dark table-hover mb-0 text-center" style="--bs-table-bg: transparent; color: white;">
                            <thead>
<tr>
                                    <th class="py-3 text-light" style="background-color: transparent;">Rank</th>
                                    <th class="py-3 text-light" style="background-color: transparent;">Player</th>
                                    <th class="py-3 text-light" style="background-color: transparent;">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($top_scores) > 0): ?>
                                    <?php $rank = 1; foreach ($top_scores as $row): ?>
                                        <tr>
                                            <td class="py-3 text-light" style="background-color: transparent;">#<?= $rank++ ?></td>
                                            <td class="text-light py-3" style="background-color: transparent;"><?= htmlspecialchars($row['username']) ?></td>
                                            <td class="py-3" style="background-color: transparent; color: #FF8C00; font-weight: bold;"><?= htmlspecialchars($row['score']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-muted py-4" style="background-color: transparent;">No scores recorded yet. Be the first!</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
