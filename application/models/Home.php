<?php 
class Home extends CI_Model{
    public function Dealofweek(){
        $sql="SELECT `tbl_product`.`idtbl_product`, `tbl_product`.`productname`, `tbl_product`.`avgrate`, `tbl_product`.`price`,`tbl_product`.`shortdesc`, `tbl_product`.`listimagepath`, `tbl_stock`.`qty` FROM `tbl_product` LEFT JOIN `tbl_stock` ON `tbl_stock`.`tbl_product_idtbl_product`=`tbl_product`.`idtbl_product` WHERE `tbl_product`.`status`=? AND `tbl_product`.`weekstatus`=? ORDER BY `idtbl_product` DESC LIMIT 9";
        $respond=$this->db->query($sql, array(1, 1));
        return $respond->result();
    }
    public function Newarrivalskin(){
        $sql="SELECT `tbl_product`.`idtbl_product`, `tbl_product`.`productname`, `tbl_product`.`avgrate`, `tbl_product`.`price`, `tbl_product`.`listimagepath`, `tbl_stock`.`qty` FROM `tbl_product` LEFT JOIN `tbl_stock` ON `tbl_stock`.`tbl_product_idtbl_product`=`tbl_product`.`idtbl_product` WHERE `tbl_product`.`status`=? AND `tbl_product`.`newstatus`=? AND `tbl_product_category_idtbl_product_category`=? ORDER BY `idtbl_product` DESC LIMIT 8";
        $respond=$this->db->query($sql, array(1, 1, 1));
        return $respond->result();
    }
    public function Newarrivalhair(){
        $sql="SELECT `tbl_product`.`idtbl_product`, `tbl_product`.`productname`, `tbl_product`.`avgrate`, `tbl_product`.`price`, `tbl_product`.`listimagepath`, `tbl_stock`.`qty` FROM `tbl_product` LEFT JOIN `tbl_stock` ON `tbl_stock`.`tbl_product_idtbl_product`=`tbl_product`.`idtbl_product` WHERE `tbl_product`.`status`=? AND `tbl_product`.`newstatus`=? AND `tbl_product_category_idtbl_product_category`=? ORDER BY `idtbl_product` DESC LIMIT 5";
        $respond=$this->db->query($sql, array(1, 1, 2));
        return $respond->result();
    }
    public function Newarrivalnutrace(){
        $sql="SELECT `tbl_product`.`idtbl_product`, `tbl_product`.`productname`, `tbl_product`.`avgrate`, `tbl_product`.`price`, `tbl_product`.`listimagepath`, `tbl_stock`.`qty` FROM `tbl_product` LEFT JOIN `tbl_stock` ON `tbl_stock`.`tbl_product_idtbl_product`=`tbl_product`.`idtbl_product` WHERE `tbl_product`.`status`=? AND `tbl_product`.`newstatus`=? AND `tbl_product_category_idtbl_product_category`=? ORDER BY `idtbl_product` DESC LIMIT 5";
        $respond=$this->db->query($sql, array(1, 1, 3));
        return $respond->result();
    }
    public function gettopproducts()
    {
        $this->db->select('*','tbl_product_category.product_category');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_category', 'tbl_product.tbl_product_category_idtbl_product_category= tbl_product_category.idtbl_product_category');
        
        $this->db->where('tbl_product.topstatus', 1);
        $this->db->LIMIT(8);
        $query = $this->db->get();
        return $query->result();
    }

