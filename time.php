<?php
  $date = date("h:i:sa");
  echo $date;
  $num = strlen($date);
  echo " /Number is ".$num;
  echo " ";
  $pos = substr($date, "0", "2");
  echo " /Position is ".$pos;
 ?>
