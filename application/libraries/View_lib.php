<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class View_lib {
var $CI;
public function __construct($params = array())
{
$this->CI =& get_instance();
$this->CI->load->helper('url');
$this->CI->config->item('base_url');
$this->CI->load->database();
$this->CI->load->library('cmn_lib');
}

public function load_view( $config=null ){
$sql = "SELECT * FROM brn_users WHERE user_email = ? and user_password= ?";
//$this->CI->db->select('property_details');

if(isset($config['title'])){ $title = $config['title'];  }else{ $title=''; }
if(isset($config['new'])){ $new = '<a href="" class="btn btn-outline-info btn-sm  ml-auto">Add New </a>';
$backButtonClass='2';
 }else{ $new='';
$backButtonClass='auto';
}
if(!isset($config['snav'])){
$data['only_main_nav']='<div class="my-3 my-md-5">
<div class="container">
<div class="row">
<div class="col-12">

';
}else{
$data['s_nav_top']='<div class="my-3 my-md-5">
<div class="container">
<div class="row">
<div class="col-12">
';
}
if(isset($config['fb']) && $config['fb']=='yes'){
$footer['fb_view']='</div>
</div>
</div>
<div class="card-footer text-right">
<div class="d-flex">
<a href="javascript:void(0)" class="btn btn-link">Cancel</a>
<button type="submit" class="btn btn-primary ml-auto">Update</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
';
}else{
$footer['fb_view']='</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>';
}
$this->CI->load->view('admin/inc/header');
$this->CI->load->view('admin/inc/nav-'.$this->CI->session->userdata('authority').'',$data);
if(isset($config['snav'])){
$this->CI->load->view('admin/inc/snav-'.$config['snav'].'',$data);
}

if(isset($config['view_data'])){
$this->CI->load->view('admin/'.$this->CI->session->userdata('authority').'/'.$config['view'].'',$config['view_data']);	
}else{
$this->CI->load->view('admin/'.$this->CI->session->userdata('authority').'/'.$config['view'].'');	
}

$this->CI->load->view('admin/inc/footer',$footer);
} //load_view
public function load_cview( $config=null ){
$sql = "SELECT * FROM brn_users WHERE user_email = ? and user_password= ?";
//$this->CI->db->select('property_details');

if(isset($config['title'])){ $title = $config['title'];  }else{ $title=''; }
if(isset($config['new'])){ $new = '<a href="" class="btn btn-outline-info btn-sm  ml-auto">Add New </a>';
$backButtonClass='2';
 }else{ $new='';
$backButtonClass='auto';
}
if(!isset($config['snav'])){
$data['only_main_nav']='<div class="my-3 my-md-5">
<div class="container">
<div class="row">
<div class="col-12">

';
}else{
$data['s_nav_top']='<div class="my-3 my-md-5">
<div class="container">
<div class="row">
<div class="col-12">
';
}
if(isset($config['fb']) && $config['fb']=='yes'){
$footer['fb_view']='</div>
</div>
</div>
<div class="card-footer text-right">
<div class="d-flex">
<a href="javascript:void(0)" class="btn btn-link">Cancel</a>
<button type="submit" class="btn btn-primary ml-auto">Update</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
';
}else{
$footer['fb_view']='</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>';
}
$this->CI->load->view('admin/inc/header');
$this->CI->load->view('admin/inc/nav-'.$this->CI->session->userdata('authority').'',$data);
if(isset($config['snav'])){
$this->CI->load->view('admin/inc/snav-'.$config['snav'].'',$data);
}

if(isset($config['view_data'])){
$this->CI->load->view('admin/common/'.$config['view'].'',$config['view_data']);	
}else{
$this->CI->load->view('admin/common/'.$config['view'].'');	
}

$this->CI->load->view('admin/inc/footer',$footer);
} //load_view

} // View_lib