<?php

include_once 'testphp.php';

$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_NUMBER_INT);


if($action == 1) {
  $sql = "UPDATE `doortest` SET action='open' WHERE command = 'door'";
  mysqli_query($conn, $sql);
  header("Location: ../login.php?openDoor");
}

if($action == 2) {
  $sql = "UPDATE `doortest` SET action='close' WHERE command = 'door'";
  mysqli_query($conn, $sql);
  header("Location: ../login.php?closeDoor");
}

header('Location: ../login.php');


 ?>
