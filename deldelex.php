<meta charset="utf-8">
<?php
    include('connect.php');
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

$ID = $_GET["id"];

$sql="DELETE FROM `expenses` WHERE `expenses`.`ex_id` =$ID ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql" .mysqli_error());
mysqli_close($conn);

if($result){
    header('location:delex.php');
}else{
    header('location:delex.php');
}
?>