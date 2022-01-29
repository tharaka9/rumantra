<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		// $this->cart->destroy();
	
       
		$this->load->model('Home');
        $result['dealofweek']=$this->Home->Dealofweek();
        $result['newarrivalskin']=$this->Home->Newarrivalskin();
        $result['newarrivalhair']=$this->Home->Newarrivalhair();
        $result['newarrivalnutrace']=$this->Home->Newarrivalnutrace();
		$result['gettopproducts']=$this->Home->gettopproducts();
		$result['categoryproductcount']=$this->Home->Categoryproductcount();
		$result['sitesuspend']=$this->Home->Sitesuspend();
		$result['productcategory']=$this->Home->ProductCategory();
		$result['newarrivalproduct']=$this->Home->Newarrivalproduct();
		$result['bestsaleproduct']=$this->Home->Bestsaleproduct();
		$result['featuredproduct']=$this->Home->Featuredproduct();
		// print_r($result['newarrivalproduct']);
		$this->load->view('home', $result);		
		// $this->load->view('underconstruction', $result);

	}
	public function Getproductquickview(){
		$this->load->model('Home');
        $result['fetch_data']=$this->Home->Getproductquickview();

		//meka thiynwa
	}

	public function Pagenotfound(){
		$this->load->view('404');
		//meka thiynwa
	}

	public function Requestcomplete(){
		$this->index();
		//meka thiynwa
	}

	// function fetch()
	// {
	//  $this->load->model('Home');
	//  echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
	// }

}
