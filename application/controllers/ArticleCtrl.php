<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleCtrl extends CI_Controller {
	
	public function index()
	{
		redirect('ArticleCtrl/liste');
		
	}
	public function liste()
	{
		$this->load->model('Article');	
		$data['liste'] = $this->Article->getAll();
		$data['view'] = 'liste';
		$this->load->view('index',$data);	
		
	}

	public function fiche($id){
		$this->load->model('Article');	
		$data['article'] = $this->Article->getArticle($id);

		$uri = $_SERVER['REQUEST_URI'];
		$uri = $this->Article->explodeURI($uri);
		if($this->Article->misyLeURL($uri)){
			$data['view'] = "fiche";
			$this->load->view('index',$data);
		}else{
			$this->load->view('error-404');
		}
	}
			
}
