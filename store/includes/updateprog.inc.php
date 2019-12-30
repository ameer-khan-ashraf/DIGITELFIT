<?php
include('access.php');
include('dbh.inc.php');
if(isset($_POST['aprv-lmr']))
{
    $id = $_GET['id'];
    $approval = $_POST['edit_approval'];
    $filename='adminlog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/admin/$filename";
    $myfile=fopen($filepath,'a');
    $query0 = "SELECT * FROM purchase where id='$id'";
    $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $rdate=$row['rdate'];
    $udate=$row['udate'];
    $dept=$row['dept'];
    $reference=$row['reference'];
    $pcode=$row['pcode'];
    $pdesc=$row['pdesc'];
    $ddate=$row['ddate'];
    $units=$row['units'];
    $rqty=$row['rqty'];
    $aqty=$row['aqty'];
    $pqty=$row['pqty'];
    $purpose=$row['purpose'];
    $remarks=$row['remarks'];
        $query= "UPDATE purchase SET mstatus=? WHERE id='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$approval);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated Material request approval at '.date("h:i:s").PHP_EOL.
                'Id: '.$id.' date requested: '.$rdate.' date placed: '.$udate.' date due '.$ddate.' dept: '.$dept.' Status '.$approval.' Reference '.$reference.' Product Code '.$pcode.' Product description '.$pdesc.' Unit '.$units.' Required qty'.$rqty.' Available Qty '.$aqty.' Purchase qty '.$pqty.' Purpose '.$purpose.' Remarks '.$remarks.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Approval is Updated";
                header('location: ../index.php');
                exit();
            }
    
}
elseif(isset($_POST['aprv-imr']))
{
    $id = $_GET['id'];
    $approval = $_POST['edit_approval'];
    $filename='adminlog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/admin/$filename";
    $myfile=fopen($filepath,'a');
    $query0 = "SELECT * FROM purchaseint where id='$id'";
    $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $rdate=$row['rdate'];
    $udate=$row['udate'];
    $dept=$row['dept'];
    $reference=$row['reference'];
    $pcode=$row['pcode'];
    $pdesc=$row['pdesc'];
    $ddate=$row['ddate'];
    $units=$row['units'];
    $rqty=$row['rqty'];
    $aqty=$row['aqty'];
    $pqty=$row['pqty'];
    $purpose=$row['purpose'];
    $remarks=$row['remarks'];
        $query= "UPDATE purchaseint SET mstatus=? WHERE id='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$approval);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated Material request approval at '.date("h:i:s").PHP_EOL.
                'Id: '.$id.' date requested: '.$rdate.' date placed: '.$udate.' date due '.$ddate.' dept: '.$dept.' Status '.$approval.' Reference '.$reference.' Product Code '.$pcode.' Product description '.$pdesc.' Unit '.$units.' Required qty'.$rqty.' Available Qty '.$aqty.' Purchase qty '.$pqty.' Purpose '.$purpose.' Remarks '.$remarks.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Approval is Updated";
                header('location: ../index.php');
                exit();
            }
    
}
else {
    $_SESSION['status'] = "Progress is NOT updated";
    printf("Error: %s\n", mysqli_error($conn));
    header('Location: ../index.php');
    exit();
}
?>