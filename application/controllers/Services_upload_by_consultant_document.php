<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Services_upload_by_consultant_document extends MY_Controller
{



    public function __construct()
    {



        parent::__construct();



        $this->load->model('Services_upload_by_consultant_document_model', 'mdl');



        $this->load->library('view_lib');
    }



    public function list()
    {
        $data['services_upload_by_consultant_document'] = $this->mdl->fetch_all('services_upload_by_consultant_document');
        $this->view_lib->load_view(['view' => 'Services_upload_by_consultant_document', 'nav' => 'admin', 'title' => 'Dashboard', 'view_data' => $data]);
    }



    public function create()
    {
        $data['services_compare_point'] = (object)['name' => ''];
        $this->view_lib->load_view(['view' => 'services_upload_by_consultant_document_add_edit', 'nav' => 'admin', 'title' => 'Dashboard', 'view_data' => $data]);
    }



    public function edit()
    {
        $data['services_compare_point'] = $this->mdl->edit();
        $this->view_lib->load_view(['view' => 'services_upload_by_consultant_document_add_edit', 'nav' => 'admin', 'title' => 'Dashboard', 'view_data' => $data]);
    }



    public function insert()
    {



        $data = $this->mdl->insert();



        $this->msg($data, 'services_upload_by_consultant_document/list', 'created');
    }



    public function update()
    {



        $data = $this->mdl->update();



        $this->msg($data, 'services_upload_by_consultant_document/list', 'updateed');
    }



    public function status()
    {



        $data = $this->mdl->status();



        $this->msg($data, 'services_upload_by_consultant_document/list', 'Update');
    }



    public function delete()
    {



        $data = $this->mdl->delete();



        $this->msg($data, 'services_upload_by_consultant_document/list', 'Deleted');
    }
}
