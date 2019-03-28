<?php
include_once 'testphp.php';

  if(!empty($_POST['myID'])){
    $myID = $_POST['myID'];

    $sql = "SELECT * FROM `relations` WHERE `friend_fk`='$myID' AND showen !='yes'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_array($result)) {

        if ($row['status']=="rejected") {
          echo "rejected".$row['withFriend']."&".$row['with_fk'];

          $sql = "DELETE FROM `relations` WHERE `friend_fk`='$myID' AND status='rejected' AND showen ='no'";
          mysqli_query($conn, $sql);
        }else if ($row['status']=="accepted"){
          echo "accepted".$row['withFriend']."&".$row['with_fk'];
          $sql = "UPDATE `relations` SET showen='yes' WHERE `friend_fk`='$myID' AND status='accepted' AND showen ='no'";
          mysqli_query($conn, $sql);
        }
      }
    }
  }
