<?php
 include('access.php');
 include('dbh.inc.php');
 if (isset($_GET['delete'])){
     $id = $_GET['delete'];
     $query0 = "SELECT * FROM trailrent where mID='$id'";
        $query_run0 = mysqli_query($conn, $query0);
        $row = mysqli_fetch_assoc($query_run0);
        $mtype = $row['MachType'];
        $load=$row['ton'];
        $status=$row['status'];
        $client=$row['Client'];
        $remarks=$row['Remarks'];
        $query = "DELETE FROM trailrent where mID='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
        $filename='productionlog_'.date('m-d-Y').'.txt';
        $filepath="../../logs/production/$filename";
        $myfile=fopen($filepath,'a');
        $log= $_SESSION['username'].' deleted rental trailer equipment at '.date("h:i:s").PHP_EOL.
        'Values ID: '.$id.' Machine type: '.$mtype.' Load: '.$ton.' Status: '.$status.' Remarks '.$remarks.'%'.PHP_EOL.
        '-----------------------------------------------------------------------'.PHP_EOL;
        fwrite($myfile, $log);
        $_SESSION['success'] = "Trailer Equipment deleted";
        header('location: ../rental.php');
        exit();
    }
    else {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
 }
 elseif (isset($_GET['delete1'])){
    $id = $_GET['delete1'];
    $query0 = "SELECT * FROM winchrent where mID='$id'";
        $query_run0 = mysqli_query($conn, $query0);
        $row = mysqli_fetch_assoc($query_run0);
        $mtype = $row['MachType'];
        $load=$row['ton'];
        $status=$row['status'];
        $client=$row['Client'];
        $remarks=$row['Remarks'];
        $query = "DELETE FROM winchrent where mID='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
        $filename='productionlog_'.date('m-d-Y').'.txt';
        $filepath="../../logs/production/$filename";
        $myfile=fopen($filepath,'a');
        $log= $_SESSION['username'].' deleted rental winch equipment at '.date("h:i:s").PHP_EOL.
        'Values ID: '.$id.' Machine type: '.$mtype.' Load: '.$ton.' Status: '.$status.' Remarks '.$remarks.'%'.PHP_EOL.
        '-----------------------------------------------------------------------'.PHP_EOL;
        fwrite($myfile, $log);
        $_SESSION['success'] = "Winch Equipment deleted";
        header('location: ../rental.php');
        exit();
   }
   else {
       printf("Error: %s\n", mysqli_error($conn));
       exit();
   }
}
 else{
    $_SESSION['status'] = "Equipment not deleted";
    printf("Error: %s\n", mysqli_error($conn));
    header('Location: ../orderupdate.php');
    exit();
 }
 ?>

