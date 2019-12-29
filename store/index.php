<?php
    include('includes/access.root.php');
    include('includes/dbh.inc.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>
        <!-- Modal -->
        <div class="modal fade" id="lmrmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-gradient-success">
              <h5 class="modal-title text-light" id="exampleModalLabel">New Material Request</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="includes/materialrequest.inc.php" enctype="multipart/form-data" method="post">
                <div class="modal-body">

                <div class="form-group">
                        <label>Requested Date</label>
                        <input type="date" name="rdate" class="form-control" placeholder="Requested Date" required="required">
                    </div>

                    <div class="form-group">
                        <label>Uploaded Date</label>
                        <input type="date" name="udate" class="form-control" placeholder="Uploaded Date" required="required">
                    </div>

                      <div class="form-group">
                        <label>Dept</label>
                        <select name="dept" class="form-control">
                            <option value="sales">Sales</option>
                            <option value="production">Production</option>
                            <option value="r&d">R&D</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Reference</label>
                        <input type="text" name="reference" class="form-control" placeholder="Enter Product Code" required="required">

                    </div>
                    <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" name="pcode" class="form-control" placeholder="Enter Product Code" required="required">

                    </div>

                    <div class="form-group">
                        <label>Product Description</label>
                        <input type="text" name="pdesc" class="form-control" placeholder="Enter Product Code" required="required">

                    </div>

                    <div class="form-group">
                        <label>Expected Date</label>
                        <input type="date" name="ddate" class="form-control" placeholder="Deadline" required="required">
                    </div>

                    <div class="form-group">
                        <label>Units</label>
                        <input type="text" name="unit" class="form-control" placeholder="Enter units" required="required">
                    </div>
                    <div class="form-group">
                        <label>Required Quantity</label>
                        <input type="text" name="rqty" class="form-control" placeholder="Enter required quantity">
                    </div>
                    <div class="form-group">
                        <label>Available Quantity</label>
                        <input type="text" name="aqty" class="form-control" placeholder="Enter available quantity">
                    </div>
                    <div class="form-group">
                        <label>Purpose</label>
                        <input type="text" name="purpose" class="form-control" placeholder="Enter purpose">
                    </div>
                    <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" name="remarks" class="form-control" placeholder="Enter remarks" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="lmr-submit" class="btn btn-warning text-dark">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="imrmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
              <h5 class="modal-title text-light" id="exampleModalLabel">New Material Request</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="includes/materialrequest.inc.php" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Requested Date</label>
                        <input type="date" name="rdate" class="form-control" placeholder="Deadline" required="required">
                    </div>

                    <div class="form-group">
                        <label>Uploaded Date</label>
                        <input type="date" name="udate" class="form-control" placeholder="Deadline" required="required">
                    </div>

                      <div class="form-group">
                        <label>Dept</label>
                        <select name="dept" class="form-control">
                            <option value="sales">Sales</option>
                            <option value="production">Production</option>
                            <option value="r&d">R&D</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Reference</label>
                        <input type="text" name="reference" class="form-control" placeholder="Enter Product Code" required="required">

                    </div>
                    <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" name="pcode" class="form-control" placeholder="Enter Product Code" required="required">

                    </div>

                    <div class="form-group">
                        <label>Product Description</label>
                        <input type="text" name="pdesc" class="form-control" placeholder="Enter Product Code" required="required">

                    </div>

                    <div class="form-group">
                        <label>Expected Date</label>
                        <input type="date" name="ddate" class="form-control" placeholder="Deadline" required="required">
                    </div>

                    <div class="form-group">
                        <label>Units</label>
                        <input type="text" name="unit" class="form-control" placeholder="Enter units" required="required">
                    </div>
                    <div class="form-group">
                        <label>Required Quantity</label>
                        <input type="text" name="rqty" class="form-control" placeholder="Enter required quantity">
                    </div>
                    <div class="form-group">
                        <label>Available Quantity</label>
                        <input type="text" name="aqty" class="form-control" placeholder="Enter available quantity">
                    </div>
                    
                    <div class="form-group">
                        <label>Purpose</label>
                        <input type="text" name="purpose" class="form-control" placeholder="Enter purpose">
                    </div>
                    <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" name="remarks" class="form-control" placeholder="Enter Remarks" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="imr-submit" class="btn btn-warning text-dark">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Store Dashboard</h1>
          </div>
          
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
          <!-- Content Row 
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sales Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $query = "SELECT ID FROM salesorder ORDER BY ID";
                        $query_run = mysqli_query($conn,$query);
                        $row = mysqli_num_rows($query_run);
                        echo '<p>Total Orders: '.$row.'</p>';
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Orders Active</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Orders Halted</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>----->

          <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
        <div class="card-header bg-gradient-danger py-3"> 
            <h6 class="m-2 font-weight-bold text-light">
            <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#lmrmodal">
            Create New Request
            </button>  
            Local Material Request Approching Deadline</h6>
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
            $query = "SELECT * FROM purchase WHERE DateDiff(ddate, now()) < 3;";
            $query_run = mysqli_query($conn,$query);
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
        <div class="card-header bg-gradient-danger py-3">   
            <h6 class="m-2 font-weight-bold text-light">
            <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#imrmodal">
            Create New Request
            </button>  
              International Material Request Approaching Deadline</h6>
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
            $query = "SELECT * FROM purchaseint WHERE DateDiff(ddate, now()) < 3;";
            $query_run = mysqli_query($conn,$query);
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php
      include("includes/scripts.php");
      include("includes/footer.php")
      ?>




  

