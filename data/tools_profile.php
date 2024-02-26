<?php 
require_once('../class/Tools.php'); 

if(isset($_POST['iID'])){
	$iID = $_POST['iID'];

	$result = $item->get_tools($iID);
	echo json_encode($result);

}

$item->Disconnect();
?>