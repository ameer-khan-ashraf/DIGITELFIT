<?php
    include('includes/access.root.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/dbh.inc.php');
?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT User Profile</h6>
        </div>
    </div>
    <div class="card-body">
    <?php
    $name='';
    $email='';
    if(isset($_GET['edit']))
    {   
        $id = $_GET['edit'];
        $query = "SELECT * FROM users WHERE idUsers='$id' ";
        $query_run = mysqli_query($conn, $query);
        if (!$query_run) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $row=mysqli_fetch_array($query_run);
            ?>
    <form action="includes/update.inc.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['idUsers'] ?>" >
        <div class="form-group">
        <label>Username</label>
            <input type="text" name="edit_uname" value = "<?php echo $row['uidUsers'] ?>" class="form-control" placeholder="Username" required="required" />
        </div>
        <div class="form-group">
        <label>Email</label>
            <input type="text" name="edit_email" value = "<?php echo $row['emailUsers'] ?>" class="form-control" placeholder="Email" required="required" />
        </div>
        <div class="form-group">
            <label>USER TYPE</label>
            <select name="edit_dept" class="form-control">
                <option value="admin">Admin</option>
                <option value="sales">Sales</option>
                <option value="store">Store</option>
                <option value="production">Production</option>
                <option value="IT">IT</option>
                <option value="purchase">Purchase</option>
                <option value="QC">QC</option>
            </select>
        </div>
        <div class="form-group">
        <label>Password</label>
            <input type="password" name="edit_pwd" class="form-control" placeholder="Password..." />
        </div> 
        <div class="form-group">
        <label>Repeat Password</label>
            <input type="password" name="edit_repeat" class="form-control" placeholder="Repeat password" />
        </div>
        <a href="index.php" class="btn btn-danger">CANCEL </a>
        <button name="update-btn" class="btn btn-primary">Update</button>
    </form>
        <?php
    }
    ?>
      </div>
    </div>

  
<?php
    include("includes/scripts.php");
    include("includes/footer.php")
?>