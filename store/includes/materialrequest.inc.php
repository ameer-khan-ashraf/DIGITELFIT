<?php
include('dbh.inc.php');
include('access.php');
if(isset($_POST['lmr-submit']))
{   
    $rdate = $_POST['rdate'];
    $udate = $_POST['udate'];
    $dept = $_POST['dept'];
    $reference = $_POST['reference'];
    $pcode = $_POST['pcode'];
    $pdesc = $_POST['pdesc'];
    $ddate =  $_POST['ddate'];
    $unit =  $_POST['unit'];
    $rqty =  $_POST['rqty'];
    $aqty =  $_POST['aqty'];
    $pqty = $rqty-$aqty;
    $purpose = $_POST['purpose'];
    $remarks = $_POST['remarks'];
    
    
    if (empty($dept)){
        $_SESSION['status'] = 'Department cannot be empty' ;
        header("Location: ../index.php?error=emptydept");
        exit();
    }
    elseif(empty($ddate)){
    $_SESSION['status'] = 'Expected date cannot be empty' ;
    header("Location: ../index.php?error=emptydate");
    exit();
    }
    elseif(empty($pcode)){
        $_SESSION['status'] = 'Product code cnnot be empty' ;
        header("Location: ../index.php?error=pcodeempty");
        exit();
    }
    elseif(empty($pdesc)){
        $_SESSION['status'] = 'Product description cannot be empty' ;
       header("Location: ../index.php?error=pdescempty");
       exit();
    }
   /* elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
       header("Location: ../register.php?error=invalidmail&uid=".$username);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&uid=".$username);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invaliduid&mail=".$email);
        exit();
    }
    elseif ($password !== $passwordRepeat) {
        header("Location: ../register.php?error=passwordcheckuid=".$username."&mail=".$email);
       exit();
   } */
   else {
            $sql = "INSERT INTO purchase (dept,rdate,udate,ddate,reference,pcode,pdesc,units,rqty,aqty,pqty,purpose,remarks) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){

                $_SESSION['status'] = printf("Error: %s\n", mysqli_error($conn)) ;
                header("Location: ../index.php?error=sqlerror");
                exit(); 
            }
            else {
                mysqli_stmt_bind_param($stmt, "sssssssssssss" ,$dept,$rdate,$udate,$ddate,$reference,$pcode,$pdesc,$unit,$rqty,$aqty,$pqty,$purpose,$remarks);
                mysqli_stmt_execute($stmt);
                $filename='storelog_'.date('m-d-Y').'.txt';
                $filepath="../../logs/store/$filename";
                $myfile=fopen($filepath,'a');
                $log= $_SESSION['username'].' created local material request at '.date("h:i:s").PHP_EOL.
                'Department: '.$dept.'Upload date: '.$udate.' date due '.$ddate.' Product code '.$pcode.' Product description '.$pdesc.' Product Remarks '.$remarks.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] ="Material Request Added"; 
                printf("Error: %s\n", mysqli_error($conn)) ;
                header('Location:../index.php');
                exit();
            }
        }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
elseif(isset($_POST['imr-submit']))
{
    $rdate = $_POST['rdate'];
    $udate = $_POST['udate'];
    $dept = $_POST['dept'];
    $reference = $_POST['reference'];
    $pcode = $_POST['pcode'];
    $pdesc = $_POST['pdesc'];
    $ddate =  $_POST['ddate'];
    $unit =  $_POST['unit'];
    $rqty =  $_POST['rqty'];
    $aqty =  $_POST['aqty'];
    $pqty = $rqty-$aqty;
    $purpose = $_POST['purpose'];
    $remarks = $_POST['remarks'];
    
    if (empty($dept)){
        $_SESSION['status'] = 'Department cannot be empty' ;
        header("Location: ../index.php?error=emptydept");
        exit();
    }
    elseif(empty($ddate)){
    $_SESSION['status'] = 'Expected date cannot be empty' ;
    header("Location: ../index.php?error=emptydate");
    exit();
    }
    elseif(empty($pcode)){
        $_SESSION['status'] = 'Product code cnnot be empty' ;
        header("Location: ../index.php?error=pcodeempty");
        exit();
    }
    elseif(empty($pdesc)){
       $_SESSION['status'] = 'Product description cannot be empty' ;
       header("Location: ../index.php?error=pdescempty");
       exit();
    }
   /* elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
       header("Location: ../register.php?error=invalidmail&uid=".$username);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&uid=".$username);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invaliduid&mail=".$email);
        exit();
    }
    elseif ($password !== $passwordRepeat) {
        header("Location: ../register.php?error=passwordcheckuid=".$username."&mail=".$email);
       exit();
   } */
   else {
            $sql = "INSERT INTO purchaseint (dept,rdate,udate,ddate,reference,pcode,pdesc,units,rqty,aqty,pqty,purpose,remarks) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){

                $_SESSION['status'] = printf("Error: %s\n", mysqli_error($conn)) ;
                header("Location: ../index.php?error=sqlerror");
                exit(); 
            }
            else {
                mysqli_stmt_bind_param($stmt, "sssssssssssss" ,$dept,$rdate,$udate,$ddate,$reference,$pcode,$pdesc,$unit,$rqty,$aqty,$pqty,$purpose,$remarks);
                mysqli_stmt_execute($stmt);
                $filename='storelog_'.date('m-d-Y').'.txt';
                $filepath="../../logs/store/$filename";
                $myfile=fopen($filepath,'a');
                $log= $_SESSION['username'].' created International material request at '.date("h:i:s").PHP_EOL.
                'Department: '.$dept.'Upload date: '.$udate.' date due '.$ddate.' Product code '.$pcode.' Product description '.$pdesc.' Product Remarks '.$remarks.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Material Request Added" ;
                header('Location:../index.php');
                exit();
            }
        }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
else {
    $_SESSION['status'] = "Info is NOT updated";
    printf("Error: %s\n", mysqli_error($conn));
    header('Location:../index.php');
    exit();
}
?>