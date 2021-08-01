<?php
/**
 * Index Controller
 */
class Index extends DController{
	
	function __construct() {
		parent::__construct();
	}
	public function Index(){
		$this->home();
	}
	public function home(){
		$data 			= array();
		$tablePost 		= "post";
		$tableCat 		= "category";
		$this->load->view("header");

		$catModel 			= $this->load->model("CatModel");
		$data['catlist'] 	= $catModel->catlist($tableCat);
		$this->load->view("search", $data);

		
		$PostModel 		= $this->load->model("PostModel");
		$data['allpost'] 	= $PostModel->getAllPost($tablePost);
		$this->load->view("content", $data);

		
		$data['letestPost'] = $PostModel->getLetestPost($tablePost);
		$this->load->view("sidebar", $data);

		$this->load->view("footer");
	}
	public function postDetails($id = NULL){
		$data 			= array();
		$tablePost 		= "post";
		$tableCat 		= "category";
		$this->load->view("header");

		$catModel 			= $this->load->model("CatModel");
		$data['catlist'] 	= $catModel->catlist($tableCat);
		$this->load->view("search", $data);
	
		$PostModel 		= $this->load->model("PostModel");
		$data['postbyid'] 	= $PostModel->getPostById($tablePost,$tableCat,$id);

		$this->load->view("details",$data);
		$data['catlist'] 	= $catModel->catlist($tableCat);
		$data['letestPost'] 	= $PostModel->getLetestPost($tablePost);
		$this->load->view("sidebar", $data);
		$this->load->view("footer");
	}
	public function postByCat($id){
		$data 			= array();
		$tablePost 		= "post";
		$tableCat 		= "category";
		$this->load->view("header");
	
		$catModel 			= $this->load->model("CatModel");
		$data['catlist'] 	= $catModel->catlist($tableCat);
		$this->load->view("search", $data);

		
		$PostModel 		   = $this->load->model("PostModel");
		$data['postbycat'] = $PostModel->getPostByCat($tablePost,$tableCat,$id);
		$this->load->view("postbycat",$data);

		$data['letestPost'] 	= $PostModel->getLetestPost($tablePost);
		$this->load->view("sidebar", $data);
		$this->load->view("footer");
	}
	public function search(){
		$data 			= array();
		$keyword 		= $_REQUEST['keyword'];
		$cat 			= $_REQUEST['cat'];	 
		$tablePost 		= "post";
		$tableCat 		= "category";
		$this->load->view("header");
	
		$catModel 			= $this->load->model("CatModel");
		$data['catlist'] 	= $catModel->catlist($tableCat);
		$this->load->view("search", $data);
		
		$PostModel 		   = $this->load->model("PostModel");
		$data['postbysearch'] = $PostModel->getPostBySearch($tablePost,$keyword,$cat);
		$this->load->view("sresult",$data);

		$data['letestPost'] 	= $PostModel->getLetestPost($tablePost);
		$this->load->view("sidebar", $data);
		$this->load->view("footer");
	}
	public function notFound(){
		$this->load->view('404');
	}
}
?>