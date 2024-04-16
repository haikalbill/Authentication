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
$matricnumber = $_POST['matricnumber'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
// Insert data into database
$sql = "INSERT INTO users (username, matricnumber, password, email, phonenumber ) VALUES ('$username','$matricnumber', '$password', '$email', '$phonenumber')";



if ($conn->query($sql) === TRUE) {
    echo "User registered successfully.";
    echo '<button onclick="location.href=\'login.php\'">Go to Login</button>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


?>
