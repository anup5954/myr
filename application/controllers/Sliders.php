<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends MY_Controller{

public function __construct(){

parent::__construct();

$this->load->model('Sliders_model','mdl');
$this->load->library('view_lib');

}

public function index(){

$data['slides']=$this->mdl->fetch_slides();

$this->view_lib->load_view(['view'=>'sliders','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function create(){

$data['slide']=(object)['image'=>'','caption'=>'','heading'=>'','content'=>''];

$this->view_lib->load_view(['view'=>'slider-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function edit(){

$data['slide']=$this->mdl->edit();

$this->view_lib->load_view(['view'=>'slider-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function insert(){

$img_name=$this->img_upload('image');

$data=$this->mdl->insert($img_name);

$this->msg($data,'sliders','created');

}

public function update(){

$img_name=$this->img_upload('image');

$data=$this->mdl->update($img_name);

$this->msg($data,'sliders','updateed');

}

public function status(){

$data=$this->mdl->status();

$this->msg($data,'sliders','Update');

}

public function delete(){

$data=$this->mdl->delete();

$this->msg($data,'sliders','Deleted');

}

} //End Here