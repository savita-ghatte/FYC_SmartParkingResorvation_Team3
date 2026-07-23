<?php
include "../config/db.php";

$result = mysqli_query($conn, "SELECT * FROM parking ORDER BY id DESC");

if(!$result){
    die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Parking</title>

<link rel="stylesheet" href="../assets/css/style.css">

<style>
body{
    font-family:Arial, sans-serif;
    background:#f4f6f9;
    padding:20px;
}

h2{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}

th,td{
    border:1px solid #ddd;
    padding:12px;
    text-align:center;
}

th{
    background:#2563eb;
    color:white;
}

.edit-btn,
.delete-btn{
    padding:8px 12px;
    text-decoration:none;
    color:white;
    border-radius:5px;
}

.edit-btn{
    background:#2563eb;
}

.delete-btn{
    background:#dc2626;
}
</style>

</head>
<body>

<h2>Manage Parking</h2>

<table>

<tr>
<th>ID</th>
<th>Parking Name</th>
<th>Location</th>
<th>Rating</th>
<th>Price</th>
<th>Total Slots</th>
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

<td><?php echo $row['parking_name']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['rating']; ?></td>

<td>₹<?php echo $row['price']; ?>/hr</td>

<td><?php echo $row['slots']; ?></td>

<td>
<a class="edit-btn" href="edit-parking.php?id=<?php echo $row['id']; ?>">Edit</a>

<a class="delete-btn"
href="delete-parking.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this parking?')">
Delete
</a>
</td>

</tr>

<?php
    }
}
else
{
    echo "<tr><td colspan='7'>No Parking Found</td></tr>";
}
?>

</table>

</body>
</html>

