<?php include 'includes/header.php'; ?>
<?php
// Include database connection
include 'db_config.php';

$msg = ""; // Message for success/failure

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/"; // Directory to store files
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allowed file types
    $allowed_types = ["jpg", "jpeg", "png", "gif", "mp4", "mp3", "wav"];

    if (in_array($file_type, $allowed_types)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Determine media type
            $media_type = in_array($file_type, ["jpg", "jpeg", "png", "gif"]) ? "image" : 
                          (in_array($file_type, ["mp4"]) ? "video" : "audio");

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO media (file_name, file_path, file_type) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $file_name, $target_file, $media_type);
            $stmt->execute();
            $stmt->close();

            $msg = "Your feedback has been uploaded successfully!";
        } else {
            $msg = "Error uploading file.";
        }
    } else {
        $msg = "Invalid file type! Only images, videos, and audio are allowed.";
    }
}

// Fetch media from database
$query = "SELECT * FROM media ORDER BY id DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            background-color: #222;
            color: #fff;
            padding: 15px;
            margin: 0;
        }

        /* Upper Section (User Upload) */
        .upload-section {
            background: #fff;
            padding: 30px;
            margin: 20px auto;
            width: 90%;
            max-width: 600px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .upload-section p {
            font-size: 16px;
            color: #333;
            margin-bottom: 15px;
        }

        .upload-form input {
            display: block;
            width: 100%;
            margin: 10px auto;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .upload-form button {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .upload-form button:hover {
            background: #218838;
        }

        .message {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Lower Section (Feedback Display) */
        .feedback-section {
            margin-top: 30px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            margin: auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .feedback-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .media-item {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            text-align: center;
        }

        .media-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .media-item video, 
        .media-item audio {
            width: 100%;
            border-radius: 10px;
        }

        footer {
            background-color: #222;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <h2>User Feedback Portal</h2>

    <!-- Upper Section (User Upload) -->
    <div class="upload-section">
        <h3>We Value Your Feedback!</h3>
        <p>Share your experience with us by uploading an image, video, or audio file. Your feedback helps us improve!</p>

        <form action="" method="POST" enctype="multipart/form-data" class="upload-form">
            <input type="file" name="file" required>
            <button type="submit">Upload Feedback</button>
        </form>

        <p class="message"><?php echo $msg; ?></p>
    </div>

    <!-- Lower Section (Feedback Display) -->
    <div class="feedback-section">
        <h3>User Feedback</h3>
        <div class="feedback-container">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="media-item">
                    <?php if ($row['file_type'] == 'image') { ?>
                        <img src="<?php echo $row['file_path']; ?>" alt="User Feedback">
                    <?php } elseif ($row['file_type'] == 'video') { ?>
                        <video controls>
                            <source src="<?php echo $row['file_path']; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php } elseif ($row['file_type'] == 'audio') { ?>
                        <audio controls>
                            <source src="<?php echo $row['file_path']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    <?php } ?>
                    <p><?php echo htmlspecialchars($row['file_name']); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

</body>
</html>

<?php
$conn->close();
?>
