<?php
require 'config.php';

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$totalIdCount = 0;
$sql = "SELECT COUNT(id) AS total_count FROM visitor_data";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalIdCount = $row["total_count"];
}

$currentTimestamp = time();
$last60SecondsTimestamp = $currentTimestamp - 60;
$last60SecondsIdCount = 0;
$sql = "SELECT COUNT(id) AS count_60_seconds FROM visitor_data WHERE time >= $last60SecondsTimestamp";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $last60SecondsIdCount = $row["count_60_seconds"];
}

$conn->close();

$data = array(
    'totalIdCount' => $totalIdCount,
    'last60SecondsIdCount' => $last60SecondsIdCount
);

header('Content-Type: application/json');

echo json_encode($data);
?>
