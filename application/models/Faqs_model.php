<?php
class Faqs_model extends MY_Model{

public function fetch_alll(){

$query = $this->db->where('service_id', $this->uri->segment(3))->get('service_faqs');

return $query->result();

}

public function edit(){

$query = $this->db->where('id', $this->uri->segment(4))->get('service_faqs');

if( $query ){

	return $query->row();

}else{

	return false;

}

}

public function insert(){

$insert_data['question']=$this->input->post('question');
$insert_data['answer']=$this->input->post('answer');
$insert_data['service_id']=$this->uri->segment(3);

$query=$this->db->insert('service_faqs', $insert_data);

if($query){

	return true;

}else{

	return false;

}

}

public function update(){

$update_data['question']=$this->input->post('question');
$update_data['answer']=$this->input->post('answer');

$query = $this->db->where('id', $this->uri->segment(4))->update( 'service_faqs', $update_data );

if( $query ){

	return true;

}else{

	return false;

}

}

public function delete(){

$data=$this->db->where( 'id', $this->uri->segment(4) )->delete('service_faqs');

if( $data ){

	return true;

}else{

	return false;

}

}

public function status(){

$query=$this->db->where('id', $this->uri->segment(4))->get('service_faqs');

if($query->row()->status=='active'){
$status='inactive';
}else{
$status='active';
}

$data=$this->db->where('id', $this->uri->segment(4))->update('service_faqs',['status'=>$status]);

if( $data ){

    return true;

}else{

    return false;

}

}

public function group_types_name_by_id($id){

$query=$this->db->where( 'id', $id )->get( 'services' );

if( $query ){

	return $query->row();

}else{

	return false;

}

}

/*End Blog_model Class Here...*/

}