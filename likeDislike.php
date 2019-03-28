<?php
include_once 'testphp.php';

  if(!empty($_POST['postID']) && !empty($_POST['myID'])){

    $postID = $_POST['postID'];
    $myID = $_POST['myID'];
    //getting how many likes the user have
    $sql = "SELECT * FROM `likesDislikes` WHERE `post_fk`='$postID' AND user='$myID'";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck <= 0) {
      $sql = "INSERT INTO `likesdislikes`(`post_fk`, `rating`, `user`) VALUES ('$postID','like','$myID')";
      if (mysqli_query($conn, $sql)) {
        echo "liked";
      }

    }else {
      echo "liked before";
    }


  }

  if(!empty($_POST['userDislikeID']) && !empty($_POST['postDate']) && !empty($_POST['dislikes'])){

    $userDislikeID = $_POST['userDislikeID'];
    $postDate = $_POST['postDate'];
    $dislikes = $_POST['dislikes'];

    $newDislikes = (string)(((int)($dislikes)) + 1);

    $sql = "UPDATE posts SET dislikes='$newDislikes' WHERE id_fk='$userDislikeID' AND DateAndTime='$postDate'";
    if (mysqli_query($conn, $sql)) {
      echo "Disliked";
    }else{
      echo "not disliked";
    }


  }
