<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends MY_Controller {

public function __construct(){
parent:: __construct();
$this->load->library('view_lib');
$this->load->model('Payments_model','mdl');
}

public function index(){
$data['payments']=$this->mdl->fetch_all('orders',['customer_payment_status'=>'completed']);
$this->view_lib->load_view( [ 'view'=>'payments','view_data'=>$data ] );
}

public function update(){
	
$img_name=$this->img_upload('image');

$data=$this->mdl->update_profile($img_name);

$this->msg($data,'profile','Updated');

}



}
