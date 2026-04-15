<?php

include 'includes/header.php';


require_login($logged_in);

$sql = "SELECT * FROM clients WHERE clientID = :clientID";
$stmt = $pdo->prepare($sql);
$stmt->execute(['clientID' => $_SESSION['clientID']]);
$user = $stmt->fetch();

if (!$user) {
    die("User not found.");
}
?>


<div class="profile-container">
    <h1>My Profile</h1>

    <div class="profile-info">
        <p><strong>Username:</strong> <?= $user['username'] ?></p>
        <p><strong>Name:</strong> <?= $user['name'] ?></p>
        <p><strong>Email:</strong> <?= $user['email'] ?></p>
    </div>

    <div class="profile-actions">
        <a href="edit_profile.php?id=<?= $user['clientID'] ?>" class="profile-action-btn">Edit Profile</a>
        <a href="delete_profile.php?id=<?= $user['clientID'] ?>" class="profile-delete-btn">Delete Profile</a>
        <a href="logout.php" class="profile-action-btn">Logout</a>
    </div>
</div>

</body>
</html>