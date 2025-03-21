<?php
include 'db_config.php';

// Create the cards table if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(100),
    image_url VARCHAR(255)
)");

// Predefined cards data
$cards = [
    ['AI-Powered Solutions', 'We leverage artificial intelligence for data-driven decision-making.', 'feature', 'ai.jpg'],
    ['Cloud Computing', 'Secure and scalable cloud solutions for modern businesses.', 'feature', 'cloud.jpg'],
    ['24/7 Security', 'Protect your data with advanced cybersecurity measures.', 'feature', 'security.jpg'],
    ['Blockchain', 'Decentralized security and transparency for digital transactions.', 'tech', 'blockchain.jpg'],
    ['Internet of Things (IoT)', 'Smart devices connected for automation and efficiency.', 'tech', 'iot.jpg'],
    ['Machine Learning', 'Data-driven algorithms that adapt and evolve with user behavior.', 'tech', 'ml.jpg']
];

// Insert default cards if they don't exist
$stmt = $conn->prepare("INSERT INTO cards (title, description, category, image_url) SELECT ?, ?, ?, ? FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM cards WHERE title = ?)");

foreach ($cards as $card) {
    $stmt->bind_param("sssss", $card[0], $card[1], $card[2], $card[3], $card[0]);
    $stmt->execute();
}

$stmt->close();

function fetchCards($category) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM cards WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='feature'>
                <h3>{$row['title']}</h3>
                <p>{$row['description']}</p>
              </div>";
    }

    $stmt->close();
}
?>

<?php include 'includes/header.php'; ?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background: #f4f4f4;
        color: #333;
        text-align: center;
    }

    .hero {
        position: relative;
        height: 90vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .video-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .video-container iframe {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100vw;
        height: 56.25vw; 
        min-height: 100vh;
        min-width: 177.78vh;
        transform: translate(-50%, -50%);
    }

    .overlay {
        position: relative;
        z-index: 1;
        background: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border-radius: 10px;
    }

    .features, .tech-section {
        padding: 50px 20px;
    }

    .features {
        background: white;
    }

    .features-container, .tech-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 40px;
    }

    .feature, .tech-box {
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 300px;
        text-align: center;
    }

    .feature h3, .tech-box h3 {
        color: #ff6b6b;
    }

    .tech-section {
        background: #222;
        color: white;
    }

    footer {
        background: #111;
        color: white;
        padding: 15px 0;
        margin-top: 30px;
    }
</style>

<!-- Hero Section with YouTube Video -->
<section class="hero">
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/0x5mf8BUJZY?autoplay=1&mute=1&loop=1&playlist=0x5mf8BUJZY" 
            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        </iframe>
    </div>
    <div class="overlay">
        <h1>Welcome to Our Skysoft Technologies</h1>
        <p>Innovating the Future with AI, Cloud Computing, and Cybersecurity.</p>
        <a href="services.php" class="btn">Explore Services</a>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <h2>Why Choose Us?</h2>
    <div class="features-container">
        <?php fetchCards('feature'); ?>
    </div>
</section>

<!-- Technologies Section -->
<section class="tech-section">
    <h2>Cutting-Edge Technologies We Use</h2>
    <div class="tech-container">
        <?php fetchCards('tech'); ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
