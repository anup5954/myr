<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
public function __construct(){
parent:: __construct();
$this->load->library('view_lib');
$this->load->model('Dashboard_model','mdl');
}

public function index(){
$data['users']=$this->mdl->get_all_users();
$data['customer']=$this->mdl->get_all_customer();
$data['partner']=$this->mdl->get_all_partner();
$data['services']=$this->mdl->get_all_services();
$data['orders']=$this->mdl->get_all_orders();
$data['posts']=$this->mdl->get_all_aricles();
$query = $this->db->query("SELECT SUM(service_price) as price from my_orders");
$data['totalPrice'] = $query->row()->price;
$this->view_lib->load_view( [ 'view'=>'dashboard','view_data'=>$data ]);	

}


} //Dashboard
