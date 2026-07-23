<?php
include "../config/db.php";

if(isset($_POST['save']))
{
    $parking_id = $_POST['parking_id'];
    $slot_name = $_POST['slot_name'];
    $status = $_POST['status'];

    $query = "INSERT INTO slots(parking_id, slot_name, status)
              VALUES('$parking_id','$slot_name','$status')";

    if(mysqli_query($conn,$query))
    {
        header("Location: manage-slots.php");
        exit();
    }
    else
    {
        die(mysqli_error($conn));
    }
}

$parking = mysqli_query($conn,"SELECT * FROM parking");
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Slot</title>

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

input,select{
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
cursor:pointer;
}

</style>

</head>

<body>

<div class="container">

<h2>Add Slot</h2>

<form method="POST">

<select name="parking_id" required>

<option value="">Select Parking</option>

<?php
while($row=mysqli_fetch_assoc($parking))
{
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['parking_name']; ?>
</option>

<?php
}
?>

</select>

<input
type="text"
name="slot_name"
placeholder="Slot Name (A1)"
required>

<select name="status">

<option value="available">
Available
</option>

<option value="booked">
Booked
</option>

</select>

<button
type="submit"
name="save">

Add Slot

</button>

</form>

</div>

</body>
</html>