<?php
// Connect to the database
require_once '../includes/db.php';

$message = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL statement to prevent SQL injection
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$username, $email, $hashed_password])) {
        $message = "Registration successful! You can now login.";
    } else {
        $message = "Something went wrong. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Quiz-Verse</title>
    <!-- Add your Bootstrap CSS link here if you want it styled -->
</head>
<body>
    <h2>Sign Up for Quiz-Verse</h2>
    
    <?php if(!empty($message)) echo "<p>$message</p>"; ?>

    <form action="register.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>