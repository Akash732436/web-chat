<?php
session_start();
include_once "db_connection.php";
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
if(!empty($email) && !empty($password)){
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE email='{$email}'");
    if(mysqli_num_rows($sql)>0){
        $row=mysqli_fetch_assoc($sql);
        $ans=$row['password'];
        if($ans==$password){
         $_SESSION['unique_id']=$row['unique_id'];
         $stat="Active";
         $sql2=mysqli_query($conn,"UPDATE user SET status='{$stat}' WHERE unique_id={$_SESSION['unique_id']}");
         if($sql2){
         echo "success";}
         else{
             echo "Something went wrong";
         }
        }
        else{
            echo "Incorrect Password";
        }

    }else{
        echo "No Account exist! Please Sign in";
    }

}else{
    echo "All Input Fields are Required";
}
?>