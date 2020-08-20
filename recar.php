<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>กรอกใบขอรถ</title>

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
          <li class="nav-item active">
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
      <li class="nav-item">
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
      <li class="nav-item active">
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
    <!-- from กรอกใบขอรถ -->
    <form action="car.php" method="POST" target ="_blank" enctype="multipart/form-data">
    <div class="container">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="at">เขียนที่</label>
      <select id="at" class="form-control"  name="at" required>
                                        <option selected ><?php echo $_SESSION['faculty'] ?></option>
                                        <option >คณะวิทยาศาสตร์และเทคโนโลยี</option>
                                        <option>คณะครุศาสตร์อุตสาหกรรม</option>
                                        <option>คณะเทคโนโลยีการเกษตรและอุตสาหกรรมเกษตร</option>
                                        <option>คณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ</option>
                                        <option>คณะวิศวกรรมศาสตร์และสถาปัยกรรมศาสตร์</option>
                                        <option>คณะศิลปศาสตร์</option>
                                        <option>กองบริการทรัพยากรสุพรรณบุรี</option>
                                    </select>
    </div>
    <?php $today_date = date('Y-m-d');?>
    <div class="col-md-2 mb-2">
      <label for="date">วันที่</label>
      <input type="date" class="form-control" id="date" value="<?php echo "$today_date"; ?>" name="date" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="name">ชื่อ-นามสกุล</label>
      <input type="text" class="form-control" id="name"  value ="<?php echo $_SESSION['name'] ?>" name="name" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="pos">ตำแหน่ง</label>
      <input type="text" class="form-control" id="pos" value ="<?php echo $_SESSION['position'] ?>" name="pos" required>
    </div>
    <script>
    function EnableDisableTextBox3(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther3 = document.getElementById("txtOther3");
        txtOther3.disabled = selectedValue == 7 ? false : true;
        if (!txtOther3.disabled) {
            txtOther3.focus();
        }
    }
    </script>
                            <div class="col-md-5 mb-3">
                                <label for="fac" >สังกัด</label>
                                <div class="col-sm-9">
                                <select id = "ddlModels" onchange = "EnableDisableTextBox3(this)" class="form-control"  name="fac"  required>
                                        <option selected ><?php echo $_SESSION['faculty'] ?></option>
                                        <option >คณะวิทยาศาสตร์และเทคโนโลยี</option>
                                        <option>คณะครุศาสตร์อุตสาหกรรม</option>
                                        <option>คณะเทคโนโลยีการเกษตรและอุตสาหกรรมเกษตร</option>
                                        <option>คณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ</option>
                                        <option>คณะวิศวกรรมศาสตร์และสถาปัยกรรมศาสตร์</option>
                                        <option>คณะศิลปศาสตร์</option>
                                        <option>กองบริการทรัพยากรสุพรรณบุรี</option>
                                        <option value="7">อื่นๆ</option>
                                    </select>
                                  <input type="text" id="txtOther3" class="form-control" name ="fac" disabled="disabled" />
                                </div> 
                            </div> 
   
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="sub">เรื่อง</label>
      <input type="text" class="form-control" id="sub"  name="sub"required>
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
    <div class="col-md-4 mb-3">
      <label for="place">สถานที่ไป</label>
      <select id = "ddlModels" onchange = "EnableDisableTextBox(this)" class="form-control" name="place"  required>
                                        <option >กรุณาเลือกสถานที่</option>
                                        <option >ศูนย์หันตรา</option>
                                        <option >ศูนย์วาสุกรี</option>
                                        <option >ศูนย์นนทบุรี </option>
                                        <option value="5">อื่นๆ</option>
                                    </select>
                                    <input type="text" id="txtOther" class="form-control" name ="place" disabled="disabled" />
    </div>
    <div class="col-md-2 mb-2">
      <label for="num">ผู้รวมเดินทาง(คน)</label>
      <input type="text" class="form-control" id="num" name="num"  required >
    </div>
  </div>
  <label for="num1"><b>รายชื่อผู้รวมเดินทาง</b></label>
  <div class="form-row">
    <div class="col-md-4 mb-3">
    
      <input type="text" class="form-control" id="num1" name="num1" placeholder="คนที่ 1"  >
    </div>
    <div class="col-md-4 mb-3">
     
      <input type="text" class="form-control" id="num2" name="num2" placeholder="คนที่ 2"   >
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-4 mb-3">
     
      <input type="text" class="form-control" id="num3" name="num3"placeholder="คนที่ 3"    >
    </div>
    <div class="col-md-4 mb-3">
      
      <input type="text" class="form-control" id="num4" name="num4" placeholder="คนที่ 4"   >
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
     
      <input type="text" class="form-control" id="num5"  name="num5"placeholder="คนที่ 5"   >
    </div>
    <div class="col-md-4 mb-3">
     
      <input type="text" class="form-control" id="num6"  name="num6"placeholder="คนที่ 6"   >
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-4 mb-3">
    
      <input type="text" class="form-control" id="num7" name="num7" placeholder="คนที่ 7"   >
    </div>
    <div class="col-md-4 mb-3">
    
      <input type="text" class="form-control" id="num8" name="num8"placeholder="คนที่ 8"    >
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
      
      <input type="text" class="form-control" id="num9" name="num9"placeholder="คนที่ 9"    >
    </div>
    <div class="col-md-4 mb-3">
     
      <input type="text" class="form-control" id="num10" name="num10"placeholder="คนที่ 10"   >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-2">
      <label for="tell">เบอร์โทรศัพท์ติดต่อ</label>
      <input type="text" class="form-control" id="tell" name="tell" value ="<?php echo $_SESSION['tell'] ?>" placeholder="XXX-XXX-XXXX"  maxlength="10" required>
    </div>
    <div class="col-md-2 mb-2">
      <label for="wait">สถานที่รอรถ</label>
      <input type="" class="form-control" id="wait"  name="wait" value="หน้าตึกทะเบียน"placeholder=""required>
    </div>
  </div>

