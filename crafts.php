<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crafts</title>
</head>
<body>
    <h1>Uploaded Crafts</h1>
    <?php
    $connection = new mysqli("localhost", "username", "password", "database_name");
    $query = "SELECT * FROM crafts";
    $result = $connection->query($query);

    while ($row = $result->fetch_assoc()) {
        echo "<h2>{$row['name']}</h2>";
        echo "<p>{$row['description']}</p>";
        echo "<a href='{$row['file_path']}' download>Download Craft</a><br><br>";
    }

    $result->free();
    $connection->close();
    ?>
</body>
</html>
