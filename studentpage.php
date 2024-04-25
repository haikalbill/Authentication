<?php

session_start();
// Define the whitelist regex patterns
$namePattern = '/^[A-Za-z\s]+$/';
$matricnumberPattern = '/^[A-Za-z0-9]+$/';
$emailPattern = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';
$phonePattern = '/^[0-9]{10}$/';

// Initialize variables
$name = $matricnumber = $email = $phonenumber = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $matricnumber = $_POST['matricnumber'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];

    // Validate form inputs
    $errors = [];

    if (!preg_match($namePattern, $name)) {
        $errors[] = 'Invalid name format';
    }

    if (!preg_match($matricnumberPattern, $matricnumber)) {
        $errors[] = 'Invalid matric number format';
    }

    if (!preg_match($emailPattern, $email)) {
        $errors[] = 'Invalid email format';
    }

    if (!preg_match($phonePattern, $phonenumber)) {
        $errors[] = 'Invalid phone number format';
    }

    // If there are no errors, process the form data
    if (empty($errors)) {
        // Process the form data here
        // ...
        echo 'Form submitted successfully!';
    } else {
        // Display the errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Details Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Student Details Form</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>"><br>

        <label for="matric_number">Matric Number:</label>
        <input type="text" name="matricnumber" value="<?php echo $matricnumber; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>"><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $matricnumber = $_POST['matricnumber'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];

    // Validate form inputs
    $errors = [];

    if (!preg_match($namePattern, $name)) {
        $errors[] = 'Invalid name format';
    }

    if (!preg_match($matricnumberPattern, $matricnumber)) {
        $errors[] = 'Invalid matric number format';
    }

    if (!preg_match($emailPattern, $email)) {
        $errors[] = 'Invalid email format';
    }

    if (!preg_match($phonePattern, $phonenumber)) {
        $errors[] = 'Invalid phone number format';
    }

    // If there are no errors, process the form data
    if (empty($errors)) {
        // Process the form data here
        // ...
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


        // Display the submitted details in a table
        echo '<h2>Submitted Details:</h2>';
        echo '<table>';
        echo '<tr><th>Name</th><th>Matric Number</th><th>Email</th><th>Phone Number</th></tr>';
        echo '<tr><td>' . $name . '</td><td>' . $matricnumber . '</td><td>' . $email . '</td><td>' . $phonenumber . '</td></tr>';
        echo '</table>';
        $conn->close();


    } else {
        // Display the errors
        foreach ($errors as $error) {
            echo '<div class="error">' . $error . '</div>';
        }
    }

}

?>



