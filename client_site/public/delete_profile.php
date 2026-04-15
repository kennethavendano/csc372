<?php

include 'includes/header.php';


require_login($logged_in);

if (!isset($_GET['id']) || $_GET['id'] != $_SESSION['clientID']) {
    die("Invalid profile.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM clients WHERE clientID = :clientID";
$stmt = $pdo->prepare($sql);
$stmt->execute(['clientID' => $id]);
$user = $stmt->fetch();

if (!$user) {
    die("User not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "DELETE FROM clients WHERE clientID = :clientID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['clientID' => $id]);

    logout();
    header('Location: login.php');
    exit;
}
?>


<div class="delete-profile-container">
    <h1>Delete Profile</h1>
    <p>Are you sure you want to delete your profile?</p>
    <p class="delete-warning">This action cannot be undone.</p>

    <form method="POST" class="delete-profile-form">
        <button type="submit" class="delete-btn">Yes, Delete Profile</button>
        <a href="profile.php" class="cancel-btn">Cancel</a>
    </form>
</div>

</body>
</html>