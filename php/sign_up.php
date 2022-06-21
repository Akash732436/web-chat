<?php
session_start();
 include_once "db_connection.php";
 $fname= mysqli_real_escape_string($conn,$_POST['first']);
 $lname= mysqli_real_escape_string($conn,$_POST['second']);
 $email= mysqli_real_escape_string($conn,$_POST['email']);
 $password= mysqli_real_escape_string($conn,$_POST['password']);
 //$photo= mysqli_real_escape_string($conn,$_POST['photo']);
 if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
       $sql=mysqli_query($conn,"SELECT email FROM user WHERE email='{$email}'");
       if(mysqli_num_rows($sql)>0){
           echo "$email - already exist!";
       }
       else{
           if(isset($_FILES['image'])){
             $img_name=$_FILES['image']['name'];
             $img_type=$_FILES['image']['type'];
             $temp_name=$_FILES['image']['tmp_name'];
             $img_explode=explode('.',$img_name);
             $img_ext=end($img_explode);
             $extensions=['png','jpeg','jpg'];
             if(in_array($img_ext,$extensions)==true){
              $time=time();
              $new_img_name=$time.$img_name;
              if(move_uploaded_file($temp_name,"images/".$new_img_name)){
              $status="Active now";
              $random_id=rand(time(),10000000);
              $sql2=mysqli_query($conn,"INSERT INTO user (unique_id,first_name,last_name,email,password,img,status) 
              VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
              if($sql2){
                  $sql3=mysqli_query($conn,"SELECT * FROM user where email='{$email}'");
                  if(mysqli_num_rows($sql3)>0){
                      $row=mysqli_fetch_assoc($sql3);
                      
                      echo "success";
                  }
              }else{
                  echo "Something went wrong!";
              }
            }else{
                echo "Can not move!";
            }

             }
             else{
                 echo"Please select an Image File";
             }
           }else{
               echo "please select an Image file!";
           }
       }
   }
    else{
        echo "$email is not a valid email";
    }
 }
 else{
     echo "All the Input Fields are Required!";
 }
?>