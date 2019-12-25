 <?php
 include("access.php");
 if(isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $role = $_POST['department'];

     if (empty($username)||empty($email)||empty($password)||empty($passwordRepeat)){
         header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
     }
     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
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
    }
    else {

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?error=sqlerror");
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) {
                header("Location: ../register.php?error=usertaken&mail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (uidUsers, emailUsers,pwdUsers,deptname) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss" ,$username,$email,$hashedPwd,$role);
                    mysqli_stmt_execute($stmt);
                    $filename='itlog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/it/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].' created a new user '.$username.' at '.date("h:i:s").PHP_EOL.
                    'Values username= '.$username.' email= '.$email.' department= '.$role.PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    $_SESSION['success'] = "Profile Added" ;
                    header('Location:../register.php');
                    exit();

                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

 }
 else {
    header("Location ../signupp.php");
    exit();
}
 ?>