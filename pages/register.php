<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config/db.php";

$message = "";

if(isset($_POST['register']))
{
    $name = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password != $confirm_password)
    {
        $message = "Passwords do not match!";
    }
    else
    {
        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check) > 0)
        {
            $message = "Email already exists!";
        }
        else
        {
            // Save password (plain text for now)
            // We'll make it secure after checking your login.php
            $sql = "INSERT INTO users(name,email,password)
                    VALUES('$name','$email','$password')";

            if(mysqli_query($conn, $sql))
            {
                echo "<script>
                    alert('Registration Successful');
                    window.location='login.php';
                </script>";
                exit();
            }
            else
            {
                $message = "Registration Failed: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Smart Park</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .message{
            color:red;
            text-align:center;
            margin-bottom:15px;
        }
    </style>
</head>
<body>

<div class="login-box">

    <h2>Create Account</h2>

    <p>Sign up to continue</p>

    <?php
    if($message != "")
    {
        echo "<div class='message'>$message</div>";
    }
    ?>

    <form method="POST">

        <input
            type="text"
            name="fullname"
            placeholder="Full Name"
            required>

        <input
            type="email"
            name="email"
            placeholder="Email"
            required>

        <input
            type="password"
            name="password"
            placeholder="Password"
            required>

        <input
            type="password"
            name="confirm_password"
            placeholder="Confirm Password"
            required>

        <button type="submit" name="register">
            Register
        </button>

    </form>

    <h4>
        Already have an account?
        <a href="login.php">Login</a>
    </h4>

</div>

</body>
</html>