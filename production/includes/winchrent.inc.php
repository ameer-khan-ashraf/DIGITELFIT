<?php
   include('access.php');
 if(isset($_POST['so-submit'])) {
    require 'dbh.inc.php';

    $mtype = $_POST['mtype'];
    $load = $_POST['mload'];

     if (empty($mtype)){
        $_SESSION['status'] = "Enter Machine Type";
        header("Location: ../rental.php?error=emptymachinetype");
     }
     elseif(empty($load)){
        $_SESSION['status'] = "Enter Load";
        header("Location: ../rental.php?error=emptyload");
     }
    else {
                $sql = "INSERT INTO winchrent (MachType, ton) VALUES (?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    /*header("Location: ../salesorder.php?error=sqlerror");*/
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ss" ,$mtype,$load);
                    mysqli_stmt_execute($stmt);
                    $filename='productionlog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/production/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].' created new rental winch machine entry at '.date("h:i:s").PHP_EOL.
                    'Machine type: '.$mtype.' Load Capacity: '.$load.PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    $_SESSION['success'] = "Equipment Added" ;
                    header('Location:../rental.php');
                    exit();
                }
            }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
 }
 else {
    header("Location ../signupp.php");
    exit();
}
 ?>