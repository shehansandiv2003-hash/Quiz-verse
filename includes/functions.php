<?php
// includes/functions.php - Helper functions for Quiz-Verse

/**
 * Sanitize form input to protect against XSS (Cross-Site Scripting)
 */
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Check if a user is currently logged in
 */
function isLoggedIn() {
    // If the session variable 'user_id' exists, they are logged in
    return isset($_SESSION['user_id']);
}
?>