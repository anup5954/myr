<?php
class Process_durations_model extends MY_Model{

public function fetch_alll(){

$query = $this->db->where('service_id', $this->uri->segment(3))->get('service_process_durations');

return $query->result();

}

public function edit(){
$query = $this->db->where('id', $this->uri->segment(4))->get('service_process_durations');
if( $query ){
	return $query->row();
}else{
	return false;
}
}

public function insert(){

$insert_data['heading']=$this->input->post('heading');
$insert_data['content']=$this->input->post('content');
$insert_data['service_id']=$this->uri->segment(3);
$query=$this->db->insert('service_process_durations', $insert_data);

if($query){

	return true;

}else{

	return false;

}

}

public function update(){

$update_data['heading']=$this->input->post('heading');
$update_data['content']=$this->input->post('content');

$query = $this->db->where('id', $this->uri->segment(4))->update( 'service_process_durations', $update_data );

if( $query ){

	return true;

}else{

	return false;

}

}

public function delete(){

$data=$this->db->where( 'id', $this->uri->segment(4) )->delete('service_process_durations');

if( $data ){

	return true;

}else{

	return false;

}

}

public function status(){

$query=$this->db->where('id', $this->uri->segment(4))->get('service_process_durations');

if($query->row()->status=='active'){
$status='inactive';
}else{
$status='active';
}

$data=$this->db->where('id', $this->uri->segment(4))->update('service_process_durations',['status'=>$status]);

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