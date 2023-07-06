<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller{

public function __construct(){

parent::__construct();

$this->load->model('Orders_model','mdl');

$this->load->library('view_lib');

}

public function view(){

if($this->uri->segment(2)=='pending'){
$data['orders']=$this->mdl->fetch_pending_services();
}

if($this->uri->segment(2)=='assigned'){
$data['orders']=$this->mdl->fetch_all_where('orders',['service_status'=>'pending','partner_id!='=>'','is_partner_accepted!='=>2]);

}

if($this->uri->segment(2)=='completed'){
$data['orders']=$this->mdl->fetch_all_where('orders',['service_status'=>$this->uri->segment(2)]);
}
$this->view_lib->load_view(['view'=>'orders','view_data'=>$data]);

}

public function admin_order_detail()
{
$data['order'] = $this->mdl->order_detail();
$data['docs'] = $this->mdl->docs();
$this->view_lib->load_view(['view' => 'order_details', 'view_data' => $data]);
}

public function assign_to_partner(){

$this->view_lib->load_view( ['view'=>'assign_to_partner'] );

if( $this->input->post('partner_id') ){
$data=$this->mdl->assign_to_partner();
$this->msg( $data,'orders/assign_to_partner/'.$this->uri->segment(3),'Order Assigned to Partner' );
}

}

public function paid_to_partner(){

$this->view_lib->load_view( ['view'=>'paid_to_partner'] );

if($this->input->post('partner_id')){
$data=$this->mdl->assign_to_partner();
$this->msg($data,'orders/assign_to_partner/'.$this->uri->segment(3),'Updated');
}

}

public function order_detail(){

$this->view_lib->load_view( ['view'=>'order_detail'] );

if($this->input->post('partner_id')){
$data=$this->mdl->assign_to_partner();
$this->msg($data,'orders/assign_to_partner/'.$this->uri->segment(3),'Updated');
}

}


public function upload_final_file()
{
$data['final_file'] = array();
$data['upload_by_consultant'] = $this->mdl->upload_by_consultant();
$finalFileData = $this->mdl->final_file();
foreach ($finalFileData as $finalFile) {
$data['final_file'][$finalFile->upload_by_consultant_id]['doc_name'] = $finalFile->doc_name;
$data['final_file'][$finalFile->upload_by_consultant_id]['doc_idd'] = $finalFile->id;
}

$this->view_lib->load_view(['view' => 'final_file_upload', 'view_data' => $data]);
}

public function insert_final_doc()
{
    if (!empty($_POST['upload_by_consultant_id'])) {
        $inserData = [];
        foreach ($_POST['upload_by_consultant_id'] as $upload_id) {

            $img = $_FILES['finalDoc_' . $upload_id]['name'];
            if ($img != "") {
                $config = [
                    "upload_path" => "./assets/uploads/finalDoc",
                    "allowed_types" => "pdf"
                ];
                $this->load->library("upload", $config);
                $this->upload->do_upload('finalDoc_' . $upload_id);
                $fileData = $this->upload->data();
                $img_name = $fileData['file_name'];
                $inserData['order_id'] = $this->input->post('order_idd');
                $inserData['doc_name'] =  $img_name;
                $inserData['upload_by_consultant_id'] =  $upload_id;
            } else {
                $inserData['doc_name'] = !empty($this->input->post('hidden_finalDoc_' . $upload_id)) ? $this->input->post('hidden_finalDoc_' . $upload_id) : '';
            }
            if (!empty($inserData['doc_name'])) {
                if (!empty($_POST['hidden_doc_idd_' . $upload_id])) {
                    $updateData['doc_name'] =  $inserData['doc_name'];
                    $this->mdl->update_final_doc(['id' => $_POST['hidden_doc_idd_' . $upload_id]], 'my_final_file', $updateData);
                } else {
                    $this->mdl->insert_final_doc('my_final_file', $inserData);
                }
            }
        }
        $this->msg($data, 'orders/assigned', 'Document uploaded successfully');
    }



    //$data = $this->mdl->insert_final_doc();
    //$this->msg($data, 'services_required_document_list/list', 'created');
}

public function change_payment_status(){
    $condition = ['id'=>$this->uri->segment(3),'service_id'=>$this->uri->segment(4)];
    $orData = $this->mdl->getWhereData($condition,'my_orders');
    $pStatus = "success";
    if($orData->customer_payment_status == 'success'){
        $pStatus = 'pending';
    }
    $data = ['customer_payment_status'=>$pStatus];
    $this->mdl->update_data($condition,'my_orders',$data);
    $this->msg($data, 'orders/pending', 'Customer payment status changed');
}


}