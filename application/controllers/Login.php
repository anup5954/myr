<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Login extends CI_Controller {

public function index() {

if ( $this->session->userdata( 'user_id' ) ) {
return redirect( 'dashboard' );
} else {
$this->load->view( 'admin/common/login' );
}
}

public	function login_validate() {
$this->load->library( ['form_validation'] );
$this->load->library('cmn_lib');
$this->form_validation->set_error_delimiters( '<span class="text-danger">', '</span>' );
if ( $this->form_validation->run( 'login_validations' ) ) {
$user_email = $this->input->post( 'user_email' );
$user_password = $this->input->post( 'user_password' );
$user_id = $this->cmn_lib->isLoginValid( $user_email, $user_password );

if ( $user_id->status=='active' ) {

$this->session->set_userdata( 'user_id', $user_id->user_id );
$this->session->set_userdata( 'authority', $user_id->user_authority );
$this->session->set_flashdata( 's_msg', 'Login Successfully.' );

if( $user_id->user_authority=='customer' && $this->session->userdata( 'apply_service' )!='' ){
return redirect( 'service/'.$this->session->userdata( 'apply_service' ) );	
}else{

if ( $user_id->user_authority=='customer' ) {
	return redirect( 'customer/my_services' );	
}elseif($user_id->user_authority=='partner'){
	return redirect( 'partner/new_orders' );	
}elseif($user_id->user_authority=='administrator'){
	return redirect( 'sliders' );	
}else{
return redirect( 'dashboard' );		
}



}

} elseif ( $user_id->status=='inactive' ) {
	
$this->session->set_flashdata( 'e_msg', 'Your account not active please contact "admin".' );
return redirect( 'login' );

} else {
$this->session->set_flashdata( 'e_msg', 'Invalid Details.' );
return redirect( 'login' );
}
} else {
$this->load->view( 'admin/common/login' );
}
}


public	function logout() {
$this->session->sess_destroy();
return redirect( 'login' );

} //logout

	/*****End Login Model*****/
}
