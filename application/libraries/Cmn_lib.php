<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmn_lib {

var $CI;
public function __construct($params = array())
{
$this->CI =& get_instance();
$this->CI->load->helper('url');
$this->CI->config->item('base_url');
$this->CI->load->database();
}

public function isLoginValid( $user_email=null, $userPassword=null ){
$this->CI->db->where( [ 'user_email'=>$user_email,'user_password'=>$userPassword ] );
$results=$this->CI->db->get('users');
if( $results->num_rows()==1 ){
return 	$results->row();
}else{
return 	false;
}
} //isLoginValid

public function get_all_properties(){
$query = $this->CI->db->get('properties');
if( $query ){
return 	$query->result_array();
}else{
return 	false;
}
} //get_all_properties

public function make_change_status($tableIdName,$tableId){
$query = $this->CI->db->where([$tableIdName=>$tableId])->get($tableIdName);
if( $query->row()->status==0 ){
$this->CI->db->where([$tableIdName=>$tableId])->update($tableIdName,['status'=>1]);	
}else{
$this->CI->db->where([$tableIdName=>$tableId])->update($tableIdName,['status'=>0]);	
}
} //make_change_status

public function pd( $prop_id,$detail ){
$query = $this->CI->db->select('property_details')->where(['prop_id'=>$prop_id])->get('properties');
if( $query ){
return unserialize($query->row()->property_details)[$detail];
}else{
return false;
}
} //pd


} //End Library Here