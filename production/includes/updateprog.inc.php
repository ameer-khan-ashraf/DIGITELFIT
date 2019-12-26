<?php
include('access.php');
include('dbh.inc.php');
if(isset($_POST['update-btn']))
{
    $id = $_GET['id'];
    $status = $_POST['edit_status'];
    $progress = $_POST['edit_progress'];
    $actprog=$progress*100;
    $filename='productionlog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/production/$filename";
    $myfile=fopen($filepath,'a');
    $query0 = "SELECT * FROM salesorder where idUsers='$id'";
    $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $orderno = $row['orderid'];
    $dateplaced=$row['dateplaced'];
    $datedue=$row['datedue'];
    $priority=$row['priority'];
    $oldstatus=$row['sostatus'];
    $oldprogress=$row['progress']*100;
    if (empty($status)){
        $query= "UPDATE salesorder SET progress=? WHERE ID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$progress);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated sales order progress at '.date("h:i:s").PHP_EOL.
                'Orderno: '.$orderno.' date placed: '.$dateplaced.' date due '.$datedue.' Priority '.$priority.' Status '.$oldstatus.' Progress '.$actprog.'%'.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Progress is Updated";
                header('location: ../orderupdate.php');
                exit();
            }
    }
    elseif (empty($progress)){
        $query= "UPDATE salesorder SET sostatus=? WHERE ID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$status);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated sales order status at '.date("h:i:s").PHP_EOL.
                'Values Orderno: '.$orderno.' date placed: '.$dateplaced.' date due '.$datedue.' Priority '.$priority.' Status '.$status.' Progress '.$oldprogress.'%'.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Status is Updated";
                header('location: ../orderupdate.php');
                exit();
            }
    }
    else{
        $query= "UPDATE salesorder SET sostatus=?,progress=? WHERE ID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "ss" ,$status,$progress);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated sales order progress & status at '.date("h:i:s").PHP_EOL.
                'Values Orderno: '.$orderno.' date placed: '.$dateplaced.' date due '.$datedue.' Priority '.$priority.' Status '.$status.' Progress '.$actprog.'%'.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Progress is Updated";
                header('location: ../orderupdate.php');
                exit();
            }
    }
}
else {
    $_SESSION['status'] = "Progress is NOT updated";
    printf("Error: %s\n", mysqli_error($conn));
    header('Location: ../orderupdate.php');
    exit();
}
?>