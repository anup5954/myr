<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

public function __construct(){
parent:: __construct();
$this->load->library('view_lib');
$this->load->model('Users_model','mdl');
}

public function partner(){

$data['users']=$this->mdl->fetch_users();
$this->view_lib->load_view(['view'=>'users','nav'=>'admin','title'=>'All Users','view_data'=>$data]);

}

public function customer(){

$data['users']=$this->mdl->fetch_users();
$this->view_lib->load_view(['view'=>'users','nav'=>'admin','title'=>'All Users','view_data'=>$data]);

}

public function status(){

$data=$this->mdl->status();

if($data==true){

 $this->session->set_flashdata('s_msg', 'Successfully updated.');
 return redirect( 'users/'.$this->uri->segment(3) );

}else{

 $this->session->set_flashdata('s_msg', 'Not updated.');
 return redirect( 'users/'.$this->uri->segment(3) );

}
}

}
