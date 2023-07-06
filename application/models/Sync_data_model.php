<?php
class Sync_data_model extends CI_Model
{

public function update_properties( $properties=null ){
//print_r($data);
foreach ($properties as $api_value ) {
$is_property_available_in_db = $this->db->where(['prop_id'=>$api_value['id']])->get('properties');
if($is_property_available_in_db->num_rows()==0){
$value['prop_id']=$api_value['id'];
$value['property_details']=serialize($api_value);
$value['status']=$api_value['active'];
$insert_property=$this->db->insert('properties', $value );
}else{
$value['property_details']=serialize($api_value);
$value['status']=$api_value['active'];
$update_property=$this->db->where(['prop_id'=>$api_value['id']])->update('properties', $value );
}
}
}

public function update_property_types( $data=null ){
foreach ($data as $api_value ) {
$is_data_available_in_db = $this->db->where(['property_type_id'=>$api_value['id']])->get('property_type');
if($is_data_available_in_db->num_rows()==0){
$value['property_type_id']=$api_value['id'];
$value['propety_type_name']=$api_value['name'];
$insert_property=$this->db->insert('property_type', $value );
}else{
$value['propety_type_name']=$api_value['name'];
$update_property=$this->db->where(['property_type_id'=>$api_value['id']])->update('property_type', $value );
}
}
}

public function update_amenities( $data=null ){
foreach ($data as $api_value ) {
$is_data_available_in_db = $this->db->where(['amen_id'=>$api_value['id']])->get('amenities');
if($is_data_available_in_db->num_rows()==0){
$value['amen_id']=$api_value['id'];
$value['amen_name']=$api_value['name'];
$value['parent_id']=$api_value['parent_id'];
$insert_property=$this->db->insert('amenities', $value );
}else{
$value['amen_name']=$api_value['name'];
$value['parent_id']=$api_value['parent_id'];
$update_property=$this->db->where(['amen_id'=>$api_value['id']])->update('amenities', $value );
}
}
} //update_amenities

public function update_property_rate( $data=null ){
foreach ($data as $api_value ) {
$is_data_available_in_db = $this->db->where(['prop_id'=>$api_value['id']])->get('rates');
if($is_data_available_in_db->num_rows()==0){
$value['prop_id']=$api_value['id'];
$value['rate_details'] = serialize($api_value['rate']);
$insert_property=$this->db->insert('rates', $value );
}else{
$value['rate_details'] = serialize($api_value['rate']);
$update_property=$this->db->where(['prop_id'=>$api_value['id']])->update('rates', $value );
}
}
} //update_property_rate

public function update_property_gallery( $data=null ){
foreach ($data as $api_value ) {
	
foreach ($api_value['images'] as $image ) {	

//print_r($image);
	
$is_data_available_in_db = $this->db->where(['gallery_id'=>$image['id']])->get('gallery');
if($is_data_available_in_db->num_rows()==0){
$value['gallery_id'] = $image['id'];
$value['prop_id'] = $api_value['id'];
$value['img_title'] = $image['title'];
$value['img_url'] = $image['url'];
$value['img_caption'] = $image['caption'];
$value['img_order'] = $image['order'];
$insert_property = $this->db->insert('gallery', $value );
}else{
$value['gallery_id'] = $image['id'];
$value['prop_id'] = $api_value['id'];
$value['img_title'] = $image['title'];
$value['img_url'] = $image['url'];
$value['img_caption'] = $image['caption'];
$value['img_order'] = $image['order'];
$update_property=$this->db->where(['gallery_id'=>$api_value['id']])->update('gallery', $value );
} 


}
}
} //update_property_gallery



} //End Model