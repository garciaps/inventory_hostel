<?php 
require_once('../class/Equipment.php');

if(isset($_POST['eid'])){
	$eid = $_POST['eid'];

	$result = $item->get_equipment($eid);
	if($result){
		echo json_encode($result);
	}
}

$item->Disconnect();