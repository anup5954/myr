<?php
class Customer_model extends MY_Model
{

	public function update_file_data($upload_data = '')
	{

		$insert_data['doc_name'] = $this->input->post('doc_name');
		$insert_data['order_id'] = $this->uri->segment(3);
		$insert_data['doc_url'] = $upload_data['upload_data']['file_name'];
		$insert_data['doc_ext'] = $upload_data['upload_data']['file_ext'];

		$is_doc_insert = $this->db->where(['doc_name' => $this->input->post('doc_name'), 'order_id' => $this->uri->segment(3)])->get('documents');

		if ($is_doc_insert->num_rows() == 0) {
			$query = $this->db->insert('documents', $insert_data);
		} else {

			$dfile = PATH . 'assets/uploads/' . $is_doc_insert->row()->doc_url;
			unlink($dfile);
			//exit;
			$query = $this->db->where(['id' => $is_doc_insert->row()->id])->update('documents', $insert_data);
		}

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function update_details()
	{

		//echo "<pre>";
		//print_r($_POST);

		$update_data['business_name'] = $this->input->post('business_name');
		$update_data['business_email'] = $this->input->post('business_email');
		$update_data['business_mobile_no'] = $this->input->post('business_mobile_no');
		$update_data['business_address'] = $this->input->post('business_address');
		$update_data['area_locality'] = $this->input->post('area_locality');
		$update_data['state'] = $this->input->post('state');
		$update_data['city'] = $this->input->post('city');
		$update_data['zipcode'] = $this->input->post('zipcode');
		$update_data['type_of_business'] = $this->input->post('type_of_business');
		$update_data['business_activity'] = $this->input->post('business_activity');
		$update_data['GSTIN'] = $this->input->post('GSTIN');
		$update_data['orderer_PAN'] = $this->input->post('orderer_PAN');

		$query = $this->db->where(['id' => $this->uri->segment(3)])->update('orders', $update_data);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function doc_delete()
	{

		$query = $this->db->where('id', $this->uri->segment(3))->get('documents');

		if ($query->num_rows() > 0) {

			unlink(PATH . "assets/uploads/" . $query->row()->doc_url);
		}

		$data = $this->db->where('id', $this->uri->segment(3))->delete('documents');

		if ($data) {

			return true;
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

	public function upload_by_consultant()
	{

		$data = $this->db->where('id', $this->uri->segment(4))->get('services');

		if ($data) {

			return $data->row();
		} else {

			return false;
		}
	}

	/*End Class Here...*/
}
