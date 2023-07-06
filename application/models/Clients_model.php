<?php
class Clients_model extends MY_Model{

public function edit(){

$query = $this->db->where('id', $this->uri->segment(3))->get('clients');

if( $query ){

	return $query->row();

}else{

	return false;

}

}

public function insert($image){

$insert_data['image']=$image;

$insert_data['caption']=$this->input->post('caption');
$insert_data['heading']=$this->input->post('heading');
$insert_data['content']=$this->input->post('content');
$insert_data['status']='active';

$query=$this->db->insert('clients', $insert_data);

if($query){

	return true;

}else{

	return false;

}

}

public function update($image){
$sql=$this->db->where('id', $this->uri->segment(3))->get('clients');
if($image!=''){
unlink(PATH."assets/uploads/".$sql->row()->image);
$img=$image;
}else{
$img=$sql->row()->image;
}

$update_data['image']=$img;
$update_data['heading']=$this->input->post('heading');
$update_data['content']=$this->input->post('content');
$update_data['caption']=$this->input->post('caption');

$query = $this->db->where('id', $this->uri->segment(3))->update('clients',$update_data);

if( $query ){

	return true;

}else{

	return false;

}

}



public function delete(){

$query=$this->db->where('id', $this->uri->segment(3))->get('clients');

if($query->num_rows()>0){

unlink(PATH."assets/uploads/".$query->row()->image);

}

$data=$this->db->where('id', $this->uri->segment(3))->delete('clients');

if( $data ){

	return true;

}else{

	return false;

}

}

public function status(){

$query=$this->db->where('id', $this->uri->segment(3))->get('clients');

if($query->row()->status=='active'){
$status='inactive';
}else{
$status='active';
}

$data=$this->db->where('id', $this->uri->segment(3))->update('clients',['status'=>$status]);

if( $data ){

    return true;

}else{

    return false;

}

}



/*End Blog_model Class Here...*/

}