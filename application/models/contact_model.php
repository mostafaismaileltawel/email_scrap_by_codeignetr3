<?php
class contact_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function get_contact()
    {
        $query = $this->db->get('contacts');
        return $query->result_array();
    }

    public function create_contact()
    {
        $data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'remarks' => $this->input->post('remarks'),

            'status' => $this->input->post('status')];
        $this->db->insert('contacts', $data);
        redirect('home');
    }

    public function show_contact($id)
    {
        $query = $this->db->get_where('contacts', array('id' => $id));
        return $query->row_array();
    }

    public function delete_contact($id)
    {
        $this->db->delete('contacts', array('id' => $id));
        return true;
    }

    public function contact_update()
    {
        $id = $this->input->post('id');
        $data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'remarks' => $this->input->post('remarks'),

            'status' => $this->input->post('status')];
        $this->db->where('id', $id);
        $this->db->update('contacts', $data);
    }

}
