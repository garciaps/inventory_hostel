<?php 
require_once('../class/Item.php');
require_once('../class/Report.php');
if(isset($_POST['choice'])){
	$choice = $_POST['choice'];

	$reports = $item->item_report($choice);
	// echo '<pre>';
	// 	print_r($reports);
	// echo '</pre>';

?>


<br />
<br />
<table id="myTable-report" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Tag ID</th>
	        <th>Name</th>
	        <th>Category</th>
	        <th>Room</th>
	        <th>Quantity</th>
	        <th>Date Created</th>
	        <th>Status</th>
	    </tr>
	</thead>
    <tbody>
    	<?php foreach($reports as $r): 
    		
    	?>
    		<tr>
    			<td><?= $r['tagid']; ?></td>
    			<td><?= $r['item'] ?></td>
    			<td><?= $r['category']; ?></td>
    			<td><?= $r['room']; ?></td>
    			<td style="text-align: center;"><?= $r['quantity']; ?> <?= $r['status']; ?></td>
    			<td><?= $r['item_created']; ?></td>
				<td style="text-align: center;">
    			<?php if($r['status']=='Borrowed'){?>
				
					<button class="btn btn-sm btn-success" onclick="fill_views_report('<?= $r['id'];?>')">Details</button>
					<button class="btn btn-sm btn-warning" onclick="return_report('<?= $r['tagid'];?>')">Return</button>

				<?php } ?>
				</td>
    		</tr>
    	<?php endforeach; ?>
    </tbody>
</table>


<?php 
// $db->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-report').DataTable();
	});
</script>



<?php

	// echo $choice;
}else if(isset($_POST['dates'])){
	$choices = $_POST['dates'];
	$cat = $_POST['cat'];
	$reports = $item->item_report_based_dates($choices,$cat);
	// echo '<pre>';
	// 	print_r($reports);
	// echo '</pre>';

?>

<br />
<br />
<table id="myTable-report" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Tag ID</th>
	        <th>Name</th>
	        <th>Category</th>
	        <th>Room</th>
	        <th>Quantity</th>
	        <th>Date Created</th>
			<th>Status</th>
	    </tr>
	</thead>
    <tbody>
    	<?php foreach($reports as $r): 
    		
    	?>
    		<tr>
    			<td><?= $r['tagid']; ?></td>
    			<td><?= $r['item'] ?></td>
    			<td><?= $r['category']; ?></td>
    			<td><?= $r['room']; ?></td>
    			<td><?= $r['quantity']; ?> <?= $r['status']; ?></td>
    			<td><?= $r['item_created']; ?></td>
				<td style="text-align: center;">
    			<?php if($r['status']=='Borrowed'){?>
				
					<button class="btn btn-sm btn-success" onclick="fill_views_report('<?= $r['id'];?>')">Details</button>
					<button class="btn btn-sm btn-warning" onclick="return_report('<?= $r['tagid'];?>')">Return</button>

				<?php } ?>
				</td>
    		</tr>
    	<?php endforeach; ?>
    </tbody>
</table>


<?php 
// $db->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-report').DataTable();
	});
</script>



<?php
}