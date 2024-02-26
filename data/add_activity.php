<?php 
require_once('../class/Activity.php');
    
if (isset($_POST['from'])) {
	$data = json_decode($_POST['data'], true);
}else{
    $result = $act->showLogs();
    echo json_encode($result);
}
$act->Disconnect();
?>
