<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

public function __construct(){
parent:: __construct();
$this->load->model('Front_model','mdl');
}

function msg($data,$r,$m){

if($data==true){
$this->session->set_flashdata('s_msg', 'Successfully '.$m.'.');
}else{
$this->session->set_flashdata('s_msg', 'Not '.$m.'.');
}
return redirect($r);

} //msg

public function index(){
	
$data['slides']=$this->mdl->slides();	
$data['clients']=$this->mdl->clients();	
$data['clientviews']=$this->mdl->clientviews();	
$data['recent_posts']=$this->mdl->recent_posts();	
$data['page']=$this->mdl->get_home_page_data();	
$data['all_services']=$this->mdl->all_services();
$data['allservices']=$this->mdl->allservices();
$data['PopularServices']=$this->mdl->PopularServices();

$this->load->view('front/index',$data);

} //index

public function about(){
$data['page']=$this->mdl->get_page_data();		
$this->load->view('front/page',$data);
} //about

public function fetch_com(){

  
           $fetch_data = $this->mdl->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->CIN;  
                $sub_array[] = '<a href='.base_url('company-detail/'.$row->CIN.'').'>'.$row->COMPANY_NAME.'</a>';  
                $sub_array[] = $row->ROC;  
                $sub_array[] = $row->COMPANY_STATUS;                  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"=>intval($_POST["draw"]),  
                "recordsTotal"=>$this->mdl->get_all_data(),  
                "recordsFiltered"=>$this->mdl->get_filtered_data(),  
                "data"=>$data  
           );  
           echo json_encode($output);  
        

} //fetch_com

public function all_companies(){

$data['null']='';
$this->load->view('front/all-companies',$data);

} //all_companies

public function company_detail(){
$data['company']=$this->mdl->fetch_row_where('company_list',['CIN'=>$this->uri->segment(2)]);		
$this->load->view( 'front/company_detail', $data );
} //company_detail

public function privacy_policy(){
$data['page']=$this->mdl->get_page_data();		
$this->load->view( 'front/page', $data );
} //privacy_policy

public function allproperty(){
	
$data['all_property']=$this->mdl->get_all_properties();
$this->load->view('front/all-property',$data);

} //allproperty

public function propertydetail(){
	
$data['all_property']=$this->mdl->get_all_properties();	
$data['gallery']=$this->mdl->get_property_gallery();
$this->load->view('front/property-detail',$data);

} //propertydetail

