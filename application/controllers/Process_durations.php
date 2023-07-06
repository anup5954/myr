<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Process_durations extends MY_Controller{



public function __construct(){



parent::__construct();



$this->load->model('Process_durations_model','mdl');



$this->load->library('view_lib');



}



public function list(){



$data['process_durations']=$this->mdl->fetch_alll();



$this->view_lib->load_view(['view'=>'process_durations','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function create(){



$data['process_duration']=(object)[ 'heading'=>'','content'=>'' ];



$this->view_lib->load_view( ['view'=>'process_duration_add_edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data] );



}



public function edit(){



$data['process_duration']=$this->mdl->edit();



$this->view_lib->load_view(['view'=>'process_duration_add_edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);



}



public function insert(){



$data=$this->mdl->insert();



$this->msg($data,'services/process_durations/'.$this->uri->segment(3).'','created');



}



public function update(){



$data=$this->mdl->update();



$this->msg( $data,'services/process_durations/'.$this->uri->segment(3).'','updateed' );



}



public function status(){



$data=$this->mdl->status();



$this->msg( $data,'services/process_durations/'.$this->uri->segment(3).'','Update' );



}



public function delete(){



$data=$this->mdl->delete();



$this->msg( $data,'services/process_durations/'.$this->uri->segment(3).'','Deleted' );



}



/*End blog Class Here...*/



}