<?php
class Dashboard_model extends MY_Model{

public function get_all_services(){
$this->db->select('*');
$query=$this->db->get('services');
//echo $this->db->last_query();
if( $query )
{
return $query->num_rows();
}else{
return false;
}
}//get_all_users


public function get_all_orders(){
$this->db->select('*');
$query=$this->db->get('orders');
//echo $this->db->last_query();
if( $query )
{
return $query->num_rows();
}else{
return false;
}
}

public function get_all_aricles(){
$this->db->select('*');
$query=$this->db->get('posts');
//echo $this->db->last_query();
if( $query )
{
return $query->num_rows();
}else{
return false;
}
}

public function get_all_users(){
$this->db->select('*');
$query=$this->db->get('users');
//echo $this->db->last_query();
if( $query )
{
return $query->num_rows();
}else{
return false;
}
}//get_all_users

public function get_all_customer(){
$this->db->select('*');
$query=$this->db->where(['user_authority'=>'customer'])->get('users');
//echo $this->db->last_query();
if( $query )
{
return $query->num_rows();
}else{
return false;
}
}//get_all_users

public function get_all_partner(){
$this->db->select('*');
$query=$this->db->where(['user_authority'=>'partner'])->get('users');
//echo $this->db->last_query();
if( $query )
{
return $query->num_rows();
//return $query->row();
}else{
return false;
}
}//get_all_users

public function artist_add(){

$query=$this->db->insert( 'artists',$this->input->post() );

if( $query )
{
return true;
}else{
return false;
}
} //artist_add

public function fetch_slider(){

$query=$this->db->get( 'home_slider' );

if( $query )
{
return $query->result_array();
}else{
return false;
}
}//fetch_slider

public function fetch_home_content(){
$this->db->where( 'page_category','home' );
$query=$this->db->get( 'pages' );

if( $query )
{
return unserialize( $query->row()->page_data );
}else{
return false;
}
}//fetch_home_content

public function home_data_update(){
$data=['page_data'=>serialize( $this->input->post())];
$this->db->where( 'page_category','home' );
$query=$this->db->update( 'pages', $data );
if( $query )
{
return true;
}else{
return false;
}
}//fetch_contact_us

public function fetch_about_us(){
$this->db->where( 'page_category','about' );
$query=$this->db->get( 'pages' );

if( $query )
{
return unserialize( $query->row()->page_data );
}else{
return false;
}
}//fetch_about_us

public function about_us_data_update(){
$data=['page_data'=>serialize( $this->input->post())];
$this->db->where( 'page_category','about' );
$query=$this->db->update( 'pages', $data );
//echo $this->db->last_query();
if( $query )
{
return true;
}else{
return false;
}
}//fetch_contact_us

public function fetch_contact_us(){
$this->db->where( 'page_category','contact-us' );
$query=$this->db->get( 'pages' );

if( $query )
{
return unserialize( $query->row()->page_data );
}else{
return false;
}
}//fetch_contact_us

public function contact_us_data_update(){
$data=['page_data'=>serialize( $this->input->post())];
$this->db->where( 'page_category','contact-us' );
$query=$this->db->update( 'pages', $data );
//echo $this->db->last_query();
if( $query )
{
return true;
}else{
return false;
}
}//fetch_contact_us

public function fetch_wearable_and_textile_arts(){
$this->db->where( 'page_category','wearable-and-textile-arts' );
$query=$this->db->get( 'pages' );

if( $query )
{
return unserialize( $query->row()->page_data );
}else{
return false;
}
}//fetch_wearable_and_textile_arts

public function wearable_and_textile_arts_data_update(){
$data=['page_data'=>serialize( $this->input->post())];
$this->db->where( 'page_category','upcoming-exhibitions' );
$query=$this->db->update( 'pages', $data );
if( $query )
{
return true;
}else{
return false;
}
}//fetch_contact_us

} //End Model