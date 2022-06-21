<?php
 session_start();
 if(!isset($_SESSION['unique_id'])){
     header("location:login.php");}
include_once "db_connection.php";

$searchTerm=mysqli_real_escape_string($conn,$_POST['searchTerm']);
$output="";
$sql=mysqli_query($conn,"SELECT * FROM user WHERE (first_name LIKE '%{$searchTerm}%' OR last_name LIKE '%{$searchTerm}%') AND unique_id != {$_SESSION['unique_id']} ");
if(mysqli_num_rows($sql)>0){
    include "data.php";
}else{
    $output.="No user found";
}
echo $output;
?>