public function localinformation(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //localinformation

public function managementservices(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //managementservices

public function refund_policy(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //refund_policy

public function articles(){
$data['articles']=$this->mdl->active_posts();
$data['total_article']=$this->mdl->total_post();
$data['recent_articles']=$this->mdl->recent_posts();
$this->load->view('front/articles',$data);
} //articles

public function article(){
$data['comments']=$this->mdl->comments();
$data['article']=$this->mdl->article();
$data['recent_articles']=$this->mdl->recent_posts();
$this->load->view('front/article',$data);
} //article

public function contact(){

/*  */
$this->load->library('form_validation');
$config = array(
array(
'field' => 'f_name',
'label' => 'First Name',
'rules' => 'trim|required'
),array(
'field' => 'l_name',
'label' => 'Last Name',
'rules' => 'trim|required'
),array(
'field' => 'email_id',
'label' => 'Email',
'rules' => 'trim|required'
),array(
'field' => 'mobile_no',
'label' => 'Mobile No',
'rules' => 'trim|required'
),array(
'field' => 'city',
'label' => 'City',
'rules' => 'trim|required'
),array(
'field' => 'service',
'label' => 'service',
'rules' => 'trim|required'
),array(
'field' => 'message',
'label' => 'Message',
'rules' => 'trim|required'
)
);
$this->form_validation->set_rules($config);
$this->form_validation->set_error_delimiters('<span style="color:red">','</span>');

if($this->form_validation->run() === true) {

/*  */

$this->load->library('email');
$htmlContent = '<h2>Contact Detail Given Bellow:</h2>';
$htmlContent .= '<p>Name: '.$this->input->post('f_name').' '.$this->input->post('l_name').'</p>';
$htmlContent .= '<p>Phone: '.$this->input->post('mobile_no').' </p>';
$htmlContent .= '<p>Email: '.$this->input->post('email_id').'</p>';
$htmlContent .= '<p>City: '.$this->input->post('city').'</p>';
$htmlContent .= '<p>Service: '.$this->input->post('service').'</p>';
$htmlContent .= '<p>Message: '.$this->input->post('message').'</p>';
$htmlContent .= '<br><br><p>Thank You<br>support@myregistration.in</p>';
$config['mailtype'] = 'html';
$this->email->initialize($config);
$this->email->to('support@myregistration.in');
$this->email->bcc('bsdixit@hotmail.com','ramandixit89@gmail.com','websitebyranking@gmail.com');
$this->email->from('support@myregistration.in','support@myregistration.in');
$this->email->subject( 'Inquiry From myregistration' );
$this->email->message($htmlContent);
$this->email->send();

$this->session->set_flashdata( 's_msg', 'Successfully submitted.' );
return redirect( 'contact-us' );

/*  */

}else{

$this->load->view('front/contact');

}
/*  */

} //contact

public function partner_with_us(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //partner_with_us

public function terms_conditions(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //terms_conditions

public function gst(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //gst

public function registration_services(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //registration_services

public function professional_services(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //professional_services

public function audit_returns(){
$data['page']=$this->mdl->get_page_data();
$this->load->view('front/page',$data);
} //audit_returns

public function service(){
$is_sevie_avlbe=$this->mdl->is_sevie_avlbe();
if( $is_sevie_avlbe > 0 ){
$data['servic']=$this->mdl->service();
$data['service_benefits']=$this->mdl->service_benefits();
$data['service_faqs']=$this->mdl->service_faqs();
$data['process_durations']=$this->mdl->process_durations();
$this->load->view('front/service',$data);
}else{
redirect(base_url());	
}
} //service

public function add_comment(){
	
$data=$this->mdl->add_comment();
$this->msg($data,'article/'.$this->input->post('post_id'),'Comment Article');

} //add_comment

public function make_like(){
	
$data=$this->mdl->make_like();
$this->msg( $data,'article/'.$this->uri->segment(3),'Article Like' );

} //make_like

public function make_dislike(){
	
$data=$this->mdl->make_dislike();
$this->msg( $data,'article/'.$this->uri->segment(3),'Article Dis Like' );

} //make_dislike

public function add_comment_reply(){
	
$data=$this->mdl->add_comment_reply();
$this->msg($data,'article/'.$this->input->post('post_id'),'Reply Article');

} //add_comment_reply

public function subscribe(){
$data=$this->mdl->take_subscribe();

if( $data==true ){
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Thanks for subscription');
    window.location.href='".base_url()."';
    </script>");
}

} //subscribe

public function consultants(){
$data['consultants']=$this->mdl->consultants();
$this->load->view( 'front/consultants',$data );
} //consultants

public function consultant_detail(){

$data['servicess']=$this->mdl->allservices();
$data['articles']=$this->mdl->all_articles();
$data['consultant']=$this->mdl->consultant_detail();
$this->load->view( 'front/consultant-detail',$data );

} //consultant_detail

public function apply_service(){
	
if( $this->session->userdata('user_id')=='' ){

$this->session->set_userdata( 'apply_service', $this->uri->segment(2) );
redirect('login');
exit;

}else{
if( isset($_POST['txnid']) && $_POST['txnid']!='' ){
$this->mdl->apply_service();
}
$this->load->view('front/apply-service');
	
}

} //apply_service

public function payment_notify(){
//echo "<pre>";	
//print_r($_POST);
$this->mdl->service_status_update();
$data['order_id']=$this->mdl->get_order_id();
$this->load->view( 'front/return_from_payment',$data );

} //payment_notify

public function payment_success(){
//echo "<pre>";	
//print_r($_POST);
if(isset($_POST) && $_POST['status']!=''){
$this->mdl->service_status_update();
$data['order_id']=$this->mdl->get_order_id();
$user=$this->mdl->get_user_d();
$this->session->set_userdata( 'user_id', $user->user_id );
$this->session->set_userdata( 'authority', $user->user_authority );	
$this->load->view('front/return_from_payment',$data);
}else{
//redirect('/');
}
} //payment_success

public function payment_cancel(){
$this->mdl->update_order_response();
$this->load->view('front/return_from_payment');

} //payment_cancel

public function user_articles(){
	
$data['articles']=$this->mdl->user_articles($this->uri->segment(3));
$data['total_article']=$this->mdl->total_post();
$data['recent_articles']=$this->mdl->recent_posts();
$this->load->view('front/articles',$data);
	
} //user_articals



} //End Here