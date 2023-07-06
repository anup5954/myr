<?php
class Remove_img_model extends MY_Model
{

public function remove(){
$query=$this->db->where(['userEmail'=>$userEmail,'userPassword'=>$userPassword,'status'=>1])->get('users');
if( $query->num_rows()==1 )
{
return $query->row()->userId;
}
else
{
return false;
}
} //isLoginValid



} //End Model