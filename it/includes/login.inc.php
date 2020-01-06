<?php
include('access.php');
include('dbh.inc.php');
if(isset ($_POST['login_submit'])) {
    $user_login = $_POST['username'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM users WHERE uidUsers= ? OR emailUsers= ?;";
    $query_run = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($query_run, $query))
    {
            /*$_SESSION['status'] = 'Email id / Password is Invalid';
            header('Location: ../index.php');*/
            printf("Error: %s\n", mysqli_error($conn));
                exit();
    }
    else
        {   
           mysqli_stmt_bind_param($query_run,"ss",$user_login,$user_login);
            mysqli_stmt_execute($query_run);
            $result = mysqli_stmt_get_result($query_run);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password_login, $row['pwdUsers']);
                if($pwdCheck== false) {
                    $_SESSION['status'] = 'Email id / Password is Wrong';
                    header('Location: ../../index.php');
                    exit();
                }
                else if ($pwdCheck==true)
                {
                    if ($row['deptname']=="IT"){
                    $_SESSION['username'] = $user_login;
                    $filename='itlog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/it/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].'has logged in at'.date("h:i:s").PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log); 
                    header('Location: ../index.php');
                    exit();
                    }
                    elseif ($row['deptname']=="admin"){
                    $_SESSION['username'] = $user_login;
                    $filename='adminlog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/admin/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].'has logged in at'.date("h:i:s").PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    header('Location: ../../admin/index.php');
                    exit();
                    }
                    elseif ($row['deptname']=="sales"){
                    $_SESSION['username'] = $user_login;
                    $filename='saleslog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/sales/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].'has logged in at'.date("h:i:s").PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    header('Location: ../../sales/index.php');
                    exit();
                    }
                    elseif ($row['deptname']=="store"){
                    $_SESSION['username'] = $user_login;
                    $filename='storelog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/store/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].'has logged in at'.date("h:i:s").PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    header('Location: ../../store/index.php');
                    exit();
                    }
                    elseif ($row['deptname']=="production")
                    {
                    $_SESSION['username'] = $user_login;
                    $filename='productionlog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/production/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].'has logged in at'.date("h:i:s").PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    header('Location: ../../production/index.php');
                    exit();
                    }
                    elseif ($row['deptname']=="purchase")
                    {
                    $_SESSION['username'] = $user_login;
                    $filename='purchaselog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/purchase/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].'has logged in at'.date("h:i:s").PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    header('Location: ../../purchase/index.php');
                    exit();
                    }
                    elseif ($row['deptname']=="QC")
                    {
                    $_SESSION['username'] = $user_login;
                    $filename='QClog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/QC/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].'has logged in at'.date("h:i:s").PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    header('Location: ../../QC/index.php');
                    exit();
                    }
                }
                else{
                    $_SESSION['status'] = 'Email id / Password is Invalid';
                    header('Location: ../../index.php');
                }
            }
            else {
                $_SESSION['status'] = 'Email id / Password is Invalid';
                header('Location: ../../index.php');
                
            }
        }
}
else {
    header("location: ../index.php");
    exit();
}

?>