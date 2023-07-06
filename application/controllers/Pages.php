<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {
public function __construct(){
parent:: __construct();
$this->load->library('view_lib');
$this->load->model('Pages_model','mdl');
}

public function view(){

$data['page']=$this->mdl->fetch_page_data();
$this->view_lib->load_view(['view'=>'pages','nav'=>'admin','title'=>''.$this->uri->segment(2).'','view_data'=>$data]);

}

public function update(){
$img_name=$this->img_upload('image');
$data=$this->mdl->update($img_name);
$this->msg($data,'page/'.$this->uri->segment(3),'updateed');
}


}
