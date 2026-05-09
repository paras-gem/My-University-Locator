<?php
include 'db_connect.php';

// Run query
$sql = "SELECT * FROM faculty";
$result = $conn->query($sql);

// Handle query error
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Faculty Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f8;
      text-align: center;
      margin: 0;
      padding: 0;
    }
    h1 {
      background: #2c3e50;
      color: white;
      padding: 15px 0;
      margin: 0 0 20px 0;
      letter-spacing: 1px;
    }
    table {
      margin: 0 auto 40px auto;
      border-collapse: collapse;
      width: 90%;
      background: white;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      border-radius: 6px;
      overflow: hidden;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px 12px;
      text-align: left;
    }
    th {
      background-color: #2c3e50;
      color: white;
      text-transform: uppercase;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #e8f0fe;
    }
  </style>
</head>
<body>
  <h1>Faculty Details</h1>

  <table>
    <tr>
      <th>Sl No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Department</th>
      <th>Venue</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['sl no'] ?? $row['sl_no'] ?? $row['Sl No'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Email']) . "</td>"; // ✅ This forces Email to show
            echo "<td>" . htmlspecialchars($row['Department']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Venue']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }
    ?>
  </table>

</body>
</html>
