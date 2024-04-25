<?php
// signup_process.php
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
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// Insert data into database
$sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";



if ($conn->query($sql) === TRUE) {
    echo "User registered successfully.";
    echo '<button onclick="location.href=\'login.php\'">Go to Login</button>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


?>
