<?php
include "../config/db.php";

if(!isset($_GET['id'])){
    die("Parking ID not found");
}

$id = (int)$_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM parking WHERE id=$id");

if(mysqli_num_rows($result)==0){
    die("Parking not found");
}

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $parking_name = $_POST['parking_name'];
    $location = $_POST['location'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $slots = $_POST['slots'];

    $query = "UPDATE parking SET
                parking_name='$parking_name',
                location='$location',
                rating='$rating',
                price='$price',
                slots='$slots'
              WHERE id=$id";

    if(mysqli_query($conn,$query)){
        header("Location: manage-parking.php");
        exit;
    }else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Parking</title>

<link rel="stylesheet" href="../assets/css/style.css">

<style>

body{
font-family:Poppins,sans-serif;
background:#f4f6f9;
}

.container{
width:500px;
margin:40px auto;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 4px 10px rgba(0,0,0,.1);
}

input{
width:100%;
padding:12px;
margin:10px 0;
border:1px solid #ccc;
border-radius:8px;
}

button{
width:100%;
padding:12px;
background:#2563eb;
color:white;
border:none;
border-radius:8px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#1d4ed8;
}

a{
text-decoration:none;
}

</style>

</head>

<body>

<div class="container">

<h2>Edit Parking</h2>

<form method="POST">

<input
type="text"
name="parking_name"
value="<?php echo $row['parking_name']; ?>"
required>

<input
type="text"
name="location"
value="<?php echo $row['location']; ?>"
required>

<input
type="number"
step="0.1"
name="rating"
value="<?php echo $row['rating']; ?>"
required>

<input
type="number"
name="price"
value="<?php echo $row['price']; ?>"
required>

<input
type="number"
name="slots"
value="<?php echo $row['slots']; ?>"
required>

<button
type="submit"
name="update">
Update Parking
</button>

</form>

<br>

<a href="manage-parking.php">
← Back
</a>

</div>

</body>

</html>