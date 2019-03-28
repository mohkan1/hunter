<?php
session_start();
include_once 'testphp.php';

/*$page = $_SERVER['PHP_SELF'];
 $sec = "1";
 header("Refresh: $sec; url=$page");
*/
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <title></title>
  </head>

  <style media="screen">

    *{
      margin:0;

    }
    body{
      background-color:white;
    }
    #register{
      width:50%;
      height:auto;
      background-color:#008080;
      display:flex;
      margin-left: auto;
      margin-right: auto;
      font-size:20px;
    }
    form > input{
      width:100%;
    }

    #asd{
      color: red;
    }
    body{
      background-color: gray;

    }

    #container{
      background-color: white;
      width: 50%;
      margin-left: 20%;
      overflow: hidden;
    }

    #user{
      background-color: green;
      width: 50px;
      margin-left: 45%;
      color: white;
    }






  </style>


  <body>
    <p class="show"></p>
    <?php
      if (isset($_SESSION['username'])) {
        echo '<form id="register" action="logout.php" method="POST">
          <button type="submit" name="submit">Log out</button>
        </form>
        <p>You are logged in</p>
        <button id="open" type="submit" name="action" value=1>open</button>
        <button id="close" type="submit" name="action" value=2>close</button>
        <script>

        $("#open").click(function(){
          $.post("getdemo.php",
          {
            command: "1"

          },
          function(test){
          });
        });

        $("#close").click(function(){
          $.post("getdemo.php",
          {
            command: "2"

          },
          function(test){
          });
        });
        </script>

        ';

        echo '<script>
        window.setInterval(function(){
          $.post("getdemo.php",
          {
            command: "doorRightNow"

          },
          function(doorStatus){
            $("#asd").text(doorStatus);
          });
        }, 2000);

        </script>
        <p >The door is </p>
        <p id="asd"></p>
        <br>
        <p>Welcome</p>

        ';
        $user = $_SESSION['username'];
        echo $user;

        echo '<br>
        <br>
        <script>
        window.setInterval(function(){
          $.post("getdemo.php",
          {
            command: "numbersRightNow",

          },
          function(numbers){
            $("#numbers").text(numbers);
          });
        }, 2000);

        </script>
        <p>Temperature</p>
        <p id="numbers"></p>';


        $newID = $_SESSION['id'];
        $result = mysqli_query($conn, "SELECT `images` FROM `login2` WHERE id='$newID'");
        $resultCheck = mysqli_num_rows($result);

        if ($row = mysqli_fetch_array($result)) {
          echo "<img src='images/".$row['images']."'>";
        }

        echo '
        <form method="POST">
            <p id="newsTest">asd</p>
            <button type="submit" id="news" name="news">news</button>
        </form>
        ';

        //Posting
        echo '<form id="register" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">
          <input type="file" name="image">
          <textarea name="text" rows="8" cols="80">Say somthing</textarea>
          <input type="submit" name="upload" value="upload image">
        </form>';

            if (isset($_POST['upload'])) {
              $target = "images/".basename($_FILES['image']['name']);

              $image = $_FILES['image']['name'];
              $text = $_POST['text'];
              $date = date("Y-m-d h:i:sa");
              $id = $_SESSION['id'];
              $username = $_SESSION['username'];

              $sql = "INSERT INTO posts (id_fk, username, images, texts, DateAndTime) VALUES ('$id', '$username', '$image', '$text', '$date')";

              mysqli_query($conn, $sql);

              if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                echo "done";
              }else{
                echo "not done";
              }

        }

            echo '<form method="POST">
              <input type="text" name="value">
              <button type="submit" name="find">search</button>
            </form>';

            if (isset($_POST['find'])) {
              $value = mysqli_real_escape_string($conn, $_POST['value']);
              $sql = "SELECT * FROM login2 WHERE username LIKE '%$value%'";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  echo $row['username']." ".$row['id']." ";
                  echo '<button type="submit" id="'.$row['username']."&".$row['id'].'" class="add" value="'.$row['username']."&".$row['id'].'">Add</button>';
              }
            }else{
              echo "Nothing found";
            }
          }






            //new test bringing other's posts
            $userId = $_SESSION['id'];
            $sql = "SELECT * FROM relations, posts WHERE friend_fk='$userId' AND status='accepted' AND with_fk = id_fk ORDER BY id_pk DESC";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);




            while ($row = mysqli_fetch_array($result)) {
              $numLike = 0;
              $listLike;

              $numDislike = 0;
              $listDislike;
              if ($resultCheck > 0) {
                echo '<div id="container">';
                echo '<p id="user">';
                echo $row['username'];
                echo $row['with_fk'];
                echo '</p>';
                echo "<div id='img_div'>";
                echo "<img src='images/".$row['images']."'>";
                echo "<p>".$row['texts']."</p>";
                echo "</div>";
                $likeId = "like".$row['with_fk']."OCH".$row['id_pk'];
                echo $likeId;
                $dislikeId = "dislike".$row['with_fk']."OCH".$row['id_pk'];
                echo "<p class='$likeId'>Likes: ".$row['likes']."</p>";
                echo "<p class='$dislikeId'>Dislikes: ".$row['dislikes']."</p>";
                $likeIdB = $row['with_fk']."&".$row['id_pk'];
                $dislikeIdB = $row['with_fk']."&".$row['DateAndTime']."$".$row['dislikes'];
                echo '<button type="submit" class="likes" name="like" value="'.$likeIdB.'">Like</button>
                <button type="submit" class="dislikes" name="dislike" value="'.$dislikeIdB.'">dislike</button>';
                echo '</div>';

                //making the array of likes
                $listLike[$numLike] = $likeId;
                $numLike++;
                //making the array of dislikes
                $listDislike[$numDislike] = $dislikeId;
                $numDislike++;

              }
              $GLOBALS['listLikeG'] = $listLike;
              $GLOBALS['lisDislikeG'] = $listDislike;

            }

            /*function flow(){
              $GLOBALS['pass'] = $GLOBALS['pass'] + 1;
              return $GLOBALS['pass'];
            }*/


            //the end of the new test of bringing other's posts

      } else {
        echo '
            <form id="register" action="sendinformation.php" method="POST" enctype="multipart/form-data">
              <p>UserName</p>
              <input type="text" name="username">
              <p>Email</p>
              <input type="text" name="email">
              <p>Password</p>
              <input type="text" name="password">
              <p>keyword</p>
              <input type="text" name="keyword">
              <p>Image</p>
              <input type="file" name="image">
              <button type="submit" name="submit">Sign up</button>
            </form>


                <form id="register" action="loginsql.php" method="POST">
                  <input type="text" name="usernameL" placeholder="Username or Email">
                  <input type="password" name="passwordL" placeholder="Password">
                  <button type="submit" name="submit">Log in</button>
                </form>';




      }




     ?>


     <script>
     $(document).ready(function(){
     $('.add').click(function(){
       $input = $(this).val();
       $and = $input.indexOf("&");

       $len = $input.length;

       $id = $input.substr($and+1, $len);
       $user = $input.substr(0,$and);
       //alert("User: " + $user + " id: " + $id);
       //post request
       $from = "<?php echo $_SESSION['username']; ?>";
       $fromID = "<?php echo $_SESSION['id']; ?>";

       $.post("friendRequest.php",
         {
           from: $from,
           fromID: $fromID,

           to:  $user,
           toID:  $id

         },
          function(data){
            alert(data);

              });



     });


     //chech the if someone sent a friend requested every 5 seconds
     window.setInterval(function(){
       $myID = "<?php echo $_SESSION['id']; ?>";

       $.post("checkFriends.php",
       {
         myID: $myID,

       },
       function(answer){
         if (answer.length != 0) {
           $and = answer.indexOf("&");
           $len = answer.length;
           $id = answer.substr($and+1, $len);
           $user = answer.substr(0, $and);
           $reaction = prompt($user + " " + $id + " sent to you a friend request. Do you accept it (yes or no)");
           if ($reaction == "yes") {
             $from = "<?php echo $_SESSION['username']; ?>";
             $fromID = "<?php echo $_SESSION['id']; ?>";

             $.post("reaction.php",
               {
                 fromID: $fromID,
                 toID:  $id,
                 answer: "yes"

               },
                function(data){
                  alert(data);

                    });
           }else if ($reaction == "no") {
             $from = "<?php echo $_SESSION['username']; ?>";
             $fromID = "<?php echo $_SESSION['id']; ?>";

             $.post("reaction.php",
               {
                 fromID: $fromID,
                 toID:  $id,
                 answer: "no"

               },
                function(data){
                  alert(data);
                    });
           }
         }
       });
     }, 1000);

      //chech if rejected or accepted

      window.setInterval(function(){
        $myID = "<?php echo $_SESSION['id']; ?>";

        $.post("rejectAccept.php",
        {
          myID: $myID

        },
        function(answer){

          if (answer.length > 0) {
            alert(answer);
          }
        });
      }, 1000);


      //like and dislikes

      $('.likes').click(function(){
        $input = $(this).val();
        $len = $input.length;
        $and = $input.indexOf("&");

        $postID = $input.substring($and+1, $len);
        $myID = "<?php echo $_SESSION['id']; ?>";


         $.post("likeDislike.php",
           {
             postID : $postID,
             myID: $myID

           },
            function(data){
              alert(data);
                });

              });


        //dislikes
        $('.dislikes').click(function(){
          $input = $(this).val();
          $len = $input.length;
          $and = $input.indexOf("&");
          $procent = $input.indexOf("$");

          $userDislikeID = $input.substring(0,$and);
          $postDate = $input.substring($and+1, $procent);
          $dislikes = $input.substring($procent+1, $len);


           $.post("likeDislike.php",
             {
               userDislikeID: $userDislikeID,
               postDate: $postDate,
               dislikes: $dislikes

             },
              function(data){
                alert(data);
                  });

                });


        //update likes and dislikes

          window.setInterval(function(){

            $check = "<?php echo $_SESSION['id']; ?>";
         $.post("ChechIfTheUserHasFriends.php",
           {
            check: $check

           },
            function(an){
              if (an == "yes") {

                var listLike = <?php echo json_encode($listLikeG);?>;


                for (var i = 0; i < listLike.length; i++) {
                  $input = listLike[i];
                  $and = $input.indexOf("OCH");
                  $id = $input.substring(4, $and);
                  $postID = $input.substring($and+3, $input.length);

                  $.post("updateLD.php",
                    {
                      id: $id,
                      postID: $postID,
                      status: "like"

                    },
                     function(data){
                       $and = data.indexOf("OCH");
                       $likes = data.indexOf("LIKES");

                       $id = data.substring(4, $and);
                       $postID = data.substring($and+3, $likes);
                       $likes = data.substring($likes+5, data.length);

                        $(".like" + $id + "OCH" + $postID).text("Likes: " + $likes);


                         });

                       }
                  }
                });

      },2000);






      });
     </script>



  </body>
</html>
