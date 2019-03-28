<?php
include_once 'testphp.php';

  if(!empty($_POST['myID']) && !empty($_POST['toID'])){
    $myID = $_POST['myID'];
    $toID = $_POST['toID'];


    date_default_timezone_set("Europe/Stockholm");
    $date = date("Y-m-d h:i:sa");

    $sql = "SELECT * FROM relations WHERE id_fk1='$myID' AND id_fk2='$toID'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
      echo "friends";
    }else{
      $sql = "INSERT INTO relations (`id_fk1`, `id_fk2`, `status`) VALUES ('$myID','$toID','request')"; //the user who sends the request his id will always be in the id_fk1
      if (mysqli_query($conn, $sql)) {
        echo "friend request has been sent";
      }

    }


  }
