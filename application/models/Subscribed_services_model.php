<?php
class Subscribed_services_model extends MY_Model{

public function fetch_all_active(){

$query = $this->db->where(['status'=>'active'])->get('groups');

return $query->result();

}

public function fetch_group_type_name($id){

$query = $this->db->where( [ 'id'=>$id,'status'=>'active' ] )->get('group_types');

if( $query->num_rows()>0 ){
    return $query->row()->name;
}else{
    return '-';
}

}

public function fetch_group_name_by_id( $id ){

$query = $this->db->where( ['id'=>$id,'status'=>'active'] )->get('groups');

if( $query->num_rows()>0 ){
    return $query->row()->name;
}else{
    return '-';
}
}

public function fetch_select_group($id){

$query = $this->db->where( [ 'group_id'=>$id,'status'=>'active' ] )->get('group_types');
//echo $this->db->last_query();
if( $query->num_rows()>0 ){
    return $query->result();
}else{
    return false;
}
}

public function group_types(){

$query = $this->db->where(['status'=>'active'])->get('group_types');

return $query->result();

}

public function compair_services($id){

$query = $this->db->where( [ 'status'=>'active','id!='=>$id,'group_id!='=>'','group_type_id!='=>'' ] )->get('services');
//echo $this->db->last_query();
return $query->result();

}

public function edit(){

$query = $this->db->where('id', $this->uri->segment(3))->get('services');
//echo $this->db->last_query();
if( $query ){
    return $query->row();
}else{
    return false;
}
}

public function insert($img){
$insert_data['image']=$img;	
$insert_data['show_in_home']=$this->input->post('show_in_home');	
$insert_data['video_show_direction']=$this->input->post('video_show_direction');
$insert_data['video']=$this->input->post('video');
$insert_data['group_id']=$this->input->post('group_id');
$insert_data['group_type_id']=$this->input->post('group_type_id');
$insert_data['name']=$this->input->post('name');
$insert_data['service_short_desc']=$this->input->post('service_short_desc');
$insert_data['bellow_banner_heading']=$this->input->post('bellow_banner_heading');
$insert_data['bellow_banner_content']=$this->input->post('bellow_banner_content');
$insert_data['service_content']=$this->input->post('service_content');
$insert_data['compare_with_services'] = serialize($this->input->post('compare_with_services'));
$insert_data['services_compare_points'] = serialize($this->input->post('services_compare_points'));
$insert_data['status']='active';

$query=$this->db->insert('services', $insert_data);

if( $query ){
    return true;
}else{
    return false;
}

}

public function update($image){

$sql=$this->db->where('id', $this->uri->segment(3))->get('services');
if($image!=''){
unlink(PATH."assets/uploads/".$sql->row()->image);
$img=$image;
}else{
$img=$sql->row()->image;
}
$update_data['image']=$img;
$update_data['show_in_home']=$this->input->post('show_in_home');
$update_data['video_show_direction']=$this->input->post('video_show_direction');
$update_data['video']=$this->input->post('video');
$update_data['group_id']=$this->input->post('group_id');
$update_data['group_type_id']=$this->input->post('group_type_id');
$update_data['name']=$this->input->post('name');
$update_data['service_short_desc']=$this->input->post('service_short_desc');
$update_data['bellow_banner_heading']=$this->input->post('bellow_banner_heading');
$update_data['bellow_banner_content']=$this->input->post('bellow_banner_content');
$update_data['service_content']=$this->input->post('service_content');
$update_data['compare_with_services'] = serialize($this->input->post('compare_with_services'));
$update_data['services_compare_points'] = serialize( $this->input->post('services_compare_points') );
$query = $this->db->where('id', $this->uri->segment(3))->update('services',$update_data);

if( $query ){
    return true;
}else{
    return false;
}
}



public function delete(){

$query=$this->db->where('id', $this->uri->segment(3))->get('services');

if($query->num_rows()>0){

unlink(PATH."assets/uploads/".$query->row()->image);

}

$data=$this->db->where('id', $this->uri->segment(3))->update('services',['image'=>'']);

if( $data ){

    return true;

}else{

    return false;

}

}

public function status(){

$query=$this->db->where('id', $this->uri->segment(3))->get('services');

if($query->row()->status=='active'){
$status='inactive';
}else{
$status='active';
}

$data=$this->db->where('id', $this->uri->segment(3))->update('services',['status'=>$status]);

if( $data ){

    return true;

}else{

    return false;

}

}

public function service_compare_points(){

$query = $this->db->get('service_compare_points');

if( $query ){

    return $query->result();

}else{

    return false;

}

}//service_compare_points

/*End Blog_model Class Here...*/

}