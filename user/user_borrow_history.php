<?php 
   include_once('../data/user_session.php');//check if naay session otherwise e return sa login
   include_once('../include/header.php'); 
   include_once('../include/banner.php'); 
   ?>
<nav class="navbar navbar-navs " style="margin-top:10px;">
   <div class="container-fluid">
      <ul class="nav navbar-nav navigation">
         <li >
            <a href="user_supplies.php"><span class="glyphicon glyphicon-th-large"></span> Supplies
            </a>
         </li>
         <li >
            <a href="user_tools.php"><span class="glyphicon glyphicon-th"></span> Tools</a>
         </li>
         <li >
            <a href="user_equipment.php"><span class="glyphicon glyphicon-th-list"></span> Equipment</a>
         </li>

         <li >
            <a href="user_borrow.php"><span class="glyphicon glyphicon-list-alt"></span> Transactions</a>
         </li>

         <li>
            <a href="user_report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
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
    <?php require_once('../admin/borrow_sidemenu.php'); ?>
        </tbody>
                </table>
            </div>
        </div>
    </div>

           <div class="panel panel-border" style="width:1000px; margin-left: 580px;" style="float: right; height:10px;">
               <div class="panel-heading">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                  Transaction History <?php
                    // ... your Connection class definition ...

                    // Create an instance of the Connection class
                    $con = new Connection();

                    // Get the PDO instance
                    $pdo = $con->getPDO();
                    
                    // SQL query to select data from the borrower table
                    $sql = "SELECT * FROM tbl_employee where accountname = '".$_GET['accountname']."'";
                    $result = $pdo->query($sql);
                    if ($result) {
                        // Use fetchAll() to fetch all rows from the result set
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                        if ($rows) {
                            // Output data of each row
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                    <td>>    <?php echo $row["accountname"]; ?></td>
                                </tr>
                      

                            <?php
                            }
                        } else {
                            echo "<tr><td colspan='3'>0 results</td></tr>";
                        }

                        // Close the database connection
                        $con->Disconnect();
                    } else {
                        // Handle query error if needed
                        echo "Error executing the query: " . $con->datab->errorInfo()[2];
                    }
                    ?> 
                    <a class="btn pull-right" href="../user/user_borrow.php" style="margin-bottom: 10px; color:rgb(255, 239, 218);";>
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</a>
                  
               </div>
               <div class="panel-body">
                <?php// include'../database/Connection.php'?>
                  <!-- Table with Name and Department columns and icons -->
                 
                <table class="table" id="dataTable" style="text-align: center;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Item</th>
                            <th style="text-align: center;">Borrowed Date</th>
                            <th style="text-align: center;">Return Date</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Category</th>
                            <th style="text-align: center;">Purpose</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Condition</th>
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
                    
                    // SQL query to select data from the borrower table
                    $sql = "SELECT * FROM borrower_history where name = '".$_GET['accountname']."'";
                    $result = $pdo->query($sql);
                    if ($result) {
                        // Use fetchAll() to fetch all rows from the result set
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                      
                        if ($rows) {
                            // Output data of each row
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                    <td ><?php echo $row["item"]; ?></td>
                                    <td>
                                    <?php 
                                        if ($row['status'] != 'Added') {
                                        echo $row["date_borrowed"]; 
                                        } 
                                        else{
                                            echo' - ';
                                        }                                    ?>
                                   
                                    </td>
                                    <td>
                                    <?php 
                                        if ($row['status'] != 'Added') {
                                        echo $row["returndate"]; 
                                        } 
                                        else{
                                            echo' - ';
                                        }                                    ?>
                                   
                                    </td>
                                        
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["category"]; ?></td>
                                    <td><?php echo $row["whereplace"]; ?></td>
                                    <td><?php echo $row["status"]; ?></td>
                                    <td><?php echo $row["conditions"]; ?></td>
                                </tr>
                          


                            <?php
                            }
                        } else {
                            echo "<tr><td colspan='3'>0 results</td></tr>";
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
</style>
</body>
</html>