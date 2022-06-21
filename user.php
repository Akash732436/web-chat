
<html>
    <head>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>User's Profile</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <!--<script defer src="http://localhost:8000/socket.io/socket.io.js"></script>
        <script defer src="js/client.js"></script> -->
        <?php
        session_start();
        if(!isset($_SESSION['unique_id'])){
            header("location:login.php");
        }
        ?>

    </head>
    <body>
        <div class="wrapper-user">
         <header>
         <?php header('Access-Control-Allow-Origin: *'); ?>
            <?php
             include_once "php/db_connection.php";
             $sql=mysqli_query($conn,"SELECT * FROM user where unique_id={$_SESSION['unique_id']}");
             if(mysqli_num_rows($sql)>0){
                 $row=mysqli_fetch_assoc($sql);
             }
            ?> 
         </header>
         <div class="user">
            <img class="user-img" src="php/images/<?php echo $row['img'] ?>" height="50" width="50" >
             <div class="user-details">
             <span><?php echo $row['first_name']." ".
             $row['last_name'] ?></span>
             <p style="margin-right: 80px;"><?php echo $row['status'] ?></p>
             </div>
             <div class="logout">
             <a href="logout.php">Logout</a>
             </div>
        </div>
        
        <div class="search-bar">
         <span class="text">Select an user to start chat</span>
         <input type="text" placeholder="Search here">
         <button><i class="fa fa-search"></i></button>
         </div>
         
         <div class="user-info">
              
         </div>
         
        </div>
        <script src="users.js"></script>
    </body>
</html>