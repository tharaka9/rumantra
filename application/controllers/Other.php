<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends CI_Controller {
    public function Contactus(){
        $this->load->model('Home');
        $result['productcategory']=$this->Home->ProductCategory();
      
        $this->load->view('contact-us',$result);
        
    }
    public function Aboutus(){
        $this->load->model('Home');
        $result['productcategory']=$this->Home->ProductCategory();
      
        $this->load->view('about',$result);
      
    }
    public function CSRProject(){
        $this->load->model('Home');
        $result['productcategory']=$this->Home->ProductCategory();
        $this->load->model('Otherinfo');
        $result['csrdetail']=$this->Otherinfo->Csrdetail();
        $this->load->view('csrproject', $result);
    }
    public function CSRProjectinfo($x){
        $this->load->model('Home');
        $result['productcategory']=$this->Home->ProductCategory();
        $this->load->model('Otherinfo');
        $result['csrdetail']=$this->Otherinfo->Csrdetail();
        $result['csrdetailinfo']=$this->Otherinfo->Csrdetailinfo($x);
        $result['csrdetailinfoimages']=$this->Otherinfo->Csrdetailinfoimages($x);
        $this->load->view('csrprojectinfo', $result);
    }
}