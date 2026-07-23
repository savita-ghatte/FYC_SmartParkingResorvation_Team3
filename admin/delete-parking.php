<?php
include "../config/db.php";

if (!isset($_GET['id'])) {
    die("Parking ID not found.");
}

$id = (int)$_GET['id'];

/* Delete slots of this parking first */
mysqli_query($conn, "DELETE FROM slots WHERE parking_id=$id");

/* Delete bookings of this parking */
mysqli_query($conn, "DELETE FROM bookings WHERE parking_id=$id");

/* Delete parking */
$result = mysqli_query($conn, "DELETE FROM parking WHERE id=$id");

if ($result) {
    header("Location: manage-parking.php");
    exit();
} else {
    die("Error: " . mysqli_error($conn));
}
?>