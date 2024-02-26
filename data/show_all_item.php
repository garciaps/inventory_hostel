<?php 
require_once('../class/Item.php'); 
$allItem = $item->get_all_items();
?>

<br />

<table id="myTable" class="table table-bordered" cellspacing="0" width="100%" style="text-align: center;">
	<thead>
	    <tr>
	        <th style="text-align: center;">Tag ID</th>
	        <th style="text-align: center;">Name</th>
	        <th style="text-align: center;">Brand</th>
			<th style="text-align: center;">Expiration Date</th>
			<th style="text-align: center;">Unit</th>
	        <th style="text-align: center;">Quantity</th>
	        <th style="text-align: center;"><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
		<?php 
			foreach ($allItem as $i) {
				# code...
				$fN = $i['tagid'];
				$mN = $i['supplyname'];
				$e = $i['Expiry'];
				$u = $i['Unit'];
				$lN = $i['brand'];
				$last=$i['quantity'];
		?>
			<tr>
				<td ><?php echo $i['tagid']; ?></td>
				<td ><?php echo $i['supplyname']; ?></td>
				<td ><?php echo $i['brand']; ?></td>
				<td ><?php 
				echo $i['Expiry']; ?></td>
				<td ><?php echo $i['Unit']; ?></td>
				<td ><?php echo $i['quantity']; ?></td>
				<td align="center">
					
					<a href="item_supplies_history.php?supplyname=<?php echo urlencode($i['supplyname']); ?>" class="btn btn-success btn-sm" title="View History">
    			<span class="glyphicon glyphicon-time" title="View Transactions"></span>
					</a>

					<button onclick="fill_update_modal('<?php echo $i['id']; ?>');" class="btn btn-warning btn-sm"
					id="btn-edit" title="Edit">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					</button>
					
					<button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $i['id']; ?>');">
    			<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>

<script>
function confirmDelete(itemId) {
    // Use the confirm function to show a pop-up dialog
    var confirmation = confirm("Are you sure you want to delete this supply?");
    
    // If the user clicks OK, proceed with the deletion
    if (confirmation) {
        // Call your delete_items function or perform the deletion logic here
        delete_items(itemId);
    } else {
        // If the user clicks Cancel, do nothing or provide feedback
        console.log("Deletion canceled");
    }
}
</script>
				
					
					<button class="btn btn-primary btn-sm" onclick="borrow_items('<?php echo $i['id']; ?>');">
					<span class="glyphicon glyphicon-level-up" aria-hidden="true"></span>
					
					</button>
				</td>
			</tr>
		<?php		
			}//end foreach
		 ?>
    </tbody>
</table>


<?php 
$item->Disconnect();
 ?>

<!-- for the datatable of item -->
<script type="text/javascript">
$(document).ready(function() {
	$('#myTable').DataTable();
});




</script>
<style>
/* Add this style to increase font size in the table */
#myTable th,
#myTable td {
font-size: 16px; /* Adjust the font size as needed */
}
body{
font-size: 16px;
}
</style>