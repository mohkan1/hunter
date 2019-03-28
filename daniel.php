<?php

$result = mysqli_query($conn, "SELECT 'images' FROM 'login2' WHERE id='$_SESSION['id']'");

    while ($row = mysqli_fetch_array($result)) {
       echo "<img src='images/".$row['image']."'>";
    }

 ?>
