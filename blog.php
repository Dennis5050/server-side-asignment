
<?php
include 'db_config.php';

// Fake blog posts (initial seeding)
$fake_posts = [
    [
        "title" => "The Future of Technology",
        "content" => "Technology is advancing at an unprecedented rate. AI, IoT, and blockchain are reshaping industries worldwide.",
        "image_url" => "uploads/tech.jpg",
        "video_url" => ""
    ],
    [
        "title" => "How to Stay Productive While Working Remotely",
        "content" => "Remote work requires discipline and the right tools. Here are some tips to stay productive.",
        "image_url" => "",
        "video_url" => "uploads/remote_work.mp4"
    ],
    [
        "title" => "Healthy Eating Tips for a Busy Lifestyle",
        "content" => "Eating healthy while balancing a busy schedule can be challenging, but with proper planning, it's achievable.",
        "image_url" => "uploads/healthy_food.jpg",
        "video_url" => ""
    ]
];

/*
// Fetch all blog posts from the database (Uncomment this later)
$result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
$blog_posts = $result->fetch_all(MYSQLI_ASSOC);
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Skysoft Technologies</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .blog-post {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 25px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .blog-post:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
        }

        .blog-post h3 {
            color: #2980b9;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .blog-post p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .blog-post img, .blog-post video {
            width: 100%;
            border-radius: 8px;
            margin-top: 10px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #2980b9;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #1f618d;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .blog-post {
                padding: 15px;
            }

            .blog-post h3 {
                font-size: 20px;
            }

            .blog-post p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Latest Blog Posts</h2>

    <?php foreach ($fake_posts as $post): ?>
        <div class="blog-post">
            <h3><?= htmlspecialchars($post['title']) ?></h3>
            <p><?= $post['content'] ?></p>
            <?php if (!empty($post['image_url'])): ?>
                <img src="<?= $post['image_url'] ?>" alt="Blog Image">
            <?php elseif (!empty($post['video_url'])): ?>
                <video controls>
                    <source src="<?= $post['video_url'] ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php endif; ?>
            <a href="#" class="btn">Read More</a>
        </div>
    <?php endforeach; ?>

    <!-- Uncomment this section later when using database -->
    <!--
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="blog-post">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <p><?= $row['content'] ?></p>
            <?php if (!empty($row['image_url'])): ?>
                <img src="<?= $row['image_url'] ?>" alt="Blog Image">
            <?php elseif (!empty($row['video_url'])): ?>
                <video controls>
                    <source src="<?= $row['video_url'] ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php endif; ?>
            <a href="#" class="btn">Read More</a>
        </div>
    <?php endwhile; ?>
    -->
</div>

</body>
</html>
<?php include 'includes/footer.php'; ?>
