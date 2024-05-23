<?php
   include("connect.php");    // connecting database taking from connect.php
   $name = $_POST['name'];
   $mobile = $_POST['mobile'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $address= $_POST['address'];
   $image = $_FILES['photo']['name'];
   $temp_name = $_FILES['photo']['temp_name'];
   $role = $_POST['role'];

   if($password == $cpassword)
   {
     move_uploaded_file($temp_name, "../uploads/$image");  //uploaded image will be move to this location.
     $insert = mysqli_query($connect,"INSERT INTO user (name,mobile,password,address,photo,role,status,votes) 
     values ('$name','$mobile','$password','$address','$image','$role', 0, 0);");                 
                                  // by using mysqli_query function data we can delete,add,edit,update 
      if($insert)
      {
        echo '
        <script>    
           alert("Registration Sucessfull!");
           window.location = "../";
        </script>';
      }
      else
      {
        echo '
        <script>    
           alert("Some error occured!");
           window.location = "../routes/register.html";
        </script>';
      }
   }

   else
   {
     echo '
           <script>    
             alert("Password and Confirm Password does not match!");
             window.location = "../routes/register.html";
           </script>'; // if password does not watch it will go again to register page.
   }
?>