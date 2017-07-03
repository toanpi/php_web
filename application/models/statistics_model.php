<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Statistics_model extends CI_Model{
    
    public function deleteDbCount(){
        $sql="DELETE FROM `kmt_bodem` WHERE WEEKOFYEAR(`last_visit`) = " . (date('W') - 1) . " AND YEAR(`last_visit`) = " . date('Y');
        $this->db->query($sql);
    }
    
    public function themKetNoiMoi($time_now,$time_out,$ip_address){
        
        $sql="SELECT `ip_address` FROM `kmt_bodem` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now AND `ip_address` = '$ip_address'";
        $rs = $this->db->query($sql);
        if (($rs->num_rows())==0){
                $sql = "INSERT INTO `kmt_bodem` VALUES ('$ip_address', NOW())";
                $this->db->query($sql);
                $sql = "UPDATE `kmt_thongke` SET `LuotTruyCap` = `LuotTruyCap` + 1";
                $this->db->query($sql);
            }
    }
    
    public function userOnline($time_now,$time_out,$ip_address){
        $sql="SELECT `ip_address` FROM `kmt_bodem` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now";
        return $this->db->query($sql); 
    }
}