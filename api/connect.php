<?php
   
  $connect = mysqli_connect("127.0.0.1:3307", "root", "", "voting") or die("connection failed!");

  if($connect)
   {
    echo "Connected!";
   }
  
  else
   {
    echo "Not Connected!";
   }

?>