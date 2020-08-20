<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
div2 {
    background-color: Gold ;
    width: 30px;
    padding: 2px;
    border: 2px solid DarkOrange;
    margin: 25px;
}
</style>
<body>
<?php

$wantcount = true; 
$counter_file = "counter.txt";//สร้างไฟล์ใน notepad แล้วตั้งชื่อนี้ counter.txt แล้วpermission 777
if($wantcount){
if (file_exists($counter_file) and is_writeable($counter_file)){
$fp = fopen($counter_file,"r+") or die("Read File Error !");
$count = fread($fp, filesize($counter_file));
fclose($fp);
$fp = fopen($counter_file,"w+") or die("Write File Error !");
$count +=1;
$count =$count;
fputs($fp, $count);
fclose($fp);

}
}
?>
    
</body>
</html>
