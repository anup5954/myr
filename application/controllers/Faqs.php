<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Faqs extends MY_Controller{



public function __construct(){



parent::__construct();



$this->load->model('Faqs_model','mdl');



$this->load->library('view_lib');



}



public function list(){



$data['faqs']=$this->mdl->fetch_alll();



$this->view_lib->load_view(['view'=>'faqs','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function create(){



$data['faq']=(object)[ 'question'=>'','answer'=>'' ];



$this->view_lib->load_view( ['view'=>'faq-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data] );



}



public function edit(){



$data['faq']=$this->mdl->edit();



$this->view_lib->load_view(['view'=>'faq-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function insert(){



$data=$this->mdl->insert();



$this->msg($data,'services/faqs/'.$this->uri->segment(3).'','created');



}



public function update(){



$data=$this->mdl->update();



$this->msg( $data,'services/faqs/'.$this->uri->segment(3).'','updateed' );



}



public function status(){



$data=$this->mdl->status();



$this->msg( $data,'services/faqs/'.$this->uri->segment(3).'','Update' );



}



public function delete(){



$data=$this->mdl->delete();



$this->msg( $data,'services/faqs/'.$this->uri->segment(3).'','Deleted' );



}


}