    public function Getproductquickview(){
        $productID=$this->input->post('productID');

        $sqlproduct="SELECT `idtbl_product`, `productname`, `avgrate`, `price`, `listimagepath`, `shortdesc` FROM `tbl_product` WHERE `status`=? AND `idtbl_product`=?";
        $respondproduct=$this->db->query($sqlproduct, array(1, $productID));

        $sqlproductimage="SELECT `imagepath` FROM `tbl_product_image` WHERE `status`=? AND `tbl_product_idtbl_product`=?";
        $respondproductimage=$this->db->query($sqlproductimage, array(1, $productID));
        
        $html='';
        $html.='
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="modal_tab">
                    <div class="tab-content product-details-large">';
                    $i=0; foreach($respondproductimage->result() as $rowproductimagelist){
                        $html.='<div class="tab-pane fade';if($i==0){$html.=' show active';} $html.='" id="tab'.$i.'" role="tabpanel">
                            <div class="modal_tab_img">
                                <a href="#"><img src="'.base_url().$rowproductimagelist->imagepath.'" alt="'.$respondproduct->row(0)->productname.'"></a>
                            </div>
                        </div>';
                    $i++;}
                    $html.='</div>
                    <div class="modal_tab_button">
                        <ul class="nav product_navactive owl-carousel" role="tablist">';
                        $i=0; foreach($respondproductimage->result() as $rowproductimagelist){
                            $html.='<li>
                                <a class="nav-link';if($i==0){$html.=' active';} $html.='" data-toggle="tab" href="#tab'.$i.'" role="tab"
                                    aria-controls="tab'.$i.'" aria-selected="false"><img
                                        src="'.base_url().$rowproductimagelist->imagepath.'" alt="'.$respondproduct->row(0)->productname.'"></a>
                            </li>';
                        $i++;}
                        $html.='</ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="modal_right">
                    <div class="modal_title mb-10">
                        <h2>'.$respondproduct->row(0)->productname.'</h2>
                    </div>
                    <div class="modal_price mb-10">
                        <span class="new_price">Rs '.$respondproduct->row(0)->price.'</span>
                        <!--<span class="old_price">Rs 78.99</span>-->
                    </div>
                    <div class="modal_description mb-15">
                        '.$respondproduct->row(0)->shortdesc.'
                    </div>
                    <div class="variants_selects">
                        <div class="modal_add_to_cart">
                            <form action="#">
                                <input min="1" max="100" step="1" value="1" type="number" id="quickqty">
                                <button type="button" class="quickaddcart" id="'.$respondproduct->row(0)->idtbl_product.'">add to cart</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal_social">
                        <h2>Share this product</h2>
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        ';

        echo $html;
    }
    public function Categoryproductcount(){
        $sqlskin="SELECT COUNT(*) AS `count` FROM `tbl_product` WHERE `status`=? AND `tbl_product_category_idtbl_product_category`=?";
        $respondskin=$this->db->query($sqlskin, array(1, 1));

        $sqlhair="SELECT COUNT(*) AS `count` FROM `tbl_product` WHERE `status`=? AND `tbl_product_category_idtbl_product_category`=?";
        $respondhair=$this->db->query($sqlhair, array(1, 2));

        $sqlnutra="SELECT COUNT(*) AS `count` FROM `tbl_product` WHERE `status`=? AND `tbl_product_category_idtbl_product_category`=?";
        $respondnutra=$this->db->query($sqlnutra, array(1, 3));

        $objcatecount=new stdClass();
        $objcatecount->skincount=$respondskin->row(0)->count;
        $objcatecount->haircount=$respondhair->row(0)->count;
        $objcatecount->nutracount=$respondnutra->row(0)->count;

        return $objcatecount;
    }
    public function Sitesuspend(){
        $sql="SELECT `reason` FROM `tbl_order_suspended_days` WHERE ? BETWEEN `from` AND `to` AND `status`=?";
        $respond=$this->db->query($sql, array(date('Y-m-d'), 1));
        return $respond->row(0);
    }

    public function ProductCategory(){
        $sql="SELECT * FROM `tbl_product_category`";
        $respond=$this->db->query($sql);
        return $respond->result();
    }

