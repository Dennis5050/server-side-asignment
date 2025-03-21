<?php
$company_name = "Skysoft Technologies";
$location = "Ruaka, Nairobi, Kenya";
$phone = "+254 768 217 067";
$email = "info@skysofttechnology.com";

// Social Media Links
$social_links = [
    "Facebook" => "https://www.facebook.com/skysofttechnologies",
    "Twitter" => "https://twitter.com/skysofttech",
    "Instagram" => "https://instagram.com/skysofttechnologies",
    "LinkedIn" => "https://linkedin.com/company/skysofttechnologies",
    "YouTube" => "https://youtube.com/@skysofttechnologies"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $company_name; ?> - Footer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        footer {
            background: linear-gradient(to right, #0d1b2a, #1b263b);
            color: white;
            padding: 30px 20px;
            text-align: center;
            position: relative;
            width: 100%;
            bottom: 0;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: auto;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
            margin: 10px;
        }

        .footer-section h3 {
            margin-bottom: 15px;
            font-size: 18px;
            color: #f8f9fa;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        .footer-section p,
        .footer-section ul {
            font-size: 14px;
            color: #d1d1d1;
            line-height: 1.6;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            text-decoration: none;
            color: #f8f9fa;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #007bff;
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icons a {
            margin: 0 8px;
            color: white;
            font-size: 20px;
            transition: color 0.3s ease;
            display: inline-block;
        }

        .social-icons a:hover {
            color: #007bff;
        }

        .copyright {
            margin-top: 20px;
            font-size: 12px;
            color: #a9a9a9;
            border-top: 1px solid #444;
            padding-top: 15px;
        }

        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <!-- Main Content Goes Here -->
</div>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>About Us</h3>
            <p><?php echo $company_name; ?> is a leading IT solutions provider based in <?php echo $location; ?>. We specialize in software development, cloud computing, cybersecurity, and digital transformation services.</p>
        </div>

        <div class="footer-section">
            <h3>Contact Information</h3>
            <ul>
                <li><strong>Location:</strong> <?php echo $location; ?></li>
                <li><strong>Phone:</strong> <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li>
                <li><strong>Email:</strong> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Careers</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <?php foreach ($social_links as $platform => $link): ?>
                    <a href="<?php echo $link; ?>" target="_blank" title="Follow us on <?php echo $platform; ?>">
                        <i class="fab fa-<?php echo strtolower($platform); ?>"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="copyright">
        &copy; <?php echo date("Y"); ?> <?php echo $company_name; ?> | All Rights Reserved
    </div>
</footer>

<!-- FontAwesome for social media icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
