<?php 

include 'includes/header.php';

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

  <a href="services.php">Back</a>

</div>


</body>
</html>