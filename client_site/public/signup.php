<?php

require_once 'includes/database-connection.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($username && $password && $name && $email) {
        $sql = "INSERT INTO clients (username, password, name, email)
                VALUES (:username, :password, :name, :email)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'email' => $email
        ]);

        $message = "Account created successfully.";
    } else {
        $message = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <nav>
        <div><img src="images/IchacapsLogo.png" alt="Ichacaps" class="logo-img"></div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="portfolio.html">Portfolio</a></li>
            <li><a href="services.php">Services</a></li>
        </ul>
    </nav>
</header>

<div class="profile-form-container">
    <h1>Sign Up</h1>

    <?php if ($message): ?>
        <p class="form-message"><?= $message ?></p>
    <?php endif; ?>

    <form method="POST" class="profile-form">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password">
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>

        <button type="submit" class="profile-btn">Create Account</button>
        <a href="login.php" class="profile-link-btn">Back to Login</a>

    </form>
</div>

</body>
</html>