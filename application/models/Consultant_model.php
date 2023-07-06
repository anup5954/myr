<?php
class Consultant_model extends MY_Model{

public function fetch_posts(){
$query = $this->db->get('consultants');
return $query->result();
}

public function edit(){
$query = $this->db->where('id', $this->uri->segment(3))->get('consultants');
if( $query ){
	return $query->row();
}else{
	return false;
}
}

public function insert($img){
$insert_data['image']=$img;
$insert_data['name']=$this->input->post('name');
$insert_data['location']=$this->input->post('location');
$insert_data['designation']=$this->input->post('designation');
$insert_data['details']=$this->input->post('details');
$insert_data['published_at']=strtotime($this->input->post('published_at'));
$query=$this->db->insert('consultants', $insert_data);
if($query){
	return true;
}else{
	return false;
}
}

public function update($img){
$sql=$this->db->where('id', $this->uri->segment(3))->get('consultants');	
if($img!='' && $sql->row()->image!=''){
unlink(PATH."assets/uploads/".$sql->row()->image);
}

$update_data['image']=$img;
$update_data['name']=$this->input->post('name');
$update_data['location']=$this->input->post('location');
$update_data['designation']=$this->input->post('designation');
$update_data['details']=$this->input->post('details');
$update_data['published_at']=strtotime($this->input->post('published_at'));

$query = $this->db->where('id', $this->uri->segment(3))->update('consultants',$update_data);
if( $query ){
	return true;
}else{
	return false;
}
}

public function delete(){
	
$query=$this->db->where('id', $this->uri->segment(3))->get('consultants');

if($query->row()->image!=''){
unlink(PATH."assets/uploads/".$query->row()->image);	
}

$data=$this->db->where('id', $this->uri->segment(3))->delete('consultants');
if( $data ){
	return true;
}else{
	return false;
}
}

public function status(){

$query=$this->db->where('id', $this->uri->segment(3))->get('consultants');

if( $query->row()->status=='active' ){
$status='inactive';
}else{
$status='active';
}

$data=$this->db->where('id', $this->uri->segment(3))->update('consultants',['status'=>$status]);
//echo $this->db->last_query();

if( $data ){

    return true;

}else{

    return false;

}

} //status

} /* End Here */