<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_lib {

var $CI;
public function __construct($params = array())
{
$this->CI =& get_instance();
$this->CI->load->helper('url');
$this->CI->config->item('base_url');
$this->CI->load->database();
}

public function get_all_properties1(){
$query = $this->CI->db->where(['status'=>1])->get('properties');
if( $query ){
return 	$query->result();
}else{
return 	false;
}
} //get_all_properties

public function pd1( $prop_id,$detail ){
$query = $this->CI->db->select('property_details')->where(['prop_id'=>$prop_id])->get('properties');
if( $query ){
return unserialize($query->row()->property_details)[$detail];
}else{
return false;
}
} //pd


} //End Library Here