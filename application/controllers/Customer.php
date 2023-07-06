<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('view_lib');
        $this->load->model('Customer_model', 'mdl');
    }

    public function my_services()
    {
        $data['my_services'] = $this->mdl->fetch_all_where('orders', ['customer_id' => $this->session->userdata('user_id')]);
        $this->view_lib->load_view(['view' => 'my-services', 'view_data' => $data]);
    }

    public function new_service()
    {
        $data['services'] = $this->mdl->fetch_all_where('services', ['status' => 'active']);
        $this->view_lib->load_view(['view' => 'new-service', 'view_data' => $data]);
    }

    public function invoice()
    {
        $data['order'] = $this->mdl->fetch_row_where('orders', ['id' => $this->uri->segment(3)]);
        $data['service'] = $this->mdl->fetch_row_where('services', ['id' => $data['order']->service_id]);
        $this->view_lib->load_view(['view' => 'invoice', 'view_data' => $data]);
    }

    public function upload_documents_and_details()
    {

        if (isset($_POST['action']) && $_POST['action'] == 'update_details') {

            $is_save = $this->mdl->update_details();

            if ($is_save == true) {
                $this->msg($is_save, 'customer/upload_documents_and_details/' . $this->uri->segment(3), 'updated');
                redirect('customer/upload_documents_and_details/' . $this->uri->segment(3), 'refresh');
            }
        }

        $service = $this->mdl->fetch_row_where('orders', ['id' => $this->uri->segment(3)]);
        $data['customer'] = $this->mdl->fetch_row_where('users', ['user_id' => $service->customer_id]);
        $data['service'] = $this->mdl->fetch_row_where('services', ['id' => $service->service_id]);
        $data['docs'] = $this->mdl->fetch_all_where('documents', ['order_id' => $this->uri->segment(3)]);
        $data['order'] = $this->mdl->fetch_row_where('orders', ['id' => $this->uri->segment(3)]);
        $this->view_lib->load_view(['view' => 'upload-documents-and-details', 'view_data' => $data]);

        if (isset($_POST['action']) && $_POST['action'] == 'upload_doc') {
            /**/
            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG|pdf';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('doc_url')) {
                //$error = array('error' => $this->upload->display_errors());
                redirect('customer/upload_documents_and_details/' . $this->uri->segment(3), 'refresh');
            } else {
                $doc_data = array('upload_data' => $this->upload->data());

                $is_data_save = $this->mdl->update_file_data($doc_data);

                if ($is_data_save) {

                    $this->msg($data, 'customer/upload_documents_and_details/' . $this->uri->segment(3), 'uploaded');
                    redirect('customer/upload_documents_and_details/' . $this->uri->segment(3), 'refresh');
                }
            }
            /**/
        }
    } //upload_documents_and_details

    public function doc_view()
    {

        $data['doc'] = $this->mdl->fetch_row_where('documents', ['id' => $this->uri->segment(3)]);
        $this->load->view('admin/customer/document-view', $data);
    } //doc_view

    public function doc_delete()
    {

        $data = $this->mdl->doc_delete();

        $this->msg($data, 'customer/upload_documents_and_details/' . $this->uri->segment(4) . '', 'Deleted');
    } //doc_delete



    public function view_final_file()
    {
        $data['final_file'] = array();
        $data['upload_by_consultant'] = $this->mdl->upload_by_consultant();
        $finalFileData = $this->mdl->final_file();
        foreach ($finalFileData as $finalFile) {
            $data['final_file'][$finalFile->upload_by_consultant_id]['doc_name'] = $finalFile->doc_name;
            $data['final_file'][$finalFile->upload_by_consultant_id]['doc_idd'] = $finalFile->id;
        }

        $this->view_lib->load_view(['view' => 'view_final_file_upload', 'view_data' => $data]);
    }
}
