<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>เพิ่ม บัญชีผู้ใช้</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- font ansome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <style> 
    body{font-family: 'Prompt', sans-serif;}
   </style>
</head>

<body id="page-top">
<?php
          include_once('connect.php');
          mysqli_set_charset($conn, "utf8");
        if (isset($_POST['Submit'])) {
            // echo $_POST['wait']. "<br>";
            // echo $_POST['tell']. "<br>";
            // echo $_POST['fac']. "<br>";
            // echo $_POST['repo']. "<br>";
            // echo $_POST['people']. "<br>";
            // echo $_POST['idid']. "<br>";
            // echo $_POST['time_go']. "<br>";
            // echo $_POST['type_car']. "<br>";
            // echo $_POST['place']. "<br>";
            // echo $_POST['driver']. "<br>";
            // echo $_POST['note']. "<br>";
            $sql = "INSERT INTO `user` (`id`, `name`, `position`, `faculty`, `branch`, `tell`, `username`, `pass`, `status`) 
                    VALUES (NULL, '".$_POST['name']."', '".$_POST['pos']."', '".$_POST['fac']."', '".$_POST['bra']."', '".$_POST['tell']."', '".$_POST['username']."', '".$_POST['pass']."', 'a');";
                    
                $result = $conn->query($sql);  
            if($result){
                    echo "<script>";
                    echo "alert('บันทึกสำเร็จ');";
                    echo "</script>";
            }else{
                    echo "<script>";
                    echo "alert('กรุณากรอกข้อมูลให้ครบ');";
                    echo "</script>";
            }
        }
    ?>
    <?php if (empty($_SESSION['status'])){
     header('location:login.php');
  } else{?>

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i>
        </button>

        <a class="navbar-brand mr-1" href="index.php"><img src="logo.png"  width="70" height="70"> ระบบจัดการรถ ศูนย์สุพรรณบุรี</a>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
    <?php if (isset($_SESSION['status'])){
            if($_SESSION['status']=='a'){?>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"> </i>
              <span><?php echo $_SESSION['name'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
              <a class="dropdown-item" href="recar.php">พิมพ์ ใบขอใช้รถยนต์</a>
  
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">ออกจากระบบ</a>
            </div>
          </li>
          <li class="nav-item ">
        <a class="nav-link" href="fullcalendar3.6.2.php">
        <i class="fa fa-calendar" aria-hidden="true"></i>
          <span>ปฏิทิน การออกรถ</span>
        </a>
      </li> 
          <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-table fas"></i>
          <span>ตารางการออกรถ</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.php">
        <i class="fa fa-address-card-o" aria-hidden="true"></i>
          <span>รายชื่อพนักงานขับรถ</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="listcar.php">
        <i class="fa fa-car" aria-hidden="true"></i>
          <span>รายละเอียดยานพาหนะ</span></a>
      </li>
    </ul>
      <?php } if ($_SESSION['status']=='m'){?>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"> </i>
              <span><?php echo $_SESSION['name'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <h6 class="dropdown-header">จัดการตารางออกรถ:</h6>
              <a class="dropdown-item" href="addbooking.php">เพิ่ม ตารางออกรถ</a>
              <a class="dropdown-item" href="dellist.php">ลบ ตารางออกรถ</a>
              <a class="dropdown-item" href="editbooking.php">แก้ไข ตารางออกรถ</a>
              <a class="dropdown-item" href="admin1.php">รายการรออนุมัติ</a>
              <h6 class="dropdown-header">จัดการบัญชีสมาชิก:</h6>
              <a class="dropdown-item" href="adduser.php">เพิ่ม บัญชีสมาชิก</a>
              <a class="dropdown-item" href="deluser.php">ลบ บัญชีสมาชิก</a>
              <h6 class="dropdown-header">รายงานการใช้วัสดุเชื้อเพลิง:</h6>
              <a class="dropdown-item" href="addex.php">เพิ่ม รายการใข้เชื้อเพลิง</a>
              <a class="dropdown-item" href="delex.php">ลบ รายการใข้เชื้อเพลิง</a>
              <a class="dropdown-item" href="sum.php">สรุป รายการใข้เชื้อเพลิง</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">ออกจากระบบ</a>
            </div>
          </li>
          <li class="nav-item ">
        <a class="nav-link" href="fullcalendar3.6.2.php">
        <i class="fa fa-calendar" aria-hidden="true"></i>
          <span>ปฏิทิน การออกรถ</span>
        </a>
      </li> 
          <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-table fas"></i>
          <span>ตารางการออกรถ</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.php">
        <i class="fa fa-address-card-o" aria-hidden="true"></i>
          <span>รายชื่อพนักงานขับรถ</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="listcar.php">
        <i class="fa fa-car" aria-hidden="true"></i>
          <span>รายละเอียดยานพาหนะ</span></a>
      </li>
      </ul>
  
    
          <?php } }else {?>   
            <li class="nav-item ">
        <a class="nav-link" href="fullcalendar3.6.2.php">
        <i class="fa fa-calendar" aria-hidden="true"></i>
          <span>ปฏิทิน การออกรถ</span>
        </a>
      </li>  

      <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-table fas"></i>
          <span>ตารางการออกรถ</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.php">
        <i class="fa fa-address-card-o" aria-hidden="true"></i>
          <span>รายชื่อพนักงานขับรถ</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="listcar.php">
        <i class="fa fa-car" aria-hidden="true"></i>
          <span>รายละเอียดยานพาหนะ</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="login.php">
          <i class="fas fa-user-circle fa-fw"></i>
          <span>เข้าสู่ระบบ</span>
        </a>
      </li>
      <?php } ?>
    </ul>
    
       

    <div id="content-wrapper">

    <div class="container-fluid">
      <!-- form เพิ่มข้อมูล -->
    <div class="container">
         <div class="row">
            <div class="col-md-8 mx-auto mt-5 ">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                        <h3><b>++เพิ่มบัญชีสมาชิก++</b></h3></br>
                            <h5>กรุณากรอกข้อมูลให้ครบทุกช่อง!!</h5>
                        </div>
                        <div class="card-body">
                        
                           
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pos" class="col-sm-3 col-form-label">ตำแหน่ง</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pos" name="pos" required>
                                </div> 
                            </div> 
                            

                            <div class="form-group row">
                                <label for="fac" class="col-sm-3 col-form-label">คณะ</label>
                                    <div class="col-sm-9">
                                    <select id="fac" class="form-control" name="fac" required>
                                        <option selected>คณะวิทยาศาสตร์และเทคโนโลยี</option>
                                        <option>คณะครุศาสตร์อุตสาหกรรม</option>
                                        <option>คณะเทคโนโลยีการเกษตรและอุตสาหกรรมเกษตร</option>
                                        <option>คณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ</option>
                                        <option>คณะวิศวกรรมศาสตร์และสถาปัยกรรมศาสตร์</option>
                                        <option>คณะศิลปศาสตร์</option>
                                    </select>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="bra" class="col-sm-3 col-form-label">สาขา</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bra" name="bra" required>
                                </div> 
                            </div> 
                            <div class="form-group row">
                                <label for="tell" class="col-sm-3 col-form-label">เบอร์โทร</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tell" name="tell" required>
                                </div> 
                            </div> 
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">ชื่อผู้ใช้</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pass" name="pass" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                               <input type="Submit" name="Submit" class="btn btn-success" value="เพิ่ม">
                         
                            </div> 
                        </div>
                    </form>
                </div>
            </div>  
         </div> 
      </div>
      
      <?php
// Easy Counter by DwThai.Com

if(file_exists("addusercount.txt")){ 
  // file_exists() คือ Function ที่ใช้ในการตรวจสอบไฟล์ หากไฟล์นั้นมีอยู่จริงจะคืนค่า true 
  
     $f=fopen("addusercount.txt","r"); //เปิดไฟล์เพื่ออ่านค่า
  /* fopen() เป็นการเปิดไฟล์ตามที่ และเราจำเป็นต้องกำหนด Option ให้แก่การเปิดไฟล์ด้วย Option ต่าง ๆ ดังนี้ 
  r สำหรับการอ่านไฟล์ 
  w สำหรับการเขียนไฟล์ และข้อมูลจะถูกเขียนทับใหม่ทั้งหมด
  a สำหรับการเขียนไฟล์ แต่ข้อมูลจะถูกเขียนต่อข้อมูลเดิมที่มีอยู่ในไฟล์นั้น
  */ 
  
     $data=fread($f,5); 
  // fread() เป็นการอ่านไฟล์ เลข 5 คือจำนวน byte ของข้อมูลที่ต้องการอ่านค่า
     fclose($f);
     $data++;
  
  }else{
  
     $data=0;
  
  }
  
  //เขียนข้อมูลลงไฟล์
  $f=fopen("addusercount.txt","w");
  fputs($f,$data); 
  fclose($f);
  
  $data=sprintf("%d",$data);
  /* 
  %05d คือ Option ที่ใช้ในการกำหนดรูปแบบของตัวเลข
  ส่วนของเลข 5 สามารถกำหนดได้ตามต้องการ จะเป็นการกำหนดจำนวนหลักของตัวเลขที่แสดงผล โดยถ้าจำนวนหลักน้อยกว่าตัวเลขที่กำหนด จะนำเลข 0 นำหน้าตัวเลขนั้นให้ครบ 5 หลัก เป็นต้น
  */ 
  

  echo "<div class='card-footer small text-muted'> <p align = 'right'> จำนวนผู้เยี่ยมชม <b>$data</b> ครั้ง </p> </div>";
?>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ต้องการออกจากระบบ ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">เลือก "ออกจากระบบ" ด้านล่างหากคุณต้องการออกจากระบบ</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-danger" href="logout.php">ออกจากระบบ</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->

  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
 
  <?php }?>
</body>
</html>