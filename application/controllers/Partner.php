<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partner extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->library('view_lib');

        $this->load->model('Partner_model', 'mdl');
    }

    public function view()
    {

        $data['page'] = $this->mdl->fetch_page_data();

        $this->view_lib->load_view(['view' => 'pages', 'view_data' => $data]);
    }

    public function ongoing_work()
    {

        $this->view_lib->load_view(['view' => 'ongoing_work']);
    }

    public function new_orders()
    {

        $this->view_lib->load_view(['view' => 'new_orders']);
    }

    public function complete_orders()
    {

        $this->view_lib->load_view(['view' => 'complete_orders']);
    }

    public function received_payments()
    {

        $this->view_lib->load_view(['view' => 'received_payments']);
    }

    public function pending_payments()
    {

        $this->view_lib->load_view(['view' => 'pending_payments']);
    }

    public function add_documents()
    {

        $this->view_lib->load_view(['view' => 'add_documents']);
    }

    public function order_received()
    {

        $data = $this->mdl->order_received();

        if ($data == true) {
            $this->msg($data, 'partner/new_orders', 'Order Received');
        } else {
            $this->msg($data, 'partner/new_orders', 'Order Not Received');
        }
    }

    public function order_reject()
    {

        $data = $this->mdl->order_reject();

        if ($data == true) {
            $this->msg($data, 'partner/new_orders', 'Order Received');
        } else {
            $this->msg($data, 'partner/new_orders', 'Order Not Received');
        }
    }

    public function order_detail()
    {
        $data['order'] = $this->mdl->order_detail();
        $data['docs'] = $this->mdl->docs();
        $this->view_lib->load_view(['view' => 'order_detail', 'view_data' => $data]);
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
            $this->msg($data, 'partner/new_orders', 'Document uploaded successfully');
        }

        //$data = $this->mdl->insert_final_doc();
        //$this->msg($data, 'services_required_document_list/list', 'created');
    }


    public function make_completed()
    {
        $data = ['service_status' => 'completed'];
        $this->mdl->update_final_doc(['id' => $this->uri->segment(3)], 'my_orders', $data);
        $this->msg($data, 'partner/new_orders', 'Changed');
    }


    public function make_pending()
    {
        $data = ['service_status' => 'pending'];
        $this->mdl->update_final_doc(['id' => $this->uri->segment(3)], 'my_orders', $data);
        $this->msg($data, 'partner/new_orders', 'Changed');
    }
}
