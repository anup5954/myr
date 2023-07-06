<?php
class Group_types_model extends MY_Model{

public function groups(){
$query = $this->db->where(['status'=>'active'])->get('groups');
return $query->result();
}

public function fetch_group_name_by_id( $id ){

$query = $this->db->where( ['id'=>$id,'status'=>'active'] )->get('groups');

if( $query->num_rows()>0 ){
    return $query->row()->name;
}else{
    return '-';
}
}

public function edit(){

$query = $this->db->where('id', $this->uri->segment(3))->get('group_types');

if( $query ){
    return $query->row();
}else{
    return false;
}
}

public function insert($image){

$insert_data['group_id']=$this->input->post('group_id');
$insert_data['name']=$this->input->post('name');
$insert_data['status']='active';
$query=$this->db->insert('group_types', $insert_data);
if($query){
    return true;
}else{
    return false;
}
}

public function update($image){
$sql=$this->db->where('id', $this->uri->segment(3))->get('group_types');
if($image!=''){
unlink(PATH."assets/uploads/".$sql->row()->image);
$img=$image;
}else{
$img=$sql->row()->image;
}

$update_data['group_id']=$this->input->post('group_id');
$update_data['name']=$this->input->post('name');

$query = $this->db->where('id', $this->uri->segment(3))->update('group_types',$update_data);

if( $query ){
    return true;
}else{
    return false;
}
}

public function delete(){

$query=$this->db->where('id', $this->uri->segment(3))->get('group_types');

if($query->num_rows()>0){

unlink(PATH."assets/uploads/".$query->row()->image);

}

$data=$this->db->where('id', $this->uri->segment(3))->delete('group_types');

if( $data ){
    return true;
}else{
    return false;
}
}

public function status(){

$query=$this->db->where('id', $this->uri->segment(3))->get('group_types');

if($query->row()->status=='active'){
$status='inactive';
}else{
$status='active';
}
$data=$this->db->where('id', $this->uri->segment(3))->update('group_types',['status'=>$status]);
if( $data ){
    return true;
}else{
    return false;
}
}



/*End Blog_model Class Here...*/

}