<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>สรุป รายการใช้เชื้อเพลิง</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- font ansome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
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
            if($_SESSION['status']=='t'){?>
        <li class="nav-item dropdown active">
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
      <?php }?>
    </ul>
    
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
$query = "SELECT * FROM expenses ";
if (isset($_POST['cmdsearch'])){
  $query.=" WHERE date_ex  BETWEEN '".$_POST['date1']."' AND '".$_POST['date2']."'";
  $query.="AND car_number LIKE '%".$_POST['car_number']."%' " or die("Error:" . mysqli_error());
}
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 

 if (isset($_SESSION['status'])){
  if($_SESSION['status']=='m' or $_SESSION['status']=='t' ){

echo"<div class='card mb-3'>
          <div class='card-header'>
            <i class='fas fa-table'></i>
            รายการใช้เชื้อเพลิง</div>
          <div class='card-body'>
           <form action='#' method='post' style='text-align: center;'>
           เลือกวันที่ที่ต้องการ <input type='date' class='form-control-label' name='date1' style='text-align: center;'>  
         ถึง <input type='date' class='form-control-label' name='date2' style='text-align: center;'>  
          
          เลือกเฉพาะรถที่ต้องการ <select id = 'ddlModels' onchange = 'EnableDisableTextBox(this)'  name='car_number'  required>
          
          <option selected >-</option>
          <option >กค-8274</option>
          <option>นข-5534</option>
          <option>นข-4282</option>
          <option>กจ-1424</option>
          <option>นค-3805</option>
          <option>กจ-1428</option>
          <option>40-0185</option>
          <option Value ='8' >อื่นๆ</option>
        </select>  <input type='text' id='txtOther' name ='car_number' disabled='disabled' />

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
                 
                  </tr>
                </tfoot>";
                echo " <tbody>";
$sumsum = 0;
while($row = mysqli_fetch_array($result)) { 
  
  echo "<tr>";
    echo "<td style='text-align: center;'>" .$row["date_ex"] . "</td>";;
    echo "<td style='text-align: center;'>" .$row["car_number"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["mileage"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["oil_ty"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["price_liter"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["number_liter"] . "</td>";
    echo "<td style='text-align: center;'>" .$row["sumprice"] . "</td>";

  echo "</tr>";
 $sumsum += $row["sumprice"];
}

// Easy Counter by DwThai.Com

if(file_exists("sumcount.txt")){ 
  // file_exists() คือ Function ที่ใช้ในการตรวจสอบไฟล์ หากไฟล์นั้นมีอยู่จริงจะคืนค่า true 
  
     $f=fopen("sumcount.txt","r"); //เปิดไฟล์เพื่ออ่านค่า
  /* fopen() เป็นการเปิดไฟล์ตามที่ และเราจำเป็นต้องกำหนด Option ให้แก่การเปิดไฟล์ด้วย Option ต่าง ๆ ดังนี้ 
  r สำหรับการอ่านไฟล์ 
  w สำหรับการเขียนไฟล์ และข้อมูลจะถูกเขียนทับใหม่ทั้งหมด
  a สำหรับการเขียนไฟล์ แต่ข้อมูลจะถูกเขียนต่อข้อมูลเดิมที่มีอยู่ในไฟล์นั้น
  */ 
  
     $datacount=fread($f,5); 
  // fread() เป็นการอ่านไฟล์ เลข 5 คือจำนวน byte ของข้อมูลที่ต้องการอ่านค่า
     fclose($f);
     $datacount++;
  
  }else{
  
     $datacount=0;
  
  }
  
  //เขียนข้อมูลลงไฟล์
  $f=fopen("sumcount.txt","w");
  fputs($f,$datacount); 
  fclose($f);
  
  $datacount=sprintf("%d",$datacount);
  
  
  date_default_timezone_set('Asia/Bangkok');
  $today_time = date('H:i  ');
  echo"</tbody>";
  echo "</table> ";
  
  echo" <p class=' text-center  '>
 <b>ยอดรวม "; echo number_format($sumsum, 2, '.'    , ','   ); echo" บาท</b>
</p>";
  echo"</div>
  </div></div>";

 
$sql = "SELECT SUM(sumprice) AS totol, DATE_FORMAT(date_ex, '%Y') AS date_y
FROM expenses 
GROUP BY date_y" or die("Error:" . mysqli_error());


$DateM = date("Y");
$sqlM = "SELECT car_number,
sum(case when month(date_ex)=1 then sumprice else 0 end) as Jan,
sum(case when month(date_ex)=2 then sumprice else 0 end) as Feb,
sum(case when month(date_ex)=3 then sumprice else 0 end) as Mar,
sum(case when month(date_ex)=4 then sumprice else 0 end) as Apr,
sum(case when month(date_ex)=5 then sumprice else 0 end) as May,
sum(case when month(date_ex)=6 then sumprice else 0 end) as Jun,
sum(case when month(date_ex)=7 then sumprice else 0 end) as Jul,
sum(case when month(date_ex)=8 then sumprice else 0 end) as Aug,
sum(case when month(date_ex)=9 then sumprice else 0 end) as Sep,
sum(case when month(date_ex)=10 then sumprice else 0 end) as Oct,
sum(case when month(date_ex)=11 then sumprice else 0 end) as Nov,
sum(case when month(date_ex)=12 then sumprice else 0 end) as Dec1,
sum(sumprice) as Total
from expenses ";
if (isset($_POST['yearsearch'])){
$sqlM.="WHERE year(date_ex)='".$_POST['year']."'
group by car_number
order by car_number";
}else{
$sqlM.="WHERE year(date_ex)='$DateM'
group by car_number
order by car_number";
}
$resultm = mysqli_query($conn, $sqlM);
$resultM = mysqli_query($conn, $sqlM);
$resultt = mysqli_query($conn, $sql);
$resultchart = mysqli_query($conn, $sql);  


$data = array();
while($row = mysqli_fetch_assoc($resultM)){ 
    $data[] = array ("car_number" => $row['car_number'],
    "Jan" => $row['Jan'],
    "Feb" => $row['Feb'],
    "Mar" => $row['Mar'],
    "Apr" => $row['Apr'],
    "May" => $row['May'],
    "Jun" => $row['Jun'],
    "Jul" => $row['Jul'],
    "Aug" => $row['Aug'],
    "Sep" => $row['Sep'],
    "Oct" => $row['Oct'],
    "Nov" => $row['Nov'],
    "Dec1" => $row['Dec1'],
  );
}
 //for chart
$date_y = array();
$totol = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $date_y[] = "\"".$rs['date_y']."\""; 
  $totol[] = "\"".$rs['totol']."\""; 
}
$date_y = implode(",", $date_y); 
$totol = implode(",", $totol); 
 
?>
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ตาราง สรุปค่าใช้จ่ายแต่ละคัน ในแต่ละเดือน</div>
          <div class="card-body">
          <form action='#' method='post' style='text-align: center;'>
           เลือกปีที่ต้องการ <input type='text' class='form-control-label' name='year' style='text-align: center;'>  

<input type='submit' class='btn btn-success' name='yearsearch' value='ตกลง'> 
            </form>
<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
  <thead>
  <tr>
    <th >ทะเบียน</th>
    <th>ม.ค.</th>
    <th>ก.พ.</th>
    <th>มี.ค.</th>
    <th>เม.ย.</th>
    <th>พ.ค.</th>
    <th>มิ.ย.</th>
    <th>ก.ค.</th>
    <th>ส.ค.</th>
    <th>ก.ย.</th>
    <th>ต.ค.</th>
    <th>พ.ย.</th>
    <th>ธ.ค.</th>
    <th>รวม</th>
  </tr>
  </thead>
  
  <?php while($rowm = mysqli_fetch_array($resultm)) { ?>
    <tr >
    <td align="center"><?php echo $rowm['car_number'];?></td>
      <td align="center"><?php echo number_format($rowm['Jan'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Feb'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Mar'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Apr'],0);?></td>
      <td align="center"><?php echo number_format($rowm['May'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Jun'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Jul'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Aug'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Sep'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Oct'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Nov'],0);?></td>
      <td align="center"><?php echo number_format($rowm['Dec1'],0);?></td>
      <td align="right"><?php echo number_format($rowm['Total'],2);?></td> 
    </tr>
    <?php } ?>

</table>
</div>
</div>
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            กราฟเส้น สรุปค่าใช้จ่ายแต่ละคัน ในแต่ละเดือน</div>
          <div class="card-body">
<p align="center">
 
 <!--devbanban.com-->
 <canvas id="myChart1" width="800px" height="300px"></canvas>

<script>
var ctx = document.getElementById('myChart1').getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย',
                'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
        datasets:[
        	{
          	label: '40-0185',
            backgroundColor: 'rgba(240, 52, 52, 1)',
            borderColor: 'rgba(240, 52, 52, 1)',
            data: [<?php echo $data[0]["Jan"]." , ". $data[0]["Feb"]." , ". $data[0]["Mar"]." , ". $data[0]["Apr"]." , ". $data[0]["May"]." , ". $data[0]["Jun"]
              ." , ". $data[0]["Jul"]." , ". $data[0]["Aug"]." , ". $data[0]["Sep"]." , ". $data[0]["Oct"]." , ". $data[0]["Nov"]." , ". $data[0]["Dec1"]; ?>],
            fill: false
          },
          {
          	label: 'กค-8274',
            backgroundColor: 'rgba(77, 5, 232, 1)',
            borderColor: 'rgba(77, 5, 232, 1)',
            data: [<?php echo $data[1]["Jan"]." , ". $data[1]["Feb"]." , ". $data[1]["Mar"]." , ". $data[1]["Apr"]." , ". $data[1]["May"]." , ". $data[1]["Jun"]
              ." , ". $data[1]["Jul"]." , ". $data[1]["Aug"]." , ". $data[1]["Sep"]." , ". $data[1]["Oct"]." , ". $data[1]["Nov"]." , ". $data[1]["Dec1"]; ?>],
            fill: false
          },
          {
          	label: 'กจ-1424',
            backgroundColor: 'rgba(255, 159, 64, 1)',
            borderColor: 'rgba(255, 159, 64, 1)',
            data: [<?php echo $data[2]["Jan"]." , ". $data[2]["Feb"]." , ". $data[2]["Mar"]." , ". $data[2]["Apr"]." , ". $data[2]["May"]." , ". $data[2]["Jun"]
              ." , ". $data[2]["Jul"]." , ". $data[2]["Aug"]." , ". $data[2]["Sep"]." , ". $data[2]["Oct"]." , ". $data[2]["Nov"]." , ". $data[2]["Dec1"]; ?>],
            fill: false
          },
          {
          	label: 'กจ-1428',
            backgroundColor: 'rgba(153, 102, 255, 1)',
            borderColor: 'rgba(153, 102, 255, 1)',
            data: [<?php echo $data[3]["Jan"]." , ". $data[3]["Feb"]." , ". $data[3]["Mar"]." , ". $data[3]["Apr"]." , ". $data[3]["May"]." , ". $data[3]["Jun"]
              ." , ". $data[3]["Jul"]." , ". $data[3]["Aug"]." , ". $data[3]["Sep"]." , ". $data[3]["Oct"]." , ". $data[3]["Nov"]." , ". $data[3]["Dec1"]; ?>],
            fill: false
          },
          {
          	label: 'นข-2203',
            backgroundColor: 'rgba(75, 192, 192, 1)',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: [<?php echo $data[4]["Jan"]." , ". $data[4]["Feb"]." , ". $data[4]["Mar"]." , ". $data[4]["Apr"]." , ". $data[4]["May"]." , ". $data[4]["Jun"]
              ." , ". $data[4]["Jul"]." , ". $data[4]["Aug"]." , ". $data[4]["Sep"]." , ". $data[4]["Oct"]." , ". $data[4]["Nov"]." , ". $data[4]["Dec1"]; ?>],
            fill: false
          },
          {
          	label: 'นข-4282',
            backgroundColor: 'rgba(255, 206, 86, 1)',
            borderColor: 'rgba(255, 206, 86, 1)',
            data: [<?php echo $data[5]["Jan"]." , ". $data[5]["Feb"]." , ". $data[5]["Mar"]." , ". $data[5]["Apr"]." , ". $data[5]["May"]." , ". $data[5]["Jun"]
              ." , ". $data[5]["Jul"]." , ". $data[5]["Aug"]." , ". $data[5]["Sep"]." , ". $data[5]["Oct"]." , ". $data[5]["Nov"]." , ". $data[5]["Dec1"]; ?>],
            fill: false
          },
          {
          	label: 'นข-5534',
            backgroundColor: 'rgba(54, 162, 235, 1)',
            borderColor: 'rgba(54, 162, 235, 1)',
            data: [<?php echo $data[6]["Jan"]." , ". $data[6]["Feb"]." , ". $data[6]["Mar"]." , ". $data[6]["Apr"]." , ". $data[6]["May"]." , ". $data[6]["Jun"]
              ." , ". $data[6]["Jul"]." , ". $data[6]["Aug"]." , ". $data[6]["Sep"]." , ". $data[6]["Oct"]." , ". $data[6]["Nov"]." , ". $data[6]["Dec1"]; ?>],
            fill: false
          },
          {
          	label: 'นค-3805	',
            backgroundColor: 'rgba(255, 99, 132, 1)',
            borderColor: 'rgba(255, 99, 132, 1)',
            data: [<?php echo $data[7]["Jan"]." , ". $data[7]["Feb"]." , ". $data[7]["Mar"]." , ". $data[7]["Apr"]." , ". $data[7]["May"]." , ". $data[7]["Jun"]
              ." , ". $data[7]["Jul"]." , ". $data[7]["Aug"]." , ". $data[7]["Sep"]." , ". $data[7]["Oct"]." , ". $data[7]["Nov"]." , ". $data[7]["Dec1"]; ?>],
            fill: false
          }

        ]
   }
});
</script>
</p> 
</div>
</div>
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            กราฟแท่ง สรุปค่าใช้จ่ายแต่ละปี</div>
          <div class="card-body">
<table width="200" border="1" cellpadding="0"  cellspacing="0" align="center">
  <thead>
  <tr>
    <th width="10%">ปี</th>
    <th width="10%">ค่าใช้จ่าย</th>
  </tr>
  </thead>
  
  <?php while($row1 = mysqli_fetch_array($resultt)) { ?>
    <tr>
      <td align="center"><?php echo $row1['date_y'];?></td>
      <td align="right"><?php echo number_format($row1['totol'],2);?></td> 
    </tr>
    <?php } ?>

</table>



<hr>

<p align="center">

 <!--devbanban.com-->
<canvas id="myChart" width="800px" height="300px"></canvas>


<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $date_y;?>
    
        ],
        datasets: [{
            label: 'รายงานภาพรวม แยกตามปี (บาท)',
            data: [<?php echo $totol;?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  
</p> 
</div>

<?php

  
  echo "<div class='card-footer small text-muted'>อัพเดทเมื่อ วันนี้/เวลา  $today_time น. <p align = 'right'> จำนวนผู้เยี่ยมชม <b>$datacount</b> ครั้ง </p> </div>
</div>
</div>";
  }}

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