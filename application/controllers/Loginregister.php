<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginregister extends CI_Controller {
    public function Signup(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Signup();
    }

    public function Accountactivate(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Accountactivate();
    }
    public function Register(){
        $this->load->model('Loginregisterinfo');
        $this->load->model('Home');
	    $result['productcategory']=$this->Home->ProductCategory();
        $result['countrylist']=$this->Loginregisterinfo->Countrylist();
        $result['citylist']=$this->Loginregisterinfo->Citylist();
        $this->load->view('loginregister', $result);
    }
    public function Login(){
        $this->load->model('Loginregisterinfo');
        $this->load->model('Home');
	    $result['productcategory']=$this->Home->ProductCategory();
        $result['countrylist']=$this->Loginregisterinfo->Countrylist();
        $this->load->view('login', $result);
    }
   
    public function Registerwithcode($x){
        $this->load->model('Loginregisterinfo');
        $this->load->model('Home');
	    $result['productcategory']=$this->Home->ProductCategory();
        $result['countrylist']=$this->Loginregisterinfo->Countrylist();
        $result['citylist']=$this->Loginregisterinfo->Citylist();
        $result['cusrefcode']=$x;
        $this->load->view('loginregister', $result);
    }
   
    public function Signupapprove($x){
        $this->load->model('Home');
	    $result['productcategory']=$this->Home->ProductCategory();
        $result['actuserid']=$x;
        $this->load->view('registerapprove', $result);
    }
    
    public function Loginaccount(){
        $this->load->model('Loginregisterinfo');
        $result=$this->Loginregisterinfo->Loginaccount();

        if($result!=false){
            $userdata=array(
                'user_id'=>$result->idtbl_user,
                'accountname'=>$result->name,
                'username'=>$result->username,
                'type'=>$result->tbl_user_type_idtbl_user_type,
                'loggedin'=>true
            );

            // $this->session->set_userdata($userdata);
            
            //print_r($user_data);
            // redirect(base_url());

            $this->session->set_userdata($userdata);
            
			if($this->cart->total()>0){
				redirect(base_url().'Cart/Checkout');
			}
			else{
				//print_r($user_data);
				redirect(base_url());
			}
        }
        else{
            $this->session->set_flashdata('msg', 'Invalid Username or password');
            redirect('Loginregister/Login');
        }
    }
    public function Logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('accountname');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('loggedin');
        $this->cart->destroy();
        redirect(base_url());
    }
    public function Account(){
        if(isset($_SESSION['user_id'])){$userID=$_SESSION['user_id'];}
        // $result='';
        $this->load->model('Home');
        $this->load->model('Loginregisterinfo');
        if(isset($userID)){
         
	        $result['productcategory']=$this->Home->ProductCategory();
            $result['countrylist']=$this->Loginregisterinfo->Countrylist();
            $result['citylist']=$this->Loginregisterinfo->Citylist();
            $result['customerprofile']=$this->Loginregisterinfo->Customerprofile($userID);
            $result['customerprofilebank']=$this->Loginregisterinfo->Customerprofilebank($userID);
            $result['customerorder']=$this->Loginregisterinfo->Customerorder($userID);
            $result['customermember']=$this->Loginregisterinfo->Customermember($userID);
            $result['customerposition']=$this->Loginregisterinfo->Customerposition($userID);
            $result['banklist']=$this->Loginregisterinfo->Banklist();
            $this->load->view('account', $result);
        }
        else{
            redirect(base_url().'Loginregister/Login');
        }    
    }
    public function Orderview(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Orderview();
    }
    public function Commissionview(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Commissionview();
    }
    public function Updateprofile(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Updateprofile();
    }
    public function Lostpassword(){
        $this->load->view('lostpassword');
    }
    public function Accountcheck(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Accountcheck();
    }
    public function Changepassword($x){
        $this->load->model('Loginregisterinfo');
        $this->load->model('Home');
        $result['accountid']=$x;
        $result['codeandmobile']=$this->Loginregisterinfo->Codeandmobile($x);
        $this->load->view('passwordchange', $result);
    }
    public function Changenewpassword(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Changenewpassword();
    }
    public function Subscribe(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Subscribe();
    }
    public function Ordercancel(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Ordercancel();
    }
    public function Uploadbankreceipt(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Uploadbankreceipt();
    }
    public function Branchlist(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Branchlist();
    }
    public function Commissionroughlyview(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Commissionroughlyview();
    }

    public function Getmemberlist(){
        $this->load->model('Loginregisterinfo');
        $result['fetch_data']=$this->Loginregisterinfo->Getmemberlist();
    }

    // Create by Tharaka 2022-01-21
	public function get_single_order_ajax(){
        $id = $this->input->post('id');

        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('idtbl_order', $id);
        $order_query = $this->db->get();
        $order_row = $order_query->row();

        $this->db->select('*');
        $this->db->from('tbl_order_detail');
        $this->db->where('tbl_order_idtbl_order', $id);
        $items_query = $this->db->get();

        $item_data = array();
        foreach ($items_query->result_array() as $row)
        {
            $item_data[] = array(
                'product_name' => $row['product'],
                'qty' => $row['qty'],
                'price' => number_format($row['price'], 2),
                'total' => number_format($row['total'], 2),
                'status' => $row['status']
            );
        }

        $data = array(
            'order' => $order_row,
            'order_details' => $item_data
        );

        echo json_encode($data);

    }



}