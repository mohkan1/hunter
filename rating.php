<?php
include_once 'testphp.php';


    $sql = "SELECT COUNT(rating) as total FROM `likesDislikes` WHERE `post_fk`='67' AND rating='like'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $num = $row['total'];
    echo $num;
