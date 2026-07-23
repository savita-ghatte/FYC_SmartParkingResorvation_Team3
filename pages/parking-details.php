<?php

include "../config/db.php";


if(!isset($_GET['id']))
{
    die("Parking not selected");
}


$id = $_GET['id'];


$query = "SELECT * FROM parking WHERE id='$id'";


$result = mysqli_query($conn,$query);


if(!$result)
{
    die(mysqli_error($conn));
}


$parking = mysqli_fetch_assoc($result);


if(!$parking)
{
    die("Parking not found");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Parking Details</title>


<link rel="stylesheet" href="../assets/css/style.css">

</head>


<body>


<div class="details">


<?php

if(!empty($parking['image']))
{

?>

<img src="<?php echo $parking['image']; ?>">

<?php

}

?>



<h2>
🚗 <?php echo $parking['parking_name']; ?>
</h2>



<p>
📍 <?php echo $parking['location']; ?>
</p>



<div class="detail-box">


<div>

<h3>
⭐ <?php echo $parking['rating']; ?>
</h3>

<small>
Rating
</small>

</div>



<div>

<h3>
<?php echo $parking['slots']; ?>
</h3>

<small>
Slots
</small>

</div>



<div>

<h3>
₹<?php echo $parking['price']; ?>
</h3>

<small>
Per Hour
</small>

</div>


</div>



<a href="select-slot.php?id=<?php echo $parking['id']; ?>">


<button class="book-btn">

Book Slot

</button>


</a>



</div>


</body>

</html>