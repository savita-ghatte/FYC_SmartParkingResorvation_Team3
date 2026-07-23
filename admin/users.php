<?php
include "../config/db.php";

$query = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn,$query);

if(!$result){
    die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Users</title>

<link rel="stylesheet" href="../assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

body{
font-family:Poppins,sans-serif;
background:#f4f6f9;
padding:20px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
margin-top:20px;
}

th,td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

th{
background:#2563eb;
color:white;
}

.active-user{
color:green;
font-weight:bold;
}

.inactive-user{
color:red;
font-weight:bold;
}

.view-btn{
background:#2563eb;
color:white;
padding:8px 15px;
border:none;
border-radius:6px;
text-decoration:none;
cursor:pointer;
}

.delete-btn{
background:#dc2626;
color:white;
padding:8px 15px;
border:none;
border-radius:6px;
text-decoration:none;
cursor:pointer;
}

</style>

</head>

<body>

<div class="users-admin">

<div class="page-header">

<h2>Manage Users</h2>

</div>

<div class="users-table">

<table>

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Joined</th>

<th>Status</th>

<th>Action</th>

</tr>

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo date("d M Y",strtotime($row['created_at'])); ?></td>

<td>

<?php
if($row['status']=="Active")
{
?>

<span class="active-user">
Active
</span>

<?php
}
else
{
?>

<span class="inactive-user">
Blocked
</span>

<?php
}
?>

</td>

<td>

<a
href="view-user.php?id=<?php echo $row['id']; ?>"
class="view-btn">

View

</a>

<a
href="delete-user.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete this user?')">

Delete

</a>

</td>

</tr>

<?php

}

}
else
{

?>

<tr>

<td colspan="7">

No Users Found

</td>

</tr>

<?php

}

?>

</table>

</div>

</div>

</body>

</html>