<script type="text/javascript">

function FunctionName(date)
{
var thisDate = new Date();
if( date < thisDate.getDate() )
{
alert("ไม่สามารถ เลือกวันที่ย้อนหลังได้");
}
}
</script>
  <label for=""><b>วัน/เวลา ออกเดินทาง</b></label>
  <div class="form-row">
    <div class="col-md-1 mb-2">
      <label for="day">วันที่</label>
     
      <select id="day" class="form-control" name="day" onchange="FunctionName(this.value);"  required>
      <option>1</option>   <option>2</option> <option>3</option> <option>4</option> <option>5 </option> <option>6</option>   <option>7</option>
      <option>8</option>  <option>9</option> <option>10 </option> <option>11</option> <option>12</option> <option>13</option> <option>14 </option>
      <option>15</option>    <option>16</option> <option>17</option>  <option>18 </option> <option>19</option> <option>20</option> <option>21</option>
      <option>22</option>  <option>23</option>  <option>24</option> <option>25</option>  <option>26</option>  <option>27</option>  <option>28</option>
      <option>29</option>  <option>30</option>  <option>31</option>
      </select>
    </div>
    <div class="col-md-2 mb-2">
      <label for="month">เดือน</label>
      <select id="month" class="form-control" name="month"  required>
      <option>มกราคม</option>   
      <option>กุมภาพันธ์ </option> 
      <option>มีนาคม </option> 
      <option>เมษายน </option> 
      <option>พฤษภาคม </option>
      <option>มิถุนายน</option>   
      <option>กรกฎาคม  </option> 
      <option>สิงหาคม  </option> 
      <option>กันยายน  </option> 
      <option>ตุลาคม </option>
      <option>พฤศจิกายน </option>   
      <option>ธันวาคม  </option> 
      </select>
    </div>
    <div class="col-md-2 mb-2">
      <label for="year">พ.ศ.</label>
      <select id="year" class="form-control" name="year"  required>
      <option>2563</option>   <option>2564</option> <option>2565</option> <option>2566</option> <option>2567</option> <option>2568</option>   <option>2569</option>
      <option>2570</option>  <option>2571</option> <option>2572 </option> <option>2573</option> <option>2574</option> <option>2575</option> <option>2576 </option>
      <option>2577</option>    <option>2578</option> <option>2579</option>  <option>2580 </option> <option>2581</option> <option>2582</option> <option>2583</option>
      <option>2584</option>  <option>2585</option>  <option>2586</option> <option>2587</option>  <option>2588</option>  <option>2589</option>  <option>2590</option>
      <option>2591</option>  <option>2592</option>  <option>2593</option>
      </select>
    </div>
    <div class="col-md-2 mb-2">
      <label for="time">เวลาออกเดินทาง</label>
      <input type="time" class="form-control" id="time" name="time" placeholder="XX:XX"required>
    </div>
    <div class="col-md-2 mb-2">
      <label for="time2">เวลาที่ถึง</label>
      <input type="time" class="form-control" id="time2" name="time2"placeholder="XX:XX"required>
    </div>
  </div>
  <label for=""><b>วัน/เวลา เดินทางกลับ</b></label>
  <div class="form-row">
    <div class="col-md-1 mb-2">
      <label for="day2">วันที่</label>
      <select id="day2" class="form-control" name="day2"  onchange="FunctionName(this.value);" required>
      <option>1</option>   <option>2</option> <option>3</option> <option>4</option> <option>5 </option> <option>6</option>   <option>7</option>
      <option>8</option>  <option>9</option> <option>10 </option> <option>11</option> <option>12</option> <option>13</option> <option>14 </option>
      <option>15</option>    <option>16</option> <option>17</option>  <option>18 </option> <option>19</option> <option>20</option> <option>21</option>
      <option>22</option>  <option>23</option>  <option>24</option> <option>25</option>  <option>26</option>  <option>27</option>  <option>28</option>
      <option>29</option>  <option>30</option>  <option>31</option>
      </select>
    </div>
    <div class="col-md-2 mb-2">
      <label for="month2">เดือน</label>
      <select id="month2" class="form-control" name="month2"  required>
      <option>มกราคม</option>   
      <option>กุมภาพันธ์ </option> 
      <option>มีนาคม </option> 
      <option>เมษายน </option> 
      <option>พฤษภาคม </option>
      <option>มิถุนายน</option>   
      <option>กรกฎาคม  </option> 
      <option>สิงหาคม  </option> 
      <option>กันยายน  </option> 
      <option>ตุลาคม </option>
      <option>พฤศจิกายน </option>   
      <option>ธันวาคม  </option> 
      </select>
    </div>
    <div class="col-md-2 mb-2">
      <label for="year2">พ.ศ.</label>
      <select id="year2" class="form-control" name="year2"  required>
      <option>2563</option>   <option>2564</option> <option>2565</option> <option>2566</option> <option>2567</option> <option>2568</option>   <option>2569</option>
      <option>2570</option>  <option>2571</option> <option>2572 </option> <option>2573</option> <option>2574</option> <option>2575</option> <option>2576 </option>
      <option>2577</option>    <option>2578</option> <option>2579</option>  <option>2580 </option> <option>2581</option> <option>2582</option> <option>2583</option>
      <option>2584</option>  <option>2585</option>  <option>2586</option> <option>2587</option>  <option>2588</option>  <option>2589</option>  <option>2590</option>
      <option>2591</option>  <option>2592</option>  <option>2593</option>
      </select>
    </div>
    <div class="col-md-2 mb-2">
      <label for="time3">เวลาถึงมหาวิทยาลัย</label>
      <input type="time" class="form-control" id="time3"  name="time3" placeholder="XX:XX"required>
    </div>
  </div>
  <br>

  <label for=""><b>กดปุ่มนี้เพื่อ ดาวน์โหลด หรือ พิมพ์  &nbsp;&nbsp;&nbsp;</b>
  <button class="btn btn-danger" type="Submit" name="Submit"> คลิ๊ก</button></label>
</form></div>
<?php

if(file_exists("addrecar.txt")){ 
  // file_exists() คือ Function ที่ใช้ในการตรวจสอบไฟล์ หากไฟล์นั้นมีอยู่จริงจะคืนค่า true 
  
     $f=fopen("addrecar.txt","r"); //เปิดไฟล์เพื่ออ่านค่า
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
  $f=fopen("addrecar.txt","w");
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