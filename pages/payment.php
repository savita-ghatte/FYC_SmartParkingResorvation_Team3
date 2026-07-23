<?php

$parking_id = $_POST['parking_id'];

$slot = $_POST['slot'];

$amount = $_POST['amount'];

?>


<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Payment</title>


<link rel="stylesheet" href="../assets/css/style.css">


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>


<body>


<div class="payment-page">



<a href="booking-summary.php" class="back-btn">

<i class="fa-solid fa-arrow-left"></i>

</a>



<h2>
Select Payment Method
</h2>




<form action="booking-success.php" method="POST">


<input type="hidden" 
name="parking_id"
value="<?php echo $parking_id; ?>">



<input type="hidden"
name="slot"
value="<?php echo $slot; ?>">





<div class="payment-card">


<input type="radio" name="payment" value="Card" required>


<i class="fa-solid fa-credit-card"></i>


<div>

<h3>
Credit / Debit Card
</h3>


<p>
Visa, MasterCard
</p>


</div>


</div>






<div class="payment-card">


<input type="radio" name="payment" value="Google Pay">


<i class="fa-brands fa-google-pay"></i>


<div>

<h3>
Google Pay
</h3>


<p>
Fast & Secure
</p>


</div>


</div>







<div class="payment-card">


<input type="radio" name="payment" value="Net Banking">


<i class="fa-solid fa-building-columns"></i>


<div>

<h3>
Net Banking
</h3>


<p>
All Banks Supported
</p>


</div>


</div>







<div class="payment-card">


<input type="radio" name="payment" value="Cash">


<i class="fa-solid fa-wallet"></i>


<div>

<h3>
Cash
</h3>


<p>
Pay at Parking
</p>


</div>


</div>






<button class="continue-btn">

Pay Now

</button>




</form>




</div>


</body>

</html>