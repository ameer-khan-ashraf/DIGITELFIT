<?php
include('access.php');
include('dbh.inc.php');
if(isset($_POST['update-btn']))
{
    $id = $_GET['id'];
    $approval = $_POST['edit_approval'];
    $filename='adminlog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/admin/$filename";
    $myfile=fopen($filepath,'a');
    $query0 = "SELECT * FROM users where idUsers='$id'";
    $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $orderno = $row['orderid'];
    $dateplaced=$row['dateplaced'];
    $datedue=$row['datedue'];
    $priority=$row['priority'];
    $oldstatus=$row['sostatus'];
    $oldprogress=$row['progress']*100;
        $query= "UPDATE salesorder SET approval=? WHERE ID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$approval);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated sales order approval at '.date("h:i:s").PHP_EOL.
                'Orderno: '.$orderno.' date placed: '.$dateplaced.' date due '.$datedue.' Priority '.$priority.' Status '.$oldstatus.' Progress '.$actprog.'%'.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Approval is Updated";
                header('location: ../salesorder.php');
                exit();
            }
    
}
else {
    $_SESSION['status'] = "Progress is NOT updated";
    printf("Error: %s\n", mysqli_error($conn));
    header('Location: ../salesorder.php');
    exit();
}
?>