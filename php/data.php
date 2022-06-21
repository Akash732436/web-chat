<?php

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
?>