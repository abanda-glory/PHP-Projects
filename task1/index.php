<?php
require_once "functions.php";

$name = "";
$greeting = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = htmlspecialchars($_POST['username']);
    $greeting = greet();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php if ($name): ?>
            <h1><?php echo "$greeting, $name!"; ?></h1>
            <p>The time is currently <?php echo date("H:i:s A"); ?></p>
            <a href="index.php">Go Back</a>
        <?php else: ?>
            <h1>Welcome</h1>
            <form action="index.php" method="post">
                <input type="text" name="username" placeholder="Enter your name" required>
                <button type="submit">Greet Me</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>