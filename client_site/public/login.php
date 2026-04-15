<?php

include 'includes/header.php';


$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {

        $user = authenticate($pdo, $username, $password);

        if ($user) {
            login($user);
            header('Location: profile.php');
            exit;
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Please fill in all fields";
    }
}

?>


<div class="login-form">

    <h1>Login</h1>

    <?php if ($error): ?>
        <p class="form-message"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <button class="login-btn" type="submit">Login</button>
        <a href="signup.php" class="signup-btn">Sign Up</a>

    </form>

</div>

</body>
</html>