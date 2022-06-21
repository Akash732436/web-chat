<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location:login.php");
}
else{
    include_once "db_connection.php";
    $sendId=mysqli_real_escape_string($conn,$_POST['senderId']);
    $recId=mysqli_real_escape_string($conn,$_POST['recId']);
    $output="";
    $sql="SELECT * FROM messages 
    LEFT JOIN user ON user.unique_id=messages.sender_id
    WHERE (sender_id={$sendId} AND reciver_id={$recId} )
    OR (sender_id={$recId} AND reciver_id={$sendId}) order by id asc";
    $querry=mysqli_query($conn,$sql);
    if(mysqli_num_rows($querry)>0){
        while($row=mysqli_fetch_assoc($querry)){
            if($row['sender_id'] == $sendId){
               $output.='<div class="right">
               <div class="msg">' .$row['msg'] .'</div>
               </div>';
            }else{
                $output.='<div class="pack" >
                <img  class="chat-img" src="php/images/' .$row['img'] .' ">
                <div class="left">
                <div class="msg">' .$row['msg'] .'</div>
                </div>
              </div>';
            }
        }
        echo $output;
        
    }
}



?>