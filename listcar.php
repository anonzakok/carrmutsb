<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>รายละเอียดยานพาหนะ</title>

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

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  <a class="navbar-brand mr-1" href="index.php"><img src="logo.png"  width="70" height="70"> ระบบจัดการรถ ศูนย์สุพรรณบุรี</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i>
        </button>

     

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
    <?php if (isset($_SESSION['status'])){
            if($_SESSION['status']=='a'){?>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"> </i>
              <span><?php echo $_SESSION['name'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
              <a class="dropdown-item" href="recar.php">พิมพ์ ใบขอใช้รถยนต์</a>
              <a class="dropdown-item" href="userrecar.php">ดูรายการที่รออนุมัติ</a>

  
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

      <li class="nav-item ">
        <a class="nav-link" href="tables.php">
        <i class="fa fa-address-card-o" aria-hidden="true"></i>
          <span>รายชื่อพนักงานขับรถ</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="listcar.php">
        <i class="fa fa-car" aria-hidden="true"></i>
          <span>รายละเอียดยานพาหนะ</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tutorial.php">
        <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
          <span>วีดีโอสอนใช้งานระบบ</span></a>
      </li>
    </ul>

      <?php } if ($_SESSION['status']=='m'){?>
        <li class="nav-item dropdown ">
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
              <a class="dropdown-item" href="addex.php">เพิ่ม รายการใช้เชื้อเพลิง</a>
              <a class="dropdown-item" href="delex.php">ลบ รายการใช้เชื้อเพลิง</a>
              <a class="dropdown-item" href="sum.php">สรุป รายการใช้เชื้อเพลิง</a>
              <h6 class="dropdown-header">รายงานการซ่อมบำรุง:</h6>
              <a class="dropdown-item" href="repair.php">ข้อมูล การซ่อมบำรุง</a>
              <a class="dropdown-item" href="sumrepair.php">สรุป การซ่อมบำรุง</a>
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
 
      <li class="nav-item ">
        <a class="nav-link" href="tables.php">
        <i class="fa fa-address-card-o" aria-hidden="true"></i>
          <span>รายชื่อพนักงานขับรถ</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="listcar.php">
        <i class="fa fa-car" aria-hidden="true"></i>
          <span>รายละเอียดยานพาหนะ</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tutorial.php">
        <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
          <span>วีดีโอสอนใช้งานระบบ</span></a>
      </li>
      </ul>
      <?php } if ($_SESSION['status']=='t'){?>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"> </i>
              <span><?php echo $_SESSION['name'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="recar.php">พิมพ์ ใบขอใช้รถยนต์</a>
              <h6 class="dropdown-header">รายงานการใช้วัสดุเชื้อเพลิง:</h6>
              <a class="dropdown-item" href="sum.php">สรุป รายการใข้เชื้อเพลิง</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">ออกจากระบบ</a>
            </div>
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
      <li class="nav-item active">
        <a class="nav-link" href="listcar.php">
        <i class="fa fa-car" aria-hidden="true"></i>
          <span>รายละเอียดยานพาหนะ</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tutorial.php">
        <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
          <span>วีดีโอสอนใช้งานระบบ</span></a>
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

      <li class="nav-item ">
        <a class="nav-link" href="tables.php">
        <i class="fa fa-address-card-o" aria-hidden="true"></i>
          <span>รายชื่อพนักงานขับรถ</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="listcar.php">
        <i class="fa fa-car" aria-hidden="true"></i>
          <span>รายละเอียดยานพาหนะ</span></a>
      </li>       
      <li class="nav-item">
        <a class="nav-link" href="tutorial.php">
        <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
          <span>วีดีโอสอนใช้งานระบบ</span></a>
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
  
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
          <i class="fa fa-car" aria-hidden="true"></i>
          รายละเอียดยานพาหนะ</div>
          <div class="card-body">
            <div class="table-responsive">
              <table border="1">
                
                <tbody>
                  <tr>
                    <td><img src="img/3805.jpg"  width="250" height="250"></td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ทะเบียน&nbsp;&nbsp;&nbsp; :</b>&nbsp;นค - 3805  </br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จังหวัด&nbsp;&nbsp;&nbsp; :</b>&nbsp;พระนครศรีอยุธยา&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ประเภท&nbsp;&nbsp;&nbsp; :</b>&nbsp;รถตู้&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ยี่ห้อ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;TOYOTA&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สถานะ &nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;ปกติ&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จำนวนที่นั่ง :</b>&nbsp;<b><u>6</u></b> ที่นั่ง&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>พนักงานประจำรถ :</b>&nbsp;นายสราวุธ ดวงแก้ว&nbsp;</br>
                         </td>
                  
                  </tr>
                  <tr>
                    <td><img src="img/4282.jpg"  width="250" height="250"></td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ทะเบียน&nbsp;&nbsp;&nbsp; :</b>&nbsp;นข - 4282  </br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จังหวัด&nbsp;&nbsp;&nbsp; :</b>&nbsp;สุพรรณบุรี&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ประเภท&nbsp;&nbsp;&nbsp; :</b>&nbsp;รถตู้&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ยี่ห้อ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;TOYOTA&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สถานะ &nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;ปกติ&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จำนวนที่นั่ง :</b>&nbsp;<b><u>13</u></b> ที่นั่ง&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>พนักงานประจำรถ :</b>&nbsp;นายทวีศักดิ์ จำปาเงิน &nbsp;</br>
                         </td>
                  
                  </tr>
                  <tr>
                    <td><img src="img/5534.jpg"  width="250" height="250"></td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ทะเบียน&nbsp;&nbsp;&nbsp; :</b>&nbsp;นข - 5534  </br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จังหวัด&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;สุพรรณบุรี&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ประเภท&nbsp;&nbsp;&nbsp; :</b>&nbsp;รถตู้&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ยี่ห้อ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;NISSAN&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สถานะ &nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;ปกติ&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จำนวนที่นั่ง :</b>&nbsp;<b><u>11</u></b> ที่นั่ง&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>พนักงานประจำรถ :</b>&nbsp;นายวสันต์  ช้างโต&nbsp;</br>
                         </td>
                  
                  </tr>
                  <tr>
                    <td><img src="img/8274.jpg"  width="250" height="250"></td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ทะเบียน&nbsp;&nbsp;&nbsp; :</b>&nbsp;กค - 8274  </br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จังหวัด&nbsp;&nbsp;&nbsp; :</b>&nbsp;สุพรรณบุรี&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ประเภท&nbsp;&nbsp;&nbsp; :</b>&nbsp;รถกะบะ ขนาดกลาง&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ยี่ห้อ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;TOYOTA&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สถานะ &nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;ปกติ&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จำนวนที่นั่ง :</b>&nbsp;<b><u>4</u></b> ที่นั่ง&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>พนักงานประจำรถ :</b>&nbsp;นายสุรศักดิ์  จันทร์น้อย&nbsp;</br>
                         </td>
                  
                  </tr>
                  <tr>
                    <td><img src="img/1424.jpg"  width="250" height="250"></td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ทะเบียน&nbsp;&nbsp;&nbsp; :</b>&nbsp;กจ - 1424  </br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จังหวัด&nbsp;&nbsp;&nbsp; :</b>&nbsp;สุพรรณบุรี&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ประเภท&nbsp;&nbsp;&nbsp; :</b>&nbsp;รถเก๋ง&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ยี่ห้อ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;TOYOTA&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สถานะ &nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;ปกติ&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จำนวนที่นั่ง :</b>&nbsp;<b><u>4</u></b> ที่นั่ง&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>พนักงานประจำรถ :</b>&nbsp;นายสมาน  ภูฆัง&nbsp;</br>
                         </td>
                  
                  </tr>
                  <tr>
                    <td><img src="img/0185.jpg"  width="250" height="250"></td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ทะเบียน&nbsp;&nbsp;&nbsp; :</b>&nbsp;40 - 0185  </br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จังหวัด&nbsp;&nbsp;&nbsp; :</b>&nbsp;สุพรรณบุรี&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ประเภท&nbsp;&nbsp;&nbsp; :</b>&nbsp;รถ 6 ล้อ&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ยี่ห้อ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;MISUBISHI&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สถานะ &nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;ปกติ&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จำนวนที่นั่ง :</b>&nbsp;<b><u>30</u></b> ที่นั่ง&nbsp;</br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>พนักงานประจำรถ :</b>&nbsp; - &nbsp;</br>
                         </td>
                  
                  </tr>
                  <?php
                  date_default_timezone_set('Asia/Bangkok');
$today_time = date('H:i  ');
echo"</tbody>";
echo "</table>";
echo"</div>
</div>

<div class='card-footer small text-muted'>อัพเดทเมื่อ วันนี้/เวลา  $today_time น.</div> "?>
        </div>
      </div>

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
  
 
</body>
</html>