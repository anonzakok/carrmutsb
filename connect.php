<?php 
    $conn = new mysqli('localhost','root','password','car_rmutsb');

      if( $conn->connect_errno){
             die("Connection failed" . $conn->connect_error); 
      } 
     
?>
