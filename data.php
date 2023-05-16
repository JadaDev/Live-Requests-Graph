<?php
require 'config.php';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$oldest_time = time() - 1;
s
$sql = "SELECT COUNT(*) AS count FROM visitor_data WHERE time >= $oldest_time";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode(array('count' => $count));
?>
