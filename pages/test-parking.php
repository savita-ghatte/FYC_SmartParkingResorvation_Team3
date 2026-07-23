<?php

include "../config/db.php";

echo "Database Connected<br>";

$query = "SELECT * FROM parking";

$result = mysqli_query($conn,$query);


if(!$result)
{
    die("Query Error: ".mysqli_error($conn));
}


echo "Total Parking: ".mysqli_num_rows($result);


while($row=mysqli_fetch_assoc($result))
{
    echo "<br>";
    echo $row['parking_name'];
}

?>