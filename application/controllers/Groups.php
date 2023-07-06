<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Groups extends MY_Controller{



public function __construct(){



parent::__construct();



$this->load->model('Groups_model','mdl');



$this->load->library('view_lib');



}



public function index(){



$data['groups']=$this->mdl->fetch_all('groups');



$this->view_lib->load_view(['view'=>'groups','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function create(){



$data['group']=(object)['name'=>''];



$this->view_lib->load_view(['view'=>'groups-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}

public function edit(){



$data['group']=$this->mdl->edit();



$this->view_lib->load_view(['view'=>'groups-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function insert(){



$img_name=$this->img_upload('image');



$data=$this->mdl->insert($img_name);



$this->msg($data,'groups','created');



}



public function update(){



$img_name=$this->img_upload('image');



$data=$this->mdl->update( $img_name );



$this->msg($data,'groups','updateed');



}



public function status(){



$data=$this->mdl->status();



$this->msg($data,'groups','Update');



}



public function delete(){



$data=$this->mdl->delete();



$this->msg($data,'groups','Deleted');



}




/*End blog Class Here...*/



}