<?php 
	
	class UserModel extends CI_Model{
		private $pdo;

		public function __construct(){
			parent:: __construct();
			$this->pdo = $this->load->database('pdo', true);
		}

		public function insertproduct($data){
		     extract($data);
		     $sql = "INSERT INTO product(ProdName,Stock,Price) values(?,?,?)";
		     $this->pdo->query($sql, array($ProdName, $Stock, $Price));
		     return true;
		}

		public function viewproduct(){
			$stmt = $this->pdo->query("SELECT * FROM product WHERE status = 0");
     		return $stmt->result();
		}

		public function deleteproduct($id){
			$sql = "UPDATE product SET status = 1 WHERE ProdID=?";
			$this->pdo->query($sql, $id);
			return true;
		}

		public function retrieveproduct($data){
			extract($data);
			$sql = "SELECT ProdName, Price, Stock FROM product WHERE ProdID=?";
			$stmt=$this->pdo->query($sql, $data);
			return $stmt->result();
		}

		public function updateproduct($data){
			extract($data);
		    $sql = "UPDATE product SET ProdName=?, Stock=?, Price=? WHERE ProdID = ?";
		    $this->pdo->query($sql, array($ProdName, $Stock, $Price, $ProdID));
		    return true;
		}

		public function filterproduct($data){
			extract($data);
			$sql = "SELECT * FROM product WHERE status = 0 AND ProdName LIKE '%$ProdName%'";
			$stmt=$this->pdo->query($sql);
     		return $stmt->result();
		}

		public function insertcustomer($data){
		     extract($data);
		     $sql = "INSERT INTO customer(UserID, Username, Password, FName, MName, LName, Email, ContactNumber, Address) values(DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?)";
		     $this->pdo->query($sql, array($Username, $Password, $FName, $MName, $LName, $Email, $ContactNumber, $Address));
		     return true;
		}

		public function viewcustomer(){
			$stmt = $this->pdo->query("SELECT UserID, Username, CONCAT(FName,' ', MName, ' ', LName) AS Name, Email, ContactNumber, Address FROM customer WHERE status = 0");
     		return $stmt->result();
		}

		public function loadusername(){
			$stmt = $this->pdo->query("SELECT UserID, Username FROM customer WHERE status = 0");
     		return $stmt->result();
		}

		public function retrievecustomer($data){
			extract($data);
			$sql = "SELECT * FROM customer WHERE UserID=?";
			$stmt=$this->pdo->query($sql, $data);
			return $stmt->result();
		}

		public function updatecustomer($data){
			extract($data);
		    $sql = "UPDATE customer SET Username=?, Password=?, FName=?, MName=?, LName=?, Email=?, ContactNumber=?, Address=? WHERE UserID = ?";
		    $this->pdo->query($sql, array($Username, $Password, $FName, $MName, $LName, $Email, $ContactNumber, $Address, $UserID));
		    return true;
		}

		public function deletecustomer($id){
			$sql = "UPDATE customer SET status = 1 WHERE UserID=?";
			$this->pdo->query($sql, $id);
			return true;
		}

		public function filtercustomer($data){
			extract($data);
			$sql = "SELECT Username, CONCAT(FName,' ', MName, ' ', LName) AS Name, Email, ContactNumber, Address FROM customer WHERE status = 0 AND (FName LIKE '%$Name%' || MName LIKE '%$Name%' || LName LIKE '%$Name%' || Username LIKE '%Name%')";
			$stmt=$this->pdo->query($sql);
     		return $stmt->result();
		}
	}

?>