<?php
session_start();
$filename='productionlog_'.date('m-d-Y').'.txt';
$filepath="../../logs/production/$filename";
$myfile=fopen($filepath,'a');
$log= $_SESSION['username'].'has logged out at'.date("h:i:s").PHP_EOL.
'-----------------------------------------------------------------------'.PHP_EOL;
fwrite($myfile, $log);
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: ../../index.php');

die();
?>