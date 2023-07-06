<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('user_detail')){
   function user_detail( $detail=null ){
      	//get main CodeIgniter object
      	$ci =& get_instance();
      	$ci->load->database();
      	$ci->load->library('session');
	   	$query = $ci->db->where(['user_id'=>$ci->session->userdata('user_id')])->get('users');
	   	//$ci->db->last_query();
	   if($ci->session->userdata('user_id')==''){
			return null;
	   }else{
			return $query->row()->$detail;   
			print_r($query->row());
	   }
   }
}
