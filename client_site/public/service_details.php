<?php 

require_once 'includes/database-connection.php';

/*
 * Get ONE service by ID
 */
function get_service(PDO $pdo, $id) {
    $sql = "SELECT * FROM services WHERE serviceID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

// get id from URL
if (!isset($_GET['id'])) {
    die("Invalid service.");
}

$id = $_GET['id'];

$service = get_service($pdo, $id);

if (!$service) {
    die("Service not found.");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>


<header>
        <nav>
            <div><img src="images/IchacapsLogo.png" alt="Ichacaps" class="logo-img"/></div>
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



<div class="service-details-page">
  <div class="service-details-container">

    <div class="service-image">
      <img src="<?= $service['img_src'] ?>">
    </div>

    <div class="service-details">
      <h1><?= $service['title'] ?></h1>
      <p><?= $service['description'] ?></p>
      <p>Sport: <?= $service['sport'] ?></p>
    </div>

  </div>
</div>

<a href="services.php">Back</a>

</body>
</html>