<?php
  session_start();   // to active session we have to write session_start at the top.
  include("connect.php");     //database connection is done in separte file so just include here.

  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $check = mysqli_query($connect, "SELECT * from user WHERE mobile = '$mobile' AND password = '$password' AND role = '$role'");

  if(mysqli_num_rows($check) > 0)  //This function will check how many rows are return.
  {
     $userdata = mysqli_fetch_array($check);   // Single user data is taken so mysqli_fetch_array is used
     $groups = mysqli_query($connect, "SELECT * FROM user WHERE role = 2 ");
     $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);  // multiple user data so mysqli_fetch_all is taken.

     $_SESSION['userdata'] = $userdata;
     $_SESSION['groupsdata'] = $groupsdata;

     echo '
       <script>
          window.location = "../routes/dashboard.php";
       </script>
      ';
    }

  else
  {
    echo '
         <script>
            alert("Invalid Credentials or User not found!");
            window.location = "../";
         </script>
        ';
  }
?>