<?php
require_once('../class/Report.php');
require_once('../class/Item.php');

if (isset($_POST['data']) && isset($_POST['content'])) {
    $data = json_decode($_POST['data'], true);
    $all = json_decode($_POST['content'], true);

    $tag_id = $data[0];
    $items = $data[1];
    $borrowed = $data[2];
    $quan = $data[3];
    $setQuan = $data[4];
    $category = $data[5];
    $myId = $data[6];

    $currentDate = date('Y-m-d'); // Get the current date in the format 'YYYY-MM-DD'

    $result = $reps->return_return($tag_id, $items, $borrowed, $quan, $setQuan, $category, $myId);
    
    // Assuming insert_borrows is a method to insert a row into the 'return_history' table
    $responses = $balik->insert_borrows($all[0]['item'], $all[0]['name'], $all[0]['date_borrowed'], $all[0]['contactno'], $all[0]['whereplace'], $currentDate, $setQuan, $all[0]['category'], $all[0]['tagid'], $all[0]['room'], 'Returned', $all[0]['conditions']);
    $response = '';
    if ($result  && $responses) {
        $response = array('success' => true, 'message' => 'Item returned successfully', 'status' => 'Returned');
    } else {
        $response = array('success' => false, 'message' => 'Error returning item');
    }

    echo json_encode($response);
}

$reps->Disconnect();
?>
