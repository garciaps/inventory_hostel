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
        
       
        <li>
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

<div class="container-fluid navbar-navs" style="margin-top: 10px; padding:15px; height: 120vh; ">

    

       
            <div class="panel panel-border" style="width:1000px; margin-left: 440px;" style="float: right; height:10px;">
               <div class="panel-heading">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                  Borrowed 
               </div>
               <div class="panel-body" >
                <?php// include'../database/Connection.php'?>
                  <!-- Table with Name and Department columns and icons -->
                 
                <table class="table" id="dataTable" style="text-align: center;">
                    <thead>
                        <tr >
                        <th style="text-align: center;">Tag ID</th>
                        <th style="text-align: center;">Item</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Contact No.</th>
                        <th style="text-align: center;">Date Borrowed</th>
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Purpose</th>
                        <th style="text-align: center;">Return Date</th>
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
                    $sql = "SELECT * FROM supp_borrowed GROUP BY id";
                    $result = $pdo->query($sql);
                    if ($result) {
                        // Use fetchAll() to fetch all rows from the result set
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                        if ($rows) {
                            // Output data of each row
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                <?php if($row['status']=='Borrowed'){?>
                                    <td><?php echo $row["tagid"]; ?></td>
                                    <td><?php echo $row["item"]; ?></td>
                                    <td ><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["contactno"]; ?></td>
                                    <td><?php echo $row["date_borrowed"]; ?></td>
                                    <td><?php echo $row["category"]; ?></td>
                                    <td><?php echo $row["whereplace"]; ?></td>
                                    <td><?php echo $row["returndate"];} ?></td>
                                    
                  
                                    
                                </tr>
                             <!-- Edit Modal -->
                          

                          


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
</div>
</div>
      <!-- navigation menu -->




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
   /* Add this style to increase the font size of the table */
   .table th,
        .table td {
            font-size: 16px; /* Adjust the font size as needed */
        }

</style>
</body>
</html>