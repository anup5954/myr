<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends MY_Controller{

public function __construct(){

parent::__construct();

$this->load->model('Blogs_model','mdl');

$this->load->library('view_lib');

}

public function index(){
	
$data['posts']=$this->mdl->fetch_posts();
$this->view_lib->load_cview( ['view'=>'post', 'view_data'=>$data] );

}

public function create(){

$data['post']=(object)['image'=>'','short_content'=>'','author_name'=>'','video'=>'','title'=>'','content'=>'','published_at'=>time()];

$this->view_lib->load_cview(['view'=>'post-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function edit(){

$data['post']=$this->mdl->edit();

$this->view_lib->load_cview(['view'=>'post-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function insert(){

$img_name=$this->img_upload('image');

$data=$this->mdl->insert( $img_name );

$this->msg($data,'blogs','created');

}

public function update(){

$img_name=$this->img_upload('image');

$data=$this->mdl->update($img_name);

$this->msg($data,'blogs','updateed');

}

public function status(){

$data=$this->mdl->status();
$this->msg( $data, 'blogs', 'Updated' );

}

public function delete(){

$data=$this->mdl->delete();

$this->msg($data,'blogs','Deleted');

}

}