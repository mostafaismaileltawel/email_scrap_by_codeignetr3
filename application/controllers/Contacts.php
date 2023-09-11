<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller
{
	/*********************************************************************************************/
	                             /*********************/
								 /*    all contact   */
								 /*******************/
	/*********************************************************************************************/
    public function view()
    {
        $data['title'] = 'home';
        $data['contacts'] = $this->contact_model->get_contact();
        // $data['data2'] = $this->contact_model->get_information();

        $this->load->view('templets/header.php', $data);
        $this->load->view('contacts/home.php');
        $this->load->view('templets/footer.php');

    }

/*********************************************************************************************/
	                             /*********************/
								 /*  create contact   */
								 /*******************/
	/*********************************************************************************************/
    public function create()
    {
        $data['title'] = 'create contact';
		$this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'First name', 'required|min_length[3]|max_length[255]|alpha');
        $this->form_validation->set_rules('last_name', 'last name', 'required|min_length[3]|max_length[255]|alpha');
        $this->form_validation->set_rules('email', ' Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', ' phone', 'required|numeric');
        $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        $this->form_validation->set_rules('status', 'Status ', 'required');
        if ($this->form_validation->run() === false) {

            $this->load->view('templets/header.php', $data);
            $this->load->view('Contacts/create_contact.php', $data);
            $this->load->view('templets/footer.php');
        } else {
            $this->contact_model->create_contact();
            redirect('home');
        }

    }
/*********************************************************************************************/
	                             /*********************/
								 /*    delet contact  */
								 /*******************/
	/*********************************************************************************************/

    public function delete($id)
    {
        $this->contact_model->delete_contact($id);
        redirect('home');
    }

	/*********************************************************************************************/
	                             /*********************/
								 /*  go to edit_file  */
								 /*******************/
	/*********************************************************************************************/
    public function edit($id)
    {
        $data['title'] = 'edit contact ';
        $data['contact'] = $this->contact_model->show_contact($id);
        $this->load->view('templets/header.php', $data);
        $this->load->view('Contacts/edit_contact.php', $data);
        $this->load->view('templets/footer.php');
    }

/*********************************************************************************************/
	                             /*********************/
								 /*    upadate contact*/
								 /*******************/
	/*********************************************************************************************/
    public function update()
    {
        $data['title'] = 'edit ';
        $data['contact'] = $this->contact_model->show_contact($this->input->post('id'));
$this->load->library('form_validation');

$this->form_validation->set_rules('first_name', 'First name', 'required|min_length[3]|max_length[255]|alpha');
$this->form_validation->set_rules('last_name', 'last name', 'required|min_length[3]|max_length[255]|alpha');
$this->form_validation->set_rules('email', ' Email', 'required|valid_email');
$this->form_validation->set_rules('phone', ' phone', 'required|numeric');
$this->form_validation->set_rules('remarks', 'Remarks', 'required');
$this->form_validation->set_rules('status', 'Status ', 'required');
        if ($this->form_validation->run() === false) {
            $this->load->view('templets/header.php', $data);
            $this->load->view('Contacts/edit_contact.php', $data);
            $this->load->view('templets/footer.php');
        } else {
            $this->contact_model->contact_update();
            redirect('home');
        }

    }

    


   
}
