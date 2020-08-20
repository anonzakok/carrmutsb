<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>แก้ไข รายการขอยานพาหนะ</title>

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
         $id = $_GET["id"];
          include_once('connect.php');
          mysqli_set_charset($conn, "utf8");
       
            $sql ="Select * From booking where booking_id='$id'";
                $result = $conn->query($sql);  
                $row = mysqli_fetch_array($result);
                $booking_id=$row['booking_id'];
                $car_number=$row['car_number'];
                $date_start=$row['date_start'];
                $time_car=$row['time_car'];
                $place=$row['place'];
                $driver=$row['driver'];
                $number=$row['number'];
                $re_name=$row['re_name'];
                $re_name2=$row['re_name2'];
                $re_name3=$row['re_name3'];
                $faculty=$row['faculty'];
                $note=$row['note'];
                if (isset($_POST['Submit'])) {
                    // echo $_POST['car_number'];
                    // echo $_POST['date_start'];
                    // echo $_POST['place'];
                    // echo $_POST['driver'];
                    // echo $_POST['number'];
                    // echo $_POST['re_name'];
                    // echo $_POST['faculty'];
                    // echo $_POST['tell'];
                    // echo $_POST['wait'];
                    $sql2 ="UPDATE `booking` SET `car_number` = '".$_POST['car_number']."', `date_start` = '".$_POST['date_start']."', `time_car` = '".$_POST['time_car']."', 
                    `place` = '".$_POST['place']."', `driver` = '".$_POST['driver']."', `number` = '".$_POST['number']."', 
                    `re_name` = '".$_POST['re_name']."',  `re_name2` = '".$_POST['re_name2']."', `re_name3` = '".$_POST['re_name3']."',`faculty` = '".$_POST['faculty']."',`note` = '".$_POST['note']."' WHERE `booking_id` = '".$_POST['booking_id']."'"; 
                    
                        $result2 = $conn->query($sql2);  
                    if($result2){

                            
                            header('location:editbooking.php');
                            echo "<script>";
                            echo "alert('แก้ไข สำเร็จ');";
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
                        <h3><b>++แก้ไขข้อมูลตารางออกรถ++</b></h3></br>
                            <h5>กรุณากรอกข้อมูลให้ครบทุกช่อง!!</h5>
                        </div>
                        <div class="card-body">
                        <input type="hidden" name ="booking_id" value="<?php echo "$booking_id"; ?>"> <br> 
                        <script type="text/javascript">
    function EnableDisableTextBox1(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther1 = document.getElementById("txtOther1");
        txtOther1.disabled = selectedValue == 9 ? false : true;
        if (!txtOther1.disabled) {
            txtOther1.focus();
        }
    }
    </script>
                            <div class="form-group row">
                                <label for="car_number" class="col-sm-3 col-form-label">เลขทะเบียนรถ</label>
                                    <div class="col-sm-9">
                                    <select id = "ddlModels" onchange = "EnableDisableTextBox1(this)" class="form-control" name="car_number"  required>
                                        <option selected><?php echo "$car_number"; ?></option>
                                        <option >กค-8274</option>
                                        <option>นข-5534</option>
                                        <option>นข-4282</option>
                                        <option>กจ-1424</option>
                                        <option>นค-3805</option>
                                        <option>กจ-1428</option>
                                        <option>40-0185</option>
                                        <option Value="9">อื่นๆ</option>
                                    </select>
                                    <input type="text" id="txtOther1" class="form-control" name ="car_number" disabled="disabled" />
                                    </div>
                            </div>
                           
                        <div class="form-group row">
                            <label for="date_start" class="col-sm-3 col-form-label">วันที่ออกเดินทาง</label>
                                <div class="col-sm-9">
                                <?php echo "$date_start"; ?>
                                    <input type="date" class="form-control" id="date_start" name="date_start" value="<?php echo "$date_start"; ?>" require>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="time_car" class="col-sm-3 col-form-label">เวลา</label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control" id="time_car" name="time_car" value="<?php echo "$time_car"; ?>" required>
                                </div> 
                            </div> 
                            <script type="text/javascript">
    function EnableDisableTextBox(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther = document.getElementById("txtOther");
        txtOther.disabled = selectedValue == 5 ? false : true;
        if (!txtOther.disabled) {
            txtOther.focus();
        }
    }
    </script>
 
                            <div class="form-group row">
                                <label for="place" class="col-sm-3 col-form-label">สถานที่</label>
                                <div class="col-sm-9">
                                <select id = "ddlModels" onchange = "EnableDisableTextBox(this)" class="form-control" name="place" required>
                                        <option selected ><?php echo "$place"; ?></option>
                                        <option > ศูนย์หันตรา</option>
                                        <option >ศูนย์วาสุกรี</option>
                                        <option >ศูนย์นนทบุรี </option>
                                        <option value="5">อื่นๆ</option>
                                    </select>
                                  <input type="text" id="txtOther" class="form-control" name ="place" disabled="disabled" />
                                </div> 
                            </div> 
                            <div class="form-group row">
                                <label for="driver" class="col-sm-3 col-form-label">ชื่อคนขับรถ</label>
                                    <div class="col-sm-9">
                                    <select id="driver" class="form-control" name="driver" require>
                                   
                                        <option selected><?php echo "$driver"; ?></option>
                                        <option>นายสุรศักดิ์  จันทร์น้อย</option>
                                        <option>นายวสันต์  ช้างโต</option>
                                        <option>นายทวีศักดิ์  จำปาเงิน</option>
                                        <option>นายสมาน ภูฆัง</option>
                                        <option>นายสุราวุธ ดวงแก้ว</option>
                                        <option>นายนิโรจน์  จักขุรัตน์</option>
                                    </select>
                                    </div>
                                    </div>
                            <div class="form-group row">
                                <label for="number" class="col-sm-3 col-form-label">จำนวนผู้โดยสาร</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="number" name="number" value="<?php echo "$number"; ?>" required>
                                </div> 
                            </div> 
                            <div class="form-group row">
                                <label for="re_name" class="col-sm-3 col-form-label">ชื่อคนขอรถ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="re_name" name="re_name" value="<?php echo "$re_name"; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="re_name2" class="col-sm-3 col-form-label">ชื่อคนขอรถ2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="re_name2" name="re_name2" value="<?php echo "$re_name2"; ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="re_name3" class="col-sm-3 col-form-label">ชื่อคนขอรถ3</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="re_name3" name="re_name3" value="<?php echo "$re_name3"; ?>" >
                                </div>
                            </div>
                            <script type="text/javascript">
    function EnableDisableTextBox3(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther3 = document.getElementById("txtOther3");
        txtOther3.disabled = selectedValue == 8 ? false : true;
        if (!txtOther3.disabled) {
            txtOther3.focus();
        }
    }
    </script>
                            <div class="form-group row">
                                <label for="faculty" class="col-sm-3 col-form-label">คณะ</label>
                                    <div class="col-sm-9">
                                    <select id = "ddlModels" onchange = "EnableDisableTextBox3(this)" class="form-control" name="faculty"  required>
                                    <option selected><?php echo "$faculty"; ?></option>
                                        <option >คณะวิทยาศาสตร์และเทคโนโลยี</option>
                                        <option>คณะครุศาสตร์อุตสาหกรรม</option>
                                        <option>คณะเทคโนโลยีการเกษตรและอุตสาหกรรมเกษตร</option>
                                        <option>คณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ</option>
                                        <option>คณะวิศวกรรมศาสตร์และสถาปัยกรรมศาสตร์</option>
                                        <option>คณะศิลปศาสตร์</option>
                                        <option>กองบริหารทรัพยากรสุพรรณบุรี</option>
                                        <option value="8">อื่นๆ</option>
                                    </select>
                                    <input type="text" id="txtOther3" class="form-control" name ="faculty" disabled="disabled" />
                                    </div>
                            </div>

                            
                            <script>
                            function EnableDisableTextBox2(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther2 = document.getElementById("txtOther2");
        txtOther2.disabled = selectedValue == 2 ? false : true;
        if (!txtOther2.disabled) {
            txtOther2.focus();
        }
    }
    </script>
                            <div class="form-group row">
                                <label for="note" class="col-sm-3 col-form-label">สถานะ</label>
                                <div class="col-sm-9">
                                <select id = "ddlModels" onchange = "EnableDisableTextBox2(this)" class="form-control" name="note"  required>
                                        <option selected><?php echo "$note"; ?></option>
                                        <option >อนุมัติ</option>
                                        <option value="2" >ยกเลิก</option>
                                    </select>
                                  <input type="text" id="txtOther2" class="form-control" name ="note"  value="ยกเลิก เพราะ"disabled="disabled" />
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