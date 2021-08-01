<?php
	/**
	 *User Model 
	 */
	class UserModel extends DModel{
		
		function __construct(){ 
			parent::__construct();
		}
		
		public function addUser($table,$data){
			return $this->db->insert($table,$data);
		}
		public function userlist($table){
			$sql ="SELECT *FROM $table ORDER BY id DESC";
			return $this->db->select($sql);
		}
		public function userById($table,$id){
			$sql ="SELECT *FROM $table WHERE id =:id ";
			$data = array(":id" => $id);
			return $this->db->select($sql,$data);
		}
		public function userUpdate($table,$data,$cond){
			return $this->db->update($table,$data,$cond) ;
		}
		public function deleteUserById($table,$cond){
			return $this->db->delete($table,$cond);
		}
	}
?>