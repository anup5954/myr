<?php
class Orders_model extends MY_Model{

public function edit(){

$query = $this->db->where('id', $this->uri->segment(3))->get('orders');

if( $query ){

    return $query->row();

}else{

    return false;

}

}

public function upload_by_consultant()
    {

        $data = $this->db->where('id', $this->uri->segment(4))->get('services');

        if ($data) {

            return $data->row();
        } else {

            return false;
        }
    }

    public function final_file()
    {

        $data = $this->db->where('order_id', $this->uri->segment(3))->get('final_file');

        if ($data) {

            return $data->result();
        } else {

            return false;
        }
    }

    public function order_detail()
    {

        $data = $this->db->where('id', $this->uri->segment(3))->get('orders');

        if ($data) {

            return $data->row();
        } else {

            return false;
        }
    }

    public function docs()
    {

        $data = $this->db->where('order_id', $this->uri->segment(3))->get('documents');

        if ($data) {

            return $data->result();
        } else {

            return false;
        }
    }

public function insert($image){

$insert_data['name']=$this->input->post('name');
$insert_data['status']='active';

$query=$this->db->insert('orders', $insert_data);

if($query){

    return true;

}else{

    return false;

}

}

public function assign_to_partner(){
	
$update['partner_id']=$this->input->post('partner_id');
$update['partner_offer_price']=$this->input->post('partner_offer_price');
$update['completion_date']=$this->input->post('completion_date');
$update['is_partner_accepted']=0;
$query = $this->db->where('id', $this->uri->segment(3))->update('orders',$update);

if( $query ){

    return true;

}else{

    return false;

}

}

public function fetch_pending_services(){
	
$query = $this->db->where("(service_status='pending' AND   partner_id IS NULL)  OR ( service_status='pending' AND is_partner_accepted=2)")->get('orders');
//echo $this->db->last_query();
if( $query->num_rows()>0 ){
    return $query->result();
}else{
    return false;
}
}

public function delete(){

$query=$this->db->where('id', $this->uri->segment(3))->get('orders');

if($query->num_rows()>0){

unlink( PATH."assets/uploads/".$query->row()->image );

}

$data=$this->db->where('id', $this->uri->segment(3))->delete('orders');

if( $data ){

    return true;

}else{

    return false;

}

}

public function status(){

$query=$this->db->where('id', $this->uri->segment(3))->get('orders');

if($query->row()->status=='active'){
$status='inactive';
}else{
$status='active';
}

$data=$this->db->where('id', $this->uri->segment(3))->update('orders',['status'=>$status]);

if( $data ){

    return true;

}else{

    return false;

}

}


public function insert_final_doc($table, $data)
{
    $insertData = $this->db->insert($table, $data);
    if ($insertData) {
        return true;
    } else {
        return false;
    }
}

public function update_final_doc($condition, $table, $data)
{
    $updateData = $this->db->where($condition)
        ->update($table, $data);
    if ($updateData) {
        return true;
    } else {
        return false;
    }
}

public function update_data($condition, $table, $data)
{
    $updateData = $this->db->where($condition)
        ->update($table, $data);
    if ($updateData) {
        return true;
    } else {
        return false;
    }
}

public function getWhereData($condition,$table){
    $query=$this->db->where($condition)
        ->get($table);
    if( $query ){
        return $query->row();
    }else{
        return false;
    }
}


/*End Blog_model Class Here...*/

}