    public function Newarrivalproduct(){
        $productarray=array();
        $this->db->select('idtbl_product, productname, price');
        $this->db->from('tbl_product');
        $this->db->where('status', 1);
        $this->db->order_by('idtbl_product', 'DESC');
        $this->db->limit(10);

        $respond=$this->db->get();

        foreach($respond->result() as $rowproduct){
            $productID=$rowproduct->idtbl_product;

            $this->db->select('imagepath');
            $this->db->from('tbl_product_image');
            $this->db->where('status', 1);
            $this->db->where('tbl_product_idtbl_product', $productID);
            $this->db->limit(1);

            $respondimage=$this->db->get();

            if(!empty($respondimage->row(0)->imagepath)){$imagepath=$respondimage->row(0)->imagepath;}
            else{$imagepath='images/no-preview.jpg';}

            $disprice=0;

            $obj=new stdClass();
            $obj->productid=$rowproduct->idtbl_product;
            $obj->product=$rowproduct->productname;
            $obj->stock=1;
            $obj->price=$rowproduct->price;
            $obj->disprice=$disprice;
            $obj->imagepath=$imagepath;

            array_push($productarray, $obj);
        }        

        return $productarray;
    }

    public function Bestsaleproduct(){
        $productarray=array();

        $sql="SELECT `idtbl_product`, `productname`, `price` FROM `tbl_product` WHERE `status`=? AND `idtbl_product` IN (SELECT `tbl_product_idtbl_product` FROM `tbl_order_detail` WHERE `status`=? GROUP BY `tbl_product_idtbl_product` ORDER BY SUM(`qty`) DESC) LIMIT 20";
        $respond=$this->db->query($sql, array(1, 1));

        foreach($respond->result() as $rowproduct){
            $productID=$rowproduct->idtbl_product;

            $this->db->select('imagepath');
            $this->db->from('tbl_product_image');
            $this->db->where('status', 1);
            $this->db->where('tbl_product_idtbl_product', $productID);
            $this->db->limit(1);

            $respondimage=$this->db->get();

            if(!empty($respondimage->row(0)->imagepath)){$imagepath=$respondimage->row(0)->imagepath;}
            else{$imagepath='images/no-preview.jpg';}

            $disprice=0;

            $obj=new stdClass();
            $obj->productid=$rowproduct->idtbl_product;
            $obj->product=$rowproduct->productname;
            $obj->stock=1;
            $obj->price=$rowproduct->price;
            $obj->disprice=$disprice;
            $obj->imagepath=$imagepath;

            array_push($productarray, $obj);
        }        

        return $productarray;
    }

    public function Featuredproduct(){
        $productarray=array();
        $this->db->select('idtbl_product, productname, price');
        $this->db->from('tbl_product');
        $this->db->where('status', 1);
        $this->db->order_by('idtbl_product', 'DESC');
        $this->db->limit(20);

        $respond=$this->db->get();

        foreach($respond->result() as $rowproduct){
            $productID=$rowproduct->idtbl_product;

            $this->db->select('imagepath');
            $this->db->from('tbl_product_image');
            $this->db->where('status', 1);
            $this->db->where('tbl_product_idtbl_product', $productID);
            $this->db->limit(1);

            $respondimage=$this->db->get();

            if(!empty($respondimage->row(0)->imagepath)){$imagepath=$respondimage->row(0)->imagepath;}
            else{$imagepath='images/no-preview.jpg';}

            $disprice=0;

            $obj=new stdClass();
            $obj->productid=$rowproduct->idtbl_product;
            $obj->product=$rowproduct->productname;
            $obj->stock=1;
            $obj->price=$rowproduct->price;
            $obj->disprice=$disprice;
            $obj->imagepath=$imagepath;

            array_push($productarray, $obj);
        }        

        return $productarray;
    }


    // function fetch_data($query)
    // {
    //  $this->db->like('student_name', $query);
    //  $query = $this->db->get('tbl_student');
    //  if($query->num_rows() > 0)
    //  {
    //   foreach($query->result_array() as $row)
    //   {
    //    $output[] = array(
    //     'name'  => $row["student_name"],
    //     'image'  => $row["image"]
    //    );
    //   }
    //   echo json_encode($output);
    //  }
    // }

    
}