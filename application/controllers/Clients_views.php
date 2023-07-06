<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Clients_views extends MY_Controller{



public function __construct(){



parent::__construct();



$this->load->model('Clients_views_model','mdl');



$this->load->library('view_lib');



}



public function index(){



$data['clients_views']=$this->mdl->fetch_all('clients_views');



$this->view_lib->load_view(['view'=>'clients-views','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function create(){



$data['client_view']=(object)['image'=>'','caption'=>'','client_name'=>'','company_name'=>'','rating'=>'','review'=>''];



$this->view_lib->load_view(['view'=>'clients-views-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function edit(){



$data['client_view']=$this->mdl->edit();



$this->view_lib->load_view(['view'=>'clients-views-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function insert(){



$img_name=$this->img_upload('image');



$data=$this->mdl->insert($img_name);



$this->msg($data,'clients_views','created');



}



public function update(){



$img_name=$this->img_upload('image');



$data=$this->mdl->update($img_name);



$this->msg($data,'clients_views','updateed');



}



public function status(){



$data=$this->mdl->status();



$this->msg($data,'clients_views','Update');



}



public function delete(){



$data=$this->mdl->delete();



$this->msg($data,'clients_views','Deleted');



}


}