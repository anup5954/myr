<?php
class Clients_views_model extends MY_Model{

public function edit(){

$query = $this->db->where('id', $this->uri->segment(3))->get('clients_views');

if( $query ){

    return $query->row();

}else{

    return false;

}

}

public function insert($image){

$insert_data['image']=$image;
$insert_data['caption']=$this->input->post('caption');
$insert_data['client_name']=$this->input->post('client_name');
$insert_data['company_name']=$this->input->post('company_name');
$insert_data['rating']=$this->input->post('rating');
$insert_data['review']=$this->input->post('review');
$insert_data['status']=0;

$query=$this->db->insert('clients_views', $insert_data);

if($query){
    return true;
}else{
    return false;
}

}

public function update($image){
$sql=$this->db->where('id', $this->uri->segment(3))->get('clients_views');
if($image!=''){
unlink(PATH."assets/uploads/".$sql->row()->image);
$img=$image;
}else{
$img=$sql->row()->image;
}

$update_data['image']=$img;
$update_data['caption']=$this->input->post('caption');
$update_data['client_name']=$this->input->post('client_name');
$update_data['company_name']=$this->input->post('company_name');
$update_data['rating']=$this->input->post('rating');
$update_data['review']=$this->input->post('review');

$query = $this->db->where('id', $this->uri->segment(3))->update('clients_views',$update_data);

if( $query ){
    return true;
}else{
    return false;
}

}

public function delete(){

$query=$this->db->where('id', $this->uri->segment(3))->get('clients_views');

if($query->num_rows()>0){

unlink(PATH."assets/uploads/".$query->row()->image);

}

$data=$this->db->where('id', $this->uri->segment(3))->delete('clients_views');

if( $data ){

    return true;

}else{

    return false;

}

}

public function status(){

$query=$this->db->where('id', $this->uri->segment(3))->get('clients_views');

if($query->row()->status==1){
$status=0;
}else{
$status=1;
}

$data=$this->db->where('id', $this->uri->segment(3))->update('clients_views',['status'=>$status]);

if( $data ){

    return true;

}else{

    return false;
}

}

/*End Blog_model Class Here...*/

}