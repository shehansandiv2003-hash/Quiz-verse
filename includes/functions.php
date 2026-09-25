<?php



function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function isLoggedIn() {
    
    return isset($_SESSION['user_id']);
}
?>