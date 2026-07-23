<?php
include "../config/db.php";

$query = "
SELECT
    bookings.*,
    parking.parking_name,
    slots.slot_name
FROM bookings
INNER JOIN parking
    ON bookings.parking_id = parking.id
INNER JOIN slots
    ON bookings.slot_id = slots.id
ORDER BY bookings.booking_date DESC
";

$result = mysqli_query($conn, $query);

if (!$result) {
    die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Bookings</title>

<link rel="stylesheet" href="../assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

.booking-card{
background:#fff;
padding:20px;
margin:15px;
border-radius:12px;
box-shadow:0 4px 12px rgba(0,0,0,.1);
}

.booking-card h3{
margin-bottom:10px;
}

.status{
color:green;
font-weight:bold;
}

</style>

</head>

<body>

<div class="home">

<h2>My Bookings</h2>

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<div class="booking-card">

<h3><?php echo $row['parking_name']; ?></h3>

<p><strong>Booking ID:</strong> <?php echo $row['booking_id']; ?></p>

<p><strong>Slot:</strong> <?php echo $row['slot_name']; ?></p>

<p><strong>Payment:</strong> <?php echo $row['payment_method']; ?></p>

<p><strong>Amount:</strong> ₹<?php echo $row['amount']; ?></p>

<p><strong>Status:</strong>
<span class="status">
<?php echo $row['status']; ?>
</span>
</p>

<p><strong>Date:</strong>
<?php echo $row['booking_date']; ?>
</p>

</div>

<?php

}

}

else

{

echo "<h3>No Bookings Found</h3>";

}

?>

</div>

</body>
</html>