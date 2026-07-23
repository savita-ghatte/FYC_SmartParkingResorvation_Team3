<?php

include "../config/db.php";


// Receive booking data

$parking_id = $_POST['parking_id'];

$slot = $_POST['slot'];



// Generate Booking ID

$booking_id = "SP" . date("Ymd") . rand(100,999);



// Get parking details

$query = "SELECT * FROM parking WHERE id=$parking_id";

$result = mysqli_query($conn,$query);

$parking = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Booking Success</title>


<link rel="stylesheet" href="../assets/css/style.css">


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>


<body>


<div class="success-page">



<div class="success-icon">

<i class="fa-solid fa-circle-check"></i>

</div>




<h2>
Booking Confirmed!
</h2>



<p>
Your parking slot has been booked successfully.
</p>





<div class="ticket-card">


<h3>
Booking ID
</h3>


<h2>
<?php echo $booking_id; ?>
</h2>



<hr>



<h3>
Parking
</h3>


<p>
<?php echo $parking['parking_name']; ?>
</p>



<hr>



<h3>
Slot
</h3>


<p>
<?php echo $slot; ?>
</p>



<hr>



<h3>
Time
</h3>


<p>

<?php echo date("d F Y"); ?> | 10:00 AM

</p>



</div>





<img 

src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=<?php echo $booking_id; ?>"

class="qr"

>




<a href="home.php">


<button class="continue-btn">

Back To Home

</button>


</a>




</div>



</body>

</html>