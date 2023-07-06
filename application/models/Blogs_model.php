<?php

class Blogs_model extends MY_Model{



public function fetch_posts(){



if( $this->session->userdata('authority')=='partner' ){

$this->db->where([ 'user_id'=>$this->session->userdata('user_id') ]);	

}

$query = $this->db->get('posts');

//echo $this->db->last_query();

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



public function insert($img)

{

$insert_data['image']=$img;

$insert_data['user_id']=$this->session->userdata('user_id');

$insert_data['title']=ucwords(strtolower($this->input->post('title')));

$insert_data['video']=$this->input->post('video');

$insert_data['author_name']=$this->input->post('author_name');

$insert_data['short_content']=$this->input->post('short_content');

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

if( $img!='' ){

$update_data['image']=$img;

}else{

$update_data['image']=$sql->row()->image;	

}


$update_data['title']=ucwords(strtolower($this->input->post('title')));

$update_data['video']=$this->input->post('video');

$update_data['author_name']=$this->input->post('author_name');

$update_data['short_content']=$this->input->post('short_content');

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

	

$query=$this->db->where('id', $this->uri->segment(3))->get('posts');



if( $query->row()->status==1 ){

$status=0;

}else{

$status=1;	

}



$data=$this->db->where('id',$this->uri->segment(3))->update('posts',['status'=>$status]);



if( $data ){

	return true;

}else{

	return false;

}



}



public function delete(){

	

$query=$this->db->where('id', $this->uri->segment(3))->get('posts');



if($query->row()->image!=''){

unlink(PATH."assets/uploads/".$query->row()->image);	

}



$data=$this->db->where('id', $this->uri->segment(3))->delete('posts');

if( $data ){

	return true;

}else{

	return false;

}

}



/*End Blog_model Class Here...*/

}