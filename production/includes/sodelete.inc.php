<?php
 include('dbh.inc.php');
 if (isset($_GET['delete'])){
     $id = $_GET['delete'];
     $query = "DELETE FROM salesorder where ID='$id'";
     $query_run = mysqli_query($conn, $query);
     if ($query_run) {
    
        $_SESSION['success'] = "Sales Order deleted";
        header('location: ../salesorder.php');
        exit();
    }
    else {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

 }
 ?>
