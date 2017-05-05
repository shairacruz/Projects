<?php 
	
	class UserModel extends CI_Model{
		private $pdo;

		public function __construct(){
			parent:: __construct();
			$this->pdo = $this->load->database('pdo', true);
		}

		public function insert($data){
		     extract($data);
		     $sql = "INSERT INTO product(ProdName,Stock,Price) values(?,?,?)";
		     $this->pdo->query($sql, array($ProdName, $Stock, $Price));
		     return true;
		}

		public function view(){
			$stmt = $this->pdo->query("SELECT * FROM product WHERE status = 0");
     		return $stmt->result();
		}

		public function delete($id){
			$sql = "UPDATE product SET status = 1 WHERE ProdID=?";
			$this->pdo->query($sql, $id);
			return true;
		}

		public function retrieve($data){
			extract($data);
			$sql = "SELECT ProdName, Price, Stock FROM product WHERE ProdID=?";
			$stmt=$this->pdo->query($sql, $data);
			return $stmt->result();
		}

		public function update($data){
			extract($data);
		    $sql = "UPDATE product SET ProdName=?, Stock=?, Price=? WHERE ProdID = ?";
		    $this->pdo->query($sql, array($ProdName, $Stock, $Price, $ProdID));
		    return true;
		}
	}

?>