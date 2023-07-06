<?php

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Forgot_password extends CI_Controller {

function __construct(){
  parent::__construct();
  $this->load->library('form_validation');
  $this->form_validation->set_error_delimiters( '<span class="text-danger">', '</span>' );
  $this->load->model('Forgot_password_model','mdl');
}

public function index() {

$this->load->library('email');
$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|callback_mail_exists');
if ( $this->form_validation->run() == false )
{
$this->load->view( 'admin/common/forgot-password' );
} else {
$reset_password=$this->mdl->reset_password();
/*  */
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
<h1>Your Password is successfully reset</h1>

<p>your reset Password is: <a>$reset_password</p>

</div>

<div class='footer'>

Copyright © myregistration.com ".date("Y")." | All Rights Reserved

</div>

</body>

</html>

";



$this->email->from('info@myregistration.in', 'My Registration');

$this->email->to($this->input->post('user_email'));

//$this->email->cc('another@another-example.com');

$this->email->bcc('anupmishra509@gmail.com');

$this->email->subject('Password Reset');

$this->email->message($massage);

$this->email->set_mailtype('html');

if($this->email->send()){

$this->session->set_flashdata('s_msg', 'Please Check Your Email For Reset Password');
return redirect('login');

}

}
/*  */


} // index


public function mail_exists($key){


$is_mail_exist=$this->mdl->mail_exists($key);
if ( $is_mail_exist == false )
{

$this->form_validation->set_message( __FUNCTION__ , 'Email not registered with us.');
//echo "hh";
return FALSE;
exit;
}
else
{
return TRUE;
exit;
}

} // mail_exists



}

