<?php

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
		$this->load->helper('url');
	}

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
	}

	public function product(){
     	$this->load->view('product');
    }

    public function add_product(){
     	$this->load->view('addproduct');
    }

    public function order(){
    	$this->load->view('order');
    }

    public function customer(){
    	$this->load->view('customer');
    }

    public function add(){
	 	$this->load->model('UserModel');
	 	$list = array();
	 	$list = $this->UserModel->insert($_POST);
	 	echo json_encode($list);
	 	exit;
 	}

 	public function show(){
 		$this->load->model('UserModel');
     	$list = array();
     	$list = $this->UserModel->view();
     	echo json_encode($list);
     	exit;
 	}

 	public function delete(){
 		$this->load->model('UserModel');
 		$list = $this->UserModel->delete($_POST);
 		echo json_encode($list);
     	exit;
 	}

 	public function editproduct($args){
 		$data = array();
 		$data['product_id'] = $args;
 		$this->load->view('editproduct', $data);
 	}

 	public function retrieve(){
 		$this->load->model('UserModel');
 		$list = $this->UserModel->retrieve($_POST);
 		echo json_encode($list);
     	exit;
 	}

 	public function update(){
 		$this->load->model('UserModel');
 		$list = $this->UserModel->update($_POST);
 		echo json_encode($list);
     	exit;
 	}

}

?>