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

    public function addproduct(){
	 	$this->load->model('UserModel');
	 	$list = array();
	 	$list = $this->UserModel->insertproduct($_POST);
	 	echo json_encode($list);
	 	exit;
 	}

 	public function showproduct(){
 		$this->load->model('UserModel');
     	$list = array();
     	$list = $this->UserModel->viewproduct();
     	echo json_encode($list);
     	exit;
 	}

 	public function deleteproduct(){
 		$this->load->model('UserModel');
 		$list = $this->UserModel->deleteproduct($_POST);
 		echo json_encode($list);
     	exit;
 	}

 	public function edit_product($args){
 		$data = array();
 		$data['product_id'] = $args;
 		$this->load->view('editproduct', $data);
 	}

 	public function retrieveproduct(){
 		$this->load->model('UserModel');
 		$list = $this->UserModel->retrieveproduct($_POST);
 		echo json_encode($list);
     	exit;
 	}

 	public function updateproduct(){
 		$this->load->model('UserModel');
 		$list = $this->UserModel->updateproduct($_POST);
 		echo json_encode($list);
     	exit;
 	}

 	public function showproductbykeyword(){
 		$this->load->model('UserModel');
     	$list = array();
     	$list = $this->UserModel->filterproduct($_POST);
     	echo json_encode($list);
     	exit;
 	}

	public function add_customer(){
     	$this->load->view('addcustomer');
    }

    public function addcustomer(){
	 	$this->load->model('UserModel');
	 	$list = array();
	 	$list = $this->UserModel->insertcustomer($_POST);
	 	echo json_encode($list);
	 	exit;
 	}

 	public function showcustomer(){
 		$this->load->model('UserModel');
     	$list = array();
     	$list = $this->UserModel->viewcustomer();
     	echo json_encode($list);
     	exit;
 	}

 	public function edit_customer($args){
 		$data = array();
 		$data['customer_id'] = $args;
 		$this->load->view('editcustomer', $data);
 	}

 	public function retrievecustomer(){
 		$this->load->model('UserModel');
 		$list = $this->UserModel->retrievecustomer($_POST);
 		echo json_encode($list);
     	exit;
 	}

 	public function updatecustomer()
 	{
 		$this->load->model('UserModel');
 		$list = $this->UserModel->updatecustomer($_POST);
 		echo json_encode($list);
     	exit;
 	}

 	public function deletecustomer(){
 		$this->load->model('UserModel');
 		$list = $this->UserModel->deletecustomer($_POST);
 		echo json_encode($list);
     	exit;
 	}

 	public function showcustomerbykeyword(){
 		$this->load->model('UserModel');
     	$list = array();
     	$list = $this->UserModel->filtercustomer($_POST);
     	echo json_encode($list);
     	exit;
 	}

    public function add_order(){
        $this->load->view('addorder');
    }

    public function loadusername(){
        $this->load->model('UserModel');
        $list = array();
        $list = $this->UserModel->loadusername();
        echo json_encode($list);
        exit;
    }

}

?>