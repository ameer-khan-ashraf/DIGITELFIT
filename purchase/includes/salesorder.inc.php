 <?php
 include('access.php');
 if(isset($_POST['so-submit'])) {
    require 'dbh.inc.php';

    $orderno = $_POST['uid'];
    $dateplaced = date("Y/m/d");
    $datedue = $_POST['ddate'];
    $priority = $_POST['priority'];
    $name = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $data = file_get_contents($_FILES['file']['tmp_name']);

     if (empty($orderno)){
         header("Location: ../salesorder.php?error=emptyorderno");
        exit();
     }
     elseif(empty($dateplaced)||empty($datedue)){
        header("Location: ../salesorder.php?error=emptydate");
        exit();
     }
     elseif(empty($priority)){
        header("Location: ../salesorder.php?error=emptypriority");
        exit();
     }
     elseif(empty($data)){
        header("Location: ../salesorder.php?error=emptydata");
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

        $sql = "SELECT orderid FROM salesorder WHERE orderid=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            /*header("Location: ../salesorder.php?error=sqlerror");*/
            printf("Error: %s\n", mysqli_error($conn));
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) {
                $_SESSION['status'] = 'Order name already taken' ;
                header("Location: ../salesorder.php?error=ordernametaken");
                exit();
            }
            else {
                $sql = "INSERT INTO salesorder (orderid, dateplaced,datedue,priority,file_name,file_type,so_file) VALUES (?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){

                    $_SESSION['status'] = printf("Error: %s\n", mysqli_error($conn)) ;
                    header("Location: ../salesorder.php?error=sqlerror");
                    exit(); 
                }
                else {
                    mysqli_stmt_bind_param($stmt, "sssssss" ,$orderno,$dateplaced,$datedue,$priority,$name,$type,$data);
                    mysqli_stmt_execute($stmt);
                    $filename='saleslog_'.date('m-d-Y').'.txt';
                    $filepath="../../logs/sales/$filename";
                    $myfile=fopen($filepath,'a');
                    $log= $_SESSION['username'].' created sales order at '.date("h:i:s").PHP_EOL.
                    'Values Orderno: '.$orderno.' date placed: '.$dateplaced.' date due '.$datedue.' Priority '.$priority.PHP_EOL.
                    '-----------------------------------------------------------------------'.PHP_EOL;
                    fwrite($myfile, $log);
                    $_SESSION['success'] = "Sales Order Added" ;
                    header('Location:../salesorder.php');
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