<?php
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/dbh.inc.php');
?>



<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">   
            <h6 class="m-2 font-weight-bold text-primary">Sales Orders</h6>
        </div>
        <div class="card-body">
            <?php
            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
            {
                echo '<h2>'.$_SESSION['success'].'</h2>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
            {
                echo '<h2 class="bg-info">'.$_SESSION['status'].'</h2>';
                unset($_SESSION['status']);
            }
            ?>
            <?php
            $query = "SELECT * FROM salesorder where approval ='Approved';";
            $query_run = mysqli_query($conn,$query);
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Date Placed</th>
                    <th scope="col">Date Due</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    <th scope="col">Progress</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                    <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['orderid'];?></td>
                    <td><?php echo $row['dateplaced'];?></td>
                    <td><?php echo $row['datedue'];?></td>
                    <td><?php echo $row['priority'];?></td>
                    <form action="includes/updateprog.inc.php?id=<?php echo $row['ID'];?>" method="POST">
                    <td>
                        <div class="form-group">
                            <select name="edit_status" class="form-control">
                                <option value="" disabled selected hidden><?php echo $row['sostatus'];?></option>
                                <option value="STARTED">Start</option>
                                <option value="HALTED">Halt</option>
                                <option value="COMPLETED">Completed</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select name="edit_progress" class="form-control">
                            <option value="" disabled selected hidden><?php $per=$row['progress']*100; echo $per."%"; ?></option>
                            <option value="0.10">10%</option>
                            <option value="0.20">20%</option>
                            <option value="0.30">30%</option>
                            <option value="0.40">40%</option>
                            <option value="0.50">50%</option>
                            <option value="0.60">60%</option>
                            <option value="0.70">70%</option>
                            <option value="0.80">80%</option>
                            <option value="0.90">90%</option>
                            <option value="1.00">100%</option>
                            </select>
                        </div>
                    </td>
                    <td>
                    <button name="update-btn" class="btn btn-primary">Update</button>
                    </td>
                    </form>
                    </tr>
                    <?php

                        }
                    }
                    else {
                        echo "No Record Found";
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php
      include("includes/scripts.php");
      include("includes/footer.php");
?>