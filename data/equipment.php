<?php 
require_once('../class/Equipment.php'); 

if(isset($_POST['iID'])){
	$iID = $_POST['iID'];

	$result = $item->get_equipment($iID);
	echo json_encode($result);

}

$item->Disconnect();
?>