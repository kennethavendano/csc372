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



<main>
  <h1 class="page-title"><?= $service['title'] ?></h1>

  <div class="service-details-page">
    <div class="service-details-container">

      <div class="service-image">
        <img src="<?= $service['img_src'] ?>">
      </div>

      <div class="service-details">
        <p><?= $service['description'] ?></p>
        <p>Sport: <?= $service['sport'] ?></p>
      </div>
    
    </div>

    <a class="service-back-link" href="services.php">Back to Services</a>

  </div>
</main>


<?php include 'includes/footer.php'; ?>