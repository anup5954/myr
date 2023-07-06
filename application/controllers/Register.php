<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

public function __construct(){

parent::__construct();

$this->load->model('Register_model','mdl');

$this->load->library('view_lib');

$this->load->library( 'form_validation' );

$this->form_validation->set_error_delimiters( '<span class="text-danger">', '</span>' );

}

public function index() {

if ( $this->session->userdata( 'user_id' ) ) {

return redirect( 'dashboard' );

} else {

$this->load->view( 'admin/common/register' );

}

}

public function process() {

$this->load->library('email');
$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

if($this->form_validation->run('register_validations')){

$signup_user=$this->mdl->create_user();

if( $signup_user ){

$massage="

<!DOCTYPE html>

<html lang='en'>

<head>

<meta charset='utf-8'>

<title>Simple Email</title>

<style>

@font-face {

font-family: SourceSansPro;

}

.clearfix:after {

content: '';

display: table;

clear: both;

}

a {

color: #0087C3;

text-decoration: none;

}

body {

width: 550px;

margin: 0 auto;

color: #555555;

background: #FFFFFF;

font-family: Arial, sans-serif;

font-size: 14px;

font-family: SourceSansPro;

border: 1px solid #AAAAAA;

}

.header {

padding: 8px 5px;

margin-bottom: 20px;

border-bottom: 1px solid #AAAAAA;

}

#logo {

float: left;

}

#company {

float: right;

text-align: right;

color: #fff;

}

.main-body {

	clear:both;

}

.main-body h1,h3 {

margin: 0px;

font-size: 25px;

padding-bottom: 5px;

text-align: center;

}

.main-body p {

font-size: 15px;

margin: 0px;

padding-bottom: 15px;

text-align: center;

}

.main-body p:last-child {

border: 0px;

}

h2.name {

font-size: 1.4em;

font-weight: normal;

margin: 0;

}

.footer {

color: #777777;

width: 100%;

height: 30px;

margin-top: 30px;

bottom: 0;

border-top: 1px solid #AAAAAA;

padding: 8px 0;

text-align: center;

}

</style>

</head>

<body>

<div class='header clearfix'>

<div style='text-align:center'>

<img src='".base_url("assets/front/img/logo.png")."' alt='myregistration'>

</div>

</div>

</div>

<div class='main-body' style='text-align:center'>

<h1>Dear,&nbsp;".$this->input->post('user_f_name')." </h1>

<p>Welcome to myregistration! We are thrilled to have you on board. Please active your account by clicking the link below: </p>

<a href='".base_url('activate/'.md5($signup_user).'')."' style='background: #45aaf2;color: #fff;padding: 8px;text-align: center;margin: auto;display: table;'>Activate your account</a>

<p>If you have any questions or need assistance, feel free to reach out to us. We are here to help! </p>
</div>

<div class='footer'>

<b>Best regards,<br>
Team Myregistration</b>

</div>

</body>

</html>

";



$this->email->from('info@myregistration.in', 'My Registration');

$this->email->to($this->input->post('user_email'));

//$this->email->cc('another@another-example.com');

$this->email->bcc('anupmishra509@gmail.com');

$this->email->subject('Please Activate your Account.');

$this->email->message($massage);

$this->email->set_mailtype('html');

if($this->email->send()){

redirect('thank-you','refresh');

}

}

} else {

$this->index();

}

} //process



public function activate_account(){



if($this->mdl->activate_account()){



$this->session->set_flashdata('s_msg', 'Thanks You, Your account is verified please login to continue.');

return redirect('login','refresh');



}



} //activate_account



public function thank_you(){

$this->load->view('front/thank-you');

} //thank_you







/*End blog Class Here...*/

}