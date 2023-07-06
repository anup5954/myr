<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benefits extends MY_Controller{

public function __construct(){

parent::__construct();
$this->load->model('Benefits_model','mdl');
$this->load->library('view_lib');

}

public function list(){

$data['benefits']=$this->mdl->fetch_all('service_benefits');
$this->view_lib->load_view(['view'=>'benefits','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function create(){

$data['benefit']=(object)[ 'heading'=>'','content'=>'' ];
$this->view_lib->load_view( ['view'=>'benefit-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data] );

}

public function edit(){

$data['benefit']=$this->mdl->edit();
$this->view_lib->load_view(['view'=>'benefit-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function insert(){

$data=$this->mdl->insert();
$this->msg($data,'services/benefits/'.$this->uri->segment(3).'','created');

}

public function update(){

$data=$this->mdl->update();
$this->msg( $data,'services/benefits/'.$this->uri->segment(3).'','updateed' );

}

public function status(){

$data=$this->mdl->status();
$this->msg( $data,'services/benefits/'.$this->uri->segment(3).'','Update' );

}

public function delete(){

$data=$this->mdl->delete();
$this->msg( $data,'services/benefits/'.$this->uri->segment(3).'','Deleted' );

}

} //