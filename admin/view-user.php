<?php

include "../config/db.php";

$id=(int)$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$user=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<title>User Details</title>

<link rel="stylesheet" href="../assets/css/style.css">

<style>

body{
font-family:Poppins,sans-serif;
background:#f4f6f9;
padding:30px;
}

.card{
width:450px;
margin:auto;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 4px 10px rgba(0,0,0,.1);
}

p{
font-size:18px;
margin:15px 0;
}

</style>

</head>

<body>

<div class="card">

<h2>User Details</h2>

<p><strong>Name:</strong> <?php echo $user['name']; ?></p>

<p><strong>Email:</strong> <?php echo $user['email']; ?></p>

<p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>

<p><strong>Status:</strong> <?php echo $user['status']; ?></p>

<p><strong>Joined:</strong> <?php echo $user['created_at']; ?></p>

<br>

<a href="users.php">

<button>

Back

</button>

</a>

</div>

</body>

</html>