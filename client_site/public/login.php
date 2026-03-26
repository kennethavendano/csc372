<?php
session_start();
include 'includes/validate.php';

$data = [
    'username' => '',
    'password' => '',
    'age' => '',
    'role' => '',
    'visitor_name' => ''
];

$errors = [
    'username' => '',
    'password' => '',
    'age' => '',
    'role' => '',
    'visitor_name' => ''
];

$message = '';

// load cookie
if (isset($_COOKIE['visitor_name'])) {
    $data['visitor_name'] = $_COOKIE['visitor_name'];
}

// load session
if (isset($_SESSION['username'])) {
    $data['username'] = $_SESSION['username'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['age'] = $_POST['age'];
    $data['role'] = $_POST['role'] ?? '';
    $data['visitor_name'] = $_POST['visitor_name'];

    // validation
    if (!is_text_valid($data['username'], 3, 20)) {
        $errors['username'] = "Invalid username";
    }

    if (!is_text_valid($data['password'], 6, 20)) {
        $errors['password'] = "Invalid password";
    }

    if (!is_number_valid($data['age'], 1, 120)) {
        $errors['age'] = "Invalid age";
    }

    $allowed_roles = ['athlete', 'parent', 'coach'];

    if (!is_option_valid($data['role'], $allowed_roles)) {
        $errors['role'] = "Invalid role";
    }

    if (!is_text_valid($data['visitor_name'], 2, 30)) {
        $errors['visitor_name'] = "Invalid name";
    }

    $has_errors = implode('', $errors);

    if ($has_errors === '') {

        setcookie('visitor_name', $data['visitor_name'], time() + 3600);

        $_SESSION['username'] = $data['username'];

        $message = "Login successful!";
    } else {
        $message = "Fix errors below.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <nav>
        <div><img src="images/IchacapsLogo.png" class="logo-img"/></div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="portfolio.html">Portfolio</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <div class="btn">
            <a href="booknow.html" class="book-btn">Book Now</a>
        </div>
    </nav>
</header>

<div class="login-container">

    <h1>Log In</h1>

    <?php if ($message != ''): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <?php if (isset($_SESSION['username'])): ?>
        <p>Session username: <?= htmlspecialchars($_SESSION['username']) ?></p>
    <?php endif; ?>

    <?php if (isset($_COOKIE['visitor_name'])): ?>
        <p>Cookie name: <?= htmlspecialchars($_COOKIE['visitor_name']) ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php" class="login-form">

        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" value="<?= htmlspecialchars($data['username']) ?>">
            <p><?= htmlspecialchars($errors['username']) ?></p>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" value="<?= htmlspecialchars($data['password']) ?>">
            <p><?= htmlspecialchars($errors['password']) ?></p>
        </div>

        <div class="form-group">
            <label>Age:</label>
            <input type="number" name="age" value="<?= htmlspecialchars($data['age']) ?>">
            <p><?= htmlspecialchars($errors['age']) ?></p>
        </div>

        <div class="form-group">
            <label>Role:</label>
            <select name="role">
                <option value="">Select</option>
                <option value="athlete" <?= $data['role']=='athlete'?'selected':'' ?>>Athlete</option>
                <option value="parent" <?= $data['role']=='parent'?'selected':'' ?>>Parent</option>
                <option value="coach" <?= $data['role']=='coach'?'selected':'' ?>>Coach</option>
            </select>
            <p><?= htmlspecialchars($errors['role']) ?></p>
        </div>

        <div class="form-group">
            <label>Display Name:</label>
            <input type="text" name="visitor_name" value="<?= htmlspecialchars($data['visitor_name']) ?>">
            <p><?= htmlspecialchars($errors['visitor_name']) ?></p>
        </div>

        <div class="form-group">
            <input type="submit" value="Log In" class="submit-btn">
        </div>

    </form>

    <form method="POST" action="logout.php">
    <input type="submit" value="Log Out" class="submit-btn">
</form>

</div>

</body>
</html>