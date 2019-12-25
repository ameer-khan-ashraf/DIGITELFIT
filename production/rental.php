<?php
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/dbh.inc.php');
?>

<!-- Modal -->
<div class="modal fade" id="trailermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Trailer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="includes/trailrent.inc.php" enctype="multipart/form-data" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Machine Type</label>
                        <input type="text" name="mtype" class="form-control" placeholder="Enter Trailer Type" required="required">
                    </div>

                    <div class="form-group">
                        <label>Ton</label>
                        <input type="text" name="mload" class="form-control" placeholder="Enter weight capacity" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="so-submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">   
            <h6 class="m-2 font-weight-bold text-primary">Trailer
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#trailermodal">
                Add Machine
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
            $query = "SELECT * FROM trailrent";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Machine Type</th>
                    <th scope="col">Ton</th>
                    <th scope="col">Status</th>
                    <th scope="col">Client</th>
                    <th scope="col">Remarks</th>
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
                    <td><?php echo $row['mID'];?></td>
                    <td><?php echo $row['MachType'];?></td>
                    <td><?php echo $row['ton'];?></td>
                    <form action="includes/updateequip.inc.php?id=<?php echo $row['mID'];?>" method="POST">
                    <td>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="" disabled selected hidden><?php echo $row['status'];?></option>
                                <option value="Site">On Site</option>
                                <option value="Repair">Undergoing Repairs</option>
                                <option value="Available">Available</option>
                            </select>
                        </div>
                    </td>
                    <td>
                    <div class="form-group">
                        <input type="text" name="client" class="form-control" placeholder="<?php echo $row['Client']; ?>">
                    </div>
                    </td>
                    <td>
                    <div class="form-group">
                        <input type="text" name="remark" class="form-control" placeholder="<?php echo $row['Remarks']; ?>">
                    </div>
                    </td>
                    <td>
                    <button type="submit" name="update-trail" class="btn btn-primary">Update</button>
                    </td>
                    </form>
                    <td>
                    <a class="btn btn-danger" href="includes/equipdelete.inc.php?delete=<?php echo $row['mID'];?>">Delete</a>
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


<!-- Modal -->
<div class="modal fade" id="winchmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Winch Machine</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="includes/winchrent.inc.php" enctype="multipart/form-data" method="post">
                <div class="modal-body">

                <div class="form-group">
                        <label>Machine Type</label>
                        <input type="text" name="mtype" class="form-control" placeholder="Enter Trailer Type" required="required">
                    </div>

                    <div class="form-group">
                        <label>Ton</label>
                        <input type="text" name="mload" class="form-control" placeholder="Enter weight capacity" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="so-submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">   
            <h6 class="m-2 font-weight-bold text-primary">Winch Machine
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#winchmodal">
                Add Equipment
                </button>
            </h6>
        </div>
        <div class="card-body">
            <?php
            $query2 = "SELECT * FROM winchrent";
            $query_r = mysqli_query($conn,$query2)
            ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Machine Type</th>
                    <th scope="col">Ton</th>
                    <th scope="col">Status</th>
                    <th scope="col">Client</th>
                    <th scope="col">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($query_r) > 0)
                    {
                        while($row1 = mysqli_fetch_assoc($query_r))
                        {
                            ?>
                    <tr>
                    <td><?php echo $row1['mID'];?></td>
                    <td><?php echo $row1['MachType'];?></td>
                    <td><?php echo $row1['ton'];?></td>
                    <form action="includes/updateequip.inc.php?id=<?php echo $row1['mID'];?>" method="POST">
                    <td>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="" disabled selected hidden><?php echo $row1['status'];?></option>
                                <option value="Site">On Site</option>
                                <option value="Repair">Undergoing Repairs</option>
                                <option value="Available">Available</option>
                            </select>
                        </div>
                    </td>
                    <td>
                    <div class="form-group">
                        <input type="text" name="client" class="form-control" placeholder="<?php echo $row1['Client']; ?>">
                    </div>
                    </td>
                    <td>
                    <div class="form-group">
                        <input type="text" name="remark" class="form-control" placeholder="<?php echo $row1['Remarks']; ?>">
                    </div>
                    </td>
                    <td>
                    <button type="submit" name="update-winch" class="btn btn-primary">Update</button>
                    </td>
                    </form>
                    <td>
                    <a class="btn btn-danger" href="includes/equipdelete.inc.php?delete1=<?php echo $row1['mID'];?>">Delete</a>
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