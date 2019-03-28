<?php
include_once 'testphp.php';

  if(!empty($_POST['fromID']) && !empty($_POST['toID']) && !empty($_POST['answer'])){

    $fromID = $_POST['fromID'];
    $toID = $_POST['toID'];

    $answer = $_POST['answer'];

    if ($answer == "yes") {

          $sql = "UPDATE relations SET status='accepted' WHERE friend_fk='$toID' AND with_fk='$fromID'";
          if (mysqli_query($conn, $sql)) {
            echo "Friend request has been accepted";
          }else{
            echo "oobs!";
          }

    }else if ($answer == "no"){
          $sql = "UPDATE relations SET status='rejected' WHERE friend_fk='$toID' AND with_fk='$fromID'";
          if (mysqli_query($conn, $sql)) {
            echo "Friend request has been rejected";
          }else{
            echo "oobs!";
          }
    }

  }
