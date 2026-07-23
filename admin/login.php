<?php
session_start();
include "../config/db.php";

$error = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin
              WHERE email='$email'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['admin'] = $email;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<link rel="stylesheet" href="../assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="admin-login">

<div class="admin-logo">
<i class="fa-solid fa-user-shield"></i>
</div>

<h2>Admin Login</h2>

<p>Smart Park Administration</p>

<?php
if($error!="")
{
    echo "<p style='color:red;text-align:center;'>$error</p>";
}
?>

<form method="POST">

<div class="input-box">
<i class="fa-solid fa-envelope"></i>
<input
type="email"
name="email"
placeholder="Admin Email"
required>
</div>

<div class="input-box">
<i class="fa-solid fa-lock"></i>
<input
type="password"
name="password"
placeholder="Password"
required>
</div>

<button
type="submit"
name="login"
class="admin-btn">
Login
</button>
<p style="text-align:center; margin-top:15px;">
    Don't have an admin account?
    <a href="admin-register.php">Create Account</a>
</p>

</form>

</div>

</body>
</html>