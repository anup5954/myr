<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Services_required_document_list extends MY_Controller{



public function __construct(){



parent::__construct();



$this->load->model('Services_required_document_list_model','mdl');



$this->load->library('view_lib');



}



public function list(){



$data['services_required_document_list']=$this->mdl->fetch_all('services_required_document_list');



$this->view_lib->load_view(['view'=>'services_required_document_list','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function create(){



$data['services_compare_point'] = (object)[ 'name'=>'' ];



$this->view_lib->load_view( ['view'=>'services_required_document_list_add_edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data] );



}



public function edit(){



$data['services_compare_point']=$this->mdl->edit();



$this->view_lib->load_view( ['view'=>'services_required_document_list_add_edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data] );



}



public function insert(){



$data=$this->mdl->insert();



$this->msg($data,'services_required_document_list/list','created');



}



public function update(){



$data=$this->mdl->update();



$this->msg( $data,'services_required_document_list/list','updateed' );



}



public function status(){



$data=$this->mdl->status();



$this->msg( $data,'services_required_document_list/list','Update' );



}



public function delete(){



$data=$this->mdl->delete();



$this->msg( $data,'services_required_document_list/list','Deleted' );



}



}