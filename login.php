<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>เข้าสู่ระบบ</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <style> 
    body{font-family: 'Prompt', sans-serif;}
   </style>
</head>

<body class="bg-dark">
    <?php
    include_once('connect.php');
   /* $sql = "SET character_set_results=tis620";
    $result = $conn->query($sql);
    $sql = "SET character_set_client=tis620";
    $result = $conn->query($sql);
    $sql = "SET character_set_connection=tis620";
    $result = $conn->query($sql);*/
    mysqli_set_charset($conn, "utf8");
  if (isset($_POST['Submit'])) {

      $username =  $_POST['username'];
      $password = $conn->real_escape_string($_POST['password']);
      $_SESSION['status'] = $_POST['username'];
      $sql = "SELECT * FROM `user` WHERE `username` = '".$username."' AND `pass` = '".$password."'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
         
          $row = $result->fetch_assoc();
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['position'] = $row['position'];
          $_SESSION['faculty'] = $row['faculty'];
          $_SESSION['branch'] = $row['branch'];
          $_SESSION['tell'] = $row['tell'];
          $_SESSION['status'] = $row['status'];
      
      }
      if($_SESSION['status'] == 'm'){
          header('location:index.php');
      }
      if($_SESSION['status'] == 'a'){
          header('location:index.php');
      }
      if($_SESSION['status'] == 't'){
          header('location:index.php');
      }else{
         echo "<script> alert('username หรือ password ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');;
        </script>";
      }
 
  }
  
 
?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
      <i class="fa fa-car" aria-hidden="true"></i>
      <b>ระบบจัดการยานพาหนะ</b></div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name ="username" class="form-control" placeholder="username" required="required" autofocus="autofocus">
              <label for="username">ชื่อผู้ใช้</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="password">รหัสผ่าน</label>
            </div>
          </div>
          
          <div class="card-footer text-center">
            <input type="Submit" name="Submit" class="btn btn-success" value="เข้าสู่ระบบ"> 
            <a href="index.php"class="btn btn-danger" >ยกเลิก</a>          
          </div> 
          
        </form>
        
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
