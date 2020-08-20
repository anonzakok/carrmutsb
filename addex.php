<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>เพิ่ม รายการใช้เชื้อเพลิง</title>

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

            $sumprice = $_POST['price_liter'] * $_POST['number_liter'];

            $sql = "INSERT INTO `expenses` (`ex_id`, `car_number`, `date_ex`,`mileage`, `number_liter`, `price_liter`, `sumprice`, `oil_ty`) 
                    VALUES (NULL, '".$_POST['car_number']."', '".$_POST['date_ex']."', '".$_POST['mileage']."', '".$_POST['number_liter']."', '".$_POST['price_liter']."', '$sumprice', '".$_POST['oil_ty']."');";
                    
                $result = $conn->query($sql);  
            if($result){
                    echo "<script>";
                    echo "alert('บันทึกสำเร็จ');";
                    echo "</script>";
            }else{
                    echo "<script>";
                    echo "alert('กรุณากรอกข้อมูลให้ถูกต้อง');";
                    echo "</script>";
            }
        }
    ?>
<?php if (empty($_SESSION['status'])){
     header('location:login.php');
  } else{?> 
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
        <li class="nav-item dropdown active ">
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
                        <h3><b>++เพิ่มข้อมูลค่าใช้จ่ายเชื้อเพลิง++</b></h3></br>
                            <h5>กรุณากรอกข้อมูลให้ครบทุกช่อง!!</h5>
                        </div>
                        <div class="card-body">
                        <script type="text/javascript">
    function EnableDisableTextBox(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther = document.getElementById("txtOther");
        txtOther.disabled = selectedValue == 8 ? false : true;
        if (!txtOther.disabled) {
            txtOther.focus();
        }
    }
    </script>
 
                            <div class="form-group row">
                                <label for="car_number" class="col-sm-3 col-form-label">เลขทะเบียนรถ</label>
                                <div class="col-sm-9">
                                <select id = "ddlModels" onchange = "EnableDisableTextBox(this)" class="form-control" name="car_number"  required>
                                <option selected>กค-8274</option>
                                        <option>นข-5534</option>
                                        <option>นข-4282</option>
                                        <option>กจ-1424</option>
                                        <option>นค-3805</option>
                                        <option>กจ-1428</option>
                                        <option>40-0185</option>
                                        <option Value ="8" >อื่นๆ</option>
                                    </select>
                                  <input type="text" id="txtOther" class="form-control" name ="car_number" disabled="disabled" />
                                </div> 
                            </div> 
                          
                        <div class="form-group row">
                            <label for="date_ex"start class="col-sm-3 col-form-label">วันที่รายงาน</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="date_ex" name="date_ex" require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mileage" class="col-sm-3 col-form-label">เลขไมล์</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mileage" name="mileage" required>
                                </div> 
                            </div> 

            <script type="text/javascript">
            function EnableDisableTextBox1(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther1 = document.getElementById("txtOther1");
        txtOther1.disabled = selectedValue == 5 ? false : true;
        if (!txtOther1.disabled) {
            txtOther1.focus();
        }
    }
    </script>
                            <div class="form-group row">
                                <label for="oil_ty" class="col-sm-3 col-form-label">ประเภทน้ำมัน</label>
                                    <div class="col-sm-9">
                                    <select id = "ddlModels" onchange = "EnableDisableTextBox1(this)" class="form-control" name="oil_ty"  required>
                                        <option >ดีเซล</option>
                                        <option>แก็ส 91</option>
                                        <option>แก็สฯ 95 E10</option>
                                        <option selected>แก็สฯ 95</option>
                                        <option value="5">อื่นๆ</option>
                                    </select>
                                    <input type="text" id="txtOther1" class="form-control" name ="oil_ty" disabled="disabled" />
                                </div> 
                            </div> 
                        

                            <div class="form-group row">
                                <label for="number_liter" class="col-sm-3 col-form-label">จำนวนลิตร</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="number_liter" name="number_liter" required>
                                </div> 
                            </div> 
                            <div class="form-group row">
                                <label for="price_liter" class="col-sm-3 col-form-label">ราคาต่อลิตร</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="price_liter" name="price_liter" required>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                               <input type="Submit" name="Submit" class="btn btn-success" value="บันทึก">
                         
                            </div> 
                        </div>
                    </form>
                </div>
            </div>  
         </div> 
      </div>
      <?php
// Easy Counter by DwThai.Com

if(file_exists("addexcount.txt")){ 
  // file_exists() คือ Function ที่ใช้ในการตรวจสอบไฟล์ หากไฟล์นั้นมีอยู่จริงจะคืนค่า true 
  
     $f=fopen("addexcount.txt","r"); //เปิดไฟล์เพื่ออ่านค่า
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
  $f=fopen("addexcount.txt","w");
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