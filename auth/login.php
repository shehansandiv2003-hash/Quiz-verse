<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        
        if ($user && password_verify($password, $user['password'])) {
            
            
            session_regenerate_id(true); 
            
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            
            echo "<script>
                alert('Login successful! Welcome to the Quiz-Verse.');
                window.location.href = '../dashboard.php';
            </script>";
        } else {
            
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