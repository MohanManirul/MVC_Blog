<?php
/**
 * User Controller
 */
class User extends DController{
	
	function __construct(){
		parent::__construct();
		$data = array();
	}
	public function Index(){
		$this->makeUser();
	}
	public function makeUser(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/makeuser');
		$this->load->view('admin/footer');
	}
	public function addNewUser(){
		if (!($_POST)) {
			header("Location:".BASE_URL."/User");
		}
		$input = $this->load->validation('DForm');
				$input->post('username');
				$input->post('password');
				$input->post('level');
			
				$tableUser 	= "tbl_user";
				$username 	= $input->values['username'];
				$password	= md5($input->values['password']);
				$level		= $input->values['level'];

				$data 	= array(
						'username' 	=> $username,
						'content' 	=> $content,
						'level' 	=> $level

								);
				$UserModel 	= $this->load->model("UserModel");
				$result 	= $UserModel->addUser($tableUser,$data);
				$mdata = array(); 
			if ($result == 1) {
				$mdata['msg'] = "User Created Succesfully...";
			}else{
				$mdata['msg'] = "User Not Created !";
				}
				$url = BASE_URL."/User/userlist?msg=".urlencode(serialize($mdata));
				header("Location:$url");
	}

	public function userlist(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		$tableUser 			= "tbl_user";
		$UserModel 		= $this->load->model("UserModel");
		$data['users'] 	= $UserModel->userlist($tableUser);
		$this->load->view("admin/userlist", $data);

		$this->load->view('admin/footer');
	}
	public function deleteUser($id = NULL){
		$tableUser 	= "tbl_user";
		$cond 		= "id = $id";
		$UserModel 	= $this->load->model("UserModel");
		$result = $UserModel->deleteUserById($tableUser,$cond);
			$mdata = array(); 
			if ($result == 1) {
				$mdata['msg'] = "User Deleted Succesfully...";
			}else{
				$mdata['msg'] = "User Not Deleted !";
			}
			$this->load->view("catupdate", $mdata);
			$url = BASE_URL."/User/userlist?msg=".urlencode(serialize($mdata));
			header("Location:$url");
	}
}
?>