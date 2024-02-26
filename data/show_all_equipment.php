<?php 
require_once('../class/Equipment.php'); 
$allItem = $item->get_all_equipment();
// echo '<pre>';
// 	print_r($allItem);
// echo '</pre>';
?>

<br />
<table id="myTablea" class="table table-bordered table-hover" cellspacing="0" width="100%" style="text-align: center;">
	<thead>
	    <tr>
	        <th style="text-align: center;">Tag ID</th>
	        <th style="text-align: center;">Name</th>
	        <th style="text-align: center;">Brand</th>
	        <th style="text-align: center;">Quantity</th>
	        <th style="text-align: center;"><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
		<?php 
			foreach ($allItem as $i) {
				# code...
				$fN = $i['tagid'];
				$mN = $i['itemname'];
				$mN = $i['room'];
				$lN = $i['brand'];
				$last=$i['quantity'];
		?>
			<tr>
				<td><?php echo $i['tagid']; ?></td>
				<td><?php echo $i['itemname']; ?></td>
				<td><?php echo $i['brand']; ?></td>
				<td><?php echo $i['quantity']; ?></td>
				<td align="center">
					
				<a href="item_equipment_history.php?itemname=<?php echo urlencode($i['itemname']); ?>" class="btn btn-success btn-sm" title="View History">
    <span class="glyphicon glyphicon-time"></span>
</a>
					<button onclick="fill_update_modal_equipment('<?php echo $i['id']; ?>');" class="btn btn-warning btn-sm"
					id="btn-edit" title="Edit">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
				
					</button>
					<button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $i['id']; ?>');" title="Delete">
    				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>
				
					<button class="btn btn-primary btn-sm" onclick="borrow_equipment('<?php echo $i['id']; ?>');" title="Release">
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
		$('#myTablea').DataTable();
	});

	function confirmDelete(equipmentId) {
        var confirmation = confirm("Are you sure you want to delete this equipment?");
        if (confirmation) {
            delete_equipment(equipmentId);
        }
    }


</script>
<style>
  /* Add this style to increase font size in the table */
  #myTablea th,
  #myTablea td {
    font-size: 16px; /* Adjust the font size as needed */
  }
  body{
  	font-size: 16px;
  }
</style>
