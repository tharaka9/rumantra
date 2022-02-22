<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Product extends CI_Controller {

    public function Productlist($x, $y){

        $this->load->model('Productinfo');

        $this->load->model('Home');

        $result['productcategory']=$this->Home->ProductCategory();

        $sql="SELECT `idtbl_product` FROM `tbl_product` WHERE `status`=? AND `tbl_product_category_idtbl_product_category`=?";

        $respond=$this->db->query($sql, array(1, $x));


        $config['base_url'] = base_url().'Product/Productlist/'.$x.'/'.$y.'/Page/';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $respond->num_rows();
        $config['per_page'] = 12;

        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;

		if($page==0){
			$startproductno=1;
			if($respond->num_rows()>12){$endproductno=12;}
			else{$endproductno=$respond->num_rows();}
		}
		else{
			$startproductno=($page-1)*$config['per_page'];
			$endcount=$page*$config['per_page'];

			if($respond->num_rows()>$endcount){$endproductno=$endcount;}
			else{$endproductno=$respond->num_rows();}
		}
        
        $config['full_tag_open'] = '<ul class="pagination">';        
        $config['full_tag_close'] = '</ul>';        
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['num_tag_close'] = '</span></li>';
        
        $this->pagination->initialize($config);

        $result['pagination'] = $this->pagination->create_links(); 

        $result['productlist']=$this->Productinfo->Productlist($x, $config["per_page"], $page);


        $result['categoryname']=$this->Productinfo->Categoryname($x);
        $result['sitesuspend']=$this->Productinfo->Sitesuspend();

       
        $this->load->view('shop', $result);

     

    }



   

    public function Productview($x, $y){

        $this->load->model('Home');

        $result['productcategory']=$this->Home->ProductCategory();

        $this->load->model('Productinfo');

        $result['productdetail']=$this->Productinfo->Productdetail($x);

        $result['productimages']=$this->Productinfo->Productimages($x);

        $result['productcatogory']=$this->Productinfo->Productcategory($x);

        $result['relatedproduct']=$this->Productinfo->Productrelated($x);

        $result['upsellproduct']=$this->Productinfo->Productupsell($x);

        $result['productinfo']=$this->Productinfo->Productin($x);

        $this->load->view('productview', $result);

    }

}