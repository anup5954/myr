<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribed_services extends MY_Controller{

public function __construct(){

parent::__construct();

$this->load->model('Subscribed_services_model','mdl');

$this->load->library('view_lib');

}

public function index(){

$data['services_subscribed']=$this->mdl->fetch_all('services_subscribed');

$this->view_lib->load_view(['view'=>'subscribed-services','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function create(){

$data['service']=(object)['show_in_home'=>0,'image'=>'','video'=>'','name'=>'','service_short_desc'=>'','bellow_banner_heading'=>'','bellow_banner_content'=>'','service_content'=>'','group_type_id'=>'','group_id'=>'','services_compare_points'=>'','video_show_direction'=>'left'];
$data['service_compare_points']=$this->mdl->service_compare_points();
$this->view_lib->load_view(['view'=>'services-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function edit(){

$data['service_compare_points']=$this->mdl->service_compare_points();
$data['service']=$this->mdl->edit();

$this->view_lib->load_view(['view'=>'services-add-edit','nav'=>'admin','title'=>'Dashboard','view_data'=>$data]);

}

public function insert(){

$img_name=$this->img_upload('image');

$data=$this->mdl->insert($img_name);

$this->msg($data,'services','created');

}

public function update(){

$img_name=$this->img_upload('image');

$data=$this->mdl->update( $img_name );

$this->msg($data,'services/edit/'.$this->uri->segment(3),'updateed');

}

public function status(){

$data=$this->mdl->status();

$this->msg($data,'services','Update');

}

public function delete(){

$data=$this->mdl->delete();

$this->msg($data,'services/edit/'.$this->uri->segment(3),'Deleted');

}

public function fetch_select_group(){
$data=$this->mdl->fetch_select_group($this->input->post('id'));
$gt=$this->mdl->edit();
echo @$gt->group_type_id;
echo "<option value=''>Select</option>";
if( $data!=false ){
$select=null;
foreach($data as $sg){
$select=( $sg->id==@$gt->group_type_id ) ? 'selected' : '';
echo "<option value='".$sg->id."' $select >$sg->name</option>";
}
}
}

/*End blog Class Here...*/

}