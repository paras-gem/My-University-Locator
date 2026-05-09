<?php
include 'db_connect.php';
header('Content-Type: application/json');

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
if ($q === '') { echo json_encode([]); exit; }

$stmt = $conn->prepare("
  SELECT id, name, room_code, block, venue
  FROM rooms
  WHERE name LIKE CONCAT('%', ?, '%')
     OR room_code LIKE CONCAT('%', ?, '%')
     OR block LIKE CONCAT('%', ?, '%')
     OR venue LIKE CONCAT('%', ?, '%')
  ORDER BY name ASC
  LIMIT 20
");
$stmt->bind_param('ssss', $q, $q, $q, $q);
$stmt->execute();
$result = $stmt->get_result();

$rooms = [];
while ($row = $result->fetch_assoc()) {
  $rooms[] = [
    "RoomName" => $row["name"],
    "Block" => $row["block"],
    "Floor" => $row["venue"],  // displayed as Venue
    "Type" => $row["room_code"]
  ];
}

echo json_encode($rooms);
$stmt->close();
$conn->close();
?>
