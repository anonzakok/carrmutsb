<?php
require_once __DIR__ . '/vendor/autoload.php';

include_once('connect.php');	
mysqli_set_charset($conn, "utf8");

	$at=$_POST['at'];
	$date=$_POST['date'];
	$name= $_POST['name'];
	$pos= $_POST['pos'];
	$fac= $_POST['fac'];
	$sub= $_POST['sub'];
	$place= $_POST['place'];
	$num= $_POST['num'];
	$num1= $_POST['num1'];
	$num2= $_POST['num2'];
	$num3= $_POST['num3'];
	$num4= $_POST['num4'];
	$num5= $_POST['num5'];
	$num6= $_POST['num6'];
	$num7= $_POST['num7'];
	$num8= $_POST['num8'];
	$num9= $_POST['num9'];
	$num10= $_POST['num10'];
	$tell= $_POST['tell'];
	$wait= $_POST['wait'];
	$day= $_POST['day'];
	$month= $_POST['month'];
	$year= $_POST['year'];
	$time= $_POST['time'];
	$time2= $_POST['time2'];
	$day2= $_POST['day2'];
	$month2= $_POST['month2'];
	$year2= $_POST['year2'];
	$time3= $_POST['time3'];

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 9,
	'default_font' => 'freeserif'
]);
$html = '<div style="position:absolute;top:194px;left:147px;"> '.$at.'</div>';
$html.= '<div style="position:absolute;top:194px;left:500px;"> '.$date.'</div>';
$html.= '<div style="position:absolute;top:272px;left:260px;"> '.$name.' </div>';
$html.= '<div style="position:absolute;top:272px;left:510px;"> '.$pos.' </div>';
$html.= '<div style="position:absolute;top:272px;left:640px;"> '.$fac.' </div>';
$html.= '<div style="position:absolute;top:293px;left:420px;"> '.$sub.' </div>';
$html.= '<div style="position:absolute;top:317px;left:150px;"> '.$place.'&nbsp;&nbsp;</div>';
$html.= '<div style="position:absolute;top:317px;left:680px;"> '.$num.'&nbsp;&nbsp;</div>';
$html.= '<div style="position:absolute;top:340px;left:185px;"> '.$num1.'  </div>';
$html.= '<div style="position:absolute;top:340px;left:450px;"> '.$num2.'  </div>';
$html.= '<div style="position:absolute;top:363px;left:185px;"> '.$num3.'  </div>';
$html.= '<div style="position:absolute;top:363px;left:450px;"> '.$num4.'  </div>';
$html.= '<div style="position:absolute;top:385px;left:185px;"> '.$num5.'  </div>';
$html.= '<div style="position:absolute;top:385px;left:450px;"> '.$num6.'  </div>';
$html.= '<div style="position:absolute;top:407px;left:185px;"> '.$num7.'  </div>';
$html.= '<div style="position:absolute;top:407px;left:450px;"> '.$num8.'  </div>';
$html.= '<div style="position:absolute;top:430px;left:185px;"> '.$num9.'  </div>';
$html.= '<div style="position:absolute;top:430px;left:450px;"> '.$num10.'  </div>';
$html.= '<div style="position:absolute;top:452px;left:200px;"> '.$day.'&nbsp;&nbsp;</div>';
$html.= '<div style="position:absolute;top:452px;left:290px;"> '.$month.' </div>';
$html.= '<div style="position:absolute;top:452px;left:378px;"> '.$year.' </div>';
$html.= '<div style="position:absolute;top:452px;left:548px;"> '.$time.' </div>';
$html.= '<div style="position:absolute;top:452px;left:680px;"> '.$time2.' </div>';
$html.= '<div style="position:absolute;top:475px;left:200px;"> '.$day2.'&nbsp;&nbsp; </div>';
$html.= '<div style="position:absolute;top:475px;left:290px;"> '.$month2.' </div>';
$html.= '<div style="position:absolute;top:475px;left:378px;"> '.$year2.' </div>';
$html.= '<div style="position:absolute;top:475px;left:560px;">'.$time3.' </div>';
$html.= '<div style="position:absolute;top:497px;left:285px;"> '.$tell.' </div>';
$html.= '<div style="position:absolute;top:497px;left:550px;"> '.$wait.' </div>';
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('recar.pdf',true);


$mpdf->WriteHTML($html);
$mpdf->Output();

if($month=="มกราคม"){
	$month="01";
	$month2="01";
}
elseif($month=="กุมภาพันธ์"){
	$month="02";
	$month2="02";
}
elseif($month=="มีนาคม"){
	$month="03";
	$month2="03";
}
elseif($month=="เมษายน"){
	$month="04";
	$month2="04";
}
elseif($month=="พฤษภาคม"){
	$month="05";
	$month2="05";
}
elseif($month=="มิถุนายน"){
	$month="06";
	$month2="06";
}
elseif($month=="กรกฎาคม"){
	$month="07";
	$month2="07";
}
elseif($month=="สิงหาคม"){
	$month="08";
	$month2="08";
}
elseif($month=="ตุลาคม"){
	$month="09";
	$month2="09";
}
elseif($month=="กันยายน"){
	$month="10";
	$month2="10";
}
elseif($month=="พฤศจิกายน"){
	$month="11";
	$month2="11";
}else{
	$month="12";
	$month2="12";
}
$year-=543;
$year2-=543;
  $date_start=$year."-".$month."-".$day;
  $date_b=$year2."-".$month2."-".$_POST['day2'];
  
  $sql = "INSERT INTO `recar` (`re_id`, `r_place`, `date_re`, `name_re`, `pos`, `board`, `note`, `place`, `count`, `tell`, `place_wait`, `date_start`, `time_start`, `date_b`,`status`) 
  VALUES (NULL, '".$_POST['at']."', '".$_POST['date']."', '".$_POST['name']."', '".$_POST['pos']."', '".$_POST['fac']."', '".$_POST['sub']."', '".$_POST['place']."', '".$_POST['num']."', '".$_POST['tell']."',
  '".$_POST['wait']."', '$date_start ".$_POST['time']."', '".$_POST['time']."', '$date_b','รออนุมัติ');";
  
	  $result = $conn->query($sql);  

?>