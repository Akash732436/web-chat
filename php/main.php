<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location:login.php");
}
else{
include_once "db_connection.php";
$sendId=mysqli_real_escape_string($conn,$_POST['senderId']);
$recId=mysqli_real_escape_string($conn,$_POST['recId']);
$message=mysqli_real_escape_string($conn,$_POST['messageInp']);
if(!empty($message)){
   $sql=mysqli_query($conn,"INSERT INTO messages(sender_id,reciver_id,msg) 
   VALUES ({$sendId},{$recId},'{$message}')") or die();
}else{
    echo "some error";
}
}



?>