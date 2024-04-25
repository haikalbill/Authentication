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
$username = $_POST['username'];
$password = $_POST['password'];


// Check user credentials
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role'];
    if (password_verify($password, $row['password']) && $row['role'] == 'admin') {
        header("Location: adminpage.php");
        $_SESSION['username'] = $username; // Store username in session for future use
    } else {
        header("Location: studentpage.php");
           $_SESSION['username'] = $username;
    }
    exit();
} else {
    echo '<script>alert("Invalid Credentials")</script>'; 

}

$conn->close();
?>