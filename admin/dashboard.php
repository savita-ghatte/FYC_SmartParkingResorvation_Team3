

<?php
include "../config/db.php";

/* Total Parking */
$parking = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM parking"));

/* Total Bookings */
$bookings = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM bookings"));

/* Available Slots */
$available = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM slots WHERE status='available'"));

/* Booked Slots */
$booked = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM slots WHERE status='booked'"));

/* Total Revenue */
$revenue = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(amount) AS total FROM bookings"));
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<!-- <link rel="stylesheet" href="../assets/css/style.css">-->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

body{
background:#f4f6f9;
font-family:Poppins,sans-serif;
}

.dashboard{
padding:25px;
}

.dashboard h1{
text-align:center;
margin-bottom:25px;
}

.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
}

.card{
background:#fff;
padding:20px;
border-radius:12px;
box-shadow:0 4px 10px rgba(0,0,0,.1);
text-align:center;
}

.card i{
font-size:35px;
margin-bottom:10px;
color:#2563eb;
}

.card h2{
font-size:32px;
margin:10px 0;
}

.menu{
margin-top:40px;
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
}

.menu a{
text-decoration:none;
background:#2563eb;
color:white;
padding:18px;
text-align:center;
border-radius:10px;
font-weight:600;
transition:.3s;
}

.menu a:hover{
background:#1d4ed8;
}

</style>

</head>

<body>

<div class="dashboard">

<h1>SmartPark Admin Dashboard</h1>

<div class="cards">

<div class="card">
<i class="fa-solid fa-square-parking"></i>
<h2><?php echo $parking['total']; ?></h2>
<p>Total Parking</p>
</div>

<div class="card">
<i class="fa-solid fa-calendar-check"></i>
<h2><?php echo $bookings['total']; ?></h2>
<p>Total Bookings</p>
</div>

<div class="card">
<i class="fa-solid fa-circle-check"></i>
<h2><?php echo $available['total']; ?></h2>
<p>Available Slots</p>
</div>

<div class="card">
<i class="fa-solid fa-circle-xmark"></i>
<h2><?php echo $booked['total']; ?></h2>
<p>Booked Slots</p>
</div>

<div class="card">
<i class="fa-solid fa-indian-rupee-sign"></i>
<h2>₹<?php echo $revenue['total'] ?? 0; ?></h2>
<p>Total Revenue</p>
</div>

</div>

<div class="menu">

<a href="add-parking.php">
<i class="fa-solid fa-plus"></i><br><br>
Add Parking
</a>

<a href="manage-parking.php">
<i class="fa-solid fa-pen"></i><br><br>
Manage Parking
</a>

<a href="manage-slots.php">
<i class="fa-solid fa-car"></i><br><br>
Manage Slots
</a>

<a href="view-bookings.php">
<i class="fa-solid fa-list"></i><br><br>
View Bookings
</a>

<a href="logout.php">
<i class="fa-solid fa-right-from-bracket"></i><br><br>
Logout
</a>

</div>

</div>

</body>
</html>