<?php
    include('includes/access.root.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/dbh.inc.php');
?>

<!-- Modal -->
<div class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-gradient-warning">
              <h5 class="modal-title text-dark" id="exampleModalLabel">New Sales Order</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="includes/salesorder.inc.php" enctype="multipart/form-data" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Order ID</label>
                        <input type="text" name="uid" class="form-control" placeholder="EA-SO-XX-XXX" required="required">

                    </div>

                    <div class="form-group">
                        <label>Date Due</label>
                        <input type="date" name="ddate" class="form-control" placeholder="Deadline" required="required">
                    </div>

                    <div class="form-group">
                        <label>Priority</label>
                        <select name="priority" class="form-control">
                            <option value="high">HIGH</option>
                            <option value="medium">MEDIUM</option>
                            <option value="low">LOW</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SO copy</label>
                        <input accept="application/pdf" type="file" name="file" class="form-control" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="so-submit" class="btn btn-warning text-dark">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-danger py-3">   
            <h6 class="m-2 font-weight-bold text-light">Sales Orders 
                <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#registermodal">
                Create New Order
                </button>
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
                    <th scope="col">DELETE</th>
                    <th scope="col">Download SO</th>
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
                    <a class="btn btn-danger" href="includes/sodelete.inc.php?delete=<?php echo $row['ID'];?>">Delete</a>
                    </td>
                    <td>
                    <a class="btn btn-primary" href="includes/viewso.inc.php?id=<?php echo $row['ID'];?>">Download</a>
                    </td>
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