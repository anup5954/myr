<?php
class Services_compare_points_model extends MY_Model{

public function edit(){

$query = $this->db->where( 'id', $this->uri->segment(3) )->get('service_compare_points');

if( $query ){

	return $query->row();

}else{

	return false;

}

}

public function insert(){

$insert_data['name']=$this->input->post('name');
$query=$this->db->insert('service_compare_points', $insert_data);

if($query){

	return true;

}else{

	return false;

}

}

public function update(){

$update_data['name']=$this->input->post('name');

$query = $this->db->where('id', $this->uri->segment(3))->update( 'service_compare_points', $update_data );

if( $query ){

	return true;

}else{

	return false;

}

}

public function delete(){

$data=$this->db->where( 'id', $this->uri->segment(3) )->delete('service_compare_points');

if( $data ){

	return true;

}else{

	return false;

}

}

public function status(){

$query=$this->db->where('id', $this->uri->segment(3))->get('service_compare_points');

if($query->row()->status=='active'){
$status='inactive';
}else{
$status='active';
}

$data=$this->db->where('id', $this->uri->segment(3))->update('service_compare_points',['status'=>$status]);

if( $data ){

    return true;

}else{

    return false;

}

}

/*End Blog_model Class Here...*/

}