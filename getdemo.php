<?php

  include_once 'testphp.php';

    if(!empty($_POST['command'])){
    	$command = $_POST['command'];

      switch ($command) {
        case 'door':  //Cheking for actions

              $sql = "SELECT * FROM doortest WHERE command='door'";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              if ($resultCheck > 0) {
                if ($row = mysqli_fetch_assoc($result)) {
                  $return = $row['action'];
                  echo $return;
                  $sql = "UPDATE doortest SET action='nothing' WHERE command='door'";
                  mysqli_query($conn, $sql);

                } else {
                  echo "NOT HELLO";
                }

              }else{
                echo "data couldn't be brought from the database";

              }

          break;

          case 'opened':  //Inserting that the door is opened
          date_default_timezone_set("Europe/Stockholm");
          $date = date("Y-m-d h:i:sa");

            $sql = "UPDATE doortest SET rightnow='opened', DateAndTime='$date' WHERE command='door'";
            mysqli_query($conn, $sql);
            echo "done";

          break;

          case 'closed': //Inserting that the door is closed

          date_default_timezone_set("Europe/Stockholm");
          $date = date("Y-m-d h:i:sa");

            $sql = "UPDATE doortest SET rightnow='closed', DateAndTime = '$date' WHERE command='door'";
            mysqli_query($conn, $sql);
            echo "done";
          break;

          case 'doorRightNow': //Check if the door is already closed or opened

                $sql = "SELECT * FROM doortest WHERE command='door'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                  if ($row = mysqli_fetch_assoc($result)) {
                    $return = $row['rightnow'];
                    echo $return;

                  } else {
                    echo "NOT HELLO";
                  }

                }else{
                  echo "data couldn't be brought from the database";

                }

            break;

            case 'numbersRightNow': //Chechs the temperature

            $sql = "SELECT `numbers` FROM `numbers`";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              if ($row = mysqli_fetch_assoc($result)) {
                $return = $row['numbers'];
                echo $return;

              } else {
                echo "NOT HELLO";
              }

            }else{
              echo "data couldn't be brought from the database";

            }


              break;


            case '1': //Open the door from the website
            $sql = "UPDATE `doortest` SET action='open' WHERE command = 'door'";
            mysqli_query($conn, $sql);
              break;

              case '2': //Close the door from the website
              $sql = "UPDATE `doortest` SET action='close' WHERE command = 'door'";
              mysqli_query($conn, $sql);
                break;

        default:
        echo "Command not found";
          break;
      }



	}


      if(!empty($_POST['numbers'])){ //Inserting the numbers from arduino to the database
      	$command = $_POST['numbers'];

        $sql = "UPDATE numbers SET numbers='$command'";
        if (mysqli_query($conn, $sql)) {
          echo "done numbers";
        } else {
          echo "not done numbers";
        }

      }

	$conn->close();
?>
