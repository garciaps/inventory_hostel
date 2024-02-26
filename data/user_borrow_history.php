<?php
include_once('../data/user_session.php');
include_once('../include/header.php');
include_once('../include/banner.php');
?>

<nav class="navbar navbar-navs " style="margin-top:10px;">
   <!-- ... (your existing code) ... -->
</nav>

<div class="container-fluid navbar-navs" style="margin-top: 10px; padding:15px; height: 110vh;">
   <div class="container">
      <div id="right_content" >
         <div class="panel-group">
            <div class="panel panel-border">
               <div class="panel-heading">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                  Borrow History <?php
                    // ... (your existing code) ...

                    // Get the specific item name from the URL parameter
                    $itemName = isset($_GET['item_name']) ? $_GET['item_name'] : '';

                    // SQL query to select data from the borrower table for the specific item name
                    $sql = "SELECT * FROM borrower WHERE name = :itemName";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':itemName', $itemName, PDO::PARAM_STR);
                    $stmt->execute();

                    if ($stmt) {
                        // Use fetchAll() to fetch all rows from the result set
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($rows) {
                            // Output data of each row
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row["name"]; ?></td>
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
                    <a class="btn pull-right" href="../admin/user_borrow.php" style="margin-bottom: 10px; color:rgb(255, 239, 218);">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</a>
               </div>
               <div class="panel-body">
                  <!-- ... (your existing code) ... -->
                  <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Borrowed Date</th>
                            <th>Return Date</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Purpose</th>
                            <!-- Column for icons or actions -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // ... (your existing code) ...
                    ?>
                    </tbody>
                </table>
              <!-- Modal HTML -->
              <!-- ... (your existing code) ... -->
                  <!-- /Table -->
                  <!-- /main content -->
                  <br />
               </div>
            </div>
         </div>
      </div>
      <!-- navigation menu -->
      <?php require_once('side-menu.php'); ?>
      <!-- navigation menu -->
      <?php require_once('admin_borrowmenu.php'); ?>
   </div>
</div>

<!-- load all modals here -->
<?php require_once('load_modals.php'); ?>
<!-- /load all modals here -->

<?php require_once('../include/footer.php'); ?>
<style>
   body{
   overflow-y:scroll;
   }
</style>
</body>
</html>
