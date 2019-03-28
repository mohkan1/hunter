<?php include('loginsql.php'); ?>
<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="main.css">
</head>
<style media="screen">
  body{
    background-color: #066380;
  }

  .register{
    background-color: white;
    display: flex;
    margin-left: 30%;
    margin-right: 30%;
  }

  #register{
    background-color: white;
    display: flex;
    margin-left: 30%;
    margin-right: 30%;
  }
  .post{
    background-color: white;
    overflow: hidden;
  }
  .title{
    text-align: center;
  }
</style>
<body>
  <?php

  if (isset($_SESSION['username'])) {
    echo '<h1 class="title">HUNTER</h1>';
    echo '<div id="request" class="request">asd</div>';
    echo '<div class="register">Welcome '.$_SESSION['username']." ".$_SESSION['id'].'</div>';
    echo '<form class="register" action="logout.php" method="POST">
      <button type="submit" name="submit">Log out</button>
    </form>';

    echo '<div id="register" class="search-box">
        <input type="text" autocomplete="off" placeholder="Search for friends..." />
        <a href="addFriend.php" class="result"></a>
    </div>';

    echo '<br><br><br><br><br><br>';



    echo '  <form class="register" method="POST" enctype="multipart/form-data" action="server.php">
        <input type="hidden" name="size" value="1000000">
        <input type="file" name="image">
        <textarea name="text" rows="8" cols="80" placeholder="What do you think about?"></textarea>
        <input type="submit" name="upload" value="POST">
      </form>';

      echo '<div class="posts-wrapper">';
        foreach ($posts as $post):
        echo '<div class="post">';
          echo $post['user_fk'];
          echo '<br>';
           echo $post['text'];

           echo "postID: ".$post['idPostPK'];
           echo '<div class="post-info">';
           echo '<i';
            if (userLiked($post['idPostPK'])){
               	  echo ' class="fa fa-thumbs-up like-btn" data-id="'.$post['idPostPK'].'"></i>';
            }

           	   else{
                 echo  ' class="fa fa-thumbs-o-up like-btn"  data-id="'.$post['idPostPK'].'"></i>';
                }


           echo '<span class="likes" id="like'.$post['idPostPK'].'">'.getLikes($post['idPostPK']).'</span>';


            echo '&nbsp;&nbsp;&nbsp;&nbsp;';


            echo '<!-- if user dislikes post, style button differently -->';
            echo '<i';
            if (userDisliked($post['idPostPK'])){
              echo ' class="fa fa-thumbs-down dislike-btn data-id="'.$post['idPostPK'].'"></i>';
            }else {
              echo ' class="fa fa-thumbs-o-down dislike-btn" data-id="'.$post['idPostPK'].'"></i>';
            }
            echo '<span class="dislikes">'.getDislikes($post['idPostPK']).'</span>';

          echo '</div>';
          echo "<img src='images/".$post['images']."'>";
        echo '</div>';

      endforeach;
       echo '</div>';
       echo '<script src="scripts.js"></script>';

       $postIDs = array();
       foreach ($posts as $post) {
         array_push($postIDs, $post['idPostPK']);
       }
       $GLOBALS['postIDS'] = json_encode($postIDs);



  }else{
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
   <script type="text/javascript">
   $(document).ready(function(){

   $('.search-box input[type="text"]').on("keyup input", function(){
       /* Get input value on change */
       var inputVal = $(this).val();
       var resultDropdown = $(this).siblings(".result");
       if(inputVal.length){
           $.get("backend-search.php", {term: inputVal}).done(function(data){
               // Display the returned data in browser
               input = JSON.parse(data);
              resultDropdown.html(input);


           });
       } else{
           resultDropdown.empty();
       }
   });
/*

   //checking friend requests
   window.setInterval(function(){
     $.post("checkFriends.php",
     {
       myID: $myID

     },
     function(data){
       $list = JSON.parse(data);
      // $('#request').html($list);
      $list.forEach(function(postID) {
        var btn = document.createElement("BUTTON");
        var t = document.createTextNode(postID);
        btn.appendChild(t);

        btn.addEventListener("click", function(){
        alert("got it bruh");
        });

        document.getElementById("request").appendChild(btn);

      });
     });
   }, 1000);

*/


   $('.add').on("click", function(){
     /*$myID =
     $withID = $(this).val();
     alert("asd");
     $.post("acceptRefuse.php",
     {
       myID: $myID,
       withID: $withID,
       status: "accept"

     },
     function(data){
       alert(data);
     });
     */
     console.log("hej");
    alert("asd");
   });



 });
   // Set search input value on click of result item
   $(document).on("click", ".result p", function(){
       $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
       $(this).parent(".result").empty();
   });

//updating likes and dislikes
   window.setInterval(function(){
     postIDS = <?php echo $postIDS; ?>;
      postIDS.forEach(function(postID) {
        likes =  <?php echo getLikes(8); ?>;
        $('#like7').text(likes);

      });

   }, 2000);


   </script>

</body>
</html>
