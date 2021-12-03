<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	function __construct() {

		parent::__construct();
	}

	public function auth_login($data) {

		$useremail = $data['email'];
		$password = $data['password'];

		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('email', $useremail);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);

		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			/* Make Session if user exist! */
			$userdata = $query->result();
			$this->session->set_userdata('LoggedIn', $userdata);
			return $query->result();
		} else {
			return false;
		}
	}
}
?>