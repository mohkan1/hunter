<?php

if (isset($_SESSION['username'])) {


       $bdServername = "localhost";
       $bdUsername = "root";
       $dbPassword = "";
       $bdName = "test";

       $connUser = mysqli_connect($bdServername, $bdUsername, $dbPassword, $bdName); // connectin to the new database of the user

}
