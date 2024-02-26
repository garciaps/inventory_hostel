<?php 
require_once('../class/Tools.php'); 
$allItems = $item->get_all_tools();
// echo '<pre>';
// 	print_r($allItem);
// echo '</pre>';
?>

<br />
<table id="myTabled" class="table table-bordered table-hover" cellspacing="0" width="100%" style="text-align: center;">
	<thead>
	    <tr>
	        <th style="text-align: center;">Tag ID</th>
	        <th style="text-align: center;">Name</th>
	        <th style="text-align: center;">Quantity</th>
	        <th style="text-align: center;"><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
		<?php 
			foreach ($allItems as $i) {
				# code...
				$fN = $i['tagid'];
				$mN = $i['toolname'];
				$mN = $i['room'];
				$last=$i['quantity'];
		?>
			<tr>
				<td ><?php echo $i['tagid']; ?></td>
				<td ><?php echo $i['toolname']; ?></td>
				<td ><?php echo $i['quantity']; ?></td>
				<td align="center">
				
				<a href="item_history.php?toolname=<?php echo urlencode($i['toolname']); ?>" class="btn btn-success btn-sm" title="View History">
    <span class="glyphicon glyphicon-time"></span>
</a>

					<button onclick="fill_update_modals('<?php echo $i['id']; ?>');" class="btn btn-warning btn-sm"
					id="btn-edit" title="Edit">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					
					</button>
					<button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $i['id']; ?>');" title="Delete">
   					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>
					<button class="btn btn-primary btn-sm" onclick="borrow_tools('<?php echo $i['id']; ?>');" title="Release">
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
		$('#myTabled').DataTable();
	});

	function confirmDelete(toolId) {
        var confirmation = confirm("Are you sure you want to delete this tool?");
        if (confirmation) {
            delete_tools(toolId);
        }
    }


</script>
<style>
  /* Add this style to increase font size in the table */
  #myTabled th,
  #myTabled td {
    font-size: 16px; /* Adjust the font size as needed */
  }
   body{
  	font-size: 16px;
  }
</style>
