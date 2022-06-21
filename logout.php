<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location:login.php");
}
include_once "php/db_connection.php";
$stat="In Active";
$sql=mysqli_query($conn,"UPDATE user SET status='{$stat}' WHERE unique_id={$_SESSION['unique_id']}");
if($sql){
    echo "Success";
    session_unset();
    session_destroy();
    header("location:login.php");
}
else{
    echo "Something went wrong";
}

?>