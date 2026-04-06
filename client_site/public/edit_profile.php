<?php
require_once 'includes/database-connection.php';
require_once 'includes/session.php';

require_login($logged_in);

if (!isset($_GET['id']) || $_GET['id'] != $_SESSION['clientID']) {
    die("Invalid profile.");
}

$id = $_GET['id'];
$message = '';

$sql = "SELECT * FROM clients WHERE clientID = :clientID";
$stmt = $pdo->prepare($sql);
$stmt->execute(['clientID' => $id]);
$user = $stmt->fetch();

if (!$user) {
    die("User not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($name && $email && $password) {
        $sql = "UPDATE clients
                SET name = :name, email = :email, password = :password
                WHERE clientID = :clientID";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'clientID' => $id
        ]);

        $message = "Profile updated successfully.";

        $sql = "SELECT * FROM clients WHERE clientID = :clientID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['clientID' => $id]);
        $user = $stmt->fetch();
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
    <title>Edit Profile</title>
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
    <h1>Edit Profile</h1>

    <?php if ($message): ?>
        <p class="form-message"><?= $message ?></p>
    <?php endif; ?>

    <form method="POST" class="profile-form">
        <div class="form-group">
            <label>Username</label>
            <input type="text" value="<?= $user['username'] ?>" readonly>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="<?= $user['name'] ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?= $user['email'] ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" value="<?= $user['password'] ?>">
        </div>

        <button type="submit" class="profile-btn">Update Profile</button>
        <a href="profile.php" class="profile-link-btn">Back to Profile</a>
    </form>
</div>

</body>
</html>