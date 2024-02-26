<?php 
   include_once('../data/user_session.php');//check if naay session otherwise e return sa login
   include_once('../include/header.php'); 
   include_once('../include/banner.php'); 
   ?>

<nav class="navbar navbar-navs " style="margin-top:10px;">
   <div class="container-fluid">
      <ul class="nav navbar-nav navigation">
      <li>
          <a href="employee.php"><span class="glyphicon glyphicon-user"></span> Manage Employee</a>
        </li>

  	    <li class="active" >
          <a href="item.php"><span class="glyphicon glyphicon-th-large"></span> Supplies
          </a>
        </li>
  	    
  	   
        <li >
          <a href="position.php"><span class="glyphicon glyphicon-th"></span> Tools</a>
        </li>

        <li >
          <a href="office.php"><span class="glyphicon glyphicon-th-list"></span> Equipment</a>
        </li>

        <li >
            <a href="user_borrow.php"><span class="glyphicon glyphicon-list-alt"></span> Transactions</a>
         </li>
         
  	    <li>
          <a href="report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
            <a class="dropdown-toggle" id="admin-account" data-toggle="dropdown" href="#" style="color: black;">
            <span class="glyphicon glyphicon-user" style="margin-right:10px; color: black;"></span>
            <span><?php echo $_SESSION['user'] ;?> </span>
            <span style="margin-left:10px; color: black;"class="glyphicon glyphicon-chevron-down"></span></a>
            </a>
            <ul class="dropdown-menu">
               <li><a onclick="$('#modal-changepasss').modal('show')" data-toggle="modal">Change Password</a></li>
               <li><a href="../data/admin_logout.php">Logout</a></li>
            </ul>
         </li>
      </ul>
   </div>
</nav>
<div class="container-fluid navbar-navs" style="margin-top: 10px; padding:15px; height: 110vh;">

        <?php require_once('admin_borrowmenu.php'); ?>
               </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-border" style="width:1100px; margin-left: 550px;" style="float: right; height:10px;">
               <div class="panel-heading" style="font-size: 20px;">
                  <span  aria-hidden="true"></span>
                  <?php
                // ... your Connection class definition ...

                // Create an instance of the Connection class
                $con = new Connection();

                // Get the PDO instance
                $pdo = $con->getPDO();

                $supplyname = isset($_GET['supplyname']) ? $_GET['supplyname'] : '';

                // SQL query to select data from the borrower_history table for the specific toolname
                $sql = "SELECT * FROM borrower_history WHERE item = :supplyname";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':supplyname', $supplyname, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt) {
                    // Fetch the first row from the result set
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($row) {
                        // Output data of the first row
                        ?>
                        <tr>
                            <td><?php echo $row["item"]; ?></td>
                        </tr>
                        <?php
                    } else {
                        echo "<tr><td colspan='6'>0 results</td></tr>";
                    }

                    // Close the database connection
                    $con->Disconnect();
                } else {
                    // Handle query error if needed
                    echo "Error executing the query: " . $con->datab->errorInfo()[2];
                }
                ?> 

                    <a class="btn pull-right" href="../admin/item.php" style="margin-bottom: 10px; color:rgb(255, 239, 218);">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</a>
               </div>
               <div class="panel-body">
                <?php// include'../database/Connection.php'?>
                  <!-- Table with Name and Department columns and icons -->
                 
                <table class="table table-bordered" id="dataTable" style="text-align: center;">
    <thead>
        <tr>
            <th style="text-align: center;">In-charge</th>
            <th style="text-align: center;">Quantity</th>
            <th style="text-align: center;">Transaction Date</th>
            <th style="text-align: center;">Purpose</th>
            <th style="text-align: center;">Status</th>
            <!-- Column for icons or actions -->
        </tr>
    </thead>
    <tbody>
        <?php
        // ... your Connection class definition ...

        // Create an instance of the Connection class
        $con = new Connection();

        // Get the PDO instance
        $pdo = $con->getPDO();

        $supplyname = isset($_GET['supplyname']) ? $_GET['supplyname'] : '';

        // SQL query to select data from the borrower_history table for the specific toolname
        $sql = "SELECT * FROM borrower_history WHERE item = :supplyname";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':supplyname', $supplyname, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt) {
            // Use fetchAll() to fetch all rows from the result set
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
                // Output data of each row
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <?php 
                        $status = $row['status'];
                        if (in_array($status, ['Added', 'Delivered', 'Consumed'])): ?>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td><?php echo $row["item_created"]; ?></td>
                             <td><?php echo $row["whereplace"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                        <?php endif; ?>
                    </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='5'>No Result</td></tr>";
            }

            // Close the database connection
            $con->Disconnect();
        } else {
            // Handle query error if needed
            echo "Error executing the query: " . $con->datab->errorInfo()[2];
        }
        ?> 
    </tbody>
</table>

              <!-- Modal HTML -->
             




                  <!-- /Table -->
                  <!-- /main content -->
                  <br />
               </div>
            </div>
         </div>
      </div>
      <!-- navigation menu -->

      <!-- navigation menu -->

      
   </div>
</div>
<!-- load all modals here -->
<?php require_once('load_modals.php'); ?>
<!-- /load all modals here -->
</div>
<?php require_once('../include/footer.php'); ?>
<style>
   body{
   overflow-y:scroll;
   font-size: 16px;
   }
   .table th,
        .table td {
            font-size: 16px; /* Adjust the font size as needed */
        }
  
</style>
</body>
</html>