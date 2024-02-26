<?php 
require_once('../database/Database.php');
require_once('../interface/iLogin.php');
require_once('../class/Logs.php');
session_start();
class Login extends Database implements iLogin {
	
	private $username;
	private $password;

	public function __construct()
	{
		parent:: __construct();
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();//start session if session not start
		}
	}

	public function set_un_pwd($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}	
	
	public function check_user()
	{
		//$type = 1;//1 = user 2 = admin if wala ge change ang db value
		$sql = "SELECT *
				FROM tbl_employee
				WHERE emp_un = ?
				AND emp_pass = ?
		
		";
		$result = $this->getRow($sql, [$this->username, $this->password,]);
		return $result;

	}

	public function get_user_id()
	{
		$type = 1;//1 = user 2 = admin if wala ge change ang db value
		$sql = "SELECT emp_id
				FROM tbl_employee
				WHERE emp_un = ?
				AND emp_pass = ?
				AND type_id = ?
		
		";
		$result = $this->getRow($sql, [$this->username, $this->password, $type]);
		return $result;
	}

	public function user_session()
	{
		if(!isset($_SESSION['user_logged_in'])){
			header('location: ../index.php');
		}
	}

	public function user_logout()
	{
		$userName = $_SESSION['user'];
        date_default_timezone_set('Asia/Manila');
        $time = date("H:i:s");
        $date = date("Y-m-d");
        $desciption = $_SESSION['user']. " Logout Session";
		$check = "SELECT * FROM activity WHERE user = ? AND date = ? AND description = ?;";
		$res = $this->getRow($check,[$userName,$date,$desciption]);
		if(!$res){
			$sql = "INSERT INTO activity (user,time,date,description) VALUES (?,?,?,?);";
			$val = $this->insertRow($sql, [$userName, $time, $date,$desciption]);
			
		
		}

		date_default_timezone_set('Asia/Manila');
		$userName = $_SESSION['user'];
		$date = date("Y-m-d");
		$desciption = "Logout";

		$sql = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
		$result = $this->insertRow($sql,[$userName,'NULL','NULL',$desciption]);
		
		unset($_SESSION['user_logged_in']);
		header('location: ../index.php');
	}



	public function admin_session()
	{
		if(!isset($_SESSION['admin_logged_in'])){
			header('location: ../index.php');
		}
	}

	public function admin_logout()
	{
		$userName = $_SESSION['user'];
        date_default_timezone_set('Asia/Manila');
        $time = date("H:i:s");
        $date = date("Y-m-d");
        $desciption = $_SESSION['user']. " Logout Session";
		$check = "SELECT * FROM activity WHERE user = ? AND date = ? AND description = ?;";
		$res = $this->getRow($check,[$userName,$date,$desciption]);
		if(!$res){
			$sql = "INSERT INTO activity (user,time,date,description) VALUES (?,?,?,?);";
			$val = $this->insertRow($sql, [$userName, $time, $date,$desciption]);

		}

		date_default_timezone_set('Asia/Manila');
		$userName = $_SESSION['user'];
		$date = date("Y-m-d");
		$desciption = "Logged Out";

		$sql = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
		$result = $this->insertRow($sql,[$userName,'NULL','NULL',$desciption]);

		unset($_SESSION['admin_logged_in']);
		header('location: ../index.php');
	}


	public function admin_data()
	{
		/*get admin user and password through session id*/
		$id = $_SESSION['admin_Iged_in'];//session na store pag login sa admin
		$sql = "SELECT *
				FROM tbl_employee 
				WHERE emp_id = ?
		";
		return $this->getRow($sql, [$id]);

	}
	public function addActivity($data){
        $userName = $_SESSION['user'];
        date_default_timezone_set('Asia/Manila');
        $time = date("H:i:s");
        $date = date("Y-m-d");
        $desciption = $data;
		$check = "SELECT * FROM activity WHERE user = '$userName' AND date = '$date' AND description = '$userName Login Session';";
		$res = $this->getRow($check);
		if($res){
			$update = "UPDATE activity SET time = ? WHERE user = ? AND date = ?;";
			$res = $this->updateRow($update,[$time,$userName,$date]);
			
		}else{
			$sql = "INSERT INTO activity (user,time,date,description) VALUES (?,?,?,?);";
			$val = $this->insertRow($sql, [$userName, $time, $date,$desciption]);
		}
      
        
    }


}

$login = new Login();

/* End of file Login.php */
/* Location: .//D/xampp/htdocs/deped/class/Login.php */

