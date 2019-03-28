<?php
include_once 'testphp.php';
$newName = 'first';
$sql = "CREATE DATABASE $newName";

if (mysqli_query($conn, $sql)) {
  echo "done";
}
