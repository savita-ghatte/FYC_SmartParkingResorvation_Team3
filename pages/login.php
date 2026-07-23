<?php
session_start();

include "../config/db.php";

$message = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);

        // Plain text password comparison
        if($password == $row['password'])
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            header("Location: home.php");
            exit();
        }
        else
        {
            $message = "Invalid Password!";
        }
    }
    else
    {
        $message = "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Smart Park</title>

<link rel="stylesheet" href="../assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="login-box">

<h2>Welcome Back 👋</h2>

<p>Login to continue</p>

<p style="color:red;text-align:center;">
<?php echo $message; ?>
</p>

<form method="POST">

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

<button type="submit" name="login">
Login
</button>

</form>

<h4>
Don't have an account?
<a href="register.php">Register</a>
</h4>

</div>

</body>
</html>