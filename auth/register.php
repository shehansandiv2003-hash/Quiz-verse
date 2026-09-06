<?php
// 1. Connect to the database
require_once '../includes/db.php';

// 2. Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Grab the data from your frontend form inputs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 4. Hash the password securely 
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // 5. Prepare the SQL to insert the user (prevents SQL injection)
    try {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        // 6. Execute the code and alert the user
        if ($stmt->execute([$username, $email, $hashed_password])) {
            echo "<script>
                alert('Awesome! Registration successful. You can now log in.');
                window.location.href = '../index.php';
            </script>";
        }
    } catch(PDOException $e) {
        // Catch errors (like if they try to use an email that is already registered)
        echo "<script>
            alert('Error: Something went wrong. That email might already be in use.');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    // Send them back to the homepage if they try to visit this URL directly
    header("Location: ../index.php");
    exit();
}
?>