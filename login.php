<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <center><h2>Login</h2></center>
    <center><form autocomplete="off" action="login_process.php" method="POST">
        <br><br>
        <label for="matricnumber">Matric Number</label>
        <input type="number" id="matricnumber" name="matricnumber" required autocomplete="false"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required autocomplete="new-password"><br><br>
        <input type="submit" value="Login">
        <br><br>
        <a href="signup.php">Don't have an account? Sign up here<br></a>
        <br><br>
    </form></center>
</body>
</html>