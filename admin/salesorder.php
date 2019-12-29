<?php
    include('includes/access.root.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/dbh.inc.php');
?>



<div class="container-fluid">
<div class="row">
<div class="col-xl-12 col-md-12 mb-4">
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
    </div>
    <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
        <div class="card-header bg-gradient-primary py-3"> 
            <h6 class="m-2 font-weight-bold text-light">
            <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#lmrmodal">
            Create New Request
            </button>  
            Local Material Request</h6>
        </div>
        <div class="card-body table-wrapper-scroll-y my-custom-scrollbar" style="height:40vh;">
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
            $query = "SELECT * FROM purchase";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-bordered table-striped ">
                <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th style="min-width:120px;" scope="col">Required Date</th>
                    <th style="min-width:120px;" scope="col">Uploaded Date</th>
                    <th scope="col">Department</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Product code</th>
                    <th style="min-width:160px;" scope="col">Product description</th>
                    <th style="min-width:120px;" scope="col">Expected date</th>
                    <th style="min-width:120px;" scope="col">Status</th>
                    <th scope="col">Units</th>                    
                    <th scope="col">Req Qty</th>
                    <th scope="col">Avl Qty</th>
                    <th scope="col">Pur Qty</th>
                    <th scope="col">Purpose</th>
                    <th style="min-width:160px;" scope="col">Remarks</th>
                    
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
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['rdate'];?></td>
                    <td><?php echo $row['udate'];?></td>
                    <td><?php echo $row['dept'];?></td>
                    <td><?php echo $row['reference'];?></td>
                    <td><?php echo $row['pcode'];?></td>
                    <td><?php echo $row['pdesc'];?></td>
                    <td><?php echo $row['ddate'];?></td>
                    <td><?php echo $row['mstatus'];?></td>
                    <td><?php echo $row['units'];?></td>
                    <td><?php echo $row['rqty'];?></td>
                    <td><?php echo $row['aqty'];?></td>
                    <td><?php echo $row['pqty'];?></td>
                    <td><?php echo $row['purpose'];?></td>
                    <td><?php echo $row['remarks'];?></td>
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
            </div>
    <div class="row">
                        
    <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
        <div class="card-header bg-gradient-info py-3">   
            <h6 class="m-2 font-weight-bold text-light">
            <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#imrmodal">
            Create New Request
            </button>  
              International Material Request</h6>
        </div>
        <div class="card-body table-wrapper-scroll-y my-custom-scrollbar" style="height:50vh;">
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
            $query = "SELECT * FROM purchaseint";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th style="min-width:120px;" scope="col">Required Date</th>
                    <th style="min-width:120px;" scope="col">Uploaded Date</th>
                    <th scope="col">Department</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Product code</th>
                    <th style="min-width:160px;" scope="col">Product description</th>
                    <th style="min-width:120px;" scope="col">Expected date</th>
                    <th style="min-width:120px;" scope="col">Status</th>
                    <th scope="col">Units</th>                    
                    <th scope="col">Req Qty</th>
                    <th scope="col">Avl Qty</th>
                    <th scope="col">Pur Qty</th>
                    <th scope="col">Purpose</th>
                    <th style="min-width:160px;" scope="col">Remarks</th>
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
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['rdate'];?></td>
                    <td><?php echo $row['udate'];?></td>
                    <td><?php echo $row['dept'];?></td>
                    <td><?php echo $row['reference'];?></td>
                    <td><?php echo $row['pcode'];?></td>
                    <td><?php echo $row['pdesc'];?></td>
                    <td><?php echo $row['ddate'];?></td>
                    <td><?php echo $row['mstatus'];?></td>
                    <td><?php echo $row['units'];?></td>
                    <td><?php echo $row['rqty'];?></td>
                    <td><?php echo $row['aqty'];?></td>
                    <td><?php echo $row['pqty'];?></td>
                    <td><?php echo $row['purpose'];?></td>
                    <td><?php echo $row['remarks'];?></td>
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
  </div>
</div>
<?php
      include("includes/scripts.php");
      include("includes/footer.php");
?>