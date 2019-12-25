<?php
header('Content-Type: application/json');
include("access.php");
include("dbh.inc.php");
$query = "SELECT ID,orderid,progress FROM salesorder ORDER BY orderid";
$query_run = mysqli_query($conn,$query);
$data = array();
foreach ($query_run as $row) {
    $data[] = $row;
}
$query_run->close();
$conn->close();
echo json_encode($data);
?>

