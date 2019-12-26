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
            <h1 class="h3 mb-0 text-gray-800">Purchase Dashboard</h1>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Material Request</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $query = "SELECT (SELECT COUNT(*) FROM purchaseint ) + (SELECT COUNT(*) FROM purchase) AS total_rows";
                        $query_run = mysqli_query($conn,$query);
                        $row = mysqli_fetch_assoc($query_run);
                        echo '<p>Total Orders: '.$row['total_rows'].'</p>';
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
            <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
        <div class="card-header py-3"> 
            <h6 class="m-2 font-weight-bold text-primary">
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
            <table class="table table-striped ">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Upload Date</th>
                    <th scope="col">Dept</th>
                    <th scope="col">Product code</th>
                    <th scope="col">Product description</th>
                    <th scope="col">Expected date</th>
                    <th scope="col">Status</th>
                    <th style="width: 30%" scope="col">Remarks</th>
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
                    <td><?php echo $row['udate'];?></td>
                    <td><?php echo $row['dept'];?></td>
                    <td><?php echo $row['pcode'];?></td>
                    <td><?php echo $row['pdesc'];?></td>
                    <td><?php echo $row['ddate'];?></td>
                    <td><?php echo $row['mstatus'];?></td>
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
        <div class="card-header py-3">   
            <h6 class="m-2 font-weight-bold text-primary">
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
            <table class="table table-striped ">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Upload Date</th>
                    <th scope="col">Dept</th>
                    <th scope="col">Product code</th>
                    <th scope="col">Product description</th>
                    <th scope="col">Expected date</th>
                    <th scope="col">Status</th>
                    <th style="width: 30%" scope="col">Remarks</th>
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
                    <td><?php echo $row['udate'];?></td>
                    <td><?php echo $row['dept'];?></td>
                    <td><?php echo $row['pcode'];?></td>
                    <td><?php echo $row['pdesc'];?></td>
                    <form action="includes/updateprog.inc.php?id=<?php echo $row['ID'];?>" method="POST">
                    <td>
                        <div class="form-group">
                        <label>Date Due</label>
                        <input type="date" name="ddate" class="form-control" placeholder="Deadline" required="required">
                    </div>
                    <td><?php echo $row['mstatus'];?></td>
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




  

