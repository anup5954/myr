<?php
class Front_model extends MY_Model {

/**/
var $table = "company_list";  
      var $select_column = array("id", "CIN", "COMPANY_NAME", "ROC", "COMPANY_STATUS");  
      var $order_column = array( null, "COMPANY_NAME", null, null, null );  
      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("CIN", $_POST["search"]["value"]);  
                $this->db->or_like("COMPANY_NAME", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
	  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       

      function get_all_data(){  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }   
/**/


public function slides(){
$query=$this->db->get('sliders');
if( $query ) {
return $query->result();
} else {
return false;
}
} //slides

public function PopularServices(){
$query=$this->db->where(['status'=>'active','is_popular'=>'yes'])->get('services');
if( $query ) {
return $query->result();
} else {
return false;
}
} //PopularServices

public function services_compare_points(){
$query=$this->db->get('service_compare_points');
if( $query ) {
return $query->result();
} else {
return false;
}
} //services_compare_points

public function clients(){
$query=$this->db->where('status','active')->get('clients');
if( $query ) {
return $query->result();
} else {
return false;
}
} //clients

public function clientviews(){
$query=$this->db->where('status',1)->get('clients_views');
if( $query ) {
return $query->result();
} else {
return false;
}
} //clientviews


public function all_services(){
$query=$this->db->where( [ 'status'=>'active','group_id!='=>'','group_type_id!='=>'','show_in_home'=>1 ] )->get( 'services' );
if( $query ) {
return $query->result();
} else {
return false;
}
} //all_services

public function allservices(){
$query=$this->db->where( [ 'status'=>'active' ] )->order_by('id','desc')->get( 'services' );
if( $query ) {
return $query->result();
} else {
return false;
}
} //all_services

public function footer_services(){
$query=$this->db->where( [ 'status'=>'active','show_in_footer'=>1 ] )->order_by('id','desc')->get( 'services' );
if( $query ) {
return $query->result();
} else {
return false;
}
} //all_services


public function all_articles(){
$query=$this->db->where( [ 'status'=>1,'user_id'=>$this->uri->segment(3) ] )->get( 'posts' );
if( $query ) {
return $query->result();
} else {
return false;
}
} //all_articles

public function service(){
$query=$this->db->where(['id'=>$this->uri->segment(2)])->get('services');
//echo $this->db->last_query();
if( $query ) {
return $query->row();
} else {
return false;
}
} //service

public function is_sevie_avlbe(){
$query=$this->db->where(['id'=>$this->uri->segment(2)])->get('services');
//echo $this->db->last_query();
if( $query->num_rows()>0 ) {
return true;
} else {
return false;
}
} //is_sevie_avlbe

public function service_benefits(){
$query=$this->db->where(['service_id'=>$this->uri->segment(2),'status'=>'active'])->get('service_benefits');
if( $query ) {
return $query->result();
} else {
return false;
}
} //service_benefits

public function service_faqs(){
$query=$this->db->where(['service_id'=>$this->uri->segment(2),'status'=>'active'])->get('service_faqs');
if( $query ) {
return $query->result();
} else {
return false;
}
} //service_faqs

public function process_durations(){
$query=$this->db->where(['service_id'=>$this->uri->segment(2),'status'=>'active'])->get('service_process_durations');
if( $query ) {
return $query->result();
} else {
return false;
}
} //process_durations

public function recent_posts(){
$query=$this->db->where(['status'=>1])->limit(10)->order_by('id','desc')->where('id!=',$this->uri->segment(2))->get('posts');
//echo $this->db->last_query();
if( $query ) {
return $query->result();
} else {
return false;
}
} //recent_posts

public function active_posts(){
if($this->input->get('page')!='' && $this->input->get('page')!=1){
$offset=($this->input->get('page')*10);
$query=$this->db->where(['status'=>1])->order_by('id','desc')->get('posts',$offset,10);
}else{
$query=$this->db->where(['status'=>1])->limit(10)->order_by('id','desc')->get('posts');	
}
//echo $this->db->last_query();
if( $query ) {
return $query->result();
} else {
return false;
}
} //active_posts

public function total_post(){
$query=$this->db->get('posts');
if( $query ) {
if(is_float($query->num_rows()/10)){
return (($query->num_rows()/10)+1);
}else{
return ($query->num_rows()/10);	
}
} else {
return false;
}
} //total_post

public function article(){
$query=$this->db->where('id',$this->uri->segment(2))->get('posts');
if( $query ) {
return $query->row();	
} else {
return false;
}
} //article

public function get_page_data(){
$query=$this->db->where('page',$this->uri->segment(1))->get('pages');
//echo $this->db->last_query();
if( $query ) {
return $query->row();	
} else {
return false;
}
} //get_page_data

public function get_home_page_data(){
$query=$this->db->where('page','about')->get('pages');
//echo $this->db->last_query();
if( $query ) {
return $query->row();	
} else {
return false;
}
} //get_home_page_data

public function service_by_id( $id,$value ){

$query = $this->db->where(['id'=>$id,'status'=>'active'])->get('services');

if( $query->num_rows()>0 ){
if( @unserialize($query->row()->services_compare_points)[$value]!='' ){
    return unserialize($query->row()->services_compare_points)[$value];
}else{
	return '-';
}
}else{

    return '-';

}

} //service_by_id

public function service_name_by_id( $id ){

$query = $this->db->where(['id'=>$id,'status'=>'active'])->get('services');

if( $query->num_rows() && $query->row()->name!='' ){
 return $query->row()->name;
}else{
    return '-';
}

}//service_name_by_id

public function comments(){

$query = $this->db->order_by('id','asc')->where(['post_id'=>$this->uri->segment(2)])->get('posts_comments');

if( $query ){
 return $query->result();
}else{
    return false;
}

} //comments

public function add_comment_reply(){

$insert['comment_id']=$this->input->post('comment_id');
$insert['reply']=$this->input->post('reply');
$query = $this->db->insert( 'posts_comments_reply',$insert );

if( $query){
 return true;
}else{
    return false;
}
} //add_comment_reply

public function add_comment(){
	
$insert['post_id']=$this->input->post('post_id');
$insert['name']=$this->input->post('name');
$insert['email']=$this->input->post('email');
$insert['email']=$this->input->post('email');
$insert['comment']=$this->input->post('comment');

$query = $this->db->insert('posts_comments',$insert);

if( $query){
 return true;
}else{
    return false;
}

} //add_comment

public function make_like(){
	
$query = $this->db->where(['id'=>$this->uri->segment(5)])->update('posts_comments',['like_count'=>$this->uri->segment(4)]);

if( $query){
 return true;
}else{
    return false;
}

} //make_like

public function make_dislike(){
	
$query = $this->db->where(['id'=>$this->uri->segment(5)])->update('posts_comments',['dislike_count'=>$this->uri->segment(4)]);

if( $query){
 return true;
}else{
    return false;
}

} //make_dislike

public function take_subscribe(){
	
$query = $this->db->insert('subscribers',$this->input->post());

if( $query){
 return true;
}else{
    return false;
}

} //take_subscribe

public function consultants(){
    
$query = $this->db->where( ['status'=>'active','user_authority'=>'partner'] )->get('users');

if( $query){
 return $query->result();
}else{
    return false;
}

} //consultants

public function consultant_detail(){
    
$query = $this->db->where( ['status'=>'active','user_id'=>$this->uri->segment(3)] )->get('users');
//echo $this->db->last_query();
if( $query){
 return $query->row();
}else{
    return false;
}

} //consultant_detail

public function apply_service(){
	
$service_detail = $this->db->select('price,CGST,SGST,IGST')->where( 'id',$this->uri->segment(2) )->get('services');

$user_detail = $this->db->select('user_state')->where( 'user_id', $this->session->userdata('user_id') )->get('users');

$apply_service_data['service_id'] = $this->uri->segment(2);
$apply_service_data['customer_id'] = $this->session->userdata( 'user_id' );
$apply_service_data['service_price'] = $service_detail->row()->price;
$apply_service_data['CGST'] = $service_detail->row()->CGST;
$apply_service_data['SGST'] = $service_detail->row()->SGST;
$apply_service_data['IGST'] = $service_detail->row()->IGST;

$apply_service_data['txnid'] = $_POST['txnid'];
$apply_service_data['service_price_with_tax'] = $_POST['amount'];
$apply_service_data['customer_firstname'] = $_POST['firstname'];
$apply_service_data['customer_lastname'] = $_POST['lastname'];
$apply_service_data['country'] = $_POST['country'];
$apply_service_data['state'] = $_POST['state'];
$apply_service_data['city'] = $_POST['city'];
$apply_service_data['zipcode'] = $_POST['zipcode'];

$apply_service_data['customer_payment_status'] = 'pending';
$apply_service_data['service_status'] = 'pending';
    
$query = $this->db->insert( 'orders', $apply_service_data );
//echo $this->db->last_query();
if( $query){
  return true;
}else{
  return false;
}

} //apply_service

public function service_status_update(){

$apply_service_data['customer_payment_status'] = $_POST['status'];
$apply_service_data['error_Message'] = $_POST['error_Message'];
$apply_service_data['error_occ'] = $_POST['error'];
$apply_service_data['payuMoneyId'] = $_POST['payuMoneyId'];
    
$query = $this->db->where( 'txnid', $_POST['txnid'] )->update( 'orders', $apply_service_data );
//echo $this->db->last_query();
if( $query){
  return true;
}else{
  return false;
}

} //apply_service

public function get_order_id(){
 
$query = $this->db->where( 'txnid', $_POST['txnid'] )->get( 'orders' );
//echo $this->db->last_query();
if( $query ){
  return $query->row()->id;
}else{
  return false;
}

} //apply_service

public function get_user_d(){
$query = $this->db->where( 'txnid', $_POST['txnid'] )->get( 'orders' ); 
$q = $this->db->where( 'user_id', $query->row()->customer_id )->get( 'users' );
//echo $this->db->last_query();
if( $q ){
  return $q->row();
}else{
  return false;
}

} //get_user


public function no_of_articles( $id=null ){
    
$query = $this->db->where( ['user_id'=> $id,'status'=>1] )->get('posts');
   
if( $query->num_rows()>0 ){
  
  return $query->num_rows();

}else{

  return 0;

}

} //no_of_articles

public function user_articles($id=null){
    
$query = $this->db->where( 'user_id', $id )->get('posts');
//echo $this->db->last_query();
if( $query ){
  
  return $query->result();

}else{

  return false;

}

} //user_articles

} //End Model