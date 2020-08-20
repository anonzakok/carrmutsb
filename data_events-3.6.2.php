<?php
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);    
require("dbconnect.php");
if(isset($_GET['gData']) && $_GET['gData']|=""){
    $q="SELECT * FROM booking WHERE date(date_start) >='".$_GET['start']."'  ";  
    $q.=" AND date(date_b)<='".$_GET['end']."' ORDER by booking_id";  
    $result = $mysqli->query($q);
    while($rs=$result->fetch_object()){
        $json_data[]=array(  
            "id"=>$rs->booking_id,
            "title"=>$rs->place,
            "start"=>$rs->date_start,
            "end"=>$rs->date_b,
            "car_numbers"=>$rs->car_number,
            "places"=>$rs->place,
            "drivers"=>$rs->driver,
            "numbers"=>$rs->number,
            "re_names"=>$rs->re_name,
            "facultys"=>$rs->faculty,
            "notes"=>$rs->note,
            "allDays"=>($rs->events_allDay==true)?true:false      
            // กำหนด event object property อื่นๆ ที่ต้องการ
        );    
    }  
}

$json= json_encode($json_data);  
if(isset($_GET['callback']) && $_GET['callback']!=""){  
echo $_GET['callback']."(".$json.");";      
}else{  
echo $json;  
}  
?>
