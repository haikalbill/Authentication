<?php
header("Content-Security-Policy: default-src 'self'; style-src 'self' 'unsafe-inline'; script-src * 'unsafe-eval' 'unsafe-inline';");
header("X-XSS-Protection: 1; mode=block");
session_start();
// Regenerate the session ID
session_regenerate_id();
echo "<br>session_id(): ".session_id();
//if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
//    header("Location: login.php");
//    exit();
//}

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
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $username;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-top: 50px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    form {
        margin-top: 30px;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        padding: 5px;
        width: 200px;
    }

    button[type="submit"] {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<body>
    <h2>Welcome, Admin</h2>
    <!-- Display admin dashboard content here -->
</body>

</html>

<?php


// Include database connection

// SQL query to select all rows from the students table
$sql = "SELECT * FROM students";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Output table header
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Matric Number</th><th>Email</th><th>Phone Number</th></tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["matricnumber"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phonenumber"] . "</td>";
            echo "</tr>";
        }
        // Close table
        echo "</table>";
    } else {
        // No rows found
        echo "No data found in the students table.";
    }
} else {
    // Query failed
    echo "Error: " . mysqli_error($conn);
}



if (isset($_POST['delete'])) {
    $matricnumber = $_POST['matricnumber'];

    // SQL query to delete a row from the students table
    $deleteQuery = "DELETE FROM students WHERE matricnumber='$matricnumber'";

    // Execute the delete query
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

session_unset(); // remove all stored values in session variables
session_destroy(); // Destroys all data registered to a session
?>

<form method="POST" action="">
    <label for="matricnumber">Enter Matric Number to Delete:</label>
    <input type="text" name="matricnumber" id="matricnumber" required>
    <button type="submit" name="delete">Delete</button>
</form>


