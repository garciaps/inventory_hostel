<?php 
class connection{

	protected $isConn;
	public $datab;
	protected $transaction;

	//connect to DB use the default constructor
	public function __construct($username="root", $password="", $host="localhost", $dbname="hostel", $options = []){
		
		$this->isConn = TRUE;
		try{
			$this->datab = new PDO("mysql:host={$host};  dbname={$dbname}; charset=utf8", $username, $password, $options);
			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->transaction = $this->datab;
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			//echo 'Connected Successfully!!!';

		}catch(PDOException $e){
			throw new Exception($e->getMessage());			
		}

	}//endDefaultConstructor
 

	//disconnect from db
	public function Disconnect(){
		$this->datab = NULL;//close connection in PDO
		$this->isConn = FALSE;
	}//endDisconnectFunction


	public function getPDO() {
        return $this->datab;
    }


}//endClassDatabase

// Create an instance of the Connection class
$con = new Connection();
 ?>