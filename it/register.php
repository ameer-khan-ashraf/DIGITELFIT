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
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Register New User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="includes/signup.inc.php" method="post">
            <div class="modal-body">

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="uid" class="form-control" placeholder="Username" required="required">

                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email" required="required">
                </div>

                <div class="form-group">
                    <label>USER TYPE</label>
                    <select name="department" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="sales">Sales</option>
                        <option value="store">Store</option>
                        <option value="production">Production</option>
                        <option value="IT">IT</option>
                        <option value="purchase">Purchase</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pwd" class="form-control" placeholder="Password..." required="required">
                </div>

                <div class="form-group">
                    <label>Repeat Password</label>
                    <input type="password" name="pwd-repeat" class="form-control" placeholder="Repeat password" required="required">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="signup-submit" class="btn btn-primary">Save</button>
            </div>
        </form>
          </div>
        </div>
      </div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">   
            <h6 class="m-2 font-weight-bold text-primary">User Profiles
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registermodal">
                Register New User
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
            $query = "SELECT * FROM users";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
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
                    <td><?php echo $row['idUsers'];?></td>
                    <td><?php echo $row['uidUsers'];?></td>
                    <td><?php echo $row['emailUsers'];?></td>
                    <td><?php echo $row['deptname'];?></td>
                    <td>
                    <a class="btn btn-success" href="useredit.php?edit=<?php echo $row['idUsers'];?>">Edit</a>
                    </td>
                    <td>
                    <a class="btn btn-danger" href="includes/userdelete.inc.php?delete=<?php echo $row['idUsers'];?>">Delete</a>
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