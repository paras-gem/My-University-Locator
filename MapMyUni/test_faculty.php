<?php
include 'db_connect.php';

$sql = "SELECT * FROM faculty LIMIT 5";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}
?>
