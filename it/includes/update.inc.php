<?php
include('access.php');
include('dbh.inc.php');
if(isset($_POST['update-btn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_uname'];
    $email = $_POST['edit_email'];
    $pass = $_POST['edit_pwd'];
    $dept = $_POST['edit_dept'];
    $pwdrepeat = $_POST['edit_repeat'];

    $query0 = "SELECT * FROM users where idUsers='$id'";
        $query_run0 = mysqli_query($conn, $query0);
        $row = mysqli_fetch_assoc($query_run0);
        $filename='itlog_'.date('m-d-Y').'.txt';
        $filepath="../../logs/it/$filename";
        $myfile=fopen($filepath,'a');

    if (empty($pass) && empty($pwdrepeat)) {
        $query= "UPDATE users SET uidUsers=?,emailUsers=?,deptname=? WHERE idUsers='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query)){
            printf("Error: %s\n", mysqli_error($conn));
        }
        else{
        mysqli_stmt_bind_param($query_run, "sss" ,$username,$email,$dept);
        mysqli_stmt_execute($query_run);
        

    if ($query_run) {
        
        $log= $_SESSION['username'].' Updated user '.$row['uidUsers'].' at '.date("h:i:s").PHP_EOL.
        'Changed Values username= '.$username.' email= '.$email.' department= '.$dept.PHP_EOL.
        '-----------------------------------------------------------------------'.PHP_EOL;
        fwrite($myfile, $log);
        $_SESSION['success'] = "Your Data is Updated";
        header('location: ../index.php');
        exit();
    }
    else {
        $_SESSION['status'] = "Your Data is NOT updated";
        printf("Error: %s\n", mysqli_error($conn));
        header('Location: ../index.php');
        exit();
    }
    }
    }
    elseif ((empty($pass)||empty($pwdrepeat))||$pass!=$pwdrepeat){
        $_SESSION['status'] = "Passwords Not Matching or Field is empty";
        printf("Error: %s\n", mysqli_error($conn));
        header('Location: ../index.php');
        exit();
    }
    elseif($pass==$pwdrepeat){
        $query= "UPDATE users SET uidUsers=?,emailUsers=?,pwdUsers=?,deptname=? WHERE idUsers='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query)){
            printf("Error: %s\n", mysqli_error($conn));
        }
        else{
        $password = password_hash($pass, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($query_run, "ssss" ,$username,$email,$password,$dept);
        mysqli_stmt_execute($query_run);
        $log= $_SESSION['username'].' Updated user and changed password '.$row['uidUsers'].' at '.date("h:i:s").PHP_EOL.
        'Changed Values username= '.$username.' email= '.$email.' department= '.$dept.PHP_EOL.
        '-----------------------------------------------------------------------'.PHP_EOL;
        fwrite($myfile, $log);
        $_SESSION['success'] = "Your Data is Updated";
        header('location: ../index.php');
        exit();
        }
    }
    else {
        $_SESSION['status'] = "Your Data is NOT updated";
        printf("Error: %s\n", mysqli_error($conn));
        header('Location: ../index.php');
        exit();
    }
}