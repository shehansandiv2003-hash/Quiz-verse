<?php
// 1. Start the session so we can remember the user is logged in
session_start();
require_once '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // 2. Search for the user by their email
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // 3. Check if user exists AND if the typed password matches the hashed password
        if ($user && password_verify($password, $user['password'])) {
            
            // 4. Security requirement from your rubric!
            session_regenerate_id(true); 
            
            // 5. Store user info in the session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // 6. Send them to the dashboard
            echo "<script>
                alert('Login successful! Welcome to the Quiz-Verse.');
                window.location.href = '../dashboard.php';
            </script>";
        } else {
            // Incorrect email or password
            echo "<script>
                alert('Invalid email or password. Please try again.');
                window.location.href = '../index.php';
            </script>";
        }
    } catch(PDOException $e) {
        echo "<script>
            alert('Database error occurred.');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>