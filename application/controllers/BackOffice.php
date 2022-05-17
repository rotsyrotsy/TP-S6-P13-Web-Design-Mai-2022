<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {
	
    public function __construct()
	{
		parent::__construct();


        if($this->session->userdata('admin')==null)
        {
            redirect('AdminCtrl/login');
        }

		$this->load->library('grocery_CRUD');
	}
	


	public function index(){
		redirect('BackOffice/crudArticle');
	}

	// public function listeArticle(){
	// 	$this->load->model('Article');	
	// 	$data['liste'] = $this->Article->getAll();
	// 	$data['view'] = 'bo_listArticle';
	// 	$this->load->view('bo_crud',$data);	
	// }

	
	// public function insertArticle()
	// {
	// 	if ($this->input->post('submit')!=null){
	// 		$this->load->model('Article');

	// 		$id = $this->Article->getNextId();
	// 		$imageName = $_FILES["image"]["name"];
		
	// 		$this->Article->insert($id, $this->input->post('titre'),$this->input->post('description'),$imageName,$this->input->post('auteur'));
			
	// 		// $this->Article->updateUrl($id);
	// 		$this->Article->uploadImage('image',$this->input->post('submit'));

	// 		$data['message'] = 'Votre article a été ajouté avec succes.';
		
	// 	}
	// 	$data['view'] = 'bo_addArticle';
	// 	$this->load->view('bo_crud',$data);	
	// }

	// public function updateArticle(){
	// 	$this->load->model('Article');
	// 	if ($this->input->post('submit')!=null){
	// 		$id = $this->input->post('id');
	// 		$imageName = "";

	// 		if (!empty($_FILES["image"]["name"])){
	// 			$imageName = $_FILES["image"]["name"];
	// 			$this->Article->uploadImage('image',$this->input->post('submit'));
	// 		}
	// 		$this->Article->update($id,$this->input->post('titre'),$this->input->post('description'),$imageName,$this->input->post('auteur'),$this->input->post('date'));
	// 		$this->Article->updateUrl($id);
	// 		$data['message'] = 'Votre article a été modifié avec succes.';

	// 	}else{
	// 		$id = $this->input->get('id');
	// 	}
	// 	$data['article']=$this->Article->getArticle($id);
	// 	$data['view'] = 'bo_updateArticle';
	// 	$this->load->view('bo_crud',$data);
	// }

	// public function deleteArticle(){
	// 	$this->load->model('Article');
	// 	$id = $this->input->get('id');
	// 	$this->Article->delete($id);
	// 	redirect('BackOffice/listeArticle');
	// }


	public function crudArticle()
	{
		try{
			$crud = new grocery_CRUD();

		
			$crud->set_language($this->session->userdata('crud_language'));
            $crud->set_table('article');
			$crud->set_subject('Article');
			$crud->columns('titre', 'description', 'image', 'date','auteur');
			$crud->display_as('titre', 'Titre');
			$crud->display_as('description', 'Description');
            $crud->display_as('image', 'Image');
			$crud->display_as('date', 'Date');
			$crud->display_as('auteur', 'Auteur');
			$crud->fields('image','titre', 'description','auteur', 'date');
			$crud->required_fields('image','titre', 'description','auteur', 'date');
			
			$crud->set_field_upload('image','assets/img');

			$output = $crud->render();

			$data = array(
				'crud' => (array)$output
			);
	
			$this->load->view('bo_crud2',$data);
	

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

    public function logout()
	{
        $this->session->unset_userdata('admin');
		$data = array('message'=> 'Vous vous êtes déconnecté(e)');
        $this->load->view('bo_login.php',$data);
	}
			
}
