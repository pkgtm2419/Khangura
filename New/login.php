<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $table_name = '';
	public $redirect_url = '';
	public $id_column = '';

	function __construct() {
		parent::__construct();
		$this->load->model(USER_DIR .'/Login_Model' ,'', TRUE);
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		
		if($this->session->userdata('LoggedIn')){
			redirect(USER_CTRL);
		}
	}

	public function index() {
		$data['header_info']['page_title'] = "User Login";
		$this->load->view('/index', $data);
	}
	
	public function user_login() {
		
		if($this->input->method() === 'post'){
			if(isset($_POST['login'])){
				$this->form_validation->set_rules('mobile', 'Mobile', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
				if ($this->form_validation->run()) {
					$mobile 	= $this->input->post('mobile');
					$password 	= $this->input->post('password');

					$data = array(
						'mobile' 	=> $mobile,
						'password' => $password,
					);
					// echo "<pre>"; print_r($data); die;
					$login_page = $this->Login_Model->page_login($data);	
					// echo "<pre>"; print_r($login_page); die('1223');	
					if ($login_page != "") {
						if($login_page == '1'){
							$alertData = array(
								'status' => '0',
								'message' => 'Account deactivated!',
							);
							$data['jqueryalert'] = $alertData;
							$data['header_info']['page_title'] = "Login";
							//echo "<script>alert('Account deactivated!')</script>";
							$this->load->view('/index', $data);
						}
						else{
							redirect('/user/dashboard');
						}
					} else {
						$alertData = array(
							'status' => '0',
							'message' => 'Invalid Username/Password, please try again!',
						);
						$data['jqueryalert'] = $alertData;
						$data['header_info']['page_title'] = "Login";
						$this->load->view('/index', $data);
					}
				}
				else { 
					$message['message'] 	= '<strong>Error!</strong> '. validation_errors();
					echo $message['message']; die;
					$data['header_info']['page_title'] = "Login";
					$this->load->view('index');
				}
			}
		}
		else {
			// Login Failed
			$data['header_info']['page_title'] = "Login";
			$this->load->view('/index');
		}
	}
}