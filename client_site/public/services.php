<?php

include 'includes/header.php';




/*
	 * Retrieve toy information from the database based on the toy ID.
	 * 
	 * @param PDO $pdo       An instance of the PDO class.
	 * @param string $id     The ID of the toy to retrieve.
	 * @return array|null    An associative array containing the toy information, or null if no toy is found.
	 */
function get_service(PDO $pdo)
{
	// SQL query to retrieve toy information based on the toy ID
	$sql = "SELECT * 
			FROM services";	                        // :id is a placeholder for value provided later 
	// It's a parameterized query that helps prevent SQL injection attacks and ensures safer interaction with the database

	// Execute the SQL query using the pdo function and fetch the result
	$services = pdo($pdo, $sql)->fetchAll();		// Associative array where 'id' is the key and $id is the value. Used to bind the value of $id to the placeholder :id in SQL query.

	return $services;                                        // Return the toy information (associative array)
}

$services = get_service($pdo);                          // Retrieve info about toy with ID '0001' from the database using provided PDO connection
?>

<main>

<div class="gallery">

	<?php foreach ($services as $service): ?>

		<!-- test -->
			<div class="gallery-item" data-category="sports">
				<a href="service_details.php?id=<?= $service['serviceID'] ?>">
					<img src="<?= $service['img_src'] ?>" alt="<?= $service['title'] ?>">
				</a>
				<div class="overlay">
					<h3><?= $service['title'] ?></h3>
					<p><?= $service['description'] ?></p>
				</div>
			</div>

		<?php endforeach; ?>




</main>
</body>

</html>