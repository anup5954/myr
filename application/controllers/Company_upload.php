<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company_upload extends MY_Controller {
public function __construct(){
parent:: __construct();
$this->load->library('view_lib');
$this->load->library('cmn_lib');
$this->load->model('Company_upload_model','mdl');
$this->load->library('excel');
}

public function index(){
$this->view_lib->load_view( [ 'view'=>'company_upload' ] );
}

public function uploading(){
$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
// Validate whether selected file is a CSV file
if(!empty($_FILES['file']['name']) ){
// If the file is uploaded
if(is_uploaded_file($_FILES['file']['tmp_name'])){            
// Open uploaded CSV file with read-only mode
$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
// Skip the first line
//$sheet_data=fgetcsv($csvFile);
print_r($csvFile);	
exit;
while(($data = fgetcsv($csvFile)) !== FALSE){
// Get row data
//print_r($data);
$iu_data['CIN']       =@$data[0];
$iu_data['COMPANY_NAME']       =@$data[1];
$iu_data['DATE_OF_REGISTRATION']         =@$data[2];
$iu_data['MONTH_NAME']         =@$data[3];
$iu_data['STATE']          =@$data[4];
$iu_data['ROC']        =@$data[5];
$iu_data['COMPANY_STATUS']         =@$data[6];
$iu_data['CATEGORY']    =@$data[7];
$iu_data['CLASS']    =@$data[8];
$iu_data['COMPANY_TYPE']    =@$data[9];
$iu_data['AUTHORIZED_CAPITAL']    =@strtotime($data[10]);
$iu_data['PAIDUP_CAPITAL']  =@$data[11];
$iu_data['ACTIVITY_CODE']         =@$data[12];
$iu_data['ACTIVITY_DESCRIPTION']         =@$data[13];
$iu_data['REGISTERED_OFFICE_ADDRESS']         =@$data[14];
$iu_data['EMAIL']         =@$data[15];
// Check whether member already exists in the database with the same email
$is_exist=$this->mdl->is_exist_data($iu_data);
if( $is_exist==true ){
// Update member data in the database
$insert=$this->mdl->insert_data($iu_data);
}
}
// Close opened CSV file
fclose($csvFile);
$this->session->set_flashdata( 's_msg', 'File uploaded successfully.' );
redirect('uploads/bhav_copy');
}else{
$qstring = '?status=err';
}
}else{
$qstring = '?status=invalid_file';
}
}
function import() {
if(isset($_FILES["file"]["name"]))
{
$path = $_FILES["file"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
$data[] = array(
'CIN'  => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
'COMPANY_NAME'   => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
'DATE_OF_REGISTRATION'   => $worksheet->getCellByColumnAndRow(2, $row)->getFormattedValue(),
'MONTH_NAME'  => $worksheet->getCellByColumnAndRow(3, $row)->getFormattedValue(),
'STATE'   => $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
'ROC'   => $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
'COMPANY_STATUS'   => $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
'CATEGORY'   => $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
'CLASS'   => $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
'COMPANY_TYPE'   => $worksheet->getCellByColumnAndRow(9, $row)->getValue(),
'AUTHORIZED_CAPITAL'   => $worksheet->getCellByColumnAndRow(10, $row)->getValue(),
'PAIDUP_CAPITAL'   => $worksheet->getCellByColumnAndRow(11, $row)->getValue(),
'ACTIVITY_CODE'   => $worksheet->getCellByColumnAndRow(12, $row)->getValue(),
'ACTIVITY_DESCRIPTION'   => $worksheet->getCellByColumnAndRow(13, $row)->getValue(),
'REGISTERED_OFFICE_ADDRESS'   => $worksheet->getCellByColumnAndRow(14, $row)->getValue(),
'EMAIL'   => $worksheet->getCellByColumnAndRow(15, $row)->getValue()
);
}
}
$this->mdl->insert($data);
echo 'Data Imported successfully';
} 
} //end import function
} //end here
