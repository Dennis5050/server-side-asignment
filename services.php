<?php include 'includes/header.php'; ?>

<style>
    /* General Styling */
    body {
        font-family: 'Poppins', Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: #f4f4f4;
        color: #333;
        text-align: center;
    }

    /* Hero Section */
    .services-hero {
        background: url('https://images.pexels.com/photos/2102416/pexels-photo-2102416.jpeg') no-repeat center center/cover;
        height: 70vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        padding: 20px;
    }

    .services-hero h1 {
        font-size: 50px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .services-hero p {
        font-size: 20px;
        max-width: 700px;
        line-height: 1.5;
    }

    /* Services Section */
    .services-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        padding: 50px 20px;
        max-width: 1100px;
        margin: auto;
    }

    .service-box {
        background: white;
        padding: 25px;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .service-box:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }

    .service-box img {
        width: 90px;
        height: 90px;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .service-box:hover img {
        transform: scale(1.1);
    }

    .service-box h3 {
        color: #ff6b6b;
        margin-bottom: 10px;
        font-size: 22px;
        font-weight: 600;
    }

    .service-box p {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .services-hero h1 {
            font-size: 40px;
        }
        .services-hero p {
            font-size: 18px;
        }
        .service-box {
            padding: 20px;
        }
    }
</style>

<!-- Hero Section -->
<section class="services-hero">
    <h1>Our Services</h1>
    <p>We offer cutting-edge technology solutions tailored to your needs.</p>
</section>

<!-- Services Section -->
<section class="services-container">
    <div class="service-box">
        <img src="assets/images/web-dev.png" alt="Web Development">
        <h3>Web Development</h3>
        <p>Custom websites built with the latest technologies.</p>
    </div>
    <div class="service-box">
        <img src="assets/images/app.webp" alt="App Development">
        <h3>App Development</h3>
        <p>Innovative mobile and web applications for all platforms.</p>
    </div>
    <div class="service-box">
        <img src="assets/images/security.webp" alt="Cyber Security">
        <h3>Cyber Security</h3>
        <p>Protect your business with top-tier security solutions.</p>
    </div>
    <div class="service-box">
        <img src="assets/images/ai.webp" alt="AI Solutions">
        <h3>AI & Machine Learning</h3>
        <p>Leverage AI to automate and optimize your business.</p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
