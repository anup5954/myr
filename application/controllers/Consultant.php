<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultant extends MY_Controller{

public function __construct(){

parent::__construct();

$this->load->model('Consultant_model','mdl');

$this->load->library('view_lib');

}

public function list(){

$data['posts']=$this->mdl->fetch_posts();

$this->view_lib->load_view(['view'=>'consultant_list','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function create(){

$data['consultant']=(object)['image'=>'','location'=>'','name'=>'','details'=>'','designation'=>'','published_at'=>time()];

$this->view_lib->load_view(['view'=>'consultant-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function edit(){

$data['consultant']=$this->mdl->edit();

$this->view_lib->load_view(['view'=>'consultant-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function insert(){

$img_name=$this->img_upload('image');

$data=$this->mdl->insert($img_name);

$this->msg($data,'consultant/list','created');

}

public function update(){

$img_name=$this->img_upload('image');

$data=$this->mdl->update($img_name);

$this->msg($data,'consultant/list','updateed');

}

public function status(){

$data=$this->mdl->status();

$this->msg($data,'consultant/list','Update');

}

public function delete(){

$data=$this->mdl->delete();

$this->msg($data,'consultant/list','Deleted');

}

}  /*  End Here */