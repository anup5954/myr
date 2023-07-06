<?php

class Profile_model extends MY_Model {

public function update_profile($image=null){



$sql=$this->db->where( 'user_id', $this->session->userdata('user_id') )->get('users');

if( $image!='' ){

unlink(PATH."assets/uploads/".$sql->row()->image);

$update_data['image']=$image;

}else{

$update_data['image']=$sql->row()->image;

}

$update_data['services_provides']=serialize( $this->input->post('services_provides') );

$update_data['user_password']= $this->input->post('user_password') ;
$update_data['user_qualification']= $this->input->post('user_qualification') ;

$update_data['user_f_name']= $this->input->post('user_f_name') ;

$update_data['user_l_name']= $this->input->post('user_l_name') ;

$update_data['user_phone']= $this->input->post('user_phone') ;

$update_data['user_address1']= $this->input->post('user_address1') ;

$update_data['user_address2']= $this->input->post('user_address2') ;

$update_data['user_country']= $this->input->post('user_country') ;

$update_data['user_state']= $this->input->post('user_state') ;

$update_data['user_city']= $this->input->post('user_city') ;

$update_data['user_zip']= $this->input->post('user_zip') ;

$update_data['user_about_us']= $this->input->post('user_about_us');
$update_data['user_bio_heading']= $this->input->post('user_bio_heading');



$query=$this->db->where(['user_id'=>$this->session->userdata('user_id')])->update( 'users', $update_data );



if( $query )

{

return true;

}

else

{

return false;

}

} //update_profile



public function services(){



$query = $this->db->where( ['status'=>'active','group_id!='=>'','group_type_id!='=>''] )->get('services');

//echo $this->db->last_query();



if( $query )

{

return $query->result();

}

else

{

return false;

}



} //services



} //End Model