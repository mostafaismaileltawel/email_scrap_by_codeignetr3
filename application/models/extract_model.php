<?php
class extract_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function delete($id)
    {
        $this->db->delete('information', array('id' => $id));
        return true;
    }

    public function get_information()
    {
        $query = $this->db->get('information');
        return $query->result_array();

    }
    public function search_email($text)
    {
		if(!$text){
			$this->session->set_flashdata('not_found', 'please enter text');

			redirect('index');
		}
		else{
        $this->db->select('*');
        $this->db->from('information');
        $this->db->where("first_name Like '$text%'");
        $this->db->or_where("last_name Like '$text%'" ?: null);
        $this->db->or_where("email Like '$text%'");
        $query = $this->db->get();
		if($query->num_rows()==0){
			$this->session->set_flashdata('no_data', 'not match any data');
			redirect('index');
		}

        return $query->result_array();
	}

    }
}
