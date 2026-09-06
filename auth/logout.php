<?php
// 1. Resume the current session
session_start();

// 2. Clear all session variables
session_unset();

// 3. Destroy the session completely
session_destroy();

// 4. Send them back to the homepage
header("Location: index.php");
exit();
?>