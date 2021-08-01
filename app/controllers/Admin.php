<?php
/**
 *  Admin   Controllowar
 */
class Admin extends DController{
	
	public function __construct(){
		parent::__construct();
		Session::checkSession();
		$data = array();
	}
	public function Index(){
		$this->home();
	}
	public function home(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

	public function addCategory(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addcategory');
		$this->load->view('admin/footer');
	}
	public function insertCategory(){
		$table 	= "category";
		$name 	= $_POST['name'];
		$title 	= $_POST['title'];
		$data 	= array(
				'name' 	=> $name ,
				'title' => $title
						);
		$catModel 	= $this->load->model("CatModel");
		$result 	= $catModel->insertCat($table,$data);
		$mdata = array(); 
		if ($result == 1) {
			$mdata['msg'] = "Category Added Succesfully...";
		}else{
			$mdata['msg'] = "Category Not Added !";
		}
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location:$url");
	}
	public function categoryList(){

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		$table 			= "category";
		$catModel 		= $this->load->model("CatModel");
		$data['cat'] 	= $catModel->catlist($table);
		$this->load->view("admin/categorylist", $data);

		$this->load->view('admin/footer');
	}
	public function editCategory($id = NULL){
		
		$table 			= "category";

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		$catModel 		= $this->load->model("CatModel");
		$data['catById'] = $catModel->catById($table,$id);
		$this->load->view("admin/editcat", $data);

		$this->load->view('admin/footer');
	}
	public function updateCat($id = NULL){
		$table 	= "category";
		$name 	= $_POST['name'];
		$title 	= $_POST['title'];


		$cond = "id = $id";
		$data 	= array(
				'name' 	=> $name ,
				'title' => $title
						);
		$catModel 	= $this->load->model("CatModel");
		$result 	= $catModel->catUpdate($table,$data,$cond);

		$mdata = array(); 
		if ($result == 1) {
			$mdata['msg'] = "Category Updated Succesfully...";
		}else{
			$mdata['msg'] = "Category Not Updated !";
		}
		$this->load->view("catupdate", $mdata);
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location:$url");
	}
	public function deleteCategory($id = NULL){
			$table = "category";
			$cond = "id = $id";
			$catModel 	= $this->load->model("CatModel");
			$result = $catModel->deleteCatById($table,$cond);

			$mdata = array(); 
			if ($result == 1) {
				$mdata['msg'] = "Category Deleted Succesfully...";
			}else{
				$mdata['msg'] = "Category Not Deleted !";
			}
			$this->load->view("catupdate", $mdata);
			$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
			header("Location:$url");
		}
		public function addArticle(){
			$this->load->view('admin/headhome');
			$this->load->view('admin/sidebar');
			$table = "category";
			$catModel 		 = $this->load->model("CatModel");
			$data['catlist'] = $catModel->catlist($table);

			$this->load->view('admin/addpost',$data);
			$this->load->view('admin/footer');
		}

		public function addNewPost(){
			if (!($_POST)) {
				header("Location:".BASE_URL."/Admin/addArticle");
			}
			$input = $this->load->validation('DForm');
			$input->post('title')
					->isEmpty()
					->length(10, 500);

			$input->post('content')
					->isEmpty();

			$input->post('cat')
					->isCatEmpty();
					
			if ($input->submit()) {
				$tablePost  = "post";
				$title 		= $input->values['title'];
				$content	= $input->values['content'];
				$cat		= $input->values['cat'];

				$data 	= array(
						'title' 	=> $title,
						'content' 	=> $content,
						'cat' 		=> $cat

								);
				$PostModel 	= $this->load->model("PostModel");
				$result 	= $PostModel->insertPost($tablePost,$data);
				$mdata = array(); 
			if ($result == 1) {
				$mdata['msg'] = "Article Added Succesfully...";
			}else{
				$mdata['msg'] = "Article Not Added !";
				}
				$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
				header("Location:$url");
			}else{
				$data['postErrors'] = $input->errors;
				$this->load->view('admin/headhome');
				$this->load->view('admin/sidebar');
				//$table = "category";
				//$catModel 		 = $this->load->model("CatModel");
				//$data['catlist'] = $catModel->catlist($table);

				$this->load->view('admin/addpost',$data);
				$this->load->view('admin/footer');
				}
	}
		

		public function articleList(){
			$tableCat 	= "category";
			$tablePost  = "post";
			$this->load->view('admin/headhome');
			$this->load->view('admin/sidebar');

			$PostModel 		= $this->load->model("PostModel");
			$data['listpost'] = $PostModel->getPostList($tablePost,$tableCat);

			$catModel 		= $this->load->model("CatModel");
			$data['catlist'] 	= $catModel->catlist($tableCat);

			$this->load->view('admin/postlist',$data);
			$this->load->view('admin/footer');
		}

		public function editArticle($id = NULL){
			$tableCat 	= "category";
			$tablePost  = "post";
			$this->load->view('admin/headhome');
			$this->load->view('admin/sidebar');

			$PostModel 		= $this->load->model("PostModel");
			$data['postbyid'] = $PostModel->PostById($tablePost,$id);

			$catModel 		= $this->load->model("CatModel");
			$data['catlist'] 	= $catModel->catlist($tableCat);
			
			$this->load->view('admin/editpost',$data);
			$this->load->view('admin/footer');
		}

	public function updatePost($id = NULL){
		$input = $this->load->validation('DForm');
		$input->post('title');
		$input->post('content');
		$input->post('cat');
		$cond = "id = $id";

		$tablePost  = "post";
		$title 		= $input->values['title'];
		$content	= $input->values['content'];
		$cat		= $input->values['cat'];

		$data 	= array(
				'title' 	=> $title,
				'content' 	=> $content,
				'cat' 		=> $cat

						);
		$PostModel 	= $this->load->model("PostModel");
		$result 	= $PostModel->postUpdate($tablePost,$data,$cond);
		

		$mdata = array(); 
		if ($result == 1) {
			$mdata['msg'] = "Article Updated Succesfully...";
		}else{
			$mdata['msg'] = "Article Not Updated !";
		}
		$this->load->view("catupdate", $mdata);
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location:$url");
	}

	public function deleteArticle($id = NULL){
			$table = "post";
			$cond = "id = $id";
			$PostModel 	= $this->load->model("PostModel");
			$result 	= $PostModel->postDelById($tablePost,$data,$cond);

			$mdata = array(); 
			if ($result == 1) {
				$mdata['msg'] = "Post Deleted Succesfully...";
			}else{
				$mdata['msg'] = "Post Not Deleted !";
			}
			$this->load->view("catupdate", $mdata);
			$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
			header("Location:$url");
		}

}
?>