<!-- signup.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <style>
    
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"], input[type="email"], input[type="tel"] {
        width: 50%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }
    .error {
        color: red;
    }
    h2{
    text-align: center;
    font-weight: bold;
    background: -webkit-linear-gradient(left, rgb(0, 34, 255), orange);
    background: linear-gradient(to right, rgb(0, 17, 255), rgb(255, 0, 183));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline;
    font-size: 5em;
    
    }
    form{
        border-style: solid;
        border-radius: 15px;
        max-width: 40%;
        margin-left: auto;
        margin-right: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ccc;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
</style>
</head>


<body>

    <center><h2>Student Form</h2></center>
    <center>
        <form id="studentForm" action="signup_process.php" method="post">
        <div class="form-group">
        <br>
        <label for="Full Name">Full Name:</label>
        <input type="text" id="username" name="username" required autocomplete="off">
        </div>

        <br>
        <div class="form-group">
            <label for="matricNumber">Matric Number:</label>
            <input type="number" id="matricnumber" name="matricnumber" required autocomplete="off">
        </div>
        <br>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required autocomplete="off">
        </div>
        <br>
        <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required autocomplete="new-password">
        </div>
        <br>
        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phonenumber" name="phonenumber" required autocomplete="off">
        <br><br>
        <input type="submit" value="Sign Up">
        <br><br><br>
    </form></center>
    <center><a href="login.php">Already have an account? Login here</a></center>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $matricnumber = $_POST["matricnumber"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $phonenumber = $_POST["phonenumber"];
        $errorMessages = [];

        function validateName($username) {
            $regex = '/^[a-zA-Z]+$/';
            return preg_match($regex, $username);
        }

        function validateMatricNumber($matricnumber) {
            $regex = '/^\d{7,}$/';
            return preg_match($regex, $matricnumber);
        }

        function validateEmail($email) {
            $regex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
            return preg_match($regex, $email);
        }

        function validatePhoneNumber($phonenumber) {
            $regex = '/^\d{10,}$/';
            return preg_match($regex, $phonenumber);
        }

        if ($username === '') {
            $errorMessages[] = 'Name is required.';
        } elseif (!validateName($username)){
            $errorMessages[] = 'Invalid input';
        }

        if ($email === '') {
            $errorMessages[] = 'Email is required.';
        } elseif (!validateEmail($email)) {
            $errorMessages[] = 'Invalid email format.';
        }

        if ($password === '') {
            $errorMessages[] = 'Password is required.';
        } elseif (!validateEmail($password)) {
            $errorMessages[] = 'Invalid password format.';
        }

        if ($matricnumber === '') {
            $errorMessages[] = 'Matric Number is required.';
        } elseif (!validateMatricNumber($matricnumber)) {
            $errorMessages[] = 'Invalid matric number format.';
        }

        if ($phonenumber === '') {
            $errorMessages[] = 'Phone Number is required.';
        } elseif (!validatePhoneNumber($phonenumber)) {
            $errorMessages[] = 'Invalid phone number format.';
        }

        if (count($errorMessages) > 0) {
            $errorMessage = implode('\n', $errorMessages);
            echo "<script>alert('$errorMessage');</script>";
        } else {
            // Form submission logic goes here
        }
    }
    ?>
    



</body>

</html>