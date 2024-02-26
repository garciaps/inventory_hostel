<?php 
require_once('../class/Report.php'); 


if(isset($_POST['iID'])){
	$iID = $_POST['iID'];
	$resultd = $reps->get_tools($iID);
	echo json_encode($resultd);

}

?>