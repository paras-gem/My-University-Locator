<?php
include 'db_connect.php';

header('Content-Type: application/json');

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q === '') {
    echo json_encode([]);
    exit;
}

// Prepare query for matching faculty name or department
$stmt = $conn->prepare("SELECT Name, Email, Department, Location FROM faculty WHERE Name LIKE ? OR Department LIKE ? ORDER BY Name ASC");
$searchTerm = "%$q%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$faculty = [];
$departments = [];
while ($row = $result->fetch_assoc()) {
    // Collect faculty
    $faculty[] = [
        'type' => 'faculty',
        'Name' => $row['Name'],
        'Email' => $row['Email'], // ✅ added line (this was missing)
        'Department' => $row['Department'],
        'Location' => $row['Location']
    ];

    // Collect unique departments
    if (!in_array($row['Department'], $departments)) {
        $departments[] = $row['Department'];
    }
}

// Build department items separately
$departmentItems = [];
foreach ($departments as $dept) {
    $departmentItems[] = [
        'type' => 'department',
        'Department' => $dept
    ];
}

// Merge faculty and department
$output = array_merge($faculty, $departmentItems);

// Return JSON
echo json_encode($output);
?>
