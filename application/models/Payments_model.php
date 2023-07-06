<?php
class Payments_model extends MY_Model {

public function update_profile($image){

$sql=$this->db->where('id', $this->uri->segment(3))->get('sliders');
if($image!=''){
unlink(PATH."assets/uploads/".$sql->row()->image);
$img['image']=$image;
}else{
$img['image']=$sql->row()->image;
}

$update_data=array_merge( $img, $this->input->post() );	
$query=$this->db->where(['user_id'=>$this->session->userdata('user_id')])->update( 'users', $update_data );

if( $query )
{
return true;
}
else
{
return false;
}
} //isLoginValid

} //End Model