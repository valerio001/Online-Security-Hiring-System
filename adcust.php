<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "dboshs";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete operation
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteSql = "DELETE FROM custlist WHERE id = $deleteId";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from the custlist table
$selectSql = "SELECT * FROM custlist";
$result = $conn->query($selectSql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['service'] . "</td>";
    echo "<td>" . $row['manpower'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td><a href='admin.php?delete_id=" . $row['id'] . "'>Delete</a></td>";
    echo "</tr>";
}
$conn->close();
