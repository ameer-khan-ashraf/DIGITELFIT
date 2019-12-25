<?php
include('access.php');
 include('dbh.inc.php');
 if (isset($_GET['delete'])){
     $id = $_GET['delete'];
     $query0 = "SELECT * FROM salesorder where ID='$id'";
        $query_run0 = mysqli_query($conn, $query0);
        $row = mysqli_fetch_assoc($query_run0);
        $orderno = $row['orderid'];
        $dateplaced=$row['dateplaced'];
        $datedue=$row['datedue'];
        $priority=$row['priority'];
        $status=$row['sostatus'];
        $progress=$row['progress']*100;
        $query = "DELETE FROM salesorder where ID='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
        $filename='saleslog_'.date('m-d-Y').'.txt';
        $filepath="../../logs/sales/$filename";
        $myfile=fopen($filepath,'a');
        $log= $_SESSION['username'].' deleted sales order at '.date("h:i:s").PHP_EOL.
        'Values Orderno: '.$orderno.' date placed: '.$dateplaced.' date due '.$datedue.' Priority '.$priority.' Status '.$status.' Progress '.$progress.'%'.PHP_EOL.
        '-----------------------------------------------------------------------'.PHP_EOL;
        fwrite($myfile, $log);
        $_SESSION['success'] = "Sales Order deleted";
        header('location: ../salesorder.php');
        exit();
    }
    else {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

 }
 else{
    $_SESSION['status'] = "Sales order not deleted";
    printf("Error: %s\n", mysqli_error($conn));
    header('Location: ../orderupdate.php');
    exit();
 }
 ?>
