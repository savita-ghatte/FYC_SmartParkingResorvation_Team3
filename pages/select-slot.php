<?php

include "../config/db.php";


if(!isset($_GET['id']))
{
    die("Parking not selected");
}


$parking_id = $_GET['id'];


// Parking name fetch

$parking_query = "SELECT * FROM parking WHERE id='$parking_id'";

$parking_result = mysqli_query($conn,$parking_query);

$parking = mysqli_fetch_assoc($parking_result);



if(!$parking)
{
    die("Parking not found");
}



// Get slots

$slot_query = "SELECT * FROM slots WHERE parking_id='$parking_id'";


$slot_result = mysqli_query($conn,$slot_query);


if(!$slot_result)
{
    die(mysqli_error($conn));
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Select Slot</title>


<link rel="stylesheet" href="../assets/css/style.css">


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


</head>


<body>


<div class="slot-page">


<a href="parking-details.php?id=<?php echo $parking_id; ?>" class="back-btn">
←
</a>


<h2>
<?php echo $parking['parking_name']; ?>
</h2>


<h3>Select Parking Slot</h3>



<div class="legend">


<div>
<span class="available"></span>
Available
</div>


<div>
<span class="booked"></span>
Booked
</div>


<div>
<span class="selected"></span>
Selected
</div>


</div>




<form action="booking-summary.php" method="POST">



<input type="hidden" 
name="parking_id"
value="<?php echo $parking_id; ?>">



<div class="slots">



<?php

while($slot=mysqli_fetch_assoc($slot_result))

{


?>



<label>


<input type="radio"
name="slot_id"
value="<?php echo $slot['id']; ?>"
<?php

if($slot['status']=="booked")
{
echo "disabled";
}

?>

required>



<div class="slot <?php echo $slot['status']; ?>">

<?php echo $slot['slot_name']; ?>

</div>


</label>



<?php

}

?>



</div>



<button class="continue-btn">

Continue

</button>



</form>



</div>


</body>

</html>