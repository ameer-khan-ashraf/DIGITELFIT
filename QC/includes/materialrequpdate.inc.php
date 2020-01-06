<?php
include('access.php');
include('dbh.inc.php');
if(isset($_POST['update-mr']))
{
    $id = $_GET['id'];
    $qcstatus = $_POST['qcstatus'];
    $remark = $_POST['remark'];
    $filename='QClog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/QC/$filename";
    $myfile=fopen($filepath,'a');
    $query0 = "SELECT * FROM purchase where id='$id'";
    $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $dept = $row['dept'];
    $udate=$row['udate'];
    $pcode=$row['pcode'];
    $pdesc=$row['pdesc'];
    $mstatus=$row['mstatus'];
    $remarks=$row['remarks'];
    $qcstatuss = $row['qcstatus'];
    if (empty($qcstatus)){
    $query= "UPDATE purchase SET remarks=? WHERE ID='$id'";
    $query_run = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($query_run,$query))
        {
            printf("Error: %s\n", mysqli_error($conn));
        }
    else
        {
            mysqli_stmt_bind_param($query_run, "s" ,$remark);
            mysqli_stmt_execute($query_run);
            $log= $_SESSION['username'].' Updated Material Request Remarks at '.date("h:i:s").PHP_EOL.
           'Material Request: '.$id.' department: '.$dept.' Upload date '.$udate.' Expected date '.$date.' Product code '.$pcode.' Product description '.$pdesc.' Status '.$mstatus.' QC Status '.$qcstatuss.' Remarks '.$remark.PHP_EOL.
            '-----------------------------------------------------------------------'.PHP_EOL;
            fwrite($myfile, $log);
            $_SESSION['success'] = "Date is Updated";
            header('location: ../index.php');
            exit(); 
        }
    }
    elseif (empty($remark)){
        $query= "UPDATE purchase SET qcstatus=? WHERE ID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$qcstatus);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' Updated International Material Request QC Status at '.date("h:i:s").PHP_EOL.
               'Material Request: '.$id.' department: '.$dept.' Upload date '.$udate.' Expected date '.$date.' Product code '.$pcode.' Product description '.$pdesc.' Status '.$mstatus.' QC Status '.$qcstatus.' Remarks '.$remarks.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Date is Updated";
                header('location: ../index.php');
                exit(); 
            }
        }
        else{
            $query= "UPDATE purchase SET remarks=?, qcstatus=? WHERE ID='$id'";
            $query_run = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($query_run,$query))
                {
                    printf("Error: %s\n", mysqli_error($conn));
                }
            else
                {
                    mysqli_stmt_bind_param($query_run, "ss",$remark ,$qcstatus);
                    mysqli_stmt_execute($query_run);
                    $log= $_SESSION['username'].' Updated Material Request QC Status at '.date("h:i:s").PHP_EOL.
                   'Material Request: '.$id.' department: '.$dept.' Upload date '.$udate.' Expected date '.$date.' Product code '.$pcode.' Product description '.$pdesc.' Status '.$mstatus.' QC Status '.$qcstatus.' Remarks '.$remark.PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    $_SESSION['success'] = "Date is Updated";
                    header('location: ../index.php');
                    exit(); 
                }
            }
        
}
elseif(isset($_POST['update-mrint']))
{
    $id = $_GET['id'];
    $qcstatus = $_POST['qcstatus'];
    $remark = $_POST['remark'];
    $filename='QClog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/QC/$filename";
    $myfile=fopen($filepath,'a');
    $query0 = "SELECT * FROM purchaseint where id='$id'";
    $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $dept = $row['dept'];
    $udate=$row['udate'];
    $pcode=$row['pcode'];
    $pdesc=$row['pdesc'];
    $mstatus=$row['mstatus'];
    $remarks=$row['remarks'];
    $qcstatuss = $row['qcstatus'];
    if (empty($qcstatus)){
    $query= "UPDATE purchaseint SET remarks=? WHERE ID='$id'";
    $query_run = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($query_run,$query))
        {
            printf("Error: %s\n", mysqli_error($conn));
        }
    else
        {
            mysqli_stmt_bind_param($query_run, "s" ,$remark);
            mysqli_stmt_execute($query_run);
            $log= $_SESSION['username'].' Updated Material Request Remarks at '.date("h:i:s").PHP_EOL.
           'Material Request: '.$id.' department: '.$dept.' Upload date '.$udate.' Expected date '.$date.' Product code '.$pcode.' Product description '.$pdesc.' Status '.$mstatus.' QC Status '.$qcstatuss.' Remarks '.$remark.PHP_EOL.
            '-----------------------------------------------------------------------'.PHP_EOL;
            fwrite($myfile, $log);
            $_SESSION['success'] = "Date is Updated";
            header('location: ../index.php');
            exit(); 
        }
    }
    elseif (empty($remark)){
        $query= "UPDATE purchaseint SET qcstatus=? WHERE ID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$qcstatus);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' Updated Material Request QC Status at '.date("h:i:s").PHP_EOL.
               'Material Request: '.$id.' department: '.$dept.' Upload date '.$udate.' Expected date '.$date.' Product code '.$pcode.' Product description '.$pdesc.' Status '.$mstatus.' QC Status '.$qcstatus.' Remarks '.$remarks.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Date is Updated";
                header('location: ../index.php');
                exit(); 
            }
        }
        else{
            $query= "UPDATE purchaseint SET remarks=?, qcstatus=? WHERE ID='$id'";
            $query_run = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($query_run,$query))
                {
                    printf("Error: %s\n", mysqli_error($conn));
                }
            else
                {
                    mysqli_stmt_bind_param($query_run, "ss",$remark ,$qcstatus);
                    mysqli_stmt_execute($query_run);
                    $log= $_SESSION['username'].' Updated Material Request QC Status at '.date("h:i:s").PHP_EOL.
                   'Material Request: '.$id.' department: '.$dept.' Upload date '.$udate.' Expected date '.$date.' Product code '.$pcode.' Product description '.$pdesc.' Status '.$mstatus.' QC Status '.$qcstatus.' Remarks '.$remark.PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    $_SESSION['success'] = "Date is Updated";
                    header('location: ../index.php');
                    exit(); 
                }
            }
        
}
else {
    $_SESSION['status'] = "Date is NOT updated";
    printf("Error: %s\n", mysqli_error($conn));
    header('Location: ../index.php');
    exit();
}
?>