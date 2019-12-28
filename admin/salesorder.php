<?php
    include('includes/access.root.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/dbh.inc.php');
?>



<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-danger py-3">   
            <h6 class="m-2 font-weight-bold text-light">Sales Order Approval
            </h6>
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
            $query = "SELECT * FROM salesorder";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Date Placed</th>
                    <th scope="col">Date Due</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Download SO</th>
                    <th scope="col">Approval</th>
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
                    <td>
                    <a class="btn btn-primary" href="includes/approveso.inc.php?id=<?php echo $row['ID'];?>">Download</a>
                    </td>
                    <form action="includes/updateprog.inc.php?id=<?php echo $row['ID'];?>" method="POST">
                    <td>
                        <div class="form-group">
                            <select name="edit_approval" class="form-control">
                                <option value="" disabled selected hidden><?php echo $row['approval'];?></option>
                                <option value="Rejected">Rejected</option>
                                <option value="Approved">Approved</option>
                            </select>
                        </div>
                    </td>
                    <td>
                    <button name="update-btn" type="submit" class="btn btn-primary">Update</button>
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