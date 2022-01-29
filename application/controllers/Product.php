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
        
        $config['full_tag_open']    = '<div class="pagination"><ul>';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li><a href="#">';
        $config['num_tag_close']    = '</a></li>';
        $config['cur_tag_open']     = '<li class="current">';
        $config['cur_tag_close']    = '</li>';
        $config['next_tag_open']    = '<li class="next"><a href="#">';
        $config['prev_tag_open']    = '<li class="next"><a href="#">';
        $config['prev_tag_close']   = '</a></li>';
        $config['first_tag_open']   = '<li><a href="#">';
        $config['first_tag_close']  = '</a></li>';
        $config['last_tag_open']    = '<li><a href="#">';
        $config['last_tag_close']   = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        
        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;

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