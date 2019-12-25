<?php
    include('includes/access.root.php');
    include('includes/dbh.inc.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sales Coordinator Dashboard</h1>
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
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
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

            <!-- Earnings (Monthly) Card Example -->
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

            <!-- Earnings (Monthly) Card Example -->
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

            <!-- Pending Requests Card Example -->
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
          </div>
          
          <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
            <div class="card shadow mb-4">
        <div class="card-header py-3">   
            <h6 class="m-2 font-weight-bold text-primary">Order Status</h6>
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
            $query = "SELECT * FROM salesorder";
            $query_run = mysqli_query($conn,$query)
            ?>
            <table class="table table-striped ">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Date Due</th>
                    <th scope="col">Priority</th>
                    <th scope="col">STATUS</th>
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
                    <td><?php echo $row['datedue'];?></td>
                    <td><?php echo $row['priority'];?></td>
                    <td><?php echo $row['sostatus'];?></td>
                    <td><?php echo $row['approval'];?></td>
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
                <div class="card-header py-3">
                  <h6 class="m-2 font-weight-bold text-primary">Sales Order Progress</h6>
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
        <div class="card-header py-3">   
            <h6 class="m-2 font-weight-bold text-primary">Rental Trailers</h6>
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
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['Client'];?></td>
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
                <div class="card-header py-3">
                  <h6 class="m-2 font-weight-bold text-primary">Trailer Rent</h6>
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
        <div class="card-header py-3">   
            <h6 class="m-2 font-weight-bold text-primary">Rental Winch Machine</h6>
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
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['Client'];?></td>
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
                <div class="card-header py-3">
                  <h6 class="m-2 font-weight-bold text-primary">Winch Rent</h6>
                </div>
                <div class="card-body table-wrapper-scroll-y" style="height:50vh;">
                  <canvas id="winchpie" >
                  </canvas>
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




  

