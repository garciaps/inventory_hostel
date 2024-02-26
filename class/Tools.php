<?php
require_once('../database/Database.php');
require_once('../interface/iTools.php');
include_once('../data/user_session.php');

class Tools extends Database implements iTools{
	public function __construct()
	{
		parent:: __construct();
	}

	public function insert_tools($iN, $sN, $mN, $b)
{
   

    // If toolname doesn't exist, proceed with the insertion
    $insertQuery = "INSERT INTO tbl_tools(tagid, toolname, room, quantity)
                    VALUES (?, ?, ?, ?);";

    $result = $this->insertRow($insertQuery, [$iN, $sN, $mN, $b]);


		date_default_timezone_set('Asia/Manila');
        $userName = $_SESSION['user'];
        $date = date("Y-m-d");
        $data = 'Added';

        $sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
         $this->insertRow($sqls,[$userName,$sN,$b,$data]);


    if ($result) {
        // Insertion successful
        echo "Tool successfully inserted!";
        return true;
    } else {
        // Insertion failed
        echo "Failed to insert tool!";
        return false;
    }
}

	public function get_all_tools()
	{
		/*get all items with the office nga naa sa emp*/
		$sql = "SELECT *
				FROM tbl_tools
		";
		$result = $this->getRows($sql);
		return $result;
	}

public function delete_item($eid)
{
    // Fetch item details before deleting
    $sqlSelect = "SELECT id, tagid, toolname, quantity FROM tbl_tools WHERE id = ?;";
    $itemDetails = $this->getRow($sqlSelect, [$eid]);

    // Check if the item exists
    if (!$itemDetails) {
        return false; // Item not found
    }

    // Delete the item
    $sqlDelete = "DELETE FROM tbl_tools WHERE id = ?;";
    $this->updateRow($sqlDelete, [$eid]);

    // Assume you have a method to get the logged-in user information
    $userSession = isset($_SESSION['user']) ? $_SESSION['user'] : 'DefaultUserSession';

    // Insert a record into borrower_history with status 'Deleted'
    $sqlInsert = "INSERT INTO borrower_history ( tagid, item, quantity, status, category, name)
                  VALUES ( ?, ?, ?, ?, ?, ?);";

    $values = [
        $itemDetails['tagid'], // Corrected column name
        $itemDetails['toolname'],
        $itemDetails['quantity'],
        'Deleted',
        'Tools',
        $userSession, // Include the logged-in user as the name
    ];

    $result = $this->insertRow($sqlInsert, $values);
	
	date_default_timezone_set('Asia/Manila');
	$userName = $_SESSION['user'];
	$date = date("Y-m-d");
	$data = 'Deleted';

	$sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
	$this->insertRow($sqls,[$userName,$itemDetails['toolname'],'NULL',$data]);






	
    if (!$result) {
        // Log or print the error message
        echo "Error inserting into borrower_history: " . $this->getLastError();
        return false;
    }

    return true;
}

	public function get_tools($id)
	{
		$sql="SELECT *
			  FROM tbl_tools
			  WHERE id = ?
		";
		$result = $this->getRow($sql, [$id]);
		return $result;
	}
	public function update_tool($iN,$id)
	{	
		$sql="UPDATE tbl_tools
		 	  SET  
			  quantity = ?
			  WHERE id = ?;
		";
		$result = $this->updateRow($sql, [$iN,$id]);
		return $result;
	}
	public function edit_tool_borrow($toolname, $tagid,$quantity){
		$sql = "UPDATE supp_borrowed SET item = ?, quantity = ? WHERE tagid = ? ";
		$result = $this->updateRow($sql,$toolname,$quantity,$tagid);
		return $result;
	}
	public function update_tools($iN, $sN, $mN, $b,$id)
	{	
		$sql="UPDATE tbl_tools
		 	  SET 
		 	  tagid = ?, 
	 		  toolname = ?, 
			  room = ?, 
			  quantity = ?
			  WHERE id = ?;
		";
		$result = $this->updateRow($sql, [$iN, $sN, $mN, $b,$id]);
		
		date_default_timezone_set('Asia/Manila');
        $userName = $_SESSION['user'];
        $date = date("Y-m-d");
        $data = 'Updated';

        $sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
         $this->insertRow($sqls,[$userName,$sN,$b,$data]);






		
		if($result){
			//UPDATE BORRORWED ITEM
			$sql1 = "UPDATE supp_borrowed SET item = ?, quantity = ? WHERE tagid = ? ";
			$result1 = $this->updateRow($sql1,$sN,$b,$id);
			return $result1;
		}
	}

	public function update_borrow_tools($tag, $name, $room,$quantity)
	{	
		$sql="UPDATE supp_borrowed
		 	  SET 
	 		  item = ?, 
			  room = ?, 
			  quantity = ?
			  WHERE tagid = ? AND status IS NULL;
		";
		$result = $this->updateRow($sql, [ $name, $room,$quantity,$tag]);
		return $result;
	}
	public function insert_borrow($one, $two, $three, $four, $five,$six,$seven,$eight,$nine,$ten)
	{
		$sql = "INSERT INTO supp_borrowed(item, name,date_borrowed,contactno,whereplace,returndate,quantity,category,tagid,room,status,item_created)
				VALUES(?, ?, ?, ?, ?, ?, ?,?,?,?,'Added',?);
		";
		$results = $this->insertRow($sql, [$one, isset($_SESSION['user'])?$_SESSION['user']:'', $three, $four, $five,$six,$seven,$eight,$nine,$ten,date('Y-m-d')]);
		return $results;
	}
	public function checkTools($name){
		$sql = "SELECT toolname FROM tbl_tools WHERE toolname = ?";
		$result = $this->getRow($sql,[$name]);
		$value = $result['toolname'];
		if($value!==$name){
			return true;
		}else{
			return false;
		}
		return true;
	}

}

$item = new Tools();