<?php 
require_once('../class/Tools.php');

if(isset($_POST['eid'])){
	$eid = $_POST['eid'];

	$result = $item->get_tools($eid);
	if($result){
		echo json_encode($result);
	}
}

$item->Disconnect();