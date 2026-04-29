<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($message)) {
        $imagePath = "";
        if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['errors'] == 0) {
            $uploadDir = 'uploads/';

            $profileName = time() . '_' . $_FILES['profile-pic']['name'];
            $imagePath = 'uploads/' . $profileName;
            move_uploaded_file($_FILES['profile-pic']['tmp_name'], $imagePath);
        }

        $jsonFile = 'data/guestbook.json';
        $jsonData = file_get_contents($jsonFile);
        $allMessages = json_decode($jsonData, true);

        $newEntry = [
            "name" => $name,
            "email" => $email,
            "message" => $message,
            "image" => $imagePath,
            "date" => date('Y-m-d H:i:s')
        ];

        $allMessages[] = $newEntry;

        file_put_contents($jsonFile, json_encode($allMessages, JSON_PRETTY_PRINT));
        $_SESSION['flash'] = "Thank you for your message!";

        header('Location: guestbook.php');
        exit;
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Book</title>
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['flash'])): ?>
            <h3><?php echo $_SESSION['flash']; ?></h3>
            <?php unset($_SESSION['flash']); ?>
        <?php endif ?>
        <form action="guestbook.php" method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name..." required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="e.g johndoe@gmail.com..." required>
            <label for="message">Message</label>
            <textarea cols="20" rows="10" name="message" id="message" placeholder="Type your message here..." required></textarea>
            <label for="pofile-pic">Upload Profile Picture (Optional)</label>
            <input type="file" name="profile-pic" id="profile-pic">

            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="guestbook-entries">
        <?php
        $jsonFile = 'data/guestbook.json';
        if (file_exists($jsonFile)) {
            $messages = json_decode(file_get_contents($jsonFile), true);

            foreach ($messages as $entry) {
                echo "<div class='entry-card' style='border: 1px solid #eee; padding: 10px; margin-bottom: 10px;'>";

                if (!empty($entry['image'])) {
                    echo "<img src='" . $entry['image'] . "' width='70' style='border-radius:50%;'><br>";
                }


                echo "<strong>" . htmlspecialchars($entry['name']) . "</strong><br>";
                echo "<p>" . htmlspecialchars($entry['message']) . "</p>";
                echo "<small>Posted on: " . $entry['date'] . "</small>";

                echo "</div>";
            }
        }
        ?>
    </div>
</body>

</html>