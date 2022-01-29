<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function index(){
        $this->load->model('Productinfo');
        $this->load->model('Home');
        $result['productcategory']=$this->Home->ProductCategory();
		$this->load->view('cart', $result);
	}

    public function Checkout(){
        $this->load->model('Home');
        $this->load->model('Cartinfo');
        $this->load->model('Loginregisterinfo');

        $result['productcategory']=$this->Home->ProductCategory();
		$result['profileinfo']=$this->Loginregisterinfo->Profileinfo();
		$result['citylist']=$this->Cartinfo->Citylist();

		$this->load->view('checkout', $result);
    }
  
    public function Checkoutproceed(){
        if(isset($_SESSION['user_id'])){$userID=$_SESSION['user_id'];}
        $this->load->model('Cartinfo');
        $result['countrylist']=$this->Cartinfo->Countrylist();
        $result['citylist']=$this->Cartinfo->Citylist();
        $result['sitesuspend']=$this->Cartinfo->Sitesuspend();
        $result['bankinfocheck']=$this->Cartinfo->Bankinfocheck();
        if(isset($userID)){
            $result['customerprofile']=$this->Cartinfo->Customerprofile($userID);
        }
        $this->load->view('checkout', $result);
    }
    public function Addtocart(){
        $productID=$this->input->post('productID');
        $qty=$this->input->post('qty');

        $this->db->select('qty');
		$this->db->from('tbl_stock');
		$this->db->where('tbl_product_idtbl_product', $productID);
		$stockcheck = $this->db->get();
 
    
        $this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('idtbl_product', $productID);
		$query = $this->db->get();
		$row=$query->row_array();
        
        
        if($stockcheck->row(0)->qty>0){
            $data = array(           
                'id'      => $row['idtbl_product'],
                'qty'     => $qty,
                'price'   => $row['price'],
                'name'    => preg_replace('/[^a-zA-Z0-9-_\.]/','', $row['productname']),
                'options' => array('shortdesc' => $row['shortdesc'], 'listimagepath' => $row['listimagepath'])
            );



            $this->cart->insert($data);
        }
        echo $showcart=$this->Showcart();
    }

    public function Showminicart(){
        echo $showcart=$this->Showcart();
    }

    public function Showcart(){
        $output='';
        if(count($this->cart->contents())>0){
            $output.='
            <div class="cart-overlay"></div>
            <a href="#" class="cart-toggle label-down link">
                <i class="w-icon-cart">
                    <span class="cart-count">'.$this->cart->total_items().'</span>
                  
                </i>
                <span class="cart-label">Cart</span>
            </a>
            <div class="dropdown-box">
                <div class="cart-header">
                    <span>Shopping Cart</span>
                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                </div>

                <div class="products">';
                    $i=1; foreach($this->cart->contents() as $rowshopcart){ if($i<3){
                    $output.='<div class="product product-cart">
                        <div class="product-detail">
                            <a href="#" class="product-name">'.substr($rowshopcart['name'], 0, 15).'...</a>
                            <div class="price-box">
                                <span class="product-quantity">'.$rowshopcart['qty'].'</span>
                                <span class="product-price">Rs. '.$rowshopcart['price'].'</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="'.base_url().$rowshopcart['options']['listimagepath'].'" alt="'.$rowshopcart['name'].'" height="84"
                                    width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close removecartitem" id="'.$rowshopcart['rowid'].'">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>';
                    }$i++;}
                $output.='</div>

                <div class="cart_total">
                <span>Sub total:</span>
                <span class="price">Rs '.$this->cart->format_number($this->cart->total()).'</span>
                 </div>
                 <div class="cart_total">
                <span>Discount:</span>
                <span class="price">Rs '.$this->cart->format_number(($this->cart->total()*20)/100).'</span>
                </div>
                <div class="cart_total">
                <span>Shipping:</span>
                <span class="price topshipcost">Rs 0.00</span>
                </div>
                <div class="cart_total mt-10">
                <span>total:</span>
                <span class="price">Rs '.$this->cart->format_number(($this->cart->total() * ((100-20) / 100))).'</span>
                </div>
                <div class="cart-action">
                    <a href="'.base_url().'Cart" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                    <a href="'.base_url().'Cart/Checkout" class="btn btn-primary  btn-rounded">Checkout</a>
                </div>
            </div>
            ';

            return $output;
        }
        else{
            $output.='
            <div class="cart-overlay"></div>
            <a href="#" class="cart-toggle label-down link">
                <i class="w-icon-cart">
                    <span class="cart-count">0</span>
                </i>
                <span class="cart-label">Cart</span>
            </a>
            <div class="dropdown-box">
                <div class="cart-header">
                    <span>Shopping Cart</span>
                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                </div>

                <div class="products">&nbsp;</div>

                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">Rs. 0.00</span>
                </div>

                <div class="cart-action">
                    <a href="#" class="btn btn-dark btn-outline btn-rounded" disabled>View Cart</a>
                    <a href="#" class="btn btn-primary  btn-rounded" disabled>Checkout</a>
                </div>
            </div>
            ';
            return $output;
        }
    }
    
    public function Loadmenucart(){
        echo $showcart=$this->Showcart();
    }
    public function Loadcartcheckout(){
        $html='';

        $html.='
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>';
                                foreach($this->cart->contents() as $rowshopcart){
                                $html.='<tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    <td class="product_thumb"><a href="#"><img
                                                src="'.base_url().$rowshopcart['options']['listimagepath'].'" width="98" height="98" alt=""></a></td>
                                    <td class="product_name"><a href="#">'.$rowshopcart['name'].'</a></td>
                                    <td class="product-price">Rs '.$rowshopcart['price'].'</td>
                                    <td class="product_quantity"><label>Quantity</label> <input min="1"
                                            max="100" step="1" value="'.$rowshopcart['qty'].'" data-qtyold="'.$rowshopcart['qty'].'" type="number" class="qtycheck" id="'.$rowshopcart['id'].'"></td>
                                    <td class="product_total">Rs '.number_format($rowshopcart['qty']*$rowshopcart['price']).'</td>
                                </tr>';
                                }
                            $html.='</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="coupon_area">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <!-- <div class="coupon_code left">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.</p>
                            <input placeholder="Coupon code" type="text">
                            <button type="submit">Apply coupon</button>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">Rs '.$this->cart->format_number($this->cart->total()).'</p>
                            </div>
                            <!--<div class="cart_subtotal ">
                                <p>Shipping</p>
                                <p class="cart_amount"><span>Flat Rate:</span> Rs 150.00</p>
                            </div>-->

                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">Rs '.$this->cart->format_number(($this->cart->total()+0)).'</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="'.base_url().'Cart/Checkoutproceed">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';

        echo $html;
    }
    public function Removeminicart(){
        $data = array(
			'rowid' => $this->input->post('rowID'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		
		echo $showcart=$this->Showcart();
    }
    public function Orderproceed(){
        $this->load->model('Cartinfo');
        $result['fetch_data']=$this->Cartinfo->Orderproceed();
    }
    public function Checkcityship(){
        $this->load->model('Cartinfo');
        $result['fetch_data']=$this->Cartinfo->Checkcityship();
    }
    public function Checkpayment(){
        $this->load->model('Cartinfo');
        $result['fetch_data']=$this->Cartinfo->Orderproceed();
    }

    public function Requestcomplete(){
        $this->load->model('Cartinfo');
		$result['topmenucategory']=$this->Cartinfo->Topmenucategory();
		$this->load->view('requestcomplete', $result);
    }
}