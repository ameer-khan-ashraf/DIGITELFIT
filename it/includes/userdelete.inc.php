<?php
 include('access.php');
 include('dbh.inc.php');
 if (isset($_GET['delete'])){
     $id = $_GET['delete'];
     $query0 = "SELECT * FROM users where idUsers='$id'";
     $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $filename='adminlog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/it/$filename";
    $myfile=fopen($filepath,'a');
    $log= $_SESSION['username'].' deleted user '.$row['uidUsers'].' at '.date("h:i:s").PHP_EOL.
    'Changed Values username= '.$row['uidUsers'].' email= '.$row['emailUsers'].' department= '.$row['deptname'].PHP_EOL.
    '-----------------------------------------------------------------------'.PHP_EOL;
    fwrite($myfile, $log);
     $query = "DELETE FROM users where idUsers='$id'";
     $query_run = mysqli_query($conn, $query);
     if ($query_run) {
    
        $_SESSION['success'] = "User deleted";
        header('location: ../register.php');
        exit();
    }
    else {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

 }
 ?>
