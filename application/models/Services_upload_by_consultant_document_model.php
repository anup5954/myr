<?php
class Services_upload_by_consultant_document_model extends MY_Model
{

	public function edit()
	{

		$query = $this->db->where('id', $this->uri->segment(3))->get('services_upload_by_consultant_document');

		if ($query) {

			return $query->row();
		} else {

			return false;
		}
	}

	public function insert()
	{

		$insert_data['name'] = $this->input->post('name');
		$query = $this->db->insert('services_upload_by_consultant_document', $insert_data);

		if ($query) {

			return true;
		} else {

			return false;
		}
	}

	public function update()
	{

		$update_data['name'] = $this->input->post('name');

		$query = $this->db->where('id', $this->uri->segment(3))->update('services_upload_by_consultant_document', $update_data);

		if ($query) {

			return true;
		} else {

			return false;
		}
	}

	public function delete()
	{

		$data = $this->db->where('id', $this->uri->segment(3))->delete('services_upload_by_consultant_document');

		if ($data) {

			return true;
		} else {

			return false;
		}
	}

	public function status()
	{

		$query = $this->db->where('id', $this->uri->segment(3))->get('services_upload_by_consultant_document');

		if ($query->row()->status == 'active') {
			$status = 'inactive';
		} else {
			$status = 'active';
		}

		$data = $this->db->where('id', $this->uri->segment(3))->update('services_upload_by_consultant_document', ['status' => $status]);

		if ($data) {

			return true;
		} else {

			return false;
		}
	}

	/*End Blog_model Class Here...*/
}
