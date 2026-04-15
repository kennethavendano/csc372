<?php

include 'includes/header.php';

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