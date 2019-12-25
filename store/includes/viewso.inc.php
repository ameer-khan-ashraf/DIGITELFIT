<?php
include('access.php');
include('dbh.inc.php');

if(isset($_GET['id'])){

$id=$_GET['id'];
$query0 = "SELECT * FROM salesorder where ID='$id'";
$query_run0 = mysqli_query($conn, $query0);
$row = mysqli_fetch_assoc($query_run0);
$orderno = $row['orderid'];
$dateplaced=$row['dateplaced'];
$datedue=$row['datedue'];
$priority=$row['priority'];
$status=$row['sostatus'];
$progress=$row['progress']*100;
$sql = "select * from salesorder where id=$id ";
$res = $conn->query($sql) or die($conn->error);
while($row = $res->fetch_assoc())
{ 
    $name = $row['file_name'];
    $type = $row['file_type'];
    $image = $row['so_file'];
}
$filename='saleslog_'.date('m-d-Y').'.txt';
$filepath="../../logs/sales/$filename";
$myfile=fopen($filepath,'a');
$log= $_SESSION['username'].' downloaded sales order copy at '.date("h:i:s").PHP_EOL.
'Orderno: '.$orderno.' date placed: '.$dateplaced.' date due '.$datedue.' Priority: '.$priority.' Status: '.$status.' Progress: '.$progress.'%'.PHP_EOL.
'-----------------------------------------------------------------------'.PHP_EOL;
fwrite($myfile, $log);
header("Content-type: ".$type);
header('Content-Disposition: attachment; filename="'.$name.'"');
header("Content-Transfer-Encoding: binary"); 
header('Expires: 0');
header('Pragma: no-cache');

echo $image;
}
exit();
?>