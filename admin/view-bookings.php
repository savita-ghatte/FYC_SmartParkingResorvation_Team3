<?php
include "../config/db.php";

$query = "SELECT
            bookings.*,
            parking.parking_name,
            slots.slot_name
          FROM bookings
          LEFT JOIN parking
          ON bookings.parking_id = parking.id
          LEFT JOIN slots
          ON bookings.slot_id = slots.id
          ORDER BY bookings.booking_date DESC";

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

<title>Manage Bookings</title>

<link rel="stylesheet" href="../assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
background:#fff;
}

th,td{
padding:12px;
text-align:center;
border:1px solid #ddd;
}

th{
background:#2563eb;
color:white;
}

.confirmed{
color:green;
font-weight:bold;
}

.pending{
color:orange;
font-weight:bold;
}

.cancelled{
color:red;
font-weight:bold;
}

.cancel-btn{
background:#dc2626;
color:white;
padding:8px 15px;
border:none;
border-radius:6px;
cursor:pointer;
text-decoration:none;
}

.cancel-btn:hover{
background:#b91c1c;
}

</style>

</head>

<body>

<div class="booking-admin">

<div class="page-header">

<h2>Manage Bookings</h2>

</div>

<div class="booking-table-admin">

<table>

<tr>

<th>Booking ID</th>

<th>Parking</th>

<th>Slot</th>

<th>Payment</th>

<th>Amount</th>

<th>Date</th>

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

<td><?php echo $row['booking_id']; ?></td>

<td><?php echo $row['parking_name']; ?></td>

<td><?php echo $row['slot_name']; ?></td>

<td><?php echo $row['payment_method']; ?></td>

<td>₹<?php echo $row['amount']; ?></td>

<td><?php echo date("d M Y", strtotime($row['booking_date'])); ?></td>

<td>

<span class="<?php echo strtolower($row['status']); ?>">

<?php echo $row['status']; ?>

</span>

</td>

<td>

<a href="cancel-booking.php?id=<?php echo $row['id']; ?>"
class="cancel-btn"
onclick="return confirm('Cancel this booking?')">

Cancel

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

<td colspan="8">

No Bookings Found

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