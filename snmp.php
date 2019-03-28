<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $request = snmp2_get("192.168.30.1", "public", "system.sysUpTime.0");
    echo $request;
     ?>
  </body>
</html>
