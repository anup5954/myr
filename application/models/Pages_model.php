<?php
class Pages_model extends MY_Model{

public function fetch_page_data(){
$query = $this->db->where(['page'=>$this->uri->segment(2)])->get('pages');
return $query->row();
}

public function update($img){
$sql=$this->db->where('id', $this->uri->segment(3))->get('pages');	
if($img!='' && $sql->row()->image!=''){
unlink(PATH."assets/uploads/".$sql->row()->image);
}
$update_data['image']=$img;
$update_data['title']=$this->input->post('title');
$update_data['video']=$this->input->post('video');
$update_data['show_priority']=$this->input->post('show_priority');
$update_data['short_content']=$this->input->post('short_content');
$update_data['content']=$this->input->post('content');
$query = $this->db->where('page', $this->uri->segment(3))->update('pages',$update_data);
/* echo $this->db->last_query();
exit; */
if( $query ){
	return true;
}else{
	return false;
}
}

/*End Blog_model Class Here...*/
}