<?php
class Groups_model extends MY_Model{

public function edit(){

$query = $this->db->where('id', $this->uri->segment(3))->get('groups');

if( $query ){

    return $query->row();

}else{

    return false;

}

}

public function insert($image){

$insert_data['name']=$this->input->post('name');
$insert_data['status']='active';

$query=$this->db->insert('groups', $insert_data);

if($query){

    return true;

}else{

    return false;

}

}

public function update($image){
$sql=$this->db->where('id', $this->uri->segment(3))->get('groups');
if($image!=''){
unlink(PATH."assets/uploads/".$sql->row()->image);
$img=$image;
}else{
$img=$sql->row()->image;
}

$update_data['name']=$this->input->post('name');

$query = $this->db->where('id', $this->uri->segment(3))->update('groups',$update_data);

if( $query ){

    return true;

}else{

    return false;

}

}

public function delete(){

$query=$this->db->where('id', $this->uri->segment(3))->get('groups');

if($query->num_rows()>0){

unlink( PATH."assets/uploads/".$query->row()->image );

}

$data=$this->db->where('id', $this->uri->segment(3))->delete('groups');

if( $data ){

    return true;

}else{

    return false;

}

}

public function status(){

$query=$this->db->where('id', $this->uri->segment(3))->get('groups');

if($query->row()->status=='active'){
$status='inactive';
}else{
$status='active';
}

$data=$this->db->where('id', $this->uri->segment(3))->update('groups',['status'=>$status]);

if( $data ){

    return true;

}else{

    return false;

}

}

/*End Blog_model Class Here...*/

}