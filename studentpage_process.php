<?php
// signup_process.php

header("Content-Security-Policy: default-src 'self'; style-src 'self' 'unsafe-inline'; script-src * 'unsafe-eval' 'unsafe-inline';");
header("X-XSS-Protection: 1; mode=block");
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
//get data
$name = $_POST['name'];
$marticnumber = $_POST['matricnumber'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];

// Insert data into database
$sql = "INSERT INTO students (name, matricnumber, email, phonenumber ) VALUES ('$name','$matricnumber', '$email', '$phonenumber')";



if ($conn->query($sql) === TRUE) {
    echo "Student registered successfully.";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


?>


<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['studentpage'])) {
    // Remove the session variable
    unset($_SESSION['studentpage']);
}

// Redirect the user to the login page or any other desired page
header("Location: login.php");
exit();
?>