<!DOCTYPE html>
<html lang="en">
<?php 

include_once('../data/user_session.php');//check if naay session otherwise e return sa login
require_once('../class/Item.php');

// if(isset($_GET['choice'])){
//     $choice = $_GET['choice'];
//     $fromDate = $_GET['from'];
//     $toDate = $_GET['to'];
    
//     $reports =  $item->sorted_with_time_choices($choice,$fromDate,$toDate);
//     // echo '<pre>';
//     //  print_r($reports);
//     // echo '</pre>';


if(isset($_GET['choice'])){


    $choice = $_GET['choice'];
    
  
    $fromDate = $_GET['from'];
    $toDate = $_GET['to'];
    // echo $fromDate;
if($fromDate=='NULL' && $toDate=='NULL' ){
    $reports = $item->item_report($choice);

}else{
    $reports =  $item->sorted_with_time_choices($choice,$fromDate,$toDate);

}

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hostel Tropicana - Cavite State University</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">


</head>
<body>


<center>
<div style="width: 100%; text-align: center;">
<img src="../img/hotel.png" alt="" style="width:200px;"></div>
    <h4>HOSTEL TROPICANA</h4>
    <h4>Inventory Report</h4>

    <h4>Category  - <strong><?=strtoupper($choice)?></strong></h4>
    <?php if($fromDate!=='NULL' && $toDate !=='NULL'){ ?>
    <h4>Transaction as of <strong><?= $fromDate ?></strong> to <strong><?= $toDate ?></strong> </h4>
    <?php }?>
</center>

<br />
<div class="table-responsive">
       <table id="myTable-report" class="table table-bordered table-hover" cellspacing="0" width="100%">
       <thead>
        <tr>
            <th>Tag ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Item Created</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($reports as $r): ?>
        <tr>
            <td><?= $r['tagid']; ?></td>
            <td><?= $r['item'] ?></td>
            <td><?= $r['category']; ?></td>
            <td>
                <?php 
                    // Check if the status is not "Added," "Consumed," or "Returned" before displaying it
                    $statusToExclude = ['Added', 'Consumed', 'Returned'];
                    if (!in_array($r['status'], $statusToExclude)) {
                        echo $r['quantity'] . ' ' . $r['status'];
                    } else {
                        echo $r['quantity'];
                    }
                ?>
            </td>
            <td><?= $r['item_created']; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>


</table>
<h5><center>*** Nothing Follows ***</center></h5>
<br>
<br>
<h5> Prepared by: <?php echo $_SESSION['user'] ;?>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
                    // ... your Connection class definition ...

                    // Create an instance of the Connection class
                    $con = new Connection();

                    // Get the PDO instance
                    $pdo = $con->getPDO();
                    
                    // SQL query to select data from the borrower table
                    $sql = "SELECT * FROM tbl_employee where accountname = '".$_SESSION['user']."'";
                    $result = $pdo->query($sql);
                    if ($result) {
                        // Use fetchAll() to fetch all rows from the result set
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                        if ($rows) {
                            // Output data of each row
                            foreach ($rows as $row) {
                                ?>
                                <?php echo $row["position"]; ?>
                          


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
                    ?></h5>

</div>


    <script type="text/javascript">
        print();
    </script>
</body>
</html>

<?php

    // echo $choice;
}//end isset