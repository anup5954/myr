<?php

class Register_model extends MY_Model{



public function create_user(){



$update_data['user_f_name']=$this->input->post('user_f_name');

$update_data['user_l_name']=$this->input->post('user_l_name');

$update_data['user_authority']=$this->input->post('user_authority');

$update_data['user_email']=strtolower($this->input->post('user_email'));

$update_data['user_phone']=$this->input->post('user_phone');

$update_data['user_password']=$this->input->post('user_password');



$query = $this->db->insert('users',$update_data);



if( $query ){

	return $this->db->insert_id();

}else{

	return false;

}



}


public function footer_services(){


$query = $this->db->where('show_in_footer','1')->get( 'services' );



	return $query->result();



}


public function activate_account() {

$query = $this->db->where( ['md5(user_id)'=>$this->uri->segment(2)] )->update('users',['status'=>'active']);

if ( $query ) {

    return true;

} else {

    return false;

}



} //activate_account





/*End Blog_model Class Here...*/

}