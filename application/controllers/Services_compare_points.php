<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Services_compare_points extends MY_Controller{



public function __construct(){



parent::__construct();



$this->load->model('Services_compare_points_model','mdl');



$this->load->library('view_lib');



}



public function list(){



$data['services_compare_points']=$this->mdl->fetch_all('service_compare_points');



$this->view_lib->load_view(['view'=>'services_compare_points','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function create(){



$data['services_compare_point'] = (object)[ 'name'=>'' ];



$this->view_lib->load_view( ['view'=>'services_compare_points_add_edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data] );



}



public function edit(){



$data['services_compare_point']=$this->mdl->edit();



$this->view_lib->load_view( ['view'=>'services_compare_points_add_edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data] );



}



public function insert(){



$data=$this->mdl->insert();



$this->msg($data,'services_compare_points/list','created');



}



public function update(){



$data=$this->mdl->update();



$this->msg( $data,'services_compare_points/list','updateed' );



}



public function status(){



$data=$this->mdl->status();



$this->msg( $data,'services_compare_points/list','Update' );



}



public function delete(){



$data=$this->mdl->delete();



$this->msg( $data,'services_compare_points/list','Deleted' );



}



}