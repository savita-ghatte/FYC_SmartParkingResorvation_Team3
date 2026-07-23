<?php

include "../config/db.php";


if(isset($_POST['add_parking']))
{

$name = $_POST['parking_name'];

$location = $_POST['location'];

$rating = $_POST['rating'];

$price = $_POST['price'];

$slots = $_POST['slots'];

$image = $_POST['image'];



$query = "INSERT INTO parking
(parking_name, location, rating, price, slots, image)

VALUES

('$name','$location','$rating','$price','$slots','$image')";



$result = mysqli_query($conn,$query);



if($result)
{
    echo "Parking Added Successfully";
}
else
{
    echo mysqli_error($conn);
}


}


?>



<!DOCTYPE html>

<html>

<head>

<title>Add Parking</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>


<body>


<div class="admin-page">


<h2>Add New Parking</h2>


<form method="POST">



<input type="text" 
name="parking_name"
placeholder="Parking Name"
required>



<input type="text"
name="location"
placeholder="Location"
required>



<input type="text"
name="rating"
placeholder="Rating (4.5)"
required>



<input type="number"
name="price"
placeholder="Price Per Hour"
required>



<input type="number"
name="slots"
placeholder="Total Slots"
required>



<input type="text"
name="image"
placeholder="Image URL">



<button type="submit" name="add_parking">

Add Parking

</button>



</form>


</div>


</body>

</html>