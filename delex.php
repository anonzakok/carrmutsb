<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ลบ รายการใช้เชื้อเพลิง</title>

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

      
<?php
 //1. เชื่อมต่อ database: 
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
mysqli_set_charset($conn, "utf8");
echo "<h5 align = 'center'>";
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strDayf=date("w",strtotime($strDate));
        $strMonthCut = Array(
            "0"=>"",
            "1"=>"มกราคม",
            "2"=>"กุมภาพันธ์",
            "3"=>"มีนาคม",
            "4"=>"เมษายน",
            "5"=>"พฤษภาคม",
            "6"=>"มิถุนายน", 
            "7"=>"กรกฎาคม",
            "8"=>"สิงหาคม",
            "9"=>"กันยายน",
            "10"=>"ตุลาคม",
            "11"=>"พฤศจิกายน",
            "12"=>"ธันวาคม"                 
        );
        $strDayC = Array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
        $strMonthThai=$strMonthCut[$strMonth];
        $strDayThai=$strDayC[$strDayf];
		return " วัน $strDayThai ที่  $strDay เดือน $strMonthThai พ.ศ. $strYear";
	}
    $strDate = date("Y-n-j l");
	echo "".DateThai($strDate);
 ;echo "</h5>"; 
//  $today_date = date('Y-m-d');
//  $date_5 = date('Y-m-d', strtotime("+7 days"));
//2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT * FROM expenses " ;
if (isset($_POST['cmdsearch'])){
  $query.=" WHERE date_ex LIKE '%".$_POST['search']."%' "  or die("Error:" . mysqli_error());
}
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 

 if (isset($_SESSION['status'])){
  if($_SESSION['status']=='m'){

echo"<div class='card mb-3'>
          <div class='card-header'>
            <i class='fas fa-table'></i>
            รายการใช้เชื้อเพลิง</div>
          <div class='card-body'>
           <form action='#' method='post' style='text-align: center;'>
           เลือกวันที่ที่ต้องการ <input type='date' class='form-control-label' name='search' style='text-align: center;'>  
          <input type='submit' class='btn btn-success' name='cmdsearch' value='ค้นหา'>
            </form>
            <div class='table-responsive'>
              <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                <thead>
                  <tr>
                    
                  <th scope='col 'style='text-align: center;'>วันที่</th>
                  <th scope='col 'style='text-align: center;'>เลขทะเบียนรถ</th>
                  <th scope='col 'style='text-align: center;'>เลขไมล์(ก.ม.)</th>
                  <th scope='col 'style='text-align: center;'>ประเภทน้ำมัน</th>
                  <th scope='col 'style='text-align: center;'>ราคาต่อลิตร(บาท)</th>
                  <th scope='col 'style='text-align: center;'>จำนวนลิตร(ลิตร)</th>
                  <th scope='col 'style='text-align: center;'>จำนวนเงิน(บาท)</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  
               
                  <th scope='col 'style='text-align: center;'>วันที่</th>
                  <th scope='col 'style='text-align: center;'>เลขทะเบียนรถ</th>
                  <th scope='col 'style='text-align: center;'>เลขไมล์(ก.ม.)</th>
                  <th scope='col 'style='text-align: center;'>ประเภทน้ำมัน</th>
                  <th scope='col 'style='text-align: center;'>ราคาต่อลิตร(บาท)</th>
                  <th scope='col 'style='text-align: center;'>จำนวนลิตร(ลิตร)</th>
                  <th scope='col 'style='text-align: center;'>จำนวนเงิน(บาท)</th>
                  <th></th>
                  </tr>
                </tfoot>";
                echo " <tbody>";

while($row = mysqli_fetch_array($result)) { 
  
  echo "<tr>";

    echo "<td style='text-align: center;'>" .$row["date_ex"] . "</td>";;
    echo "<td style='text-align: center;'>" .$row["car_number"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["mileage"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["oil_ty"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["price_liter"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["number_liter"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["sumprice"] . "</td>";
    echo "<td>"; 
  echo "<a href='deldelex.php?id=$row[0]' onclick=\"return confirm ('ต้องการลบบัญชีผู้ใช้นี้ ใช่หรือไม่ ?!!!')\" class='btn btn-danger btn-xs'>ลบ</a>";
echo "</td>"; 
  echo "</tr>";
 
}

// Easy Counter by DwThai.Com

if(file_exists("delexcount.txt")){ 
  // file_exists() คือ Function ที่ใช้ในการตรวจสอบไฟล์ หากไฟล์นั้นมีอยู่จริงจะคืนค่า true 
  
     $f=fopen("delexcount.txt","r"); //เปิดไฟล์เพื่ออ่านค่า
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
  $f=fopen("delexcount.txt","w");
  fputs($f,$data); 
  fclose($f);
  
  $data=sprintf("%d",$data);
  
  
  date_default_timezone_set('Asia/Bangkok');
  $today_time = date('H:i  ');
  echo"</tbody>";
  echo "</table>";
  echo"</div>
  </div>
  
  <div class='card-footer small text-muted'>อัพเดทเมื่อ วันนี้/เวลา  $today_time น. <p align = 'right'> จำนวนผู้เยี่ยมชม <b>$data</b> ครั้ง </p> </div>
</div>
</div>";
  }}
//5. close connection
mysqli_close($conn);
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
  <script src="js/datatableThai.js"></script>
  <?php }?>
</body>
</html>