<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends MY_Controller {

public function __construct(){
parent:: __construct();
$this->load->library('view_lib');
}

public function index()
{
$this->view_lib->load_view(['view'=>'settings','nav'=>'admin','title'=>'Site Settings','fb'=>'yes']);
}

}
