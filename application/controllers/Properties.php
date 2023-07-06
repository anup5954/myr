<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends MY_Controller {

public function __construct(){

parent:: __construct();

$this->load->library('view_lib');
$this->load->library('cmn_lib');

}

public function index(){

$data['properties'] = $this->cmn_lib->get_all_properties();
$this->view_lib->load_view(['view'=>'properties','nav'=>'admin','title'=>'All Properties'],$data);

}

public function fetch_properties(){

$result = array('data' => array());

$data = $this->cmn_lib->get_all_properties();
$i=1;
foreach ($data as $key => $value) {
//print_r(unserialize($value['property_details']));
$status = ($value['status']==1) ? '<span class="badge badge-success">active</span>' : '<span class="badge badge-danger">inactive</span>';
$statusChangeButtonText = ( $value['status']==0 ) ? "Make Active" : "Make Inactive";
$buttons = '
<div class="item-action dropdown">
<a href="" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-edit"></i></a>
<div class="dropdown-menu dropdown-menu-left" x-placement="top-end" style="position: absolute; transform: translate3d(15px, -1px, 0px); top: 0px; left: 0px; will-change: transform;">
<a href="'.base_url().'property/details/'.$value['prop_id'].'" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Edit </a>
<a href="" onclick="change_status('.$value['prop_id'].')" class="dropdown-item"><i class="dropdown-icon fe fe-edit"></i> Make Active </a>
<a href="" onclick="delete_data('.$value['prop_id'].')" class="dropdown-item"><i class="dropdown-icon fe fe-delete"></i> Delete</a>
</div>
</div>
';
$result['data'][$key] = array(
unserialize($value['property_details'])['id'],
unserialize($value['property_details'])['title'],
'',
'',
'',
'',
$status,
$buttons
);
$i++;
} // /foreach
echo json_encode($result);
} //fetch_properties


public function edit_view(){

$this->view_lib->load_view(['view'=>'property_'.$this->uri->segment(2).'','nav'=>'admin','snav'=>'property-edit','title'=>'Properties']);

}



}

