<?php
include('access.php');
include('dbh.inc.php');
if(isset($_POST['update-mrdate']))
{
    $id = $_GET['id'];
    $date = $_POST['ddate'];
    $filename='purchaselog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/purchase/$filename";
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
    $query= "UPDATE purchaseint SET ddate=? WHERE ID='$id'";
    $query_run = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($query_run,$query))
        {
            printf("Error: %s\n", mysqli_error($conn));
        }
    else
        {
            mysqli_stmt_bind_param($query_run, "s" ,$date);
            mysqli_stmt_execute($query_run);
            $log= $_SESSION['username'].' Updated Material Request Date at '.date("h:i:s").PHP_EOL.
           'Material Request: '.$id.' department: '.$dept.' Upload date '.$udate.' Expected date '.$date.' Product code '.$pcode.' Product description '.$pdesc.' Status '.$mstatus.' Remarks '.$remarks.PHP_EOL.
            '-----------------------------------------------------------------------'.PHP_EOL;
            fwrite($myfile, $log);
            $_SESSION['success'] = "Date is Updated";
            header('location: ../index.php');
            exit(); 
        }
    }
else {
    $_SESSION['status'] = "Date is NOT updated";
    printf("Error: %s\n", mysqli_error($conn));
    header('Location: ../index.php');
    exit();
}
?>