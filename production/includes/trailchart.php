<?php
header('Content-Type: application/json');
include("dbh.inc.php");
$query = "SELECT COUNT(*) as avail FROM trailrent where status = 'Available'";
$query1 = "SELECT COUNT(*) as repair FROM trailrent where status = 'repair'";
$query2 = "SELECT COUNT(*) as site FROM trailrent where status = 'site'";
$result = mysqli_query($conn,$query);
$result2 = mysqli_query($conn,$query1);
$result3 = mysqli_query($conn,$query2);

$row=mysqli_fetch_assoc($result);
$row2=mysqli_fetch_assoc($result2);
$row3=mysqli_fetch_assoc($result3);

$data = array();
$data[0]= $row['avail'];
$data[1]= $row2['repair'];
$data[2]= $row3['site'];
$conn->close();
echo json_encode($data);
?>

