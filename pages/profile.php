<?php

include "../config/db.php";




$user_id = 1;



$user_query = "SELECT * FROM users WHERE id=$user_id";

$user_result = mysqli_query($conn,$user_query);


$user = mysqli_fetch_assoc($user_result);


?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Profile</title>


<link rel="stylesheet" href="../assets/css/style.css">


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>


<body>


<div class="profile-page">



<div class="profile-header">


<img src="https://i.pravatar.cc/150?img=12" 
alt="Profile">


<h2>

<?php echo $user['name']; ?>

</h2>


<p>

<?php echo $user['email']; ?>

</p>



</div>





<div class="profile-menu">



<a href="my-bookings.php">

<div class="menu-item">

<i class="fa-solid fa-car"></i>

<span>
My Bookings
</span>

<i class="fa-solid fa-angle-right"></i>

</div>

</a>







<a href="favourite.php">

<div class="menu-item">

<i class="fa-solid fa-heart"></i>

<span>
Favourite Parking
</span>

<i class="fa-solid fa-angle-right"></i>

</div>

</a>







<a href="edit-profile.php">

<div class="menu-item">

<i class="fa-solid fa-user-pen"></i>


<span>
Edit Profile
</span>


<i class="fa-solid fa-angle-right"></i>


</div>

</a>







<a href="settings.php">


<div class="menu-item">


<i class="fa-solid fa-gear"></i>


<span>
Settings
</span>


<i class="fa-solid fa-angle-right"></i>


</div>


</a>







<a href="logout.php">


<div class="menu-item logout">


<i class="fa-solid fa-right-from-bracket"></i>


<span>
Logout
</span>


<i class="fa-solid fa-angle-right"></i>


</div>


</a>





</div>



</div>



</body>

</html>