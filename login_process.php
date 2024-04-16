<?php
// login_process.php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth_student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$matricnumber = $_POST['matricnumber'];
$password = $_POST['password'];


// Check user credentials
$sql = "SELECT * FROM users WHERE matricnumber='$matricnumber'";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    if (password_verify($password, $row['password'])) {
        echo "Login successful. Welcome, " . $username;
        $_SESSION['matricnumber'] = $matricnumber; // Store username in session for future use
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>