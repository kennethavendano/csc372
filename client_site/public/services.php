<?php

class PhotoPackage
{
    public string $name;
    public float $price;
    public string $duration;
    public int $photoCount;
    public string $sport;
    public string $image;

    public function __construct(string $name, float $price, string $duration, int $photoCount, string $sport, string $image)
    {
        $this->name = $name;
        $this->price = $price;
        $this->duration = $duration;
        $this->photoCount = $photoCount;
        $this->sport = $sport;
        $this->image = $image;
    }

    public function getFormattedPrice(): string
    {
        return "$" . number_format($this->price, 2);
    }

    public function getPackageSummary(): string
    {
        return $this->duration . " session with " . $this->photoCount . " edited photos";
    }

    public function getPackageLevel(): string
    {
        if ($this->price >= 120) {
            return "Premium Package";
        } else {
            return "Starter Package";
        }
    }
}

$package1 = new PhotoPackage(
    "Starter",
    99.99,
    "30 minutes",
    15,
    "Soccer",
    "https://drive.google.com/thumbnail?id=14Iz8-6TK_h-p3HNhFPrjUuiSXlOqrghc&sz=s2200"
);

$package2 = new PhotoPackage(
    "Pro",
    149.99,
    "1 hour",
    30,
    "Basketball",
    "https://drive.google.com/thumbnail?id=11_EckoCQV8iec9E0v9cwoPmrvgwJ0-w-&sz=s2200"
);
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
                <li><a href="about.html">About</a></li>
            </ul>
            <div class="btn">
                <a href="booknow.html" class="book-btn">Book Now</a>
            </div>
        </nav>
    </header>

    <main>
    <h1 class="page-title">Services</h1>

    <div class="gallery">

        <div class="service-card">
            <div class="service-image">
                <img src="<?= $package1->image; ?>" alt="Starter package image">
            </div>
            <div class="service-text">
                <h3><?= $package1->name; ?></h3>
                <p>Sport: <?=  $package1->sport; ?></p>
                <p><?=  $package1->getPackageSummary(); ?></p>
                <p>Price: <?=  $package1->getFormattedPrice(); ?></p>
                <p><?= $package1->getPackageLevel(); ?></p>
            </div>
        </div>

        <div class="service-card">
            <div class="service-image">
                <img src="<?= $package2->image; ?>" alt="Pro package image">
            </div>
            <div class="service-text">
                <h3><?=  $package2->name; ?></h3>
                <p>Sport: <?=  $package2->sport; ?></p>
                <p><?=  $package2->getPackageSummary(); ?></p>
                <p>Price: <?=   $package2->getFormattedPrice(); ?></p>
                <p><?=  $package2->getPackageLevel(); ?></p>
            </div>
        </div>

    </div>
</main>
</body>
</html>