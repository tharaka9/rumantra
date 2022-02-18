<?php 
class Cartinfo extends CI_Model{
    public function Customerprofile($userID){
        $sql="SELECT * FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
        $respond=$this->db->query($sql, array($userID, 1));
        return $respond;
    }
    public function Countrylist(){
        $sql="SELECT `idtbl_country`, `country` FROM `tbl_country` WHERE `status`=?";
        $respond=$this->db->query($sql, array(1));
        return $respond;
    }
    public function Orderproceed(){
        if(isset($_SESSION['user_id'])){
            $loguser=$_SESSION['user_id'];

            $orderdate=date('Y-m-d');
            $shipcost=0;
            $discount=0;
            $updatedatetime=date('Y-m-d h:i:s');
            $productemaillist=array();

            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $streetaddress1=$this->input->post('streetaddress1');
            $city=$this->input->post('town');
            $email=$this->input->post('email');
            $phone=$this->input->post('phone');
            $phone2=$this->input->post('phone2');
            $phoneother=$this->input->post('phoneother');
            
            $firstnamedrop=$this->input->post('firstnamedrop');
            $lastnamedrop=$this->input->post('lastnamedrop');
            $streetaddress1drop=$this->input->post('streetaddress1drop');
            $citydrop=$this->input->post('citydrop');

            $ordernotes=$this->input->post('ordernotes');
            $paymenttype=$this->input->post('paymenttype');

            $deliverydiscount=$this->input->post('deliverydiscount');

            $sqlcustomer="SELECT * FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
            $respondcustomer=$this->db->query($sqlcustomer, array($loguser, 1));

            $customerID=$respondcustomer->row(0)->idtbl_customer;

            if(empty($deliverydiscount)){
                $deliverydiscount=0;
            }

            if($firstnamedrop=='' && $lastnamedrop=='' && $streetaddress1drop=='' && $citydrop==''){
                $deliveryname=$firstname.' '.$lastname;
                $deliverymobile=$phone;
                $deliverymobile2=$phone2;
                $deliveryaddressone=$streetaddress1.' '.$city;
                $deliverycity=$city;
                $otherdeliverystatus=0;                
            }
            else{
                $deliveryname=$firstnamedrop.' '.$lastnamedrop;
                $deliverymobile=$phoneother;
                $deliverymobile2=$phone2;
                $deliveryaddressone=$streetaddress1drop.' '.$citydrop;
                $deliverycity=$citydrop;
                $otherdeliverystatus=1;
            }

            //Create Total Amount
            $shipcost=250;
            $subtotal=$this->cart->total();
            $discount=($subtotal*25)/100;
            $nettotal=($subtotal-$discount)+$shipcost;
            $oldnettotal=$nettotal;

            // Insert order
            $dataorder = array(
                'orderdate'=>$orderdate, 
                'shipcost'=>$shipcost, 
                'booklet'=>'0', 
                'total'=>$subtotal, 
                'discount'=>$discount, 
                'nettotal'=>$nettotal, 
                'acceptstatus'=>'0', 
                'paystatus'=>'0', 
                'shipstatus'=>'0', 
                'deliverystatus'=>'0', 
                'trackingnum'=>'', 
                'trackingwebsite'=>'', 
                'dropdiscountstatus'=>$deliverydiscount, 
                'callstatus'=>'0', 
                'narration'=>$ordernotes, 
                'cancelreason'=>'', 
                'returnstatus'=>'0', 
                'status'=>'1', 
                'updatedatetime'=>$updatedatetime, 
                'tbl_customer_idtbl_customer'=>$respondcustomer->row(0)->idtbl_customer, 
                'tbl_user_idtbl_user'=>$loguser
            );  
            $orderinsert=$this->db->insert('tbl_order', $dataorder);
            $orderID=$this->db->insert_id();

            if($orderinsert){
                // Insert Order Detail
                foreach($this->cart->contents() as $rowshopcart){
                    $sqlcheckinsert="SELECT COUNT(*) AS `countcheck` FROM `tbl_order_detail` WHERE `qty`=? AND `status`=? AND `tbl_product_idtbl_product`=? AND `tbl_order_idtbl_order`=?";
                    $respondcheckinsert=$this->db->query($sqlcheckinsert, array($rowshopcart['qty'], 1, $rowshopcart['id'], $orderID));

                    if($respondcheckinsert->row(0)->countcheck==0){
                        $totalcost=$rowshopcart['qty']*$rowshopcart['price'];

                        $dataorderdetail = array(
                            'product'=>$rowshopcart['name'],
                            'qty'=>$rowshopcart['qty'],
                            'price'=>$rowshopcart['price'],
                            'total'=>$totalcost,
                            'status'=>'1',
                            'updatedatetme'=>$updatedatetime,
                            'tbl_product_idtbl_product'=>$rowshopcart['id'],
                            'tbl_order_idtbl_order'=>$orderID
                        );  
                        $orderdetailinsert=$this->db->insert('tbl_order_detail', $dataorderdetail);
                    }
                }

                // Insert Order Delivery
                $dataorderdelivery = array(
                    'name'=>$deliveryname,
                    'mobile'=>$deliverymobile,
                    'mobiletwo'=>$deliverymobile2,
                    'addressone'=>$deliveryaddressone,
                    'city'=>$deliverycity,
                    'otherdeliverystatus'=>$otherdeliverystatus,
                    'status'=>'1',
                    'updatedatetime'=>$updatedatetime,
                    'tbl_user_idtbl_user'=>$loguser,
                    'tbl_order_idtbl_order'=>$orderID
                );  
                $orderdeliveryinsert=$this->db->insert('tbl_order_delivery', $dataorderdelivery);

                //Order Detail send via email
                $message='';
                $message.= '
                <html xmlns="http://www.w3.org/1999/xhtml">

                    <head>
                        <meta http-equiv="content-type" content="text/html; charset=utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0;">
                        <meta name="format-detection" content="telephone=no" />
                        <style>
                            body {
                                margin: 0;
                                padding: 0;
                                min-width: 100%;
                                width: 100% !important;
                                height: 100% !important;
                            }

                            body,
                            table,
                            td,
                            div,
                            p,
                            a {
                                -webkit-font-smoothing: antialiased;
                                text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                                line-height: 100%;
                            }

                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                border-collapse: collapse !important;
                                border-spacing: 0;
                            }

                            img {
                                border: 0;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                                -ms-interpolation-mode: bicubic;
                            }

                            #outlook a {
                                padding: 0;
                            }

                            .ReadMsgBody {
                                width: 100%;
                            }

                            .ExternalClass {
                                width: 100%;
                            }

                            .ExternalClass,
                            .ExternalClass p,
                            .ExternalClass span,
                            .ExternalClass font,
                            .ExternalClass td,
                            .ExternalClass div {
                                line-height: 100%;
                            }

                            @media all and (min-width: 560px) {
                                .container {
                                    border-radius: 8px;
                                    -webkit-border-radius: 8px;
                                    -moz-border-radius: 8px;
                                    -khtml-border-radius: 8px;
                                }
                            }

                            a,
                            a:hover {
                                color: #127DB3;
                            }

                            .footer a,
                            .footer a:hover {
                                color: #999999;
                            }
                        </style>
                        <title>Richway International Order Information</title>

                    </head>

                    <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                                            background-color: #FFFFFF;
                                            color: #000000;" bgcolor="#FFFFFF" text="#000000">
                        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
                            <tr>
                                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
                                    bgcolor="#FFFFFF">
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="560"
                                        style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;"
                                        class="wrapper">

                                        <tr>
                                            <td align="center" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; padding-top: 20px; padding-bottom: 20px;">
                                                <div style="display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0; color: #FFFFFF;"
                                                    class="preheader">&nbsp;</div>
                                                <a target="_blank" style="text-decoration: none;" href="#"><img border="0" vspace="0"
                                                        hspace="0" src="'.base_url().'images/logo.png" width="100%"
                                                        height="100%" alt="" title=""
                                                        style="color: #000000; font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>

                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560"
                                        style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;"
                                        class="container">
                                        <tr>
                                            <td align="center" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: 500; line-height: 130%; padding-top: 25px; color: #000000; font-family: Helvetica; "
                                                class="header">
                                                Welcome to Richway International
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 300; line-height: 150%; padding-top: 5px; color: #000000; font-family: sans-serif;"
                                                class="subheader">
                                                <hr style="border-style:dotted;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 3%; padding-right: 3%; width: 94%; font-size: 17px; font-weight: bold; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;"
                                                class="paragraph">
                                                Order Information
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 3%; padding-right: 3%; width: 94%; padding-top: 15px;"
                                                class="line">
                                                <hr color="#E0E0E0" align="center" width="100%" size="1" noshade
                                                    style="margin: 0; padding: 0;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 3%; padding-right: 3%; padding-top: 15px;"
                                                class="list-item">
                                                <table align="center" border="0" cellspacing="0" cellpadding="0"
                                                    style="width: 100%; margin: 0; border-collapse: collapse; border-spacing: 0;">
                                                    <tr>
                                                        <th align="left" valign="top"
                                                            style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border-left: 1px solid #CCC; border-top: 1px solid #CCC; border-bottom: 1px solid #CCC; background-color: #f7f0ed;">
                                                            Order Number:</th>
                                                        <td align="left" valign="top"
                                                            style="font-size: 14px; line-height: 140%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 10px; color: #000000; font-family: Helvetica; border-right: 1px solid #CCC; border-top: 1px solid #CCC; border-bottom: 1px solid #CCC; background-color: #f7f0ed;"
                                                            class="paragraph">PO00'.$orderID.'
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" valign="top" style="font-size: 14px; line-height: 140%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 10px; padding-bottom:10px; color: #000000; font-family: Helvetica; border: none" class="paragraph">
                                                            <table align="center" border="0" cellspacing="0" cellpadding="0" style="width: 100%; margin: 0; border-collapse: collapse; border-spacing: 0;">
                                                                <tr>
                                                                    <th align="left" valign="top"
                                                                        style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border: 1px solid #CCC;">Product</th>
                                                                    <th align="center" valign="top"
                                                                        style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border: 1px solid #CCC;"
                                                                        class="paragraph">
                                                                        Qty
                                                                    </th>
                                                                    <th align="right" valign="top"
                                                                        style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border: 1px solid #CCC;"
                                                                        class="paragraph">
                                                                        Unit Price
                                                                    </th>
                                                                    <th align="right" valign="top"
                                                                        style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border: 1px solid #CCC;"
                                                                        class="paragraph">
                                                                        Total
                                                                    </th>
                                                                </tr>';
                                                                foreach($productemaillist as $rowshopcart){
                                                                $message.='<tr>
                                                                    <td align="left" valign="top"
                                                                        style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border: 1px solid #CCC;">
                                                                        '.$rowshopcart->product.'</td>
                                                                    <td align="center" valign="top"
                                                                        style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border: 1px solid #CCC;"
                                                                        class="paragraph">
                                                                        '.$rowshopcart->qty.'
                                                                    </td>
                                                                    <td align="right" valign="top"
                                                                        style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border: 1px solid #CCC;"
                                                                        class="paragraph">
                                                                        '.$rowshopcart->unit.'
                                                                    </td>
                                                                    <td align="right" valign="top"
                                                                        style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border: 1px solid #CCC;"
                                                                        class="paragraph">
                                                                        '.number_format(($rowshopcart->total), 2).'
                                                                    </td>
                                                                </tr>';
                                                                }
                                                            $message.='</table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th align="right" width="80%" valign="top"
                                                            style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border-left: 1px solid #CCC; border-top: 1px solid #CCC; border-bottom: 1px solid #CCC;">
                                                            Total:</th>
                                                        <td align="right" valign="top"
                                                            style="font-size: 14px; line-height: 140%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 10px; color: #000000; font-family: Helvetica; border-right: 1px solid #CCC; border-top: 1px solid #CCC; border-bottom: 1px solid #CCC;"
                                                            class="paragraph">
                                                            '.number_format($subtotal,2).'
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th align="right" width="80%" valign="top"
                                                            style="border-collapse: collapse; border-spacing: 0; padding:10px; font-family: Helvetica; font-size: 14px; border-left: 1px solid #CCC; border-top: 1px solid #CCC; border-bottom: 1px solid #CCC;">
                                                            NetTotal:</th>
                                                        <td align="left" valign="top"
                                                            style="font-size: 14px; line-height: 140%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 10px; color: #000000; font-family: Helvetica; border-right: 1px solid #CCC; border-top: 1px solid #CCC; border-bottom: 1px solid #CCC;"
                                                            class="paragraph">
                                                            '.number_format($nettotal,2).'
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-bottom: 3px; padding-left: 3%; padding-right: 3%; width: 94%; font-size: 12px; line-height: 160%; padding-top: 15px; color: #757575; font-family: Helvetica;">
                                                Please do not reply to this email. Emails sent to this address will not be answered.<br>Copyright © '.date('Y').' Sri Lanka
                                                Richway International (PVT) Ltd, 113/5 F Borella road , pannipitiya. Sri Lanka All rights reserved.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 3%; padding-right: 3%; width: 94%; padding-top: 25px;"
                                                class="line">
                                                <hr color="#E0E0E0" align="center" width="100%" size="1" noshade
                                                    style="margin: 0; padding: 0;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"
                                                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%; padding-top: 20px; padding-bottom: 25px; color: #000000; font-family: sans-serif;"
                                                class="paragraph">
                                                Have any question? <a href="mailto:info@richwayinternational.lk" target="_blank"
                                                    style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">info@richwayinternational.lk</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>

                </html>
                ';

                // $config['protocol'] = 'sendmail';
                // $config['mailpath'] = '/usr/sbin/sendmail';
                // $config['charset'] = 'utf-8';
                // $config['wordwrap'] = TRUE;

                $config['protocol'] = 'sendmail';
                $config['smtp_host'] = 'localhost';
                $config['smtp_user'] = '';
                $config['smtp_pass'] = '';
                $config['smtp_port'] = 25;

                $this->email->initialize($config);
                $this->email->set_mailtype("html"); 
                $this->email->from('info@richwayinternational.lk', 'Richway International');
                $this->email->to('info@laolmart.com');
                $this->email->bcc($respondcustomer->row(0)->email);

                $this->email->subject('Order Information');
                $this->email->message($message);

                $this->email->send();

                $this->cart->destroy();

                if($paymenttype==1){
                    redirect('Cart/Requestcomplete');
                }
                else{
                    redirect('Cart/Requestcomplete');
                }
            }
            else{
                $this->session->set_flashdata('msg', 'Your order not Proceed, please contact our operator.');
                redirect('Cart/Checkoutproceed');
            }
        }
        else{
            $this->session->set_flashdata('msg', 'Please log your account or create new account and after proceed order. Thank You..');
            redirect('Cart/Checkout');
        }
    }
    public function Sitesuspend(){
        $sql="SELECT `reason` FROM `tbl_order_suspended_days` WHERE ? BETWEEN `from` AND `to` AND `status`=?";
        $respond=$this->db->query($sql, array(date('Y-m-d'), 1));
        return $respond->row(0);
    }
    public function Citylist(){
        $sql="SELECT `idtbl_city`, `city` FROM `tbl_city` WHERE `status`=?";
        $respond=$this->db->query($sql, array(1));
        return $respond;
    }
    public function Checkcityship(){
        $cutomercity=$this->input->post('cutomercity');

        $sql="SELECT `colombostatus` FROM `tbl_city` WHERE `status`=? AND `city`=?";
        $respond=$this->db->query($sql, array(1, $cutomercity));
        echo $respond->row(0)->colombostatus;
    }
    public function Bankinfocheck(){
        $userID=$_SESSION['user_id'];
        $sql="SELECT COUNT(*) AS `count` FROM `tbl_customer_bank` WHERE `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=?) AND `status`=?";
        $respond=$this->db->query($sql, array($userID, 1));
        
        return $respond->row(0)->count;
    }

    public function Topmenucategory(){
        $categoryarray=array();

        $this->db->select('idtbl_product_category, product_category');
        $this->db->from('tbl_product_category');
        $this->db->where('status', 1);

        $respond=$this->db->get();

        foreach($respond->result() as $rowcategory){
            $maincategoryID=$rowcategory->idtbl_product_category;

            $this->db->select('idtbl_product_category');
            $this->db->from('tbl_product_category');
            $this->db->where('idtbl_product_category', $maincategoryID);
            $this->db->where('status', 1);

            $respondsub=$this->db->get();

            $obj=new stdClass();
            $obj->idtbl_product_category=$rowcategory->idtbl_product_category;
            $obj->category=$rowcategory->product_category;
            $obj->subcategory=$respondsub->result();

            array_push($categoryarray, $obj);
        }

        return $categoryarray;
    }

}