<div id="left_content" style="float: left; width: 285px; margin-left: 230px;">
            <div class="panel panel-border">
               <div class="panel-heading">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                   In-charge Profile
               </div>
               <div class="panel-body">
                <?php// include'../database/Connection.php'?>
                  <!-- Table with Name and Department columns and icons -->
                 
                <table class="table" id="dataTable" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Office</th>
                            <th>Actions</th>
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
                    $sql = "SELECT emp_id, accountname, office FROM tbl_employee GROUP BY emp_id";
                    $result = $pdo->query($sql);
                    if ($result) {
                        // Use fetchAll() to fetch all rows from the result set
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                        if ($rows) {
                            // Output data of each row
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row["accountname"]; ?></td>
                                    <td><?php echo $row["office"]; ?></td>
                                    <td>
                                        <!-- Icons for actions
                                        <a href="#modal-edit-<?php echo $row['emp_id']; ?>" data-toggle="modal"  class="btn btn-warning btn-sm" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a> -->
                                        <a  href="user_borrow_history.php?accountname=<?php echo $row['accountname']; ?>" class="btn btn-success btn-sm" title="View Transactions"><span class="glyphicon glyphicon-time"></span></a>
                                       <!-- <a  href="#modal-delete-<?php echo $row['emp_id']; ?>" data-toggle="modal"  class="btn btn-danger btn-sm" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>.-->                                       
                                    </td>
                                </tr>
                             <!-- Edit Modal
                           <div id="modal-edit-<?php echo $row['emp_id']; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog" >
                                  Modal content
                                 <div class="container-fluid" style="background: rgb(255, 239, 218);">
                                    <div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Edit Borrower</h4>
                                       </div>
                                       <div class="modal-body">
                                          <form action="borrow_function.php" method="post">
                                             <input type="hidden" name="operation" value="update" />
                                             <input type="hidden" name="borrower_id" value="<?php echo $row['emp_id']; ?>" />
                                             <Replace the following with your actual form fields
                                             <div class="form-group">
                                                   <label for="editName">Name:</label>
                                                   <input type="text" class="form-control" name="name" placeholder="Enter edited name" value="<?php echo $row["accountname"]; ?>">
                                             </div>
                                             <div class="form-group">
                                                   <label for="editDepartment">Department:</label>
                                                   <input type="text" class="form-control" name="department" placeholder="Enter edited department" value="<?php echo $row["office"]; ?>">
                                             </div>
                                             Add any additional form fields as needed
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-success">Save Changes</button>
                                          </form>
                                       </div>
                                 </div>
                              </div>
                           </div> -->

                           <!-- 
                           <div id="modal-delete-<?php echo $row['emp_id']; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                
                                 <div class="container-fluid" style="background: rgb(255, 239, 218);">
                                    <div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Delete Borrower</h4>
                                       </div>
                                       <div class="modal-body">
                                          <p>Are you sure you want to delete this borrow in-charge?</p>
                                       </div>
                                       <div class="modal-footer">
                                          <form action="borrow_function.php" method="post">
                                             <input type="hidden" name="operation" value="delete" />
                                             <input type="hidden" name="borrower_id" value="<?php echo $row['emp_id']; ?>" />
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                       </div>
                                 </div>
                              -->
                   

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
           </div>
       </div>
   </tbody>
</table>
