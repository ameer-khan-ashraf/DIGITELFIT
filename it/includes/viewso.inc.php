<?php
include('dbh.inc.php');

if(isset($_GET['id'])){

$id=$_GET['id'];
$sql = "select * from salesorder where id=$id ";
$res = $conn->query($sql) or die($conn->error);
while($row = $res->fetch_assoc())
{ 
    $name = $row['file_name'];
    $type = $row['file_type'];
    $image = $row['so_file'];
}

header("Content-type: ".$type);
header('Content-Disposition: attachment; filename="'.$name.'"');
header("Content-Transfer-Encoding: binary"); 
header('Expires: 0');
header('Pragma: no-cache');

echo $image;
}
exit();
?>