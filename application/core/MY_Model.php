<?php
class MY_Model extends CI_Model
{

public function fetch_all($table){

$query=$this->db->get($table);

if( $query )
{
return $query->result();
}else{
return false;
}
} //fetch_all

public function fetch_all_where($table,$array){

$query=$this->db->where($array)->get($table);
//echo $this->db->last_query();
if( $query )
{
return $query->result();
}else{
return false;
}
} //fetch_all_where




public function fetch_by_id($id,$table){
$query=$this->db->where( 'id',$id )->get( $table );

if( $query )
{
return $query->row();
}else{
return false;
}
} //fetch_by_id

public function fetch_row_where( $table,$array ){
$query=$this->db->where($array)->get( $table );
//echo $this->db->last_query();
if( $query->num_rows()>0 )
{
return $query->row();
}else{
return false;
}
} //fetch_by_id



}