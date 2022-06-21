<html>
  <head>

</head>
<body>
<?php
session_start();
include_once "db_connection.php";
if(!isset($_SESSION['unique_id'])){
    header("location:login.php");
}
$output="";
$sql1=mysqli_query($conn,"SELECT * FROM user WHERE unique_id='{$_SESSION['unique_id']}'");
      if(mysqli_num_rows($sql1)>0){
        $row1=mysqli_fetch_assoc($sql1);
      }
$sql=mysqli_query($conn,"SELECT * FROM user WHERE unique_id != {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql)==0){
 $output.="No users available";
}elseif(mysqli_num_rows($sql)>0){
  while($row=mysqli_fetch_assoc($sql)){
      $send_id=$row['unique_id'];
      $rec_id=$_SESSION['unique_id'];
      $last=mysqli_query($conn,"SELECT * FROM messages where 
        id= (SELECT MAX(id) FROM messages WHERE (sender_id={$send_id} AND reciver_id={$rec_id}) OR 
        (sender_id={$rec_id} AND reciver_id={$send_id}))");
      $lastMes='';
      if(mysqli_num_rows($last)>0){
         $row2=mysqli_fetch_assoc($last);
         $lastMes=$row2['msg'];
      }
      $color=$row['status']=="Active"?"green":"grey";
      $output.='<a href= "main.php?user_id=' .$row['unique_id'] .'">
                 <div class="wrap">
                 <img class="user-img" src="php/images/' .$row['img'] .'" height="40" width="40">
                 <div class="user-name">
                 <span>' . $row['first_name'] . " " . $row['last_name'] . '</span>
                 <i class="fa fa-circle" style="color:' .$color .';"></i> 
                 <p>' .$lastMes .'</p> 
                 </div>
                 </div>
                 </a>';
  }
}
echo $output;
?>
</body>
</html>