<?php
include 'db_config.php';

// Create the team_members table if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS team_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL
)");

// Predefined team members data
$team_members = [
    ['Denis Kipkorir', 'CEO & Founder', 'team1.jpg'],
    ['John Kamau', 'Lead Developer', 'team2.jpg'],
    ['Lizz Kariuki', 'Marketing Head', 'team3.jpg']
];

// Insert default team members if they don't exist
$stmt = $conn->prepare("INSERT INTO team_members (name, role, image_url) SELECT ?, ?, ? FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM team_members WHERE name = ?)");

foreach ($team_members as $member) {
    $stmt->bind_param("ssss", $member[0], $member[1], $member[2], $member[0]);
    $stmt->execute();
}

$stmt->close();

function fetchTeam() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM team_members");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='team-member'>
                <img src='assets/images/{$row['image_url']}' alt='{$row['name']}'>
                <h3>{$row['name']}</h3>
                <p>{$row['role']}</p>
              </div>";
    }

    $stmt->close();
}
?>

<?php include 'includes/header.php'; ?>

<style>
    /* General Styling */
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background: #f8f9fa;
        color: #333;
        text-align: center;
    }

    /* Hero Section */
    .about-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('assets/images/pic1.jpg') no-repeat center center/cover;
        height: 70vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
    }

    .about-hero h1 {
        font-size: 50px;
        margin-bottom: 10px;
    }

    .about-hero p {
        font-size: 20px;
        max-width: 700px;
    }

    /* About Section */
    .about-content {
        padding: 50px 20px;
        background: white;
        max-width: 900px;
        margin: 30px auto;
        text-align: left;
        line-height: 1.6;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .about-content h2 {
        color: #007bff;
        margin-bottom: 20px;
    }

    /* Team Section */
    .team {
        padding: 50px 20px;
        background: #f1f1f1;
    }

    .team h2 {
        font-size: 36px;
        margin-bottom: 30px;
    }

    .team-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .team-member {
        background: white;
        padding: 20px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 250px;
        text-align: center;
    }

    .team-member img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .team-member h3 {
        margin-bottom: 5px;
        color: #007bff;
    }
</style>

<!-- Hero Section -->
<section class="about-hero">
    <h1>About Us</h1>
    <p>We are passionate about technology, innovation, and building the future with cutting-edge solutions.</p>
</section>

<!-- About Content -->
<section class="about-content">
    <h2>Our Mission</h2>
    <p>At SkySoft Technologies, our mission is to revolutionize the way businesses leverage technology. We create innovative solutions that empower companies to thrive in a digital era.</p>

    <h2>Our Vision</h2>
    <p>We envision a future where technology seamlessly integrates into everyday business operations, making work more efficient and impactful.</p>
</section>

<!-- Team Section -->
<section class="team">
    <h2>Meet Our Team</h2>
    <div class="team-container">
        <?php fetchTeam(); ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
