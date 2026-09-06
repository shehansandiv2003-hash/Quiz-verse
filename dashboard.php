<?php
session_start();
// 1. Bring in our helper functions
require_once 'includes/functions.php';

// 2. Protect the page: kick them out if they are not logged in!
if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Quiz-Verse</title>
    
    <!-- Bootstrap for layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- YOUR Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

    <div class="container mt-5 text-center py-5">
        <h1 class="mb-4" style="color: var(--accent);">Welcome to the Quiz-Verse Dashboard!</h1>
        <p class="lead mb-5" style="color: var(--muted);">You are successfully authenticated and securely logged in.</p>
        
        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <!-- Using your custom btn-accent class! -->
            <a href="quiz.php" class="btn btn-accent btn-lg px-4 gap-3">Start the Quiz</a>
            
            <a href="logout.php" class="btn btn-outline-secondary btn-lg px-4">Log Out</a>
        </div>
    </div>

</body>
</html>