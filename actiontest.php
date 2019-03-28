<?php
  include_once 'testphp.php';
  error_reporting(E_ALL);


$open = filter_input(INPUT_POST, "open", FILTER_SANITIZE_NUMBER_INT);

if($open == 1) {
  $sql = "UPDATE `doortest` SET action='open' WHERE command = 'door'";
  mysqli_query($conn, $sql);
}

if($open == 2) {
  $sql = "UPDATE `doortest` SET action='close' WHERE command = 'door'";
  mysqli_query($conn, $sql);
}

header('Location: ../update.html');


?>
