<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>User's Profile</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <?php
        session_start();
        if(!isset($_SESSION['unique_id'])){
            header("location:login.php");
        }
        ?>
        <!-- <script defer src="http://localhost:8000/socket.io/socket.io.js"></script>
<script defer src="js/client.js"></script> -->
    </head>
    <body>
        <div class="wrapper-user" style="background: linear-gradient(to bottom, rgb(26, 62, 116) 22%, rgb(5, 107, 138) 0%);">
        <header>
        <?php
             include_once "php/db_connection.php";
             $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);
             $sql=mysqli_query($conn,"SELECT * FROM user where unique_id={$user_id}");
             if(mysqli_num_rows($sql)>0){
                 $row=mysqli_fetch_assoc($sql);
             }
            ?>  
         </header>
            <div class="user">
                <a href="user.php" ><i class="fas fa-arrow-left" style="margin-top:15px;margin-right: 5px;"></i></a>
               <img class=" user-img" src="php/images/<?php echo $row['img'] ?>" height="50" width="50" >
                <div class="user-details">
                <span><?php echo $row['first_name']." ".
             $row['last_name'] ?></span>
                <p style="margin-right: 80px;font-size: small;"><?php echo $row['status'] ?></p>
                </div>
            </div>
                <div class="chat">
                  <!--<div class="pack" >
                    <img  class="chat-img" src="img/sample.jpg">
                    <div class="left">
                    <div class="msg">first message</div>
                    </div>
                  </div>
                    <div class="right">
                    <div class="msg">first message</div>
                  </div>-->
                </div>
            
                <div class="footer">
                  <form action="#" id="send-container" class="send" autocomplete="off">
                    <input type="text" name="senderId" value="<?php echo $_SESSION['unique_id']; ?>" hidden  ></input>
                    <input type="text" name="recId" value="<?php echo $user_id;  ?>" hidden ></input> 
                    <input type="text" name="messageInp" id="messageInp" class="messageInp" placeholder="Type a message" >
                    <button class="btn" type="submit" ><i class="fab fa-telegram-plane" style="height:10px;"></i></button>
                  </form>
                </div>
            

     <script src="main.js"></script>

    </body>
</html>