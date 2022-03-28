<?php 
class Otherinfo extends CI_Model{
    public function Csrdetail(){
        $sql="SELECT * FROM `tbl_csrproject` WHERE `status`=?";
        $respond=$this->db->query($sql, array(1));

        $csrarray=array();
        foreach($respond->result() as $rowcsrlist){
            $csrID=$rowcsrlist->idtbl_csrproject;
            $sqlimage="SELECT `imagepath` FROM `tbl_csrproject_image` WHERE `tbl_csrproject_idtbl_csrproject`=? AND `status`=? LIMIT 1";
            $respondimage=$this->db->query($sqlimage, array(1, $csrID));

            $obj=new stdClass();
            $obj->idtbl_csrproject=$rowcsrlist->idtbl_csrproject;
            $obj->title=$rowcsrlist->title;
            $obj->desc=$rowcsrlist->desc;
            $obj->postdate=$rowcsrlist->postdate;
            $obj->imagepath=$respondimage->row(0)->imagepath;

            array_push($csrarray, $obj);
        }

        return $csrarray;
    }
    public function Csrdetailinfo($x){
        $sql="SELECT * FROM `tbl_csrproject` WHERE `status`=? AND `idtbl_csrproject`=?";
        $respond=$this->db->query($sql, array(1, $x));

        return $respond;
    }
    public function Csrdetailinfoimages($x){
        $sql="SELECT `imagepath` FROM `tbl_csrproject_image` WHERE `tbl_csrproject_idtbl_csrproject`=? AND `status`=?";
        $respond=$this->db->query($sql, array($x, 1));

        return $respond;
    }
}