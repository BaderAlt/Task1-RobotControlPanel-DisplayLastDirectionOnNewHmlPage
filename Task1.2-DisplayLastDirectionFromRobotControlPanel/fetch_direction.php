<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dptask1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT direction FROM tabletask1 ORDER BY id DESC LIMIT 1");
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
$conn = null;
?>