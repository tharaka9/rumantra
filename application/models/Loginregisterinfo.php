<?php 
class Loginregisterinfo extends CI_Model{
    public function Countrylist(){
        $sql="SELECT `idtbl_country`, `country` FROM `tbl_country` WHERE `status`=?";
        $respond=$this->db->query($sql, array(1));
        
        return $respond;
    }
    public function Signup(){
        $regfirst=$this->input->post('regfirst');
        $reglast=$this->input->post('reglast');
        $regphone=$this->input->post('regphone');
        $regemail=$this->input->post('regemail');
        $regemail = str_replace(' ', '', $regemail);
        $regaddress=$this->input->post('regaddress');
        $regcity=$this->input->post('regcity');
        $regrefcode=$this->input->post('regrefcode');
        $regpassword=md5($this->input->post('regpassword'));  
        $regcountry=$this->input->post('regcountry'); 
        $regdob=date("Y-m-d", strtotime($this->input->post('regdob')));
        $regnic=$this->input->post('regnic'); 

        $msgnumber=substr($regphone, 1);
        
        $updatedatetime=date('Y-m-d h:i:s');

        $regfullname=$regfirst.' '.$reglast;
        
        $sqlcheckemail="SELECT `idtbl_user` FROM `tbl_user` WHERE `username`=? AND `status`<?";
        $respondcheckemail=$this->db->query($sqlcheckemail, array($regemail, 3));

        if($respondcheckemail->num_rows()==0){
            $sqlchecknic="SELECT COUNT(*) AS `count` FROM `tbl_customer` WHERE `nicno`=? AND `status`<?";
            $respondchecknic=$this->db->query($sqlchecknic, array($regnic, 3));

            if($respondchecknic->row(0)->count==0){
                if($regrefcode==''){//Referance Code Empty
                    //User Account Insert
                    $datauseraccount = array(
                        'name'=>$regfullname,
                        'nicno'=>$regnic,
                        'username'=>$regemail,
                        'password'=>$regpassword,
                        'status'=>'0',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_type_idtbl_user_type'=>'4'
                    );  
                    $useraccountinsert=$this->db->insert('tbl_user', $datauseraccount);
                    $lastID=$this->db->insert_id();

                    //Security Code Insert
                    $random=rand(1000,10000);
                    $datausercode = array(
                        'code'=>$random,
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$lastID
                    );
                    $usercodeinsert=$this->db->insert('tbl_user_codes', $datausercode);

                    $sqlcuscount="SELECT COUNT(*) AS `count` FROM `tbl_customer`";
                    $respondcuscount=$this->db->query($sqlcuscount, array());

                    $cusregno='RUM0'.($respondcuscount->row(0)->count+1);

                    $regdate=date('Y-m-d');

                    //Customer Insert
                    $datacustomer = array(
                        'firstname'=>$regfirst,
                        'lastname'=>$reglast,
                        'phone'=>$regphone,
                        'email'=>$regemail,
                        'address'=>$regaddress,
                        'city'=>$regcity,
                        'refcode'=>$cusregno,
                        'nicno'=>$regnic,
                        'dob'=>$regdob,
                        'joindate'=>$regdate,
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$lastID,
                        'tbl_country_idtbl_country'=>$regcountry
                    );
                    $customerinsert=$this->db->insert('tbl_customer', $datacustomer);
                    $customerID=$this->db->insert_id();

                    //Customer Level Insert
                    $datacustomerlevel = array(
                        'level1'=>$cusregno,
                        'level2'=>'',
                        'level3'=>'',
                        'level4'=>'',
                        'level5'=>'',
                        'level6'=>'',
                        'level7'=>'',
                        'level8'=>'',
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_customer_idtbl_customer'=>$customerID,
                        'tbl_user_idtbl_user'=>$lastID
                    );
                    $customerlevelinsert=$this->db->insert('tbl_cutomer_level', $datacustomerlevel);

                    //Email Send Security Code
                    $link=base_url().'Loginregister/Signupapprove/'.$lastID;

                    if($useraccountinsert && $usercodeinsert && $customerinsert){
                        $message='';
                        $message .= '
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
                                <title>Herbline Administrator</title>

                            </head>
                            <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                                background-color: #f2f2f2;
                                color: #000000;" bgcolor="#f2f2f2" text="#000000">
                                <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#f2f2f2">
                                            <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 20%; font-size: 26px; font-weight: bold; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                        <img border="0" vspace="0" hspace="0" src="http://herbline.lk/assets/img/logo/logo.png" width="230" height="60" />
                                                    </td>
                                                    <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 75%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                        Contact us: +94 769 909 992<br>
                                                        Herbline Customer Service
                                                    </td>
                                                </tr>
                                            </table>
                                            <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px; margin-top: 20px;" class="container">
                                                <tr>
                                                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 0%; padding-right: 0%; width: 100%; font-size: 24px; font-weight: 700; line-height: 130%; padding-top: 25px; color: #000000; font-family: Helvetica; " class="header">
                                                        '.$random.' is your one-time PIN for activation.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 300; line-height: 150%; padding-top: 5px; padding-bottom: 25px; color: #000000; font-family: sans-serif;" class="subheader">'.$link.'</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 300; line-height: 150%; padding-top: 5px; padding-bottom: 25px; color: #000000; font-family: sans-serif;" class="subheader">
                                                        This code is valid for one use only.Please enter the 4-digit code on the web page. If you believe you received this message in error, please contact our support team at +94 769 909 992 right away.
                                                    </td>
                                                </tr>
                                            </table>
                                            <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 90%; font-size: 12px; line-height: 160%; padding-top: 15px; color: #757575; font-family: Helvetica;">
                                                        Please do not reply to this email. Emails sent to this address will not be answered.<br>Copyright © 2020 Herbline (Pvt) Ltd, 63/46/1/1, Dambahena Rd,Maharagama, Sri Lanka. All rights reserved.
                                                    </td>
                                                    <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 10%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                        &nbsp;
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
                        $this->email->from('info@rumantra.lk', 'Rumantra Administrator');
                        $this->email->to($regemail);

                        $this->email->subject('Confermation Code');
                        $this->email->message($message);

                        $this->email->send();

                        $obj = new stdClass();
                        $obj->lastID=$lastID;
                        $obj->mobilenum=$msgnumber;
                        $obj->msg='Please use this code '.$random.' for activate your account. Click below link '.$link;
                        $obj->status='1';

                        echo json_encode($obj);
                    }
                    else{
                        $msgstatus='Error, Please contact our operator';

                        $obj = new stdClass();
                        $obj->msgstatus=$msgstatus;
                        $obj->status='0';

                        echo json_encode($obj);
                    }
                }
                else{//Referance Code
                    $sqlgetlevel="SELECT * FROM `tbl_cutomer_level` WHERE `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `refcode`=? AND `status`=?) AND `status`=?";
                    $respondgetlevel=$this->db->query($sqlgetlevel, array($regrefcode, 1, 1));

                    if($respondgetlevel->num_rows()>0){
                        //User Account Insert
                        $datauseraccount = array(
                            'name'=>$regfullname,
                            'nicno'=>$regnic,
                            'username'=>$regemail,
                            'password'=>$regpassword,
                            'status'=>'0',
                            'updatedatetime'=>$updatedatetime,
                            'tbl_user_type_idtbl_user_type'=>'4'
                        );  
                        $useraccountinsert=$this->db->insert('tbl_user', $datauseraccount);
                        $lastID=$this->db->insert_id();

                        //Security Code Insert
                        $random=rand(1000,10000);
                        $datausercode = array(
                            'code'=>$random,
                            'status'=>'1',
                            'updatedatetime'=>$updatedatetime,
                            'tbl_user_idtbl_user'=>$lastID
                        );
                        $usercodeinsert=$this->db->insert('tbl_user_codes', $datausercode);

                        $sqlcuscount="SELECT COUNT(*) AS `count` FROM `tbl_customer`";
                        $respondcuscount=$this->db->query($sqlcuscount, array());

                        $cusregno='RUM0'.($respondcuscount->row(0)->count+1);

                        $regdate=date('Y-m-d');

                        //Customer Insert
                        $datacustomer = array(
                            'firstname'=>$regfirst,
                            'lastname'=>$reglast,
                            'phone'=>$regphone,
                            'email'=>$regemail,
                            'address'=>$regaddress,
                            'city'=>$regcity,
                            'refcode'=>$cusregno,
                            'nicno'=>$regnic,
                            'dob'=>$regdob,
                            'joindate'=>$regdate,
                            'status'=>'1',
                            'updatedatetime'=>$updatedatetime,
                            'tbl_user_idtbl_user'=>$lastID,
                            'tbl_country_idtbl_country'=>$regcountry
                        );
                        $customerinsert=$this->db->insert('tbl_customer', $datacustomer);
                        $customerID=$this->db->insert_id();

                        //Customer Level Insert
                        if($regrefcode!=''){
                            $lvl1='';
                            $lvl2='';
                            $lvl3='';
                            $lvl4='';
                            $lvl5='';

                            for($i=1; $i<6; $i++){
                                if($i==1){$lvl1=$respondgetlevel->row(0)->level1;}
                                if($i==2){$lvl2=$respondgetlevel->row(0)->level2;}
                                if($i==3){$lvl3=$respondgetlevel->row(0)->level3;}
                                if($i==4){$lvl4=$respondgetlevel->row(0)->level4;}
                                if($i==5){$lvl5=$respondgetlevel->row(0)->level5;}
                                if($i==5){$lvl6=$respondgetlevel->row(0)->level6;}
                                if($i==5){$lvl7=$respondgetlevel->row(0)->level7;}
                            }

                            $datacustomerlevel = array(
                                'level1'=>$cusregno,
                                'level2'=>$lvl1,
                                'level3'=>$lvl2,
                                'level4'=>$lvl3,
                                'level5'=>$lvl4,
                                'level6'=>$lvl5,
                                'level7'=>$lvl6,
                                'level8'=>$lvl7,
                                'status'=>'1',
                                'updatedatetime'=>$updatedatetime,
                                'tbl_customer_idtbl_customer'=>$customerID,
                                'tbl_user_idtbl_user'=>$lastID
                            );
                            $customerlevelinsert=$this->db->insert('tbl_cutomer_level', $datacustomerlevel);

                            $sqlcusemail="SELECT `email` FROM `tbl_customer` WHERE `refcode`=? AND `status`=?";
                            $respondcusemail=$this->db->query($sqlcusemail, array($regrefcode, 1));

                            $refcusemail=$respondcusemail->row(0)->email;
                            
                            $messagenew='';
                            $messagenew .= '
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
                                    <title>Herbline Administrator</title>

                                </head>
                                <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                                    background-color: #f2f2f2;
                                    color: #000000;" bgcolor="#f2f2f2" text="#000000">
                                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
                                        <tr>
                                            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#f2f2f2">
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                                    <tr>
                                                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 20%; font-size: 26px; font-weight: bold; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                            <img border="0" vspace="0" hspace="0" src="http://herbline.lk/assets/img/logo/logo.png" width="230" height="60" />
                                                        </td>
                                                        <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 75%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                            Contact us: +94 769 909 992<br>
                                                            Herbline Customer Service
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px; margin-top: 20px;" class="container">
                                                    <tr>
                                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 0%; padding-right: 0%; width: 100%; font-size: 24px; font-weight: 700; line-height: 130%; padding-top: 25px; color: #000000; font-family: Helvetica; " class="header">
                                                            This customer ('.$regfullname.') use your referance code, please check your account & payment information.
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                                    <tr>
                                                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 90%; font-size: 12px; line-height: 160%; padding-top: 15px; color: #757575; font-family: Helvetica;">
                                                            Please do not reply to this email. Emails sent to this address will not be answered.<br>Copyright © 2020 Herbline (Pvt) Ltd, 63/46/1/1, Dambahena Rd,Maharagama, Sri Lanka. All rights reserved.
                                                        </td>
                                                        <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 10%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </body>
                            </html>
                            ';

                            $config['protocol'] = 'sendmail';
                            $config['smtp_host'] = 'localhost';
                            $config['smtp_user'] = '';
                            $config['smtp_pass'] = '';
                            $config['smtp_port'] = 25;

                            $this->email->initialize($config);
                            $this->email->set_mailtype("html"); 
                            $this->email->from('info@herbline.lk', 'Herbline Administrator');
                            $this->email->to($refcusemail);

                            $this->email->subject('New customer register');
                            $this->email->message($messagenew);

                            $this->email->send();
                        }
                        else{
                            $datacustomerlevel = array(
                                'level1'=>$cusregno,
                                'level2'=>'',
                                'level3'=>'',
                                'level4'=>'',
                                'level5'=>'',
                                'level6'=>'',
                                'level7'=>'',
                                'level8'=>'',
                                'status'=>'1',
                                'updatedatetime'=>$updatedatetime,
                                'tbl_customer_idtbl_customer'=>$customerID,
                                'tbl_user_idtbl_user'=>$lastID
                            );
                            $customerlevelinsert=$this->db->insert('tbl_cutomer_level', $datacustomerlevel);
                        }

                        //Email Send Security Code
                        $link=base_url().'Loginregister/Signupapprove/'.$lastID;

                        if($useraccountinsert && $usercodeinsert && $customerinsert){
                            $message='';
                            $message .= '
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
                                    <title>Herbline Administrator</title>

                                </head>
                                <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                                    background-color: #f2f2f2;
                                    color: #000000;" bgcolor="#f2f2f2" text="#000000">
                                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
                                        <tr>
                                            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#f2f2f2">
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                                    <tr>
                                                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 20%; font-size: 26px; font-weight: bold; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                            <img border="0" vspace="0" hspace="0" src="http://herbline.lk/assets/img/logo/logo.png" width="230" height="60" />
                                                        </td>
                                                        <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 75%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                            Contact us: +94 769 909 992<br>
                                                            Herbline Customer Service
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px; margin-top: 20px;" class="container">
                                                    <tr>
                                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 0%; padding-right: 0%; width: 100%; font-size: 24px; font-weight: 700; line-height: 130%; padding-top: 25px; color: #000000; font-family: Helvetica; " class="header">
                                                            '.$random.' is your one-time PIN for activation.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 300; line-height: 150%; padding-top: 5px; padding-bottom: 25px; color: #000000; font-family: sans-serif;" class="subheader">'.$link.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 300; line-height: 150%; padding-top: 5px; padding-bottom: 25px; color: #000000; font-family: sans-serif;" class="subheader">
                                                            This code is valid for one use only.Please enter the 4-digit code on the web page. If you believe you received this message in error, please contact our support team at +94 769 909 992 right away.
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                                    <tr>
                                                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 90%; font-size: 12px; line-height: 160%; padding-top: 15px; color: #757575; font-family: Helvetica;">
                                                            Please do not reply to this email. Emails sent to this address will not be answered.<br>Copyright © 2020 Herbline (Pvt) Ltd, 63/46/1/1, Dambahena Rd,Maharagama, Sri Lanka. All rights reserved.
                                                        </td>
                                                        <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 10%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                                            &nbsp;
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
                            $this->email->from('info@herbline.lk', 'Herbline Administrator');
                            $this->email->to($regemail);

                            $this->email->subject('Confermation Code');
                            $this->email->message($message);

                            $this->email->send();

                            $obj = new stdClass();
                            $obj->lastID=$lastID;
                            $obj->mobilenum=$msgnumber;
                            $obj->msg='Please use this code '.$random.' for activate your account. Click below link '.$link;
                            $obj->status='1';

                            echo json_encode($obj);
                        }
                        else{
                            $msgstatus='Error, Please contact our operator';

                            $obj = new stdClass();
                            $obj->msgstatus=$msgstatus;
                            $obj->status='0';

                            echo json_encode($obj);
                        }
                    }
                    else{
                        $msgstatus='Error, Your Referance code is wrong. Please check and register again';

                        $obj = new stdClass();
                        $obj->msgstatus=$msgstatus;
                        $obj->status='0';

                        echo json_encode($obj);
                    }
                }
            }
            else{
                $msgstatus='Error, This NIC Number already registered Please contact our operator';
                $obj = new stdClass();
                $obj->msgstatus=$msgstatus;
                $obj->status='0';

                echo json_encode($obj);
            }
        }
        else{
            $msgstatus='Error, This mail already registered Please contact our operator';
            $obj = new stdClass();
            $obj->msgstatus=$msgstatus;
            $obj->status='0';

            echo json_encode($obj);
        }
    }
    public function Accountactivate(){
        $actsecuritycode=$this->input->post('actsecuritycode');
        $actuserid=$this->input->post('actuserid');

        $updatedatetime=date('Y-m-d h:i:s');
        
        $sql = "SELECT `code` FROM `tbl_user_codes` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
		$respond=$this->db->query($sql, array($actuserid, 1));
        $code=$respond->row(0)->code;
        
        if($code===$actsecuritycode){
            //User Acoount Activate
            $datauseraccount = array(
                'status'=>'1'
            );  
            $this->db->where('idtbl_user', $actuserid);
            $useraccountupdate=$this->db->update('tbl_user', $datauseraccount);
            
            //Delete Security Code
            $datausercode = array(
                'status'=>'3'
            );  
            $this->db->where('tbl_user_idtbl_user', $actuserid);
            $usercodeupdate=$this->db->delete('tbl_user_codes', $datausercode);

            // $menuarray=array(8,9);

            // foreach($menuarray as $rowmenu){
            //     $datamenuprivilege = array(
            //         'add'=>'1',
            //         'edit'=>'0',
            //         'statuschange'=>'1',
            //         'remove'=>'0',
            //         'access_status'=>'1',
            //         'status'=>'1',
            //         'updatedatetime'=>$updatedatetime,
            //         'tbl_user_idtbl_user'=>$actuserid,
            //         'tbl_menu_list_idtbl_menu_list'=>$rowmenu
            //     );
            //     $menuprivilegeinsert=$this->db->insert('tbl_user_privilege', $datamenuprivilege);
            // }
            
            if($useraccountupdate && $usercodeupdate){
                redirect('Loginregister/Login');
            }
            else{
                $this->session->set_flashdata('msg', 'User Account Not Active, Please contact our agent. Thnak you..');
                redirect('Loginregister/Signupapprove/'.$actuserid);
            }
        }
        else{
            $this->session->set_flashdata('msg', 'Your security code is incorrect, Please check your email & enter.');
            redirect('Loginregister/Signupapprove/'.$actuserid);
        }
    }
    public function Loginaccount(){
        $username=$this->input->post('logusername');
        $password=md5($this->input->post('logpassword'));

        $sql="SELECT * FROM `tbl_user` WHERE (`username`=? OR `nicno`=?) AND `password`=? AND `status`=?";
        $respond=$this->db->query($sql, array($username, $username, $password, 1));
    
        if($respond->num_rows()==1){
            $today=date('Y-m-d');
            $time=date('h:i:s');
            $userID=$respond->row(0)->idtbl_user;
            $status=1;
            
            $datalogindetail = array(
                'logindate'=>$today,
                'logintime'=>$time,
                'status'=>$status,
                'tbl_user_idtbl_user'=>$userID,
            );  
            
            $logindatainsert=$this->db->insert('tbl_user_logindata', $datalogindetail);
            
            return $respond->row(0);
        }
        else{
            return false; 
        }
    }
    public function Customerprofile($userID){
        $updatedatetime=date('Y-m-d h:i:s');

        $sqlcusjoin="SELECT `joindate`, `refcode`, `idtbl_customer` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
        $respondcusjoin=$this->db->query($sqlcusjoin, array($userID, 1));

        $customerjoindate=date("Y-m-d", strtotime($respondcusjoin->row(0)->joindate));
        $refcode=$respondcusjoin->row(0)->refcode;
        $customermainID=$respondcusjoin->row(0)->idtbl_customer;
        
        $sqlposone="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
        $respondposone=$this->db->query($sqlposone, array(1, 1, $userID, 1));
        if($respondposone->num_rows()==0){
            $sqlmem="SELECT `level1`, `updatedatetime`, `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `status`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondmem=$this->db->query($sqlmem, array(1, $userID, 1));
            if($respondmem->num_rows()>0){
                foreach($respondmem->result() as $rowmem){
                    $customermainID=$rowmem->tbl_customer_idtbl_customer;
                    $refcode=$rowmem->level1;

                    $sqlcusjoin="SELECT `joindate` FROM `tbl_customer` WHERE `idtbl_customer`=?";
                    $respondcusjoin=$this->db->query($sqlcusjoin, array($customermainID));

                    $customerjoindate=date("Y-m-d", strtotime($respondcusjoin->row(0)->joindate));
                    $joindate=date("Y-m-d", strtotime($rowmem->updatedatetime));
                    $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                    $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                    $lvl2saletot=0;
                    $lvl3saletot=0;
                    $lvl4saletot=0;
                    $lvl5saletot=0;
                    $lvl6saletot=0;
                    $lvl2completedate='';
                    $lvl3completedate='';
                    $lvl4completedate='';
                    $lvl5completedate='';
                    $lvl6completedate='';

                    $sqllvl2="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl2=$this->db->query($sqllvl2, array($refcode, 1, $customerjoindate, $next1date));

                    if($respondlvl2->num_rows()>=15){
                        foreach($respondlvl2->result() as $rowlvl2){
                            if($lvl2saletot<45000){
                                $customerID=$rowlvl2->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl2saletot=$lvl2saletot+$respondordersum->row(0)->total;
                                if($lvl2saletot>=45000){
                                    $lvl2completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }
                    // echo $lvl2completedate.' - '.$lvl2saletot.'<br>';
                    if($lvl2saletot<45000){
                        $sqllvl2="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                        $respondlvl2=$this->db->query($sqllvl2, array($refcode, 1, $customerjoindate, $next3date));

                        if($respondlvl2->num_rows()>=5){
                            foreach($respondlvl2->result() as $rowlvl2){
                                if($lvl2saletot<45000){
                                    $customerID=$rowlvl2->tbl_customer_idtbl_customer;

                                    $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                    $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                    $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                    $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                    $lvl2saletot=$lvl2saletot+$respondordersum->row(0)->total;
                                    if($lvl2saletot>=45000){
                                        $lvl2completedate=$respondorderdate->row(0)->orderdate;
                                    }
                                }
                            }
                        }
                    }
                    
                    if(!empty($lvl2completedate)){
                        $datacusposition = array(
                            'joindate'=>$customerjoindate,
                            'promotedate'=>$lvl2completedate,
                            'promotepositioncate'=>'1',
                            'promoteposition'=>'Junior Team Leader',
                            'status'=>'1',
                            'updatedatetime'=>$updatedatetime,
                            'tbl_user_idtbl_user'=>$userID,
                            'tbl_customer_idtbl_customer'=>$customermainID
                        );  
                        $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                    }                
                }
            }
        }
        else{
            $sqlpostwo="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondpostwo=$this->db->query($sqlpostwo, array(1, 2, $userID, 1));
            if($respondpostwo->num_rows()==0){
                $lvl2saletot=0;
                $lvl3saletot=0;
                $lvl4saletot=0;
                $lvl5saletot=0;
                $lvl6saletot=0;
                $lvl2completedate='';
                $lvl3completedate='';
                $lvl4completedate='';
                $lvl5completedate='';
                $lvl6completedate='';
                
                $lvl2completedate=$respondposone->row(0)->promotedate;
                // echo $lvl2threemonth.'<br>';
                if(!empty($lvl2completedate)){
                    $joindate=date("Y-m-d", strtotime($lvl2completedate));
                    $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                    $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                    $sqllvl3="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level3`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl3=$this->db->query($sqllvl3, array($refcode, 1, $customerjoindate, $next1date));
                    
                    if($respondlvl3->num_rows()>=75){
                        foreach($respondlvl3->result() as $rowlvl3){
                            if($lvl3saletot<150000){
                                $customerID=$rowlvl3->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl3saletot=$lvl3saletot+$respondordersum->row(0)->total;
                                if($lvl3saletot>=150000){
                                    $lvl3completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }

                    if($lvl3saletot<150000){
                        $sqllvl3="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level3`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                        $respondlvl3=$this->db->query($sqllvl3, array($refcode, 1, $customerjoindate, $next3date));
                        
                        if($respondlvl3->num_rows()>=25){
                            foreach($respondlvl3->result() as $rowlvl3){
                                if($lvl3saletot<150000){
                                    $customerID=$rowlvl3->tbl_customer_idtbl_customer;

                                    $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                    $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                    $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                    $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                    $lvl3saletot=$lvl3saletot+$respondordersum->row(0)->total;
                                    if($lvl3saletot>=150000){
                                        $lvl3completedate=$respondorderdate->row(0)->orderdate;
                                    }
                                }
                            }
                        }
                    }
                    // echo $lvl3completedate.' - '.$lvl3saletot.'<br>';
                    if(!empty($lvl3completedate)){
                        $datacusposition = array(
                            'joindate'=>$customerjoindate,
                            'promotedate'=>$lvl3completedate,
                            'promotepositioncate'=>'2',
                            'promoteposition'=>'Team Leader',
                            'status'=>'1',
                            'updatedatetime'=>$updatedatetime,
                            'tbl_user_idtbl_user'=>$userID,
                            'tbl_customer_idtbl_customer'=>$customermainID
                        );  
                        $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                    }
                }
            }
        }
        
        $sqlpostwo="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
        $respondpostwo=$this->db->query($sqlpostwo, array(1, 2, $userID, 1));
        if($respondpostwo->num_rows()==0){
            $lvl2saletot=0;
            $lvl3saletot=0;
            $lvl4saletot=0;
            $lvl5saletot=0;
            $lvl6saletot=0;
            $lvl2completedate='';
            $lvl3completedate='';
            $lvl4completedate='';
            $lvl5completedate='';
            $lvl6completedate='';
            
            $sqlposone="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondposone=$this->db->query($sqlposone, array(1, 1, $userID, 1));

            if($respondposone->num_rows()>0){
                $lvl2completedate=$respondposone->row(0)->promotedate;
                // echo $lvl2threemonth.'<br>';
                if(!empty($lvl2completedate)){
                    $joindate=date("Y-m-d", strtotime($lvl2completedate));
                    $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                    $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                    $sqllvl3="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level3`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl3=$this->db->query($sqllvl3, array($refcode, 1, $customerjoindate, $next1date));
                    
                    if($respondlvl3->num_rows()>=75){
                        foreach($respondlvl3->result() as $rowlvl3){
                            if($lvl3saletot<150000){
                                $customerID=$rowlvl3->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl3saletot=$lvl3saletot+$respondordersum->row(0)->total;
                                if($lvl3saletot>=150000){
                                    $lvl3completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }

                    if($lvl3saletot<150000){
                        $sqllvl3="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level3`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                        $respondlvl3=$this->db->query($sqllvl3, array($refcode, 1, $customerjoindate, $next3date));
                        
                        if($respondlvl3->num_rows()>=25){
                            foreach($respondlvl3->result() as $rowlvl3){
                                if($lvl3saletot<150000){
                                    $customerID=$rowlvl3->tbl_customer_idtbl_customer;

                                    $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                    $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                    $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                    $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                    $lvl3saletot=$lvl3saletot+$respondordersum->row(0)->total;
                                    if($lvl3saletot>=150000){
                                        $lvl3completedate=$respondorderdate->row(0)->orderdate;
                                    }
                                }
                            }
                        }
                    }
                    // echo $lvl3completedate.' - '.$lvl3saletot.'<br>';
                    if(!empty($lvl3completedate)){
                        $datacusposition = array(
                            'joindate'=>$customerjoindate,
                            'promotedate'=>$lvl3completedate,
                            'promotepositioncate'=>'2',
                            'promoteposition'=>'Team Leader',
                            'status'=>'1',
                            'updatedatetime'=>$updatedatetime,
                            'tbl_user_idtbl_user'=>$userID,
                            'tbl_customer_idtbl_customer'=>$customermainID
                        );  
                        $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                    }
                }
            }
        }
        else{
            $sqlposthree="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondposthree=$this->db->query($sqlposthree, array(1, 3, $userID, 1));
            if($respondposthree->num_rows()==0){
                $lvl2saletot=0;
                $lvl3saletot=0;
                $lvl4saletot=0;
                $lvl5saletot=0;
                $lvl6saletot=0;
                $lvl2completedate='';
                $lvl3completedate='';
                $lvl4completedate='';
                $lvl5completedate='';
                $lvl6completedate='';
                
                $lvl3completedate=$respondpostwo->row(0)->promotedate;

                if(!empty($lvl3completedate)){
                    $joindate=date("Y-m-d", strtotime($lvl3completedate));
                    $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                    $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                    $sqllvl4="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level4`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl4=$this->db->query($sqllvl4, array($refcode, 1, $customerjoindate, $next1date));
                    
                    if($respondlvl4->num_rows()>=375){
                        foreach($respondlvl4->result() as $rowlvl4){
                            if($lvl4saletot<1050000){
                                $customerID=$rowlvl4->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl4saletot=$lvl4saletot+$respondordersum->row(0)->total;
                                if($lvl4saletot>=1050000){
                                    $lvl4completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }
                    
                    if($lvl4saletot<1050000){
                        $sqllvl4="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level4`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                        $respondlvl4=$this->db->query($sqllvl4, array($refcode, 1, $customerjoindate, $next3date));

                        if($respondlvl4->num_rows()>=125){
                            foreach($respondlvl4->result() as $rowlvl4){
                                if($lvl4saletot<1050000){
                                    $customerID=$rowlvl4->tbl_customer_idtbl_customer;

                                    $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                    $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                    $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                    $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                    $lvl4saletot=$lvl4saletot+$respondordersum->row(0)->total;
                                    if($lvl4saletot>=1050000){
                                        $lvl4completedate=$respondorderdate->row(0)->orderdate;
                                    }
                                }
                            }
                        }
                    }
                    
                    // echo $lvl4completedate.' - '.$lvl4saletot.'<br>';
                    if(!empty($lvl4completedate)){
                        $datacusposition = array(
                            'joindate'=>$customerjoindate,
                            'promotedate'=>$lvl4completedate,
                            'promotepositioncate'=>'3',
                            'promoteposition'=>'Senior Team Leader',
                            'status'=>'1',
                            'updatedatetime'=>$updatedatetime,
                            'tbl_user_idtbl_user'=>$userID,
                            'tbl_customer_idtbl_customer'=>$customermainID
                        );  
                        $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                    }
                }
            }
        }

        $sqlposthree="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
        $respondposthree=$this->db->query($sqlposthree, array(1, 3, $userID, 1));
        if($respondposthree->num_rows()==0){
            $lvl2saletot=0;
            $lvl3saletot=0;
            $lvl4saletot=0;
            $lvl5saletot=0;
            $lvl6saletot=0;
            $lvl2completedate='';
            $lvl3completedate='';
            $lvl4completedate='';
            $lvl5completedate='';
            $lvl6completedate='';
            
            $sqlpostwo="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondpostwo=$this->db->query($sqlpostwo, array(1, 2, $userID, 1));

            if($respondpostwo->num_rows()>0){
                $lvl3completedate=$respondpostwo->row(0)->promotedate;

                if(!empty($lvl3completedate)){
                    $joindate=date("Y-m-d", strtotime($lvl3completedate));
                    $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                    $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                    $sqllvl4="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level4`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl4=$this->db->query($sqllvl4, array($refcode, 1, $customerjoindate, $next1date));
                    
                    if($respondlvl4->num_rows()>=375){
                        foreach($respondlvl4->result() as $rowlvl4){
                            if($lvl4saletot<1050000){
                                $customerID=$rowlvl4->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl4saletot=$lvl4saletot+$respondordersum->row(0)->total;
                                if($lvl4saletot>=1050000){
                                    $lvl4completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }

                    if($lvl4saletot<1050000){
                        $sqllvl4="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level4`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                        $respondlvl4=$this->db->query($sqllvl4, array($refcode, 1, $customerjoindate, $next3date));

                        if($respondlvl4->num_rows()>=125){
                            foreach($respondlvl4->result() as $rowlvl4){
                                if($lvl4saletot<1050000){
                                    $customerID=$rowlvl4->tbl_customer_idtbl_customer;

                                    $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                    $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                    $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                    $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                    $lvl4saletot=$lvl4saletot+$respondordersum->row(0)->total;
                                    if($lvl4saletot>=1050000){
                                        $lvl4completedate=$respondorderdate->row(0)->orderdate;
                                    }
                                }
                            }
                        }
                    }
                    // echo $lvl4completedate.' - '.$lvl4saletot.'<br>';
                    if(!empty($lvl4completedate)){
                        $datacusposition = array(
                            'joindate'=>$customerjoindate,
                            'promotedate'=>$lvl4completedate,
                            'promotepositioncate'=>'3',
                            'promoteposition'=>'Senior Team Leader',
                            'status'=>'1',
                            'updatedatetime'=>$updatedatetime,
                            'tbl_user_idtbl_user'=>$userID,
                            'tbl_customer_idtbl_customer'=>$customermainID
                        );  
                        $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                    }
                }
            }
        }
        else{
            $sqlposfour="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondposfour=$this->db->query($sqlposfour, array(1, 4, $userID, 1));
            if($respondposfour->num_rows()==0){
                $lvl2saletot=0;
                $lvl3saletot=0;
                $lvl4saletot=0;
                $lvl5saletot=0;
                $lvl6saletot=0;
                $lvl2completedate='';
                $lvl3completedate='';
                $lvl4completedate='';
                $lvl5completedate='';
                $lvl6completedate='';

                $joindate=date("Y-m-d", strtotime($respondposthree->row(0)->promotedate));
                $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                $sqllvl5="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level5`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                $respondlvl5=$this->db->query($sqllvl5, array($refcode, 1, $customerjoindate, $next1date));

                if($respondlvl5->num_rows()>=375){
                    foreach($respondlvl5->result() as $rowlvl5){
                        if($lvl5saletot<1875000){
                            $customerID=$rowlvl5->tbl_customer_idtbl_customer;

                            $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                            $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                            $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                            $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                            $lvl5saletot=$lvl5saletot+$respondordersum->row(0)->total;

                            if($lvl5saletot>=1875000){
                                $lvl5completedate=$respondorderdate->row(0)->orderdate;
                            }
                        }
                    }
                }

                if($lvl5saletot<1875000){
                    $sqllvl5="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level5`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl5=$this->db->query($sqllvl5, array($refcode, 1, $customerjoindate, $next1date));
                    
                    if($respondlvl5->num_rows()>=625){
                        foreach($respondlvl5->result() as $rowlvl5){
                            if($lvl5saletot<1875000){
                                $customerID=$rowlvl5->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl5saletot=$lvl5saletot+$respondordersum->row(0)->total;
                                if($lvl5saletot>=1875000){
                                    $lvl5completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }
                }
                // echo $lvl5completedate.' - '.$lvl5saletot.'<br>';
                $sqlcheck="SELECT`idtbl_cutomer_position` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?)";
                $respondcheck=$this->db->query($sqlcheck, array(1, 3, $refcode, 1));

                if($respondcheck->num_rows()>0){
                    $count=$respondcheck->num_rows();
                }
                else{
                    $count=0;
                }
                
                if(!empty($lvl5completedate) && $count>=4){
                    $datacusposition = array(
                        'joindate'=>$customerjoindate,
                        'promotedate'=>$lvl5completedate,
                        'promotepositioncate'=>'4',
                        'promoteposition'=>'Assistant Manager',
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$userID,
                        'tbl_customer_idtbl_customer'=>$customermainID
                    );  
                    $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                }
            }
        }

        $sqlposfour="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
        $respondposfour=$this->db->query($sqlposfour, array(1, 4, $userID, 1));
        if($respondposfour->num_rows()==0){
            $sqlposthree="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondposthree=$this->db->query($sqlposthree, array(1, 3, $userID, 1));

            if($respondposthree->num_rows()>0){
                $lvl2saletot=0;
                $lvl3saletot=0;
                $lvl4saletot=0;
                $lvl5saletot=0;
                $lvl6saletot=0;
                $lvl2completedate='';
                $lvl3completedate='';
                $lvl4completedate='';
                $lvl5completedate='';
                $lvl6completedate='';

                $joindate=date("Y-m-d", strtotime($respondposthree->row(0)->promotedate));
                $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                $sqllvl5="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level5`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                $respondlvl5=$this->db->query($sqllvl5, array($refcode, 1, $customerjoindate, $next1date));

                if($respondlvl5->num_rows()>=375){
                    foreach($respondlvl5->result() as $rowlvl5){
                        if($lvl5saletot<1875000){
                            $customerID=$rowlvl5->tbl_customer_idtbl_customer;

                            $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                            $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                            $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                            $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                            $lvl5saletot=$lvl5saletot+$respondordersum->row(0)->total;

                            if($lvl5saletot>=1875000){
                                $lvl5completedate=$respondorderdate->row(0)->orderdate;
                            }
                        }
                    }
                }

                if($lvl5saletot<1875000){
                    $sqllvl5="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level5`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl5=$this->db->query($sqllvl5, array($refcode, 1, $customerjoindate, $next1date));
                    
                    if($respondlvl5->num_rows()>=625){
                        foreach($respondlvl5->result() as $rowlvl5){
                            if($lvl5saletot<1875000){
                                $customerID=$rowlvl5->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl5saletot=$lvl5saletot+$respondordersum->row(0)->total;
                                if($lvl5saletot>=1875000){
                                    $lvl5completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }
                }
                // echo $lvl5completedate.' - '.$lvl5saletot.'<br>';
                $sqlcheck="SELECT`idtbl_cutomer_position` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?)";
                $respondcheck=$this->db->query($sqlcheck, array(1, 3, $refcode, 1));

                if($respondcheck->num_rows()>0){
                    $count=$respondcheck->num_rows();
                }
                else{
                    $count=0;
                }
                
                if(!empty($lvl5completedate) && $count>=4){
                    $datacusposition = array(
                        'joindate'=>$customerjoindate,
                        'promotedate'=>$lvl5completedate,
                        'promotepositioncate'=>'4',
                        'promoteposition'=>'Assistant Manager',
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$userID,
                        'tbl_customer_idtbl_customer'=>$customermainID
                    );  
                    $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                }
            }
        }
        else{
            $sqlposfive="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondposfive=$this->db->query($sqlposfive, array(1, 5, $userID, 1));
            if($respondposfive->num_rows()==0){
                $lvl2saletot=0;
                $lvl3saletot=0;
                $lvl4saletot=0;
                $lvl5saletot=0;
                $lvl6saletot=0;
                $lvl2completedate='';
                $lvl3completedate='';
                $lvl4completedate='';
                $lvl5completedate='';
                $lvl6completedate='';
                $seniorteamcount=0;
                $assimanegerteamcount=0;

                $joindate=date("Y-m-d", strtotime($respondposfour->row(0)->promotedate));
                $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                $sqllvl6="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level6`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                $respondlvl6=$this->db->query($sqllvl6, array($refcode, 1, $customerjoindate, $next1date));

                if($respondlvl6->num_rows()>=3125){
                    foreach($respondlvl6->result() as $rowlvl6){
                        if($lvl6saletot<9375000){
                            $customerID=$rowlvl6->tbl_customer_idtbl_customer;

                            $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                            $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                            $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                            $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                            $lvl6saletot=$lvl6saletot+$respondordersum->row(0)->total;

                            if($lvl6saletot>=9375000){
                                $lvl6completedate=$respondorderdate->row(0)->orderdate;
                            }
                        }
                    }
                }

                if($lvl6saletot<9375000){
                    $sqllvl6="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level6`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl6=$this->db->query($sqllvl6, array($refcode, 1, $customerjoindate, $next3date));

                    if($respondlvl6->num_rows()>=3125){
                        foreach($respondlvl6->result() as $rowlvl6){
                            if($lvl6saletot<9375000){
                                $customerID=$rowlvl6->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl6saletot=$lvl6saletot+$respondordersum->row(0)->total;
                                if($lvl6saletot>=9375000){
                                    $lvl6completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }
                }
                // echo $lvl6completedate.' - '.$lvl6saletot.'<br>';
                $sqlcheck="SELECT`idtbl_cutomer_position` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?)";
                $respondlvl6=$this->db->query($sqlcheck, array(1, 4, $refcode, 1));
                
                if($respondlvl6->num_rows()>0){
                    $count=$respondlvl6->num_rows();
                }
                else{
                    $count=0;
                }

                if(!empty($lvl6completedate) && $count>=4){
                    $datacusposition = array(
                        'joindate'=>$customerjoindate,
                        'promotedate'=>$lvl6completedate,
                        'promotepositioncate'=>'5',
                        'promoteposition'=>'Manager',
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$userID,
                        'tbl_customer_idtbl_customer'=>$customermainID
                    );  
                    $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                }
            }
        }

        $sqlposfive="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
        $respondposfive=$this->db->query($sqlposfive, array(1, 5, $userID, 1));
        if($respondposfive->num_rows()==0){
            $sqlposfour="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondposfour=$this->db->query($sqlposfour, array(1, 4, $userID, 1));

            if($respondposfour->num_rows()>0){
                $lvl2saletot=0;
                $lvl3saletot=0;
                $lvl4saletot=0;
                $lvl5saletot=0;
                $lvl6saletot=0;
                $lvl2completedate='';
                $lvl3completedate='';
                $lvl4completedate='';
                $lvl5completedate='';
                $lvl6completedate='';
                $seniorteamcount=0;
                $assimanegerteamcount=0;

                $joindate=date("Y-m-d", strtotime($respondposfour->row(0)->promotedate));
                $next1date=date("Y-m-d", strtotime($joindate . ' +1 month'));
                $next3date=date("Y-m-d", strtotime($joindate . ' +3 month'));

                $sqllvl6="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level6`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                $respondlvl6=$this->db->query($sqllvl6, array($refcode, 1, $customerjoindate, $next1date));

                if($respondlvl6->num_rows()>=3125){
                    foreach($respondlvl6->result() as $rowlvl6){
                        if($lvl6saletot<9375000){
                            $customerID=$rowlvl6->tbl_customer_idtbl_customer;

                            $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                            $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next1date));

                            $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                            $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                            $lvl6saletot=$lvl6saletot+$respondordersum->row(0)->total;

                            if($lvl6saletot>=9375000){
                                $lvl6completedate=$respondorderdate->row(0)->orderdate;
                            }
                        }
                    }
                }

                if($lvl6saletot<9375000){
                    $sqllvl6="SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level6`=? AND `status`=? AND `updatedatetime` BETWEEN ? AND ?";
                    $respondlvl6=$this->db->query($sqllvl6, array($refcode, 1, $customerjoindate, $next3date));

                    if($respondlvl6->num_rows()>=3125){
                        foreach($respondlvl6->result() as $rowlvl6){
                            if($lvl6saletot<9375000){
                                $customerID=$rowlvl6->tbl_customer_idtbl_customer;

                                $sqlordersum="SELECT SUM(`total`) AS `total` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? AND `orderdate` BETWEEN ? AND ?";
                                $respondordersum=$this->db->query($sqlordersum, array($customerID, 1, 1, $joindate, $next3date));

                                $sqlorderdate="SELECT `orderdate` FROM `tbl_order` WHERE `tbl_customer_idtbl_customer`=? AND `status`=? AND `acceptstatus`=? ORDER BY `idtbl_order` DESC LIMIT 1";
                                $respondorderdate=$this->db->query($sqlorderdate, array($customerID, 1, 1));

                                $lvl6saletot=$lvl6saletot+$respondordersum->row(0)->total;
                                if($lvl6saletot>=9375000){
                                    $lvl6completedate=$respondorderdate->row(0)->orderdate;
                                }
                            }
                        }
                    }
                }
                // echo $lvl6completedate.' - '.$lvl6saletot.'<br>';
                $sqlcheck="SELECT`idtbl_cutomer_position` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?)";
                $respondlvl6=$this->db->query($sqlcheck, array(1, 4, $refcode, 1));
                
                if($respondlvl6->num_rows()>0){
                    $count=$respondlvl6->num_rows();
                }
                else{
                    $count=0;
                }

                if(!empty($lvl6completedate) && $count>=4){
                    $datacusposition = array(
                        'joindate'=>$customerjoindate,
                        'promotedate'=>$lvl6completedate,
                        'promotepositioncate'=>'5',
                        'promoteposition'=>'Manager',
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$userID,
                        'tbl_customer_idtbl_customer'=>$customermainID
                    );  
                    $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                }
            }
        }
        else{
            $sqlpossix="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondpossix=$this->db->query($sqlpossix, array(1, 6, $userID, 1));
            if($respondpossix->num_rows()==0){
                $lvl2saletot=0;
                $lvl3saletot=0;
                $lvl4saletot=0;
                $lvl5saletot=0;
                $lvl6saletot=0;
                $lvl2completedate='';
                $lvl3completedate='';
                $lvl4completedate='';
                $lvl5completedate='';
                $lvl6completedate='';
                $seniorteamcount=0;
                $assimanegerteamcount=0;

                $sqlcheck="SELECT`idtbl_cutomer_position` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?)";
                $respondcheck=$this->db->query($sqlcheck, array(1, 5, $refcode, 1));
                
                if($respondcheck->num_rows()>0){
                    $count=$respondcheck->num_rows();
                }
                else{
                    $count=0;
                }

                $promotedate=date('Y-m-d');

                if($count>=4){
                    $datacusposition = array(
                        'joindate'=>$customerjoindate,
                        'promotedate'=>$promotedate,
                        'promotepositioncate'=>'6',
                        'promoteposition'=>'Director',
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$userID,
                        'tbl_customer_idtbl_customer'=>$customermainID
                    );  
                    $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                }
            }
        }

        $sqlpossix="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
        $respondpossix=$this->db->query($sqlpossix, array(1, 6, $userID, 1));
        if($respondpossix->num_rows()==0){
            $lvl2saletot=0;
            $lvl3saletot=0;
            $lvl4saletot=0;
            $lvl5saletot=0;
            $lvl6saletot=0;
            $lvl2completedate='';
            $lvl3completedate='';
            $lvl4completedate='';
            $lvl5completedate='';
            $lvl6completedate='';
            $seniorteamcount=0;
            $assimanegerteamcount=0;

            $sqlcheck="SELECT`idtbl_cutomer_position` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?)";
            $respondcheck=$this->db->query($sqlcheck, array(1, 5, $refcode, 1));
            
            if($respondcheck->num_rows()>0){
                $count=$respondcheck->num_rows();
            }
            else{
                $count=0;
            }

            $promotedate=date('Y-m-d');

            if($count>=4){
                $datacusposition = array(
                    'joindate'=>$customerjoindate,
                    'promotedate'=>$promotedate,
                    'promotepositioncate'=>'6',
                    'promoteposition'=>'Director',
                    'status'=>'1',
                    'updatedatetime'=>$updatedatetime,
                    'tbl_user_idtbl_user'=>$userID,
                    'tbl_customer_idtbl_customer'=>$customermainID
                );  
                $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
            }
        }
        else{
            $sqlpossix="SELECT `idtbl_cutomer_position`, `promotedate` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondpossix=$this->db->query($sqlpossix, array(1, 7, $userID, 1));
            if($respondpossix->num_rows()==0){
                $lvl2saletot=0;
                $lvl3saletot=0;
                $lvl4saletot=0;
                $lvl5saletot=0;
                $lvl6saletot=0;
                $lvl2completedate='';
                $lvl3completedate='';
                $lvl4completedate='';
                $lvl5completedate='';
                $lvl6completedate='';
                $seniorteamcount=0;
                $assimanegerteamcount=0;

                $sqlcheck="SELECT`idtbl_cutomer_position` FROM `tbl_cutomer_position` WHERE `status`=? AND `promotepositioncate`=? AND `tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?)";
                $respondcheck=$this->db->query($sqlcheck, array(1, 6, $refcode, 1));
                
                if($respondcheck->num_rows()>0){
                    $count=$respondcheck->num_rows();
                }
                else{
                    $count=0;
                }

                $promotedate=date('Y-m-d');

                if($count>=4){
                    $datacusposition = array(
                        'joindate'=>$customerjoindate,
                        'promotedate'=>$promotedate,
                        'promotepositioncate'=>'7',
                        'promoteposition'=>'Gold Director',
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$userID,
                        'tbl_customer_idtbl_customer'=>$customermainID
                    );  
                    $cuspositioninsert=$this->db->insert('tbl_cutomer_position', $datacusposition);
                }
            }
        }

        $sql="SELECT * FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
        $respond=$this->db->query($sql, array($userID, 1));
        return $respond;
    }
    public function Customerorder($userID){
        $sql="SELECT * FROM `tbl_order` WHERE `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?) AND `status` IN (1,2) ORDER BY `idtbl_order` DESC";
        $respond=$this->db->query($sql, array($userID, 1));
        return $respond;
    }
    public function Orderview(){
        $orderID=$this->input->post('orderID');

        $sql="SELECT * FROM `tbl_order` WHERE `idtbl_order`=?";
        $respond=$this->db->query($sql, array($orderID));

        $sqldetail="SELECT * FROM `tbl_order_detail` WHERE `tbl_order_idtbl_order`=?";
        $responddetail=$this->db->query($sqldetail, array($orderID));

        $sqldelivery="SELECT * FROM `tbl_order_delivery` WHERE `tbl_order_idtbl_order`=?";
        $responddelivery=$this->db->query($sqldelivery, array($orderID));

        $html='';
        if($respond->row(0)->status==2){
        $html.='
        <div class="row">
            <div class="col-12"><div class="alert alert-danger text-center">'.$respond->row(0)->cancelreason.'</div></div>
        </div>';
        }
        $html.='
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th class="text-center">Qty</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>';
                $i=1; foreach($responddetail->result() as $rowdetail){
                $html.='<tr>
                    <td>'.$i.'</td>
                    <td>'.$rowdetail->product.'</td>
                    <td class="text-center">'.$rowdetail->qty.'</td>
                    <td class="text-right">'.number_format($rowdetail->price,2).'</td>
                    <td class="text-right">'.number_format($rowdetail->total,2).'</td>
                </tr>';
                $i++;}
            $html.='</tbody>
        </table>
        <div class="row">
            <div class="col-4">
                <h5 class="font-weight-bold">Delivery Information</h5>
                <p class="mb-0">'.$responddelivery->row(0)->name.'</p>
                <p class="mb-0">'.$responddelivery->row(0)->mobile.'</p>
                <p class="mb-0">'.$responddelivery->row(0)->mobiletwo.'</p>
                <p class="mb-0">'.$responddelivery->row(0)->addressone.', '.$responddelivery->row(0)->addresstwo.'</p>
                <p class="mb-0">'.$responddelivery->row(0)->city.'</p>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-7 text-right font-weight-bold">Total :</div>
                    <div class="col-5 text-right font-weight-bold">'.number_format($respond->row(0)->total,2).'</div>
                </div>
                <div class="row">
                    <div class="col-7 text-right font-weight-bold">Discount :</div>
                    <div class="col-5 text-right font-weight-bold">';if($respond->row(0)->dropdiscountstatus==1){$html.='0.00';}else{$html.=number_format($respond->row(0)->discount,2);}$html.='</div>
                </div>
                <div class="row">
                    <div class="col-7 text-right font-weight-bold">Ship Cost :</div>
                    <div class="col-5 text-right font-weight-bold">'.number_format($respond->row(0)->shipcost,2).'</div>
                </div>
                <div class="row">
                    <div class="col-7 text-right font-weight-bold">Booklet Cost :</div>
                    <div class="col-5 text-right font-weight-bold">'.number_format($respond->row(0)->booklet,2).'</div>
                </div>
                <div class="row">
                    <div class="col-7 text-right font-weight-bold">&nbsp;</div>
                    <div class="col-5 text-right font-weight-bold"><hr class="border-dark"></div>
                </div>
                <div class="row">
                    <div class="col-7 text-right font-weight-bold">Net Total :</div>
                    <div class="col-5 text-right font-weight-bold">';if($respond->row(0)->dropdiscountstatus==1){$html.=number_format(($respond->row(0)->total+$respond->row(0)->shipcost+$respond->row(0)->booklet),2);}else{$html.=number_format($respond->row(0)->nettotal,2);}$html.='</div>
                </div>
            </div>
        </div>
        ';

        echo $html;
    }
    public function Commissionview(){
        $lvltwosum=array();
        $lvlthreesum=array();
        $lvlfoursum=array();
        $lvlfivesum=array();
        $lvlsixsum=array();
        $dropsum=array();
        
        $userID=$_SESSION['user_id'];

        $fromdate=date("Y-m-d", strtotime($this->input->post('fromdate')));
        $todate=date("Y-m-d", strtotime($this->input->post('todate')));

        $sqlusercode="SELECT `refcode`, `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
        $respondusercode=$this->db->query($sqlusercode, array($userID, 1));

        $userrefcode=$respondusercode->row(0)->refcode;
        $customerID=$respondusercode->row(0)->idtbl_customer;

        if($userrefcode!=''){
            $sqllvlone="SELECT `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, SUM(`tbl_order`.`total`) AS `total` FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_order`.`tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level1`=? AND `status`=?) AND `tbl_order`.`status`=? AND `tbl_order`.`acceptstatus`=? AND `tbl_order`.`orderdate` BETWEEN ? AND ? GROUP BY `tbl_customer_idtbl_customer`";
            $respondlvlone=$this->db->query($sqllvlone, array($userrefcode, 1, 1, 1, $fromdate, $todate));

            $sqllvltwo="SELECT `tbl_customer`.`idtbl_customer`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_cutomer_commission`.`commission` FROM `tbl_cutomer_commission` LEFT JOIN `tbl_order` ON `tbl_order`.`idtbl_order`=`tbl_cutomer_commission`.`orderid` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_cutomer_commission`.`orderdate` BETWEEN ? AND ? AND `tbl_cutomer_commission`.`status`=1 AND `tbl_cutomer_commission`.`level`=? AND `tbl_cutomer_commission`.`customerid`=?";
            $respondlvltwo=$this->db->query($sqllvltwo, array($fromdate, $todate, 2, $customerID));

            // print_r($respondlvlthree->result())

            foreach ($respondlvltwo->result() as $rowlvltwo){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvltwosum[$rowlvltwo->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvltwosum[$rowlvltwo->idtbl_customer]['firstname'] = $rowlvltwo->firstname;
                    $lvltwosum[$rowlvltwo->idtbl_customer]['lastname'] = $rowlvltwo->lastname;
                    $lvltwosum[$rowlvltwo->idtbl_customer]['commission'] = $rowlvltwo->commission;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvltwosum[$rowlvltwo->idtbl_customer]['commission'] += $rowlvltwo->commission;
                } 
            }

            $sqllvlthree="SELECT `tbl_customer`.`idtbl_customer`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_cutomer_commission`.`commission` FROM `tbl_cutomer_commission` LEFT JOIN `tbl_order` ON `tbl_order`.`idtbl_order`=`tbl_cutomer_commission`.`orderid` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_cutomer_commission`.`orderdate` BETWEEN ? AND ? AND `tbl_cutomer_commission`.`status`=1 AND `tbl_cutomer_commission`.`level`=? AND `tbl_cutomer_commission`.`customerid`=?";
            $respondlvlthree=$this->db->query($sqllvlthree, array($fromdate, $todate, 3, $customerID));

            // print_r($respondlvlthree->result())

            foreach ($respondlvlthree->result() as $rowlvlthree){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvlthreesum[$rowlvlthree->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvlthreesum[$rowlvlthree->idtbl_customer]['firstname'] = $rowlvlthree->firstname;
                    $lvlthreesum[$rowlvlthree->idtbl_customer]['lastname'] = $rowlvlthree->lastname;
                    $lvlthreesum[$rowlvlthree->idtbl_customer]['commission'] = $rowlvlthree->commission;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvlthreesum[$rowlvlthree->idtbl_customer]['commission'] += $rowlvlthree->commission;
                } 
            }

            $sqllvlfour="SELECT `tbl_customer`.`idtbl_customer`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_cutomer_commission`.`commission` FROM `tbl_cutomer_commission` LEFT JOIN `tbl_order` ON `tbl_order`.`idtbl_order`=`tbl_cutomer_commission`.`orderid` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_cutomer_commission`.`orderdate` BETWEEN ? AND ? AND `tbl_cutomer_commission`.`status`=1 AND `tbl_cutomer_commission`.`level`=? AND `tbl_cutomer_commission`.`customerid`=?";
            $respondlvlfour=$this->db->query($sqllvlfour, array($fromdate, $todate, 4, $customerID));

            // print_r($respondlvlthree->result())

            foreach ($respondlvlfour->result() as $rowlvlfour){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvlfoursum[$rowlvlfour->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvlfoursum[$rowlvlfour->idtbl_customer]['firstname'] = $rowlvlfour->firstname;
                    $lvlfoursum[$rowlvlfour->idtbl_customer]['lastname'] = $rowlvlfour->lastname;
                    $lvlfoursum[$rowlvlfour->idtbl_customer]['commission'] = $rowlvlfour->commission;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvlfoursum[$rowlvlfour->idtbl_customer]['commission'] += $rowlvlfour->commission;
                } 
            }

            $sqllvlfive="SELECT `tbl_customer`.`idtbl_customer`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_cutomer_commission`.`commission` FROM `tbl_cutomer_commission` LEFT JOIN `tbl_order` ON `tbl_order`.`idtbl_order`=`tbl_cutomer_commission`.`orderid` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_cutomer_commission`.`orderdate` BETWEEN ? AND ? AND `tbl_cutomer_commission`.`status`=1 AND `tbl_cutomer_commission`.`level`=? AND `tbl_cutomer_commission`.`customerid`=?";
            $respondlvlfive=$this->db->query($sqllvlfive, array($fromdate, $todate, 5, $customerID));

            // print_r($respondlvlthree->result())

            foreach ($respondlvlfive->result() as $rowlvlfive){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvlfivesum[$rowlvlfive->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvlfivesum[$rowlvlfive->idtbl_customer]['firstname'] = $rowlvlfive->firstname;
                    $lvlfivesum[$rowlvlfive->idtbl_customer]['lastname'] = $rowlvlfive->lastname;
                    $lvlfivesum[$rowlvlfive->idtbl_customer]['commission'] = $rowlvlfive->commission;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvlfivesum[$rowlvlfive->idtbl_customer]['commission'] += $rowlvlfive->commission;
                } 
            }

            $sqllvlsix="SELECT `tbl_customer`.`idtbl_customer`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_cutomer_commission`.`commission` FROM `tbl_cutomer_commission` LEFT JOIN `tbl_order` ON `tbl_order`.`idtbl_order`=`tbl_cutomer_commission`.`orderid` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_cutomer_commission`.`orderdate` BETWEEN ? AND ? AND `tbl_cutomer_commission`.`status`=1 AND `tbl_cutomer_commission`.`level`=? AND `tbl_cutomer_commission`.`customerid`=?";
            $respondlvlsix=$this->db->query($sqllvlsix, array($fromdate, $todate, 6, $customerID));

            // print_r($respondlvlsix->result());

            foreach ($respondlvlsix->result() as $rowlvlsix){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvlsixsum[$rowlvlsix->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvlsixsum[$rowlvlsix->idtbl_customer]['firstname'] = $rowlvlsix->firstname;
                    $lvlsixsum[$rowlvlsix->idtbl_customer]['lastname'] = $rowlvlsix->lastname;
                    $lvlsixsum[$rowlvlsix->idtbl_customer]['commission'] = $rowlvlsix->commission;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvlsixsum[$rowlvlsix->idtbl_customer]['commission'] += $rowlvlsix->commission;
                } 
            }

            $sqldrop="SELECT `tbl_customer`.`idtbl_customer`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_cutomer_commission`.`commission` FROM `tbl_cutomer_commission` LEFT JOIN `tbl_order` ON `tbl_order`.`idtbl_order`=`tbl_cutomer_commission`.`orderid` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_cutomer_commission`.`orderdate` BETWEEN ? AND ? AND `tbl_cutomer_commission`.`status`=1 AND `tbl_cutomer_commission`.`level`=? AND `tbl_cutomer_commission`.`customerid`=?";
            $responddrop=$this->db->query($sqldrop, array($fromdate, $todate, 0, $customerID));

            // print_r($respondlvlthree->result())

            foreach ($responddrop->result() as $rowdrop){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($dropsum[$rowdrop->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $dropsum[$rowdrop->idtbl_customer]['firstname'] = $rowdrop->firstname;
                    $dropsum[$rowdrop->idtbl_customer]['lastname'] = $rowdrop->lastname;
                    $dropsum[$rowdrop->idtbl_customer]['commission'] = $rowdrop->commission;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $dropsum[$rowdrop->idtbl_customer]['commission'] += $rowdrop->commission;
                } 
            }
        }

        $sqlreturn="SELECT `orderdate`, `comment`, `returnprice`, `tbl_order_idtbl_order` FROM `tbl_order_return` WHERE `status`=? AND `tbl_customer_idtbl_customer`=? AND `orderdate` BETWEEN ? AND ?";
        $respondreturn=$this->db->query($sqlreturn, array(1, $customerID, $fromdate, $todate));

        $netcomlvlone=0;
        $netcomlvltwo=0;
        $netcomlvlthree=0;
        $netcomlvlfour=0;
        $netcomlvlfive=0;
        $netcomlvlsix=0;
        $netcomdrop=0;
        $netcomreturn=0;

        $html='';
        $html.='
        <div class="card-deck">
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 02 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvltwosum as $rowlvltwo){
                                $fullname=$rowlvltwo['firstname'].' '.$rowlvltwo['lastname'];
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvltwo['commission'],2);$netcomlvltwo=$netcomlvltwo+$rowlvltwo['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="lvltwonettotal" value="'.$netcomlvltwo.'">'.number_format($netcomlvltwo, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 03 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvlthreesum as $rowlvlthree){
                                $fullname=$rowlvlthree['firstname'].' '.$rowlvlthree['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvlthree['commission'],2); $netcomlvlthree=$netcomlvlthree+$rowlvlthree['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="lvlthreenettotal" value="'.$netcomlvlthree.'">'.number_format($netcomlvlthree, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 04 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvlfoursum as $rowlvlfour){
                                $fullname=$rowlvlfour['firstname'].' '.$rowlvlfour['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvlfour['commission'],2); $netcomlvlfour=$netcomlvlfour+$rowlvlfour['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="lvlfournettotal" value="'.$netcomlvlfour.'">'.number_format($netcomlvlfour, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 05 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvlfivesum as $rowlvlfive){
                                $fullname=$rowlvlfive['firstname'].' '.$rowlvlfive['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvlfive['commission'],2); $netcomlvlfive=$netcomlvlfive+$rowlvlfive['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="lvlfivenettotal" value="'.$netcomlvlfive.'">'.number_format($netcomlvlfive, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 06 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvlsixsum as $rowlvlsix){
                                $fullname=$rowlvlsix['firstname'].' '.$rowlvlsix['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvlsix['commission'],2); $netcomlvlsix=$netcomlvlsix+$rowlvlsix['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="lvlsixnettotal" value="'.$netcomlvlsix.'">'.number_format($netcomlvlsix, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style text-danger"><span>Drop Ship Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($dropsum as $rowdropsum){
                                $fullname=$rowdropsum['firstname'].' '.$rowdropsum['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowdropsum['commission'],2); $netcomdrop=$netcomdrop+$rowdropsum['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="lvldropnettotal" value="'.$netcomdrop.'">'.number_format($netcomdrop, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Return Deduction Information</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Comment</th>
                                <th class="text-right">Return Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($respondreturn->result() as $rowreturn){                                
                            $html.='<tr>
                                <td nowrap>PO000'.$rowreturn->tbl_order_idtbl_order.'</td>
                                <td nowrap>'.$rowreturn->orderdate.'</td>
                                <td nowrap>'.$rowreturn->comment.'</td>
                                <td class="text-right">';$html.=number_format($rowreturn->returnprice,2); $netcomreturn=$netcomreturn+$rowreturn->returnprice;$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="lvlreturntotal" value="'.$netcomreturn.'">'.number_format($netcomreturn, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        ';
        
        echo $html;
    }
    public function Customerprofilebank($userID){
        $sql="SELECT * FROM `tbl_customer_bank` WHERE `status`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
        $respond=$this->db->query($sql, array(1, $userID, 1));
        return $respond;
    }
    public function Updateprofile(){
        $userID=$_SESSION['user_id'];

        $regfirst=$this->input->post('regfirst');
        $reglast=$this->input->post('reglast');
        $regphone=$this->input->post('regphone');
        $regemail=$this->input->post('regemail');
        $regaddress=$this->input->post('regaddress');
        $regcity=$this->input->post('regcity'); 
        $regcountry=$this->input->post('regcountry'); 
        $regbank=$this->input->post('regbank'); 
        $regbranch=$this->input->post('regbranch'); 
        $regaccount=$this->input->post('regaccount'); 
        $regaccountno=$this->input->post('regaccountno'); 
        $regbankcode=$this->input->post('regbankcode'); 
        $regbranchcode=$this->input->post('regbranchcode'); 
        $regdob=date("Y-m-d", strtotime($this->input->post('dob')));
        $regnic=$this->input->post('nic'); 
        
        $updatedatetime=date('Y-m-d h:i:s');

        $regfullname=$regfirst.' '.$reglast;

        $sqlbankbranchinfo="SELECT `branch` FROM `tbl_bank_branch` WHERE `bankcode`=? AND `code`=?";
        $respondbankbranchinfo=$this->db->query($sqlbankbranchinfo, array($regbank, $regbranch));

        $regbranch=$respondbankbranchinfo->row(0)->branch;

        $sqlbankinfo="SELECT `bank` FROM `tbl_bank` WHERE `code`=?";
        $respondbankinfo=$this->db->query($sqlbankinfo, array($regbank));

        $regbank=$respondbankinfo->row(0)->bank;

        $sqlchecknic="SELECT COUNT(*) AS `count` FROM `tbl_customer` WHERE `nicno`=? AND `status`<?";
        $respondchecknic=$this->db->query($sqlchecknic, array($regnic, 3));

        if($respondchecknic->row(0)->count==0){
            //User Account Update
            $datauseraccount = array(
                'name'=>$regfullname,
                'nicno'=>$regnic,
                'updatedatetime'=>$updatedatetime
            );  
            $this->db->where('idtbl_user', $userID);
            $useraccountupdate=$this->db->update('tbl_user', $datauseraccount);
            
            //Customer Insert
            $datacustomer = array(
                'firstname'=>$regfirst,
                'lastname'=>$reglast,
                'phone'=>$regphone,
                'email'=>$regemail,
                'address'=>$regaddress,
                'city'=>$regcity,
                'nicno'=>$regnic,
                'dob'=>$regdob,
                'updatedatetime'=>$updatedatetime,
                'tbl_country_idtbl_country'=>$regcountry
            );
            $this->db->where('tbl_user_idtbl_user', $userID);
            $customerupdate=$this->db->update('tbl_customer', $datacustomer);
            
            $sqlcheckbank="SELECT `idtbl_customer_bank` FROM `tbl_customer_bank` WHERE `status`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
            $respondcheckbank=$this->db->query($sqlcheckbank, array(1, $userID, 1));

            $sqlcustomer="SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
            $respondcustomer=$this->db->query($sqlcustomer, array($userID, 1));

            $customerID=$respondcustomer->row(0)->idtbl_customer;

            if($respondcheckbank->num_rows()==0){
                $databankaccount = array(
                    'bank'=>$regbank,
                    'bankcode'=>$regbankcode,
                    'branch'=>$regbranch,
                    'branchcode'=>$regbranchcode,
                    'accountno'=>$regaccountno,
                    'accountname'=>$regaccount,
                    'status'=>'1',
                    'updatedatetime'=>$updatedatetime,
                    'tbl_user_idtbl_user'=>$userID,
                    'tbl_customer_idtbl_customer'=>$customerID
                );  
                $bankaccountinsert=$this->db->insert('tbl_customer_bank', $databankaccount);
            }
            else{
                $databankaccount = array(
                    'bank'=>$regbank,
                    'bankcode'=>$regbankcode,
                    'branch'=>$regbranch,
                    'branchcode'=>$regbranchcode,
                    'accountno'=>$regaccountno,
                    'accountname'=>$regaccount,
                    'status'=>'1',
                    'updatedatetime'=>$updatedatetime,
                    'tbl_user_idtbl_user'=>$userID
                );   
                $this->db->where('tbl_customer_idtbl_customer', $customerID);
                $bankaccountupdate=$this->db->update('tbl_customer_bank', $databankaccount);
            }

            redirect(base_url().'Loginregister/Account');
        }
        else{
            $sqlchecknic="SELECT COUNT(*) AS `count` FROM `tbl_customer` WHERE `nicno`=? AND `status`<? AND `tbl_user_idtbl_user`=?";
            $respondchecknic=$this->db->query($sqlchecknic, array($regnic, 3, $userID));

            if($respondchecknic->row(0)->count==1){
                //User Account Update
                $datauseraccount = array(
                    'name'=>$regfullname,
                    'nicno'=>$regnic,
                    'updatedatetime'=>$updatedatetime
                );  
                $this->db->where('idtbl_user', $userID);
                $useraccountupdate=$this->db->update('tbl_user', $datauseraccount);
                
                //Customer Insert
                $datacustomer = array(
                    'firstname'=>$regfirst,
                    'lastname'=>$reglast,
                    'phone'=>$regphone,
                    'email'=>$regemail,
                    'address'=>$regaddress,
                    'city'=>$regcity,
                    'nicno'=>$regnic,
                    'dob'=>$regdob,
                    'updatedatetime'=>$updatedatetime,
                    'tbl_country_idtbl_country'=>$regcountry
                );
                $this->db->where('tbl_user_idtbl_user', $userID);
                $customerupdate=$this->db->update('tbl_customer', $datacustomer);
                
                $sqlcheckbank="SELECT `idtbl_customer_bank` FROM `tbl_customer_bank` WHERE `status`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?)";
                $respondcheckbank=$this->db->query($sqlcheckbank, array(1, $userID, 1));

                $sqlcustomer="SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
                $respondcustomer=$this->db->query($sqlcustomer, array($userID, 1));

                $customerID=$respondcustomer->row(0)->idtbl_customer;

                if($respondcheckbank->num_rows()==0){
                    $databankaccount = array(
                        'bank'=>$regbank,
                        'bankcode'=>$regbankcode,
                        'branch'=>$regbranch,
                        'branchcode'=>$regbranchcode,
                        'accountno'=>$regaccountno,
                        'accountname'=>$regaccount,
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$userID,
                        'tbl_customer_idtbl_customer'=>$customerID
                    );  
                    $bankaccountinsert=$this->db->insert('tbl_customer_bank', $databankaccount);
                }
                else{
                    $databankaccount = array(
                        'bank'=>$regbank,
                        'bankcode'=>$regbankcode,
                        'branch'=>$regbranch,
                        'branchcode'=>$regbranchcode,
                        'accountno'=>$regaccountno,
                        'accountname'=>$regaccount,
                        'status'=>'1',
                        'updatedatetime'=>$updatedatetime,
                        'tbl_user_idtbl_user'=>$userID
                    );   
                    $this->db->where('tbl_customer_idtbl_customer', $customerID);
                    $bankaccountupdate=$this->db->update('tbl_customer_bank', $databankaccount);
                }

                redirect(base_url().'Loginregister/Account');
            }
            else{
                $this->session->set_flashdata('msg', 'Error, This NIC Number already registered Please contact our operator');
                redirect('Loginregister/Account');
            }
        }
    }
    public function Accountcheck(){
        $accountemail=$this->input->post('accountemail');

        $updatedatetime=date('Y-m-d h:i:s');
        
        $sql = "SELECT `idtbl_user` FROM `tbl_user` WHERE `username`=? AND `status`=?";
        $respond=$this->db->query($sql, array($accountemail, 1));
        
        if($respond->num_rows()==0){
            $this->session->set_flashdata('msg', 'Your email address is not registered, Please enter valid email address.');
            redirect('Loginregister/Lostpassword');
        }
        else{
            $accountID=$respond->row(0)->idtbl_user;

            //Security Code Insert
            $random=rand(1000,10000);
            $datausercode = array(
                'code'=>$random,
                'status'=>'1',
                'updatedatetime'=>$updatedatetime,
                'tbl_user_idtbl_user'=>$accountID
            );
            $usercodeinsert=$this->db->insert('tbl_user_codes', $datausercode);

            //User Acoount Activate
            $datauseraccount = array(
                'status'=>'2'
            );  
            $this->db->where('idtbl_user', $accountID);
            $useraccountupdate=$this->db->update('tbl_user', $datauseraccount);
            
            $message='';
            $message .= '
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
                    <title>Herbline Administrator</title>

                </head>
                <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                    background-color: #f2f2f2;
                    color: #000000;" bgcolor="#f2f2f2" text="#000000">
                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
                        <tr>
                            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#f2f2f2">
                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                    <tr>
                                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 20%; font-size: 26px; font-weight: bold; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                            <img border="0" vspace="0" hspace="0" src="http://herbline.lk/assets/img/logo/logo.png" width="230" height="60" />
                                        </td>
                                        <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 75%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                            Contact us: +94 769 909 992<br>
                                            Herbline Customer Service
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px; margin-top: 20px;" class="container">
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 0%; padding-right: 0%; width: 100%; font-size: 24px; font-weight: 700; line-height: 130%; padding-top: 25px; color: #000000; font-family: Helvetica; " class="header">
                                            '.$random.' is your one-time PIN for activation.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 300; line-height: 150%; padding-top: 5px; padding-bottom: 25px; color: #000000; font-family: sans-serif;" class="subheader">
                                            This code is valid for one use only.Please enter the 4-digit code on the web page. If you believe you received this message in error, please contact our support team at +94 769 909 992 right away.
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                    <tr>
                                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 90%; font-size: 12px; line-height: 160%; padding-top: 15px; color: #757575; font-family: Helvetica;">
                                            Please do not reply to this email. Emails sent to this address will not be answered.<br>Copyright © 2020 Herbline (Pvt) Ltd, 63/46/1/1, Dambahena Rd,Maharagama, Sri Lanka. All rights reserved.
                                        </td>
                                        <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 10%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                            &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
            ';

            $config['protocol'] = 'sendmail';
            $config['smtp_host'] = 'localhost';
            $config['smtp_user'] = '';
            $config['smtp_pass'] = '';
            $config['smtp_port'] = 25;

            $this->email->initialize($config);
            $this->email->set_mailtype("html"); 
            $this->email->from('info@herbline.lk', 'Herbline Administrator');
            $this->email->to($accountemail);

            $this->email->subject('Confermation Code');
            $this->email->message($message);

            $this->email->send();

            redirect('Loginregister/Changepassword/'.$accountID);
        }
    }
    public function Changenewpassword(){
        $securitycode=$this->input->post('securitycode');
        $newpassword=md5($this->input->post('newpassword'));
        $hideaccount=$this->input->post('hideaccount');

        $sql = "SELECT `code` FROM `tbl_user_codes` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
		$respond=$this->db->query($sql, array($hideaccount, 1));
        $code=$respond->row(0)->code;
        
        if($code===$securitycode){
            $datauseraccount = array(
                'password'=>$newpassword,
                'status'=>'1'
            );  
            $this->db->where('idtbl_user', $hideaccount);
            $useraccountupdate=$this->db->update('tbl_user', $datauseraccount);

            //Delete Security Code
            $datausercode = array(
                'status'=>'3'
            );  
            $this->db->where('tbl_user_idtbl_user', $hideaccount);
            $usercodeupdate=$this->db->delete('tbl_user_codes', $datausercode);

            if($useraccountupdate){
                redirect('Loginregister/Login');
            }
            else{
                $this->session->set_flashdata('msg', 'Password not update, Please contact our agent. Thnak you..');
                redirect('Loginregister/Changepassword/'.$hideaccount);
            }
        }
        else{
            $this->session->set_flashdata('msg', 'Your security code is incorrect, Please check your email & enter.');
            redirect('Loginregister/Changepassword/'.$hideaccount);
        }
    }
    public function Subscribe(){
        $email=$this->input->post('email');
        $updatedatetime=date('Y-m-d h:i:s');

        $datasubscribe = array(
            'email'=>$email,
            'status'=>'1',
            'updatedatetime'=>$updatedatetime
        );  
        $subscribeinsert=$this->db->insert('tbl_subscribe', $datasubscribe);
        if($subscribeinsert){echo '1';}
        else{echo '0';}
    }
    public function Ordercancel(){
        $email=$this->input->post('email');
        $orderID=$this->input->post('orderID');

        $dataorder = array(
            'status'=>'2'
        );  
        $this->db->where('idtbl_order', $orderID);
        $orderupdate=$this->db->update('tbl_order', $dataorder);

        if($orderupdate){
            $message='';
            $message .= '
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
                    <title>Herbline Administrator</title>

                </head>
                <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                    background-color: #f2f2f2;
                    color: #000000;" bgcolor="#f2f2f2" text="#000000">
                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
                        <tr>
                            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#f2f2f2">
                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                    <tr>
                                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 20%; font-size: 26px; font-weight: bold; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                            <img border="0" vspace="0" hspace="0" src="http://herbline.lk/assets/img/logo/logo.png" width="230" height="60" />
                                        </td>
                                        <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 75%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                            Contact us: +94 769 909 992<br>
                                            Herbline Customer Service
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px; margin-top: 20px;" class="container">
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 0%; padding-right: 0%; width: 100%; font-size: 24px; font-weight: 700; line-height: 130%; padding-top: 25px; color: #000000; font-family: Helvetica; " class="header">
                                            This order no (PO00'.$orderID.') is cancel. Please contact our operator further information.
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;" class="container">   
                                    <tr>
                                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 1%; width: 90%; font-size: 12px; line-height: 160%; padding-top: 15px; color: #757575; font-family: Helvetica;">
                                            Please do not reply to this email. Emails sent to this address will not be answered.<br>Copyright © 2020 Herbline (Pvt) Ltd, 63/46/1/1, Dambahena Rd,Maharagama, Sri Lanka. All rights reserved.
                                        </td>
                                        <td align="right" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-right: 1%; width: 10%; font-size: 14px; font-weight: 300; line-height: 160%; padding-top: 15px; color: #000000; font-family: Helvetica;">
                                            &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
            ';

            $config['protocol'] = 'sendmail';
            $config['smtp_host'] = 'localhost';
            $config['smtp_user'] = '';
            $config['smtp_pass'] = '';
            $config['smtp_port'] = 25;

            $this->email->initialize($config);
            $this->email->set_mailtype("html"); 
            $this->email->from('info@herbline.lk', 'Herbline Administrator');
            $this->email->to($email);
            $this->email->bcc('info@herbline.lk');

            $this->email->subject('Order Cancellation');
            $this->email->message($message);

            $this->email->send();
        }
    }
    public function Customermember(){
        $userID=$_SESSION['user_id'];

        $fromdate=date("Y-m-d", strtotime($this->input->post('fromdate')));
        $todate=date("Y-m-d", strtotime($this->input->post('todate')));

        $sqlusercode="SELECT `refcode` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
        $respondusercode=$this->db->query($sqlusercode, array($userID, 1));

        $userrefcode=$respondusercode->row(0)->refcode;

        $memberarray=array();

        if($userrefcode!=''){
            $sqllvlone="SELECT `firstname`, `lastname` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level1`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvlone=$this->db->query($sqllvlone, array($userrefcode, 1, 1, 1, 4));

            // array_push($memberarray, $respondlvlone->result());

            $sqllvltwo="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvltwo=$this->db->query($sqllvltwo, array($userrefcode, 1, 1, 1, 4));

            array_push($memberarray, $respondlvltwo->result());

            $sqllvlthree="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level3`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvlthree=$this->db->query($sqllvlthree, array($userrefcode, 1, 1, 1, 4));

            array_push($memberarray, $respondlvlthree->result());

            $sqllvlfour="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level4`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvlfour=$this->db->query($sqllvlfour, array($userrefcode, 1, 1, 1, 4));

            array_push($memberarray, $respondlvlfour->result());

            $sqllvlfive="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level5`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvlfive=$this->db->query($sqllvlfive, array($userrefcode, 1, 1, 1, 4));

            array_push($memberarray, $respondlvlfive->result());

            $sqllvlsix="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level6`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvlsix=$this->db->query($sqllvlsix, array($userrefcode, 1, 1, 1, 4));

            array_push($memberarray, $respondlvlsix->result());
        }

        return $memberarray;
    }
    public function Codeandmobile($x){
        $sql = "SELECT `phone` FROM `tbl_customer` WHERE `status`=? AND `tbl_user_idtbl_user`=?";
        $respond=$this->db->query($sql, array(1, $x));

        $sqlcode = "SELECT `code` FROM `tbl_user_codes` WHERE `status`=? AND `tbl_user_idtbl_user`=?";
        $respondcode=$this->db->query($sqlcode, array(1, $x));

        $regphone=$respond->row(0)->phone;
        $msgnumber=substr($regphone, 1);

        $link=base_url().'Loginregister/Changepassword/'.$x;

        $obj = new stdClass();
        $obj->mobilenum=$msgnumber;
        $obj->msg='Please use this code '.$respondcode->row(0)->code.' for activate your account. Click below link '.$link;

        return $obj;
    }
    public function Customerposition($x){
        $sql="SELECT * FROM `tbl_cutomer_position` WHERE `status`=? AND `tbl_customer_idtbl_customer` IN (SELECT `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=?) ORDER BY `promotepositioncate` DESC";
        $respond=$this->db->query($sql, array(1, $x));
        return $respond->result();
    }
    public function Citylist(){
        $sql="SELECT `idtbl_city`, `city` FROM `tbl_city` WHERE `status`=?";
        $respond=$this->db->query($sql, array(1));
        return $respond;
    }
    public function Uploadbankreceipt(){
        $userID=$_SESSION['user_id'];
        $orderno=$this->input->post('orderno');
        $updatedatetime=date('Y-m-d h:i:s');

        $config['upload_path']          = 'images/uploads/bankreceipt/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['file_name']            = md5($orderno).date('Ymdhis');

        $this->load->library('upload', $config);  

        if (! $this->upload->do_upload('fileupload')){
            $this->session->set_flashdata('msg', "Error, Your upload file doesn't support. Please contact office.");
            redirect(base_url().'Loginregister/Account/');
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            $imagepath='images/uploads/bankreceipt/'.$this->upload->data('file_name');

            $dataorderreceipt = array(
                'filepath'=>$imagepath,
                'status'=>'1',
                'updatedatetime'=>$updatedatetime,
                'tbl_user_idtbl_user'=>$userID,
                'tbl_order_idtbl_order'=>$orderno
            );  
            $orderreceiptinsert=$this->db->insert('tbl_order_payment_receipt', $dataorderreceipt);

            //Order Update
            $dataorder = array(
                'paystatus'=>'1'
            );  
            $this->db->where('idtbl_order', $orderno);
            $orderupdate=$this->db->update('tbl_order', $dataorder);

            $this->session->set_flashdata('msg', "Receipt upload successfully. Thank you.");
            redirect(base_url().'Loginregister/Account/');
        }
    }
    public function Banklist(){
        $sql="SELECT `code`, `bank` FROM `tbl_bank` WHERE `status`=?";
        $respond=$this->db->query($sql, array(1));
        return $respond;
    }
    public function Branchlist(){
        $bankcode=$this->input->post('bankcode');

        $sql="SELECT `code`, `branch` FROM `tbl_bank_branch` WHERE `bankcode`=? AND `status`=?";
        $respond=$this->db->query($sql, array($bankcode, 1));

        $brancharray=array();
       
        foreach($respond->result() as $rowbranch){
            $obj=new stdClass();
            $obj->code=$rowbranch->code;
            $obj->branch=$rowbranch->branch;

            array_push($brancharray, $obj);
        }

        echo json_encode($brancharray);
    }
    public function Commissionroughlyview(){
        $lvltwosum=array();
        $lvlthreesum=array();
        $lvlfoursum=array();
        $lvlfivesum=array();
        $lvlsixsum=array();
        $dropsum=array();
        
        $userID=$_SESSION['user_id'];

        $fromdate=date("Y-m-d", strtotime($this->input->post('fromdate')));
        $todate=date("Y-m-d", strtotime($this->input->post('todate')));

        $sqlusercode="SELECT `refcode`, `idtbl_customer` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
        $respondusercode=$this->db->query($sqlusercode, array($userID, 1));

        $userrefcode=$respondusercode->row(0)->refcode;
        $customerID=$respondusercode->row(0)->idtbl_customer;

        if($userrefcode!=''){
            $sqllvlone="SELECT `tbl_order`.`idtbl_order`, `tbl_order`.`orderdate`, (`tbl_order`.`total`*20/100) AS `lvlcom`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_customer`.`idtbl_customer` FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_order`.`acceptstatus`=? AND `tbl_order`.`status`=? AND `tbl_order`.`tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level1`=? AND `status`=?) AND `tbl_order`.`orderdate` BETWEEN ? AND ?";
            $respondlvlone=$this->db->query($sqllvlone, array(1, 1, $userrefcode, 1, $fromdate, $todate));

            $sqllvltwo="SELECT `tbl_order`.`idtbl_order`, `tbl_order`.`orderdate`, (`tbl_order`.`total`*15/100) AS `lvlcom`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_customer`.`idtbl_customer` FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_order`.`acceptstatus`=? AND `tbl_order`.`status`=? AND `tbl_order`.`tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?) AND `tbl_order`.`orderdate` BETWEEN ? AND ?";
            $respondlvltwo=$this->db->query($sqllvltwo, array(1, 1, $userrefcode, 1, $fromdate, $todate));

            // print_r($respondlvlthree->result())

            foreach ($respondlvltwo->result() as $rowlvltwo){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvltwosum[$rowlvltwo->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvltwosum[$rowlvltwo->idtbl_customer]['firstname'] = $rowlvltwo->firstname;
                    $lvltwosum[$rowlvltwo->idtbl_customer]['lastname'] = $rowlvltwo->lastname;
                    $lvltwosum[$rowlvltwo->idtbl_customer]['commission'] = $rowlvltwo->lvlcom;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvltwosum[$rowlvltwo->idtbl_customer]['commission'] += $rowlvltwo->lvlcom;
                } 
            }

            $sqllvlthree="SELECT `tbl_order`.`idtbl_order`, `tbl_order`.`orderdate`, (`tbl_order`.`total`*5/100) AS `lvlcom`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_customer`.`idtbl_customer` FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_order`.`acceptstatus`=? AND `tbl_order`.`status`=? AND `tbl_order`.`tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level3`=? AND `status`=?) AND `tbl_order`.`orderdate` BETWEEN ? AND ?";
            $respondlvlthree=$this->db->query($sqllvlthree, array(1, 1, $userrefcode, 1, $fromdate, $todate));

            // print_r($respondlvlthree->result())

            foreach ($respondlvlthree->result() as $rowlvlthree){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvlthreesum[$rowlvlthree->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvlthreesum[$rowlvlthree->idtbl_customer]['firstname'] = $rowlvlthree->firstname;
                    $lvlthreesum[$rowlvlthree->idtbl_customer]['lastname'] = $rowlvlthree->lastname;
                    $lvlthreesum[$rowlvlthree->idtbl_customer]['commission'] = $rowlvlthree->lvlcom;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvlthreesum[$rowlvlthree->idtbl_customer]['commission'] += $rowlvlthree->lvlcom;
                } 
            }

            $sqllvlfour="SELECT `tbl_order`.`idtbl_order`, `tbl_order`.`orderdate`, (`tbl_order`.`total`*5/100) AS `lvlcom`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_customer`.`idtbl_customer` FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_order`.`acceptstatus`=? AND `tbl_order`.`status`=? AND `tbl_order`.`tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level4`=? AND `status`=?) AND `tbl_order`.`orderdate` BETWEEN ? AND ?";
            $respondlvlfour=$this->db->query($sqllvlfour, array(1, 1, $userrefcode, 1, $fromdate, $todate));

            // print_r($respondlvlthree->result())

            foreach ($respondlvlfour->result() as $rowlvlfour){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvlfoursum[$rowlvlfour->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvlfoursum[$rowlvlfour->idtbl_customer]['firstname'] = $rowlvlfour->firstname;
                    $lvlfoursum[$rowlvlfour->idtbl_customer]['lastname'] = $rowlvlfour->lastname;
                    $lvlfoursum[$rowlvlfour->idtbl_customer]['commission'] = $rowlvlfour->lvlcom;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvlfoursum[$rowlvlfour->idtbl_customer]['commission'] += $rowlvlfour->lvlcom;
                } 
            }

            $sqllvlfive="SELECT `tbl_order`.`idtbl_order`, `tbl_order`.`orderdate`, (`tbl_order`.`total`*2.5/100) AS `lvlcom`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_customer`.`idtbl_customer` FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_order`.`acceptstatus`=? AND `tbl_order`.`status`=? AND `tbl_order`.`tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level5`=? AND `status`=?) AND `tbl_order`.`orderdate` BETWEEN ? AND ?";
            $respondlvlfive=$this->db->query($sqllvlfive, array(1, 1, $userrefcode, 1, $fromdate, $todate));

            // print_r($respondlvlthree->result())

            foreach ($respondlvlfive->result() as $rowlvlfive){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvlfivesum[$rowlvlfive->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvlfivesum[$rowlvlfive->idtbl_customer]['firstname'] = $rowlvlfive->firstname;
                    $lvlfivesum[$rowlvlfive->idtbl_customer]['lastname'] = $rowlvlfive->lastname;
                    $lvlfivesum[$rowlvlfive->idtbl_customer]['commission'] = $rowlvlfive->lvlcom;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvlfivesum[$rowlvlfive->idtbl_customer]['commission'] += $rowlvlfive->lvlcom;
                } 
            }

            $sqllvlsix="SELECT `tbl_order`.`idtbl_order`, `tbl_order`.`orderdate`, (`tbl_order`.`total`*2.5/100) AS `lvlcom`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_customer`.`idtbl_customer` FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_order`.`acceptstatus`=? AND `tbl_order`.`status`=? AND `tbl_order`.`tbl_customer_idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level6`=? AND `status`=?) AND `tbl_order`.`orderdate` BETWEEN ? AND ?";
            $respondlvlsix=$this->db->query($sqllvlsix, array(1, 1, $userrefcode, 1, $fromdate, $todate));

            // print_r($respondlvlsix->result());

            foreach ($respondlvlsix->result() as $rowlvlsix){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($lvlsixsum[$rowlvlsix->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $lvlsixsum[$rowlvlsix->idtbl_customer]['firstname'] = $rowlvlsix->firstname;
                    $lvlsixsum[$rowlvlsix->idtbl_customer]['lastname'] = $rowlvlsix->lastname;
                    $lvlsixsum[$rowlvlsix->idtbl_customer]['commission'] = $rowlvlsix->lvlcom;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $lvlsixsum[$rowlvlsix->idtbl_customer]['commission'] += $rowlvlsix->lvlcom;
                } 
            }

            $sqldrop="SELECT `tbl_order`.`idtbl_order`, `tbl_order`.`orderdate`, `tbl_order`.`discount` AS `lvlcom`, `tbl_customer`.`firstname`, `tbl_customer`.`lastname`, `tbl_customer`.`idtbl_customer` FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_customer`.`idtbl_customer`=`tbl_order`.`tbl_customer_idtbl_customer` WHERE `tbl_order`.`acceptstatus`=? AND `tbl_order`.`status`=? AND `tbl_order`.`tbl_customer_idtbl_customer`=? AND `tbl_order`.`orderdate` BETWEEN ? AND ? AND `tbl_order`.`dropdiscountstatus`=?";
            $responddrop=$this->db->query($sqldrop, array(1, 1, $customerID, $fromdate, $todate, 1));

            // print_r($respondlvlthree->result())

            foreach ($responddrop->result() as $rowdrop){ 
                // CHECK IF ITEM IS SET TO PREVENT "Undefined offset" ERRORS... 
                if (!isset($dropsum[$rowdrop->idtbl_customer])) { 
                    // INITIATE ARRAYS.. THE CUSTOMER ID IS USED AS ARRAY KEY 
                    $dropsum[$rowdrop->idtbl_customer]['firstname'] = $rowdrop->firstname;
                    $dropsum[$rowdrop->idtbl_customer]['lastname'] = $rowdrop->lastname;
                    $dropsum[$rowdrop->idtbl_customer]['commission'] = $rowdrop->lvlcom;       
                } else { // ARRAYS ALREADY SET.. USE ASSIGNMENT OPERATORS TO SUM UP THE VALUES
                    $dropsum[$rowdrop->idtbl_customer]['commission'] += $rowdrop->lvlcom;
                } 
            }
        }

        $sqlreturn="SELECT `orderdate`, `comment`, `returnprice`, `tbl_order_idtbl_order` FROM `tbl_order_return` WHERE `status`=? AND `tbl_customer_idtbl_customer`=? AND `orderdate` BETWEEN ? AND ?";
        $respondreturn=$this->db->query($sqlreturn, array(1, $customerID, $fromdate, $todate));

        $netcomlvlone=0;
        $netcomlvltwo=0;
        $netcomlvlthree=0;
        $netcomlvlfour=0;
        $netcomlvlfive=0;
        $netcomlvlsix=0;
        $netcomdrop=0;
        $netcomreturn=0;

        $html='';
        $html.='
        <div class="card-deck">
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 02 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvltwosum as $rowlvltwo){
                                $fullname=$rowlvltwo['firstname'].' '.$rowlvltwo['lastname'];
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvltwo['commission'],2);$netcomlvltwo=$netcomlvltwo+$rowlvltwo['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="roughlylvltwonettotal" value="'.$netcomlvltwo.'">'.number_format($netcomlvltwo, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 03 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvlthreesum as $rowlvlthree){
                                $fullname=$rowlvlthree['firstname'].' '.$rowlvlthree['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvlthree['commission'],2); $netcomlvlthree=$netcomlvlthree+$rowlvlthree['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="roughlylvlthreenettotal" value="'.$netcomlvlthree.'">'.number_format($netcomlvlthree, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 04 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvlfoursum as $rowlvlfour){
                                $fullname=$rowlvlfour['firstname'].' '.$rowlvlfour['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvlfour['commission'],2); $netcomlvlfour=$netcomlvlfour+$rowlvlfour['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="roughlylvlfournettotal" value="'.$netcomlvlfour.'">'.number_format($netcomlvlfour, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 05 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvlfivesum as $rowlvlfive){
                                $fullname=$rowlvlfive['firstname'].' '.$rowlvlfive['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvlfive['commission'],2); $netcomlvlfive=$netcomlvlfive+$rowlvlfive['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="roughlylvlfivenettotal" value="'.$netcomlvlfive.'">'.number_format($netcomlvlfive, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Level 06 Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($lvlsixsum as $rowlvlsix){
                                $fullname=$rowlvlsix['firstname'].' '.$rowlvlsix['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowlvlsix['commission'],2); $netcomlvlsix=$netcomlvlsix+$rowlvlsix['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="roughlylvlsixnettotal" value="'.$netcomlvlsix.'">'.number_format($netcomlvlsix, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style text-danger"><span>Drop Ship Commission</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($dropsum as $rowdropsum){
                                $fullname=$rowdropsum['firstname'].' '.$rowdropsum['lastname'];
                                
                            $html.='<tr>
                                <td nowrap>'.substr($fullname, 0, 20).'...</td>
                                <td class="text-right">';$html.=number_format($rowdropsum['commission'],2); $netcomdrop=$netcomdrop+$rowdropsum['commission'];$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="roughlylvldropnettotal" value="'.$netcomdrop.'">'.number_format($netcomdrop, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body p-2">
                    <h6 class="small font-weight-bold title-style"><span>Return Deduction Information</span></h6>
                    <table class="table table-bordered table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Comment</th>
                                <th class="text-right">Return Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($respondreturn->result() as $rowreturn){                                
                            $html.='<tr>
                                <td nowrap>PO000'.$rowreturn->tbl_order_idtbl_order.'</td>
                                <td nowrap>'.$rowreturn->orderdate.'</td>
                                <td nowrap>'.$rowreturn->comment.'</td>
                                <td class="text-right">';$html.=number_format($rowreturn->returnprice,2); $netcomreturn=$netcomreturn+$rowreturn->returnprice;$html.='</td>
                            </tr>';
                            }
                        $html.='</tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th class="text-right"><input type="hidden" id="roughlylvlreturntotal" value="'.$netcomreturn.'">'.number_format($netcomreturn, 2).'</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        ';
        
        echo $html;
    }

    public function Getmemberlist(){
        $userID=$_SESSION['user_id'];
        $levelno=$this->input->post('levelno');

        $sqlusercode="SELECT `refcode` FROM `tbl_customer` WHERE `tbl_user_idtbl_user`=? AND `status`=?";
        $respondusercode=$this->db->query($sqlusercode, array($userID, 1));

        $userrefcode=$respondusercode->row(0)->refcode;

        if($levelno==2){
            $sqllvl="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level2`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvl=$this->db->query($sqllvl, array($userrefcode, 1, 1, 1, 4));
        }
        else if($levelno==3){
            $sqllvl="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level3`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvl=$this->db->query($sqllvl, array($userrefcode, 1, 1, 1, 4));
        }
        else if($levelno==4){
            $sqllvl="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level4`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvl=$this->db->query($sqllvl, array($userrefcode, 1, 1, 1, 4));

        }
        else if($levelno==5){
            $sqllvl="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level5`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvl=$this->db->query($sqllvl, array($userrefcode, 1, 1, 1, 4));
        }
        else if($levelno==6){
            $sqllvl="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level6`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvl=$this->db->query($sqllvl, array($userrefcode, 1, 1, 1, 4));
        }
        else if($levelno==7){
            $sqllvl="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level7`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvl=$this->db->query($sqllvl, array($userrefcode, 1, 1, 1, 4));
        }
        else if($levelno==8){
            $sqllvl="SELECT `firstname`, `lastname`, `refcode` FROM `tbl_customer` WHERE `idtbl_customer` IN (SELECT `tbl_customer_idtbl_customer` FROM `tbl_cutomer_level` WHERE `level8`=? AND `status`=?) AND `status`=? AND `tbl_user_idtbl_user` IN (SELECT `idtbl_user` FROM `tbl_user` WHERE `status`=? AND `tbl_user_type_idtbl_user_type`=?)";
            $respondlvl=$this->db->query($sqllvl, array($userrefcode, 1, 1, 1, 4));
        }

        $html='';
        if(!empty($respondlvl->result())){$i=1;foreach($respondlvl->result() as $rowleveltwo){
            $html.='<li class="list-group-item px-2 py-1">'.$i.' - '.$rowleveltwo->firstname.' '.$rowleveltwo->lastname.' - ('.$rowleveltwo->refcode.')</li>';
        $i++;}}else{
            $html.='<li class="list-group-item px-2 py-1">No preview members</li>';
        }

        $obj=new stdClass();
        $obj->htmlview=$html;
        $obj->htmlcount=count($respondlvl->result());

        echo json_encode($obj);
    }

    public function Profileinfo(){
        $profilearray=array();
        if(!empty($_SESSION['user_id'])){
            $userID=$_SESSION['user_id'];

            $this->db->select('*');
            $this->db->from('tbl_customer');
            $this->db->where('status', 1);
            $this->db->where('tbl_user_idtbl_user', $userID);

            $respondcusinfo=$this->db->get();

            $customerID=$respondcusinfo->row(0)->idtbl_customer;

            $this->db->select('*');
            $this->db->from('tbl_customer_bank');
            $this->db->where('status', 1);
            $this->db->where('tbl_customer_idtbl_customer', $customerID);

            $respondbankinfo=$this->db->get();

            $obj=new stdClass();
            $obj->profileinfo=$respondcusinfo->result();
            $obj->profilebank=$respondbankinfo->result();
        }
        else{
            $obj=new stdClass();
            $obj->profileinfo='';
        }

        return $obj;
    }
}