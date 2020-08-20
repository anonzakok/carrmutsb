<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>easy chart</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['a','b','c','d','e'],
        datasets:[
        	{
          	label: 'data-1',
            backgroundColor: 'rgba(240, 52, 52, 1)',
            borderColor: 'rgba(240, 52, 52, 1)',
            data: [2,8,9,7,6]],
            fill: false
          },
          {
          	label: 'data-2',
            backgroundColor: 'rgba(77, 5, 232, 1)',
            borderColor: 'rgba(77, 5, 232, 1)',
            data: [2,8,9,7,6].reverse(),
            fill: false
          }
        ]
   }
});
</script>

</head>
<body>
<?php
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
mysqli_set_charset($conn, "utf8");

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
from expenses 
WHERE year(date_ex)='2018'
group by car_number
order by car_number";

$resultM = mysqli_query($conn, $sqlM);

 
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
for ($row = 0; $row<count($data); $row++){
    echo $data[$row]["Jan"]." , ". $data[$row]["Feb"]." , ". $data[$row]["Mar"]." , ". $data[$row]["Apr"]." , ". $data[$row]["May"]." , ". $data[$row]["Jun"]
    ." , ". $data[$row]["Jul"]." , ". $data[$row]["Aug"]." , ". $data[$row]["Sep"]." , ". $data[$row]["Oct"]." , ". $data[$row]["Nov"]." , ". $data[$row]["Dec1"]; 
    echo "<br />"; 
}
// $car_number[] = $rowM['car_number']; 
// $Jan[] = $rowM['Jan']; 
// $Feb[] = $rowM['Feb']; 
// $Mar[] = $rowM['Mar']; 
// $Apr[] = $rowM['Apr']; 
// $May[] = $rowM['May']; 
// $Jun[] = $rowM['Jun']; 
// $Jul[] = $rowM['Jul']; 
// $Aug[] = $rowM['Aug']; 
// $Sep[] = $rowM['Sep']; 
// $Oct[] = $rowM['Oct']; 
// $Nov[] = $rowM['Nov']; 
// $Dec1[] = $rowM['Dec1']; 
// $Total[] = $rowM['Total']; 
// }
// $car_number = implode(",", $car_number);
// $Jan = implode(",", $Jan);
// $Feb = implode(",", $Feb);
// $Mar = implode(",", $Mar);
// $Apr = implode(",", $Apr);
// $May = implode(",", $May);
// $Jun = implode(",", $Jun);
// $Jul = implode(",", $Jul);
// $Aug = implode(",", $Aug);
// $Sep = implode(",", $Sep);
// $Oct = implode(",", $Oct);
// $Nov = implode(",", $Nov);
// $Dec1 = implode(",", $Dec1);
// $Total = implode(",", $Total);

?>

<canvas id="myChart" width="800px" height="300px"></canvas>

<!-- <script>
var ctx = document.getElementById("myChartLine").getContext('2d');
var myChartLine = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        datasets: [{
            label: '40-0185',
            data: [<?php echo $data[0]["Jan"]." , ". $data[0]["Feb"]." , ". $data[0]["Mar"]." , ". $data[0]["Apr"]." , ". $data[0]["May"]." , ". $data[0]["Jun"]
              ." , ". $data[0]["Jul"]." , ". $data[0]["Aug"]." , ". $data[0]["Sep"]." , ". $data[0]["Oct"]." , ". $data[0]["Nov"]." , ". $data[0]["Dec1"]; ?>
            ],

            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
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
</script>   -->


</body>
</html>