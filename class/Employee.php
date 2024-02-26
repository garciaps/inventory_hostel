<?php 
require_once('../database/Database.php');
require_once('../interface/iEmployee.php');


class Employee extends Database implements iEmployee {
	public function __construct()
	{
		parent:: __construct();
	
	}

	public function my_session_start()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();//start session if session not start
		}
	}

	// ...

	public function insert_employee($fN, $mN, $lN, $pos, $off, $type)
{
    // Email validation using filter_var function
    if (!filter_var($pos, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format, show a popup warning
        echo '<script>alert("Error: Invalid email format.");</script>';
        return false;
    }

    // Check if the accountname, emp_un, and email already exist in the database
    $checkSql = "SELECT COUNT(*) FROM tbl_employee WHERE accountname = ? OR emp_un = ? OR email = ?";
    $checkResult = $this->getRow($checkSql, [$fN, $mN, $pos]);

    if ($checkResult['COUNT(*)'] > 0) {
        // Account name, username, or email already exists, show a popup warning
        echo '<script>alert("Error: The account name, username, or email already exists in the database.");</script>';
        return false;
    }

    // Proceed with the insert operation
    $sql = "INSERT INTO tbl_employee (emp_un, emp_pass, accountname, office, position, email)
            VALUES (?, ?, ?, ?, ?, ?)";

    return $this->insertRow($sql, [$mN, md5($lN), $fN, $off, $type, $pos]);
}



	public function update_employee($fN, $mN, $lN, $pos, $off, $type, $eid)
	{
		$sql = "UPDATE tbl_employee
				SET accountname = ?, emp_un = ?, email = ?, office = ?, position = ?
				WHERE emp_id = ?;
		";
		return $this->updateRow($sql, [$fN, $mN,  $pos, $off, $type, $eid]);
	}

	public function get_employee($emp_id)
	{
		$sql = "SELECT * FROM tbl_employee
					WHERE emp_id = ?;
			";
		return $this->getRow($sql, [$emp_id]);
	}

	public function get_employees()
	{
	
	
			$sql = "SELECT * 
					FROM tbl_employee;
			";
			return $this->getRows($sql);
		
	}
		
	public function employee_positions()
	{
		$sql = "SELECT * FROM tbl_pos;";
		return $this->getRows($sql);
	}

	public function employee_offices()
	{
		$sql = "SELECT * FROM tbl_off;";
		return $this->getRows($sql);
	}

	public function employee_account_types()
	{
		$sql = "SELECT * FROM tbl_emp_type;";
		return $this->getRows($sql);
	}

	public function employee_remove_undo($eid)
	{	
		$sql = "DELETE FROM tbl_employee 
				
				WHERE emp_id = ?;
		";
		return $this->updateRow($sql, [$eid]);
	}

	public function insert_employee_position($position)
	{
		$sql = "INSERT INTO tbl_pos(pos_desc)
				VALUES(?);
		";
		return $this->insertRow($sql, [$position]);
	}

	public function insert_employee_office($office)
	{
		$sql="INSERT INTO tbl_off(off_desc)
			  VALUES(?);
			";
		return $this->insertRow($sql, [$office]);
	}

	public function change_employee_password($id, $un, $pwd)
	{
		$sql = "UPDATE tbl_employee
				SET emp_un = ?, emp_pass = ?
				WHERE emp_id = ?;
		";
		return $this->updateRow($sql, [$un, $pwd, $id]);
	}

	public function item_owned()
	{
		/*
		*this function select all the user login owned items 
		* 3 or Condemed
		*/
		$condition = 1;
		$status = 4;//must = to none then then display.. if not display sa request nga TAB sa dashboard
		$this->my_session_start();
		$uid = $_SESSION['user_logged_in'];
		$sql = "SELECT *
				FROM tbl_item i
				INNER JOIN tbl_cat c 
				ON i.cat_id = c.cat_id 
				INNER JOIN tbl_con co 
				ON i.con_id = co.con_id
				INNER JOIN tbl_item_status s
				ON i.status_id = s.status_id
				WHERE i.emp_id = ?
				AND i.con_id = ?
				AND i.status_id = ?
		";
		$result = $this->getRows($sql, [$uid, $condition, $status]);
		return $result;
	}

	public function update_admin_data($un, $pass)
	{
		//id of admin naa sa session
		$this->my_session_start();
		$id = $_SESSION['admin_logged_in'];
		$pass = md5($pass);
		$sql = "UPDATE tbl_employee
				SET emp_un = ?, emp_pass = ?
				WHERE emp_id = ?;
			";
		return $this->insertRow($sql, [$un, $pass, $id]);
	}//end update_admin
}

$employee = new Employee();

/* End of file Employee.php */
/* Location: .//D/xampp/htdocs/deped/class/Employee.php */
 ?>

 