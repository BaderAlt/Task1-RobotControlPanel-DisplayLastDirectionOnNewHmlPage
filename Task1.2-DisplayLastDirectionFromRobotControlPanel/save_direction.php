<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "dptask1";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO tabletask1 (direction) VALUES (:direction)");
        $stmt->bindParam(':direction', $data['direction']);
        $stmt->execute();

        echo "Direction saved successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>
