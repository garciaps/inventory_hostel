<?php
require_once('../class/Logs.php');
$allItem = $log->getAllLogs();

if(isset($_POST['fromDates']) && isset($_POST['toDates'])){


    $allItem = $log->sort($_POST['fromDates'],$_POST['toDates']);
 }
?>

<br />

<table id="myTable12" class="table table-bordered" cellspacing="0" width="100%" style="text-align: center;">
    <thead>
        <tr>
            <th><center>Account Name</center></th>
            <th><center>Transaction Date</center></th>
            <th><center>Activity</center></th>
            <th><center>Item</center></th>
            <th><center>Quantity</center></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($allItem as $r) {

        ?>
            <tr>
                <td><?= $r['name']; ?></td>
                <td><?php
                 $date = $r['date'];
                 echo date('m-d-Y  h:i:s a', strtotime($date))

                ?></td>
                <td><?= $r['activity']; ?></td>
                <td><?= $r['item'] == 'NULL' ? '-' : $r['item']; ?></td>
                <td><?= $r['quantity'] == 'NULL' ? '-' : $r['quantity']; ?></td>
            </tr>
        <?php
        } //end foreach
        ?>
    </tbody>
</table>


<?php
$log->Disconnect();
?>

<!-- for the datatable of item -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable12').DataTable();
    });
</script>
<style>
    /* Add this style to increase font size in the table */
    #myTable12 th,
    #myTable12 td {
        font-size: 16px;
        /* Adjust the font size as needed */
    }

    body {
        font-size: 16px;
    }
</style>