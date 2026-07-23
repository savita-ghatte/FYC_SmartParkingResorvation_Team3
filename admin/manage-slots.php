<?php
include "../config/db.php";

$query = "SELECT slots.*, parking.parking_name
          FROM slots
          JOIN parking ON slots.parking_id = parking.id
          ORDER BY slots.id DESC";

$result = mysqli_query($conn, $query);

if(!$result){
    die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Slots</title>

<link rel="stylesheet" href="../assets/css/style.css">

<style>

body{
font-family:Poppins,sans-serif;
background:#f4f6f9;
padding:20px;
}

.container{
max-width:1100px;
margin:auto;
}

table{
width:100%;
border-collapse:collapse;
background:#fff;
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

.edit-btn{
background:#16a34a;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:5px;
}

.delete-btn{
background:#dc2626;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:5px;
}

</style>

</head>

<body>

<div class="container">

<h2>Manage Slots</h2>

<table>

<tr>
<th>ID</th>
<th>Parking</th>
<th>Slot</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['parking_name']; ?></td>

<td><?php echo $row['slot_name']; ?></td>

<td><?php echo ucfirst($row['status']); ?></td>

<td>

<a href="edit-slot.php?id=<?php echo $row['id']; ?>" class="edit-btn">
Edit
</a>

<a href="delete-slot.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete this slot?')">
Delete
</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>
</html>