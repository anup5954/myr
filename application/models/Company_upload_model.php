<?php

class Company_upload_model extends CI_Model

{



public function is_exist_data( $data=null ){

$query=$this->db->where(['CIN'=>$data['CIN']])->get('company_list');

if( $query->num_rows()==0 ){

return true;		

}else{

return false;

}

}



public function insert_data( $data=null ){

$this->db->insert('company_list',$data);

//echo $this->db->last_query();

}

 function insert($data)
 {
  $this->db->insert_batch('company_list', $data);
 }











} //End Model