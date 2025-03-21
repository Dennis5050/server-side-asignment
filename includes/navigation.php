<?php
// Start session to track the active page
session_start();

// Get current page name
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skysoft Technologies</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Header Navigation */
        nav {
            background: linear-gradient(to right, #0d1b2a, #1b263b, #415a77);
            padding: 15px 0;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s ease-in-out;
        }

        /* Active link styling */
        nav ul li a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Responsive Navigation */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }
            nav ul li {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php" class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">Home</a></li>
        <li><a href="about.php" class="<?= ($current_page == 'about.php') ? 'active' : '' ?>">About</a></li>
        <li><a href="services.php" class="<?= ($current_page == 'services.php') ? 'active' : '' ?>">Services</a></li>
        <li><a href="blog.php" class="<?= ($current_page == 'blog.php') ? 'active' : '' ?>">Blog</a></li>
        <li><a href="contact.php" class="<?= ($current_page == 'contact.php') ? 'active' : '' ?>">Contact</a></li>
        <li><a href="feedback.php" class="<?= ($current_page == 'feedback.php') ? 'active' : '' ?>">feedback</a></li>
    </ul>
</nav>
