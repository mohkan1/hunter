<?php


  $username = filter_input(INPUT_GET, "username", FILTER_SANITIZE_STRING);


  echo "$username";

 ?>
