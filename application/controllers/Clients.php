<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Clients extends MY_Controller{



public function __construct(){



parent::__construct();



$this->load->model('Clients_model','mdl');



$this->load->library('view_lib');



}



public function index(){



$data['clients']=$this->mdl->fetch_all('clients');



$this->view_lib->load_view(['view'=>'clients','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function create(){



$data['client']=(object)['image'=>'','caption'=>'','heading'=>'','content'=>''];



$this->view_lib->load_view(['view'=>'client-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function edit(){



$data['client']=$this->mdl->edit();



$this->view_lib->load_view(['view'=>'client-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function insert(){



$img_name=$this->img_upload('image');



$data=$this->mdl->insert($img_name);



$this->msg($data,'clients','created');



}



public function update(){



$img_name=$this->img_upload('image');



$data=$this->mdl->update($img_name);



$this->msg($data,'clients','updateed');



}



public function status(){



$data=$this->mdl->status();



$this->msg($data,'clients','Update');



}

public function delete(){

$data=$this->mdl->delete();
$this->msg($data,'clients','Deleted');

}


}