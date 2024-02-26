<?php 
require_once('../class/Item.php');

if(isset($_POST['eid'])){
	$eid = $_POST['eid'];

	$result = $item->get_item($eid);
	if($result){
		echo json_encode($result);
	}
}

$item->Disconnect();