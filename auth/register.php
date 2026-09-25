<?php

require_once '../includes/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    
    try {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        

        if ($stmt->execute([$username, $email, $hashed_password])) {
            echo "<script>
                alert('Awesome! Registration successful. You can now log in.');
                window.location.href = '../index.php';
            </script>";
        }
    } catch(PDOException $e) {
        
        echo "<script>
            alert('Error: Something went wrong. That email might already be in use.');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    
    header("Location: ../index.php");
    exit();
}
?>