<?php 
require_once('../class/Item.php');
require_once('../class/Report.php');

$reports = "";
//CHOICE ONLY


//DATE ONLY


//BOTH CONFIG
if((isset($_POST['fromDates']) && $_POST['fromDates'])  && (isset($_POST['toDates'])&& $_POST['toDates']) && isset($_POST['choice'])){
	$choice = $_POST['choice'];
	$fromDate =$_POST['fromDates'];//$data[0];//From
	$toDate = $_POST['toDates'];//$data[1];//To
	$reports = $item->sorted_with_time_choices($choice,$fromDate,$toDate);
	// echo "Both";
}else{
	$choice = $_POST['choice'];
	$reports = $item->item_report($choice);
	// echo "Cchoice Only";
}

?>


<br />
<br />
<table id="myTable-report" class="table table-bordered table-hover" cellspacing="0" width="100%" style="text-align: center;">
	<thead >
	    <tr>
	        <th style="text-align: center;">Tag ID</th>
	        <th style="text-align: center;">Name</th>
	        <th style="text-align: center;">Category</th>
	        <th style="text-align: center;">Quantity</th>
	        <th style="text-align: center;">Created</th>
	        <th style="text-align: center;">Return Borrowed</th>
	    </tr>
	</thead>
    <tbody>
    	<?php if($reports){ foreach($reports as $r): 
    		if($r['conditions']==NULL){
    	?>
    		<tr>
    			<td><?= $r['tagid']; ?></td>
    			<td><?= $r['item'] ?></td>
    			<td><?= $r['category']; ?></td>
    			<td><?= $r['quantity']; ?>  	
    			<td><?= $r['item_created']; ?></td>
				<td style="text-align: center;">
				<?php
				if ($r['category'] !== 'Supplies') {
					if ($r['status'] == 'Borrowed') {
				?>
						<button class="btn btn-sm btn-warning" onclick="return_report('<?= $r['tagid'];?>','<?= $r['id'];?>')">Return</button>
				<?php
					}
				} else {
					date_default_timezone_set('Asia/Manila');
					$date = date("Y-m-d");

					if ($r['status'] == 'Consumed') {
						echo "Consumed";
					} elseif ($r['expiry'] < $date) {
				?>
						<p style="color: red;"><strong>Expired</strong></p>
				<?php
					}
				}
			}
				?>

				</td>
    		</tr>
    	<?php endforeach; }?>
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

<style>
  body {
    overflow-y: scroll;
    font-size: 16px;
  }

  /* Add this style to increase font size in the table */
  #myTable-report th,
  #myTable-report td {
    font-size: 16px; /* Adjust the font size as needed */
  }

  .containerlabels {
    position: absolute;
    right: 420px;
    margin-top: 20px;
    display: flex;
    gap: 30px;
  }

  .containerlabels > p {
    font-weight: bolder;
  }
</style>