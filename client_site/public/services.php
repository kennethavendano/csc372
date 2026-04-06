<?php 

require_once 'includes/database-connection.php';





    /*
	 * Retrieve toy information from the database based on the toy ID.
	 * 
	 * @param PDO $pdo       An instance of the PDO class.
	 * @param string $id     The ID of the toy to retrieve.
	 * @return array|null    An associative array containing the toy information, or null if no toy is found.
	 */
	function get_service(PDO $pdo) {
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

    <main>
    <?php foreach ($services as $service): ?>
        <div class="services-catalog">
        <!-- LINK WITH ID -->
        <a href="service_details.php?id=<?= $service['serviceID'] ?>">
            <img src="<?= $service['img_src'] ?>" alt="<?= $service['title'] ?>">
        </a>

        <h2><?= $service['title'] ?></h2>
        <p><?= $service['description'] ?></p>

    </div>
<?php endforeach; ?>
    
</main>
</body>
</html>