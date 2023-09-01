<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $craftName = $_POST['craftName'];
    $description = $_POST['description'];
    
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES['craftFile']['name']);
    
    if (move_uploaded_file($_FILES['craftFile']['tmp_name'], $targetFile)) {
        // Save data to the database (MySQL)
        $connection = new mysqli("localhost", "username", "password", "database_name");
        
        $query = "INSERT INTO crafts (name, description, file_path) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sss", $craftName, $description, $targetFile);
        $stmt->execute();
        
        $stmt->close();
        $connection->close();
        
        echo "Craft uploaded successfully!";
    } else {
        echo "Error uploading craft.";
    }
}
?>
