<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

public function __construct(){
parent:: __construct();
$this->load->library('view_lib');
$this->load->model('Profile_model','mdl');
}

public function index(){

$data['services']=$this->mdl->services();
$this->view_lib->load_cview( [ 'view'=>'profile','view_data'=>$data ] );

}

public function update(){
	
$img_name=$this->img_upload( 'image' );

$data=$this->mdl->update_profile($img_name);

$this->msg($data,'profile','Updated');

}

} //
