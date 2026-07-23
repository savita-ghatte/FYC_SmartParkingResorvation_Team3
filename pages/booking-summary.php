<?php

include "../config/db.php";


$parking_id = $_POST['parking_id'];

$slot = $_POST['slot'];


// Get parking details

$query = "SELECT * FROM parking WHERE id=$parking_id";

$result = mysqli_query($conn,$query);

$parking = mysqli_fetch_assoc($result);


// Amount calculation

$amount = $parking['price'] * 2;

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Booking Summary</title>


<link rel="stylesheet" href="../assets/css/style.css">


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>


<body>


<div class="summary">


<a href="select-slot.php?id=<?php echo $parking_id; ?>" class="back-btn">

<i class="fa-solid fa-arrow-left"></i>

</a>



<h2>Booking Summary</h2>




<div class="summary-card">


<p>
<strong>Parking</strong>
</p>


<h3>
<?php echo $parking['parking_name']; ?>
</h3>



<hr>



<p>
<strong>Slot</strong>
</p>


<h3>
<?php echo $slot; ?>
</h3>



<hr>



<p>
<strong>Date</strong>
</p>


<h3>

<?php echo date("d F Y"); ?>

</h3>



<hr>



<p>
<strong>Time</strong>
</p>


<h3>
10:00 AM
</h3>



<hr>



<p>
<strong>Total Amount</strong>
</p>


<h2 style="color:#38BDF8;">

₹<?php echo $amount; ?>

</h2>



</div>




<a href="payment.php">


<button class="continue-btn">

Proceed to Payment

</button>


</a>



</div>



</body>

</html>