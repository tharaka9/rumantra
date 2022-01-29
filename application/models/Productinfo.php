<?php 
class Productinfo extends CI_Model{
    public function Productdetail($x){
        $sql="SELECT `tbl_product`.*, `tbl_stock`.`qty` FROM `tbl_product` LEFT JOIN `tbl_stock` ON `tbl_stock`.`tbl_product_idtbl_product`=`tbl_product`.`idtbl_product` WHERE `tbl_product`.`status`=? AND `tbl_product`.`idtbl_product`=?";
        $respond=$this->db->query($sql, array(1, $x));
        return $respond->row(0);
    }
    public function Productimages($x){
        $sql="SELECT `imagepath` FROM `tbl_product_image` WHERE `status`=? AND `tbl_product_idtbl_product`=?";
        $respond=$this->db->query($sql, array(1, $x));
        return $respond->result();
    }
    public function Productcategory($x){
        $sql="SELECT `product_category` FROM `tbl_product_category` WHERE `status`=? AND `idtbl_product_category` IN (SELECT `tbl_product_category_idtbl_product_category` FROM `tbl_product` WHERE `idtbl_product`=?)";
        $respond=$this->db->query($sql, array(1, $x));
        return $respond->row(0);
    }
    public function Productrelated($x){
        $sql="SELECT `tbl_product`.`idtbl_product`, `tbl_product`.`productname`, `tbl_product`.`avgrate`, `tbl_product`.`price`, `tbl_product`.`listimagepath`, `tbl_stock`.`qty` FROM `tbl_product` LEFT JOIN `tbl_stock` ON `tbl_stock`.`tbl_product_idtbl_product`=`tbl_product`.`idtbl_product` WHERE `tbl_product`.`status`=? AND `tbl_product`.`tbl_product_category_idtbl_product_category` IN (SELECT `tbl_product_category_idtbl_product_category` FROM `tbl_product` WHERE `idtbl_product`=?) AND `tbl_product`.`idtbl_product`!=? ORDER BY `idtbl_product` DESC LIMIT 10";
        $respond=$this->db->query($sql, array(1, $x, $x));
        return $respond->result();
    }
    public function Productupsell($x){
        $sql="SELECT `tbl_product`.`idtbl_product`, `tbl_product`.`productname`, `tbl_product`.`avgrate`, `tbl_product`.`price`, `tbl_product`.`listimagepath`, `tbl_stock`.`qty` FROM `tbl_product` LEFT JOIN `tbl_stock` ON `tbl_stock`.`tbl_product_idtbl_product`=`tbl_product`.`idtbl_product` WHERE `tbl_product`.`status`=? AND `tbl_product`.`tbl_product_category_idtbl_product_category` NOT IN (SELECT `tbl_product_category_idtbl_product_category` FROM `tbl_product` WHERE `idtbl_product`=?) ORDER BY `idtbl_product` DESC LIMIT 10";
        $respond=$this->db->query($sql, array(1, $x));
        return $respond->result();
    }
    public function Productlist($x, $perpage, $page){
        $num_rec_per_page=$perpage;
        if ($page>0) { $page  = $page; } else { $page=1; }; 
        $start_from = ($page-1) * $num_rec_per_page; 

        $sql="SELECT `tbl_product`.`idtbl_product`, `tbl_product`.`productname`, `tbl_product`.`avgrate`, `tbl_product`.`price`, `tbl_product`.`listimagepath`, `tbl_product`.`shortdesc`, `tbl_stock`.`qty` FROM `tbl_product` LEFT JOIN `tbl_stock` ON `tbl_stock`.`tbl_product_idtbl_product`=`tbl_product`.`idtbl_product` WHERE `tbl_product`.`status`=? AND `tbl_product`.`tbl_product_category_idtbl_product_category`=? LIMIT $start_from, $num_rec_per_page";
        $respond=$this->db->query($sql, array(1, $x));
        return $respond->result();
    }
    public function Categoryname($x){
        $sql="SELECT `product_category` FROM `tbl_product_category` WHERE `status`=? AND `idtbl_product_category`=?";
        $respond=$this->db->query($sql, array(1, $x));
        return $respond->row(0);
    }
    public function Sitesuspend(){
        $sql="SELECT `reason` FROM `tbl_order_suspended_days` WHERE ? BETWEEN `from` AND `to` AND `status`=?";
        $respond=$this->db->query($sql, array(date('Y-m-d'), 1));
        return $respond->row(0);
    }

    public function Productin($x){
        $productID=$x;

        $this->db->select('tbl_product.*, tbl_product_category.product_category');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_category', 'tbl_product_category.idtbl_product_category = tbl_product.tbl_product_category_idtbl_product_category');
        // $this->db->join('tbl_product_image', 'tbl_product_image.idtbl_product_image = tbl_product.tbl_product_idtbl_product');
        $this->db->where('tbl_product.status', 1);
        $this->db->where('tbl_product.idtbl_product', $productID);

        $respond=$this->db->get();

        $this->db->select('imagepath');
        $this->db->from('tbl_product_image');
        $this->db->where('status', 1);
        $this->db->where('tbl_product_idtbl_product', $productID);

        $respondimage=$this->db->get();

        $obj=new stdClass();
        $obj->product=$respond->result();
        $obj->productimages=$respondimage->result();

        return $obj;
    }

    public function Loadallproduct($perpage, $page){
        $num_rec_per_page=$perpage;
        if ($page>0) { $page  = $page; } else { $page=1; }; 
        $start_from = ($page-1) * $num_rec_per_page; 
        // echo $start_from;
        $productarray=array();

        $this->db->select('tbl_product.idtbl_product, tbl_product.productname, tbl_product.price, tbl_product_category.product_category');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_category', 'tbl_product_category.idtbl_product_category = tbl_product.tbl_product_category_idtbl_product_category');
        $this->db->where('tbl_product.status', 1);
        $this->db->order_by('tbl_product.idtbl_product', 'DESC');
        $this->db->limit($num_rec_per_page, $start_from);

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
            $obj->category=$rowproduct->product_category;
            $obj->imagepath=$imagepath;

            array_push($productarray, $obj);
        }        

        return $productarray;
    }
}