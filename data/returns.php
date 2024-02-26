<?php 
require_once('../class/Report.php');
if(isset($_POST['ids'])){
	$tagid = $_POST['ids'];
	$ids = $_POST['myId'];
	$result = $reps->view_return($tagid,$ids);
	if($result){
		echo json_encode($result);
	}
}
$reps->Disconnect();
 ?>

					