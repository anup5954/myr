<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Group_types extends MY_Controller{



public function __construct(){



parent::__construct();



$this->load->model('Group_types_model','mdl');



$this->load->library('view_lib');



}



public function index(){



$data['group_types']=$this->mdl->fetch_all('group_types');



$this->view_lib->load_view(['view'=>'group-types','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function create(){



$data['group_type']=(object)['name'=>'','group_id'=>''];



$this->view_lib->load_view(['view'=>'group-type-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function edit(){



$data['group_type']=$this->mdl->edit();



$this->view_lib->load_view(['view'=>'group-type-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function insert(){



$img_name=$this->img_upload('image');



$data=$this->mdl->insert($img_name);



$this->msg($data,'group_types','created');



}



public function update(){



$img_name=$this->img_upload('image');



$data=$this->mdl->update( $img_name );



$this->msg($data,'group_types','updateed');



}



public function status(){



$data=$this->mdl->status();



$this->msg($data,'group_types','Update');



}



public function delete(){



$data=$this->mdl->delete();



$this->msg($data,'group_types','Deleted');



}



}