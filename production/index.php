<?php
    include('includes/dbh.inc.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Production Dashboard</h1>
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
  <!-- 
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
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
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
  </div>-->

  <div class="row">
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card shadow mb-4">
        <div  class="card-header bg-gradient-primary py-3">
          <h6 class="m-2 font-weight-bold text-light">Order List</h6>
        </div>
        <div class="card-body table-wrapper-scroll-y my-custom-scrollbar">
          <?php
            $query = "SELECT * FROM salesorder where approval ='Approved';";
            $query_run = mysqli_query($conn,$query)
            ?>
          <table class="table table-striped ">
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Order ID</th>
                <th scope="col">Date Placed</th>
                <th scope="col">Date Due</th>
                <th scope="col">Priority</th>
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
    <div class="col-xl-6">
              <div class="card shadow mb-4">
                <div  class="card-header bg-gradient-primary py-3">
                  <h6 class="m-2 font-weight-bold text-light">Sales Order Progress</h6>
                </div>
                <div class="card-body table-wrapper-scroll-y" style="height:40vh;">
                  <canvas id="mycanvas" >
                  </canvas>
                </div>
              </div>
            </div>
  </div>
  <div class="row">
  <div class="col-xl-6 col-md-12 mb-4">
            <div class="card shadow mb-4">
        <div class="card-header bg-gradient-warning py-3">   
            <h6 class="m-2 font-weight-bold text-dark">Rental Trailers</h6>
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
            $query = "SELECT * FROM trailrent";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-striped ">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Machine Type</th>
                    <th scope="col">Ton</th>
                    <th scope="col">Status</th>
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
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['Remarks'];?></td>
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
            <div class="col-xl-6">
              <div class="card shadow mb-4">
                <div class="card-header bg-gradient-warning py-3">
                  <h6 class="m-2 font-weight-bold text-dark">Trailer Rent</h6>
                </div>
                <div class="card-body table-wrapper-scroll-y" style="height:50vh;">
                  <canvas id="trailerpie" >
                  </canvas>
                </div>
              </div>
            </div>
  </div>
  <div class="row">                   
    <div class="col-xl-6 col-md-12 mb-4">
            <div class="card shadow mb-4">
        <div class="card-header bg-gradient-info py-3">   
            <h6 class="m-2 font-weight-bold text-light">Rental Winch Machine</h6>
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
            $query = "SELECT * FROM winchrent";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-striped ">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Machine Type</th>
                    <th scope="col">Ton</th>
                    <th scope="col">Status</th>
                    
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
                    <td><?php echo $row['status'];?></td>
                    
                    <td><?php echo $row['Remarks'];?></td>
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
            <div class="col-xl-6">
              <div class="card shadow mb-4">
                <div class="card-header bg-gradient-info py-3">
                  <h6 class="m-2 font-weight-bold text-light">Winch Rent</h6>
                </div>
                <div class="card-body table-wrapper-scroll-y" style="height:50vh;">
                  <canvas id="winchpie" >
                  </canvas>
                </div>
              </div>
            </div>  
  </div>



  <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
        <div class="card-header bg-gradient-success py-3"> 
            <h6 class="m-2 font-weight-bold text-light"> 
            Material Out</h6>
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
            $query = "SELECT * FROM materialin";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-bordered table-striped ">
                <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Material</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Third Party</th>
                    <th scope="col">Dispatch Date</th>
                    <th scope="col">Task</th>
                    <th scope="col">Expected Return Date</th>
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
                    <td><?php echo $row['material'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['thirdpty'];?></td>
                    <td><?php echo $row['dispdate'];?></td>
                    <td><?php echo $row['mstatus'];?></td>
                    <td><?php echo $row['edate'];?></td>
                    
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
        <div class="card-header bg-gradient-success py-3"> 
            <h6 class="m-2 font-weight-bold text-light"> 
            Material Out</h6>
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
            $query = "SELECT * FROM materialout";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-bordered table-striped ">
                <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Material</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Third Party</th>
                    <th scope="col">Material Status</th>
                    <th scope="col">Material Handed to Production</th>
                    <th scope="col">Task</th>
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
                    <td><?php echo $row['material'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['thirdpty'];?></td>
                    <td><?php echo $row['dispdate'];?></td>
                    <td><?php echo $row['mstatus'];?></td>
                    <td><?php echo $row['edate'];?></td>
                    
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
        <div class="card-header bg-gradient-success py-3"> 
            <h6 class="m-2 font-weight-bold text-light"> 
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
            $query = "SELECT * FROM purchase WHERE dept = 'production' OR dept= 'r&d' OR dept= 'maintenance' ORDER BY id;";
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
        <div class="card-header bg-gradient-danger py-3">   
            <h6 class="m-2 font-weight-bold text-light">
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
            $query = "SELECT * FROM purchaseint WHERE dept = 'production' OR dept ='r&d' OR dept='maintenance';";
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