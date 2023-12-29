<?php
$host = "localhost";   //your MYSQL host
$username = "root";       //your MYSQL username
$password = "";       //your MYSQL password
$database = "dboshs"; // Replace with your MySQL database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uname"];
    $password = $_POST["pass"];

    //perform a query to check if user exists
    $sql = "SELECT * FROM adminlogin WHERE uname = '$username' AND pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successfull !";

        header("Location: admin.html");
    } else {
        echo "Invalid username or password";
    }
}
$conn->close();
