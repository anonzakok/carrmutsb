
<?php
date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");
$serverName="localhost";
$userName="root";
$userPassword="";
$dbName="car_rmutsb";
$name = $_REQUEST['name'];
$samnak = $_REQUEST['samnak'];
$bra = $_REQUEST['bra'];
$pos = $_REQUEST['pos'];
$tell = $_REQUEST['tell'];
$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];
$id = $_REQUEST['userid'];

$connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror".mysqli_error());
mysqli_set_charset($connect,"utf8");
$sql = "select user_id from user where user_id='$id' group by user_id";
$result = mysqli_query($connect,$sql) or die ("error".mysqli_error());
$count_row = mysqli_num_rows($result);
if($count_row < 1){

$sql1 = "INSERT INTO `user` (`user_id`, `name`, `position`, `faculty`, `branch`, `tell`, `username`, `pass`, `status`,`date`) 
            VALUES('$id', '$name','$pos','$samnak','$bra','$tell','$username','$pass','a',NOW())";
$query = mysqli_query($connect, $sql1) or die (mysqli_error($connect));
echo "<br/><br/>";
echo "<h1 align='center'><font color='red'>*** ยินดีด้วยครับ คุณลงทะเบียนสำเร็จแล้ว ***</font></h1>";
echo "<h1 align='center'><font color='red'> กดที่เครื่องหมาย X มุมขวาบนเพื่อปิดหน้าต่างนี้</font></h1>";
}else{
echo "<h1 align='center'><font color='red'>*** ขอโทษด้วยครับ คุณเคยลงทะเบียนแล้ว ***</font></h1>";
echo "<h1 align='center'><font color='red'> กดที่เครื่องหมาย X มุมขวาบนเพื่อปิดหน้าต่างนี้</font></h1>";
}
?>