<?php

include "../config/db.php";

if(isset($_GET['id']))
{
    $id = (int)$_GET['id'];

    // Get slot ID
    $result = mysqli_query($conn,
        "SELECT slot_id FROM bookings WHERE id=$id");

    $booking = mysqli_fetch_assoc($result);

    // Update booking status
    mysqli_query($conn,
        "UPDATE bookings SET status='Cancelled' WHERE id=$id");

    // Free the slot
    mysqli_query($conn,
        "UPDATE slots SET status='available'
         WHERE id=".$booking['slot_id']);
}

header("Location:view-bookings.php");
exit();

?>