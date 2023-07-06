<?php



class Users_model extends MY_Model{



public function fetch_users(){

$query = $this->db->where('user_authority',$this->uri->segment(2))->get('users');

return $query->result();

}



public function edit(){

$query = $this->db->where('id', $this->uri->segment(3))->get('posts');

if( $query ){

	return $query->row();

}else{

	return false;

}

}



public function insert($img){

$insert_data['image']=$img;

$insert_data['title']=$this->input->post('title');

$insert_data['content']=$this->input->post('content');

$insert_data['published_at']=strtotime($this->input->post('published_at'));

$query=$this->db->insert('posts', $insert_data);

if($query){

	return true;

}else{

	return false;

}

}



public function update($img){

$sql=$this->db->where('id', $this->uri->segment(3))->get('posts');

if($img!='' && $sql->row()->image!=''){

unlink(PATH."assets/uploads/".$sql->row()->image);

}

$update_data['image']=$img;

$update_data['title']=$this->input->post('title');

$update_data['content']=$this->input->post('content');

$update_data['published_at']=strtotime($this->input->post('published_at'));

$query = $this->db->where('id', $this->uri->segment(3))->update('posts',$update_data);

if( $query ){

	return true;

}else{

	return false;

}

}

public function status(){

$sql=$this->db->where('user_id', $this->uri->segment(4))->get( 'users' );

if( $sql->row()->status=='active' ){
	$status='inactive';
}else{
	$status='active';
}

$query=$this->db->where('user_id', $this->uri->segment(4))->update( 'users',['status'=>$status] );

if( $query ){

	return true;

}else{

	return false;

}

}

/*End Blog_model Class Here...*/

}