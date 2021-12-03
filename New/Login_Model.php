<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	function __construct() {

		parent::__construct();
	}

	public function page_login($data) {

		$mobile 	= $data['mobile'];
		$password 	= $data['password'];

		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('mobile', $mobile);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);

		$query = $this->db->get();
		
		$rows = $query->row();		
		// echo $this->db->last_query(); die("Query");
		
		if ($query->num_rows() == 1) {
			if($rows->status == 0){
				$userdata = $query->result();
				$this->session->set_userdata('LoggedIn', $userdata);
				return $query->result();
			}
			else{
				return 1;
			}
		} else {
			return false;
		}
	}
}
?>