<?php
include "../config/db.php";

$message = "";

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "Email already exists!";
    }
    else
    {
        $sql = "INSERT INTO admin(name,email,password)
                VALUES('$name','$email','$password')";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('Admin Registered Successfully');
                    window.location='admin-login.php';
                  </script>";
        }
        else
        {
            $message = "Registration Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>

    <style>

    body{
        font-family:Arial;
        background:#f2f2f2;
    }

    .box{
        width:400px;
        margin:60px auto;
        background:#fff;
        padding:30px;
        border-radius:10px;
        box-shadow:0 0 10px rgba(0,0,0,.2);
    }

    input{
        width:100%;
        padding:10px;
        margin:10px 0;
    }

    button{
        width:100%;
        padding:12px;
        background:#2563eb;
        color:white;
        border:none;
        cursor:pointer;
    }

    .msg{
        color:red;
        text-align:center;
    }

    a{
        text-decoration:none;
    }

    </style>

</head>

<body>

<div class="box">

<h2 align="center">Admin Registration</h2>

<p class="msg"><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>

</form>

<p align="center">
Already have an account?
<a href="admin-login.php">Login</a>
</p>

</div>

</body>
</html>