<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');  


include('connect.php');
mysqli_set_charset($conn, "utf8");
$name = $_REQUEST['name'];

$today_date = date('Y-m-d');
$date_2 = date('Y-m-d', strtotime("+2 days"));

$sql = "SELECT  * from  booking where date_start  BETWEEN '$today_date' AND '$date_2' ";
$sql.= "AND place   LIKE '%".$name."%'  ";

$resource = mysqli_query($conn,$sql);

$count_row = mysqli_num_rows($resource);

if($count_row > 0) {
 while($result = mysqli_fetch_assoc($resource)){
  $rows[]= array(
    "car_number" => "เลขทะเบียนรถ ".$result['car_number']."\n",
    "driver" => "พนักงานขับ ".$result['driver']."\n",
    "date_start" => "วันที่ ".$result['date_start']."\n",
    "number" => "จำนวนผู้โดยสาร ".$result['number']." คน"."\n",
    "place" => "สถานที่ ".$result['place']."\n",
    "re_name" => "ผู้ขอ ".$result['re_name']."\n",
    "faculty" => "คณะ ".$result['faculty']."\n"

);
 }


 $data = json_encode($rows, JSON_UNESCAPED_UNICODE);
 $totaldata = sizeof($rows);
 $results = '{"results":'.$data.'}';

}else{
 $results = '{"results":null}';
}

echo $results;
?>