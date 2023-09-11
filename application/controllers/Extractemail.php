<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Extractemail extends CI_Controller
{ 


/*********************************************************************************************/
	                             /*********************/
								 /*    upload file   */
								 /*******************/
	/*********************************************************************************************/

    public function upload_file()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('files[]', 'File','callback_file_already_exists');

        if ($this->form_validation->run() === false) {
            $this->load->view('templets/header.php');
            $this->load->view('Contacts/pdf_upload.php');
            $this->load->view('templets/footer.php');
	
	}else{

		

        if (isset($_FILES['files'])) {
            $data = [];
            $count = count($_FILES['files']['name']);
            for ($i = 0; $i < $count; $i++) {
                if (!empty($_FILES['files']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                    $config['upload_path'] = './upload/';
                    $config['allowed_types'] = 'pdf';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $data['totalFiles'][] = $filename;
                    }
                }
            }
           
        }
		$this->session->set_flashdata('file_done', 'file uploaded');
		redirect('index');	
    }
	
	}
/*********************************************************************************************/
	                             /*********************/
								 /*  extract email   */
								 /*******************/
	/*********************************************************************************************/
    public function extract()
    {
        $this->load->helper('directory');
        $folderPath = './upload'; // Specify the path to the folder
        $fileList = directory_map($folderPath);
        foreach ($fileList as $file) {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile("./upload/" . $file);
            $text = $pdf->getText();
            
			// preg_match_all("/[a-zA-Z0-9]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/", $text, $all_emails);
			preg_match_all("/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/", $text, $all_emails);
            $emails = $all_emails[0];
            foreach ($emails as $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $name_and_address = strstr($email, '@', true);
                    $name = explode(".", $name_and_address);
                    $firstname = $name[0];
                    $lastname = (count($name) == 2) ? $name[1] : "-";

                    $q = $this->db->select('first_name', 'last_name')
                        ->from('information')
                        ->where(array('first_name' => $firstname, 'last_name' => $lastname, 'email' => $email))
                        ->get();

                    if ($q->num_rows() == 0) {
                        // Insert new record
                        $data2 = [
                            'first_name' => $firstname,
                            'last_name' => $lastname,
                            'email' => $email,
                        ];
                        $this->db->insert('information', $data2);
                    }
                }
            }
        }
        $this->session->set_flashdata('file_done', 'file extracted');
        redirect('index');
    }

    /*********************************************************************************************/
	                             /*********************/
								 /*    validation is 
								    file exsist    */
								 /*******************/
	/*********************************************************************************************/
  
	public function file_already_exists()
{
    $uploadPath = './upload/';
	$files = $_FILES['files'];
    foreach ($files['name'] as $key => $value) {

		if (!empty($value)) {
            $file_path = $uploadPath . $value;
	
            if (file_exists($file_path)) {
				
		   $this->form_validation->set_message('file_already_exists', 'The file "' . $value . '" already exists.');
                       return false;
            }
		}
        }
    

    return true;
}

    /*********************************************************************************************/
	                             /*********************/
								 /*    pagination   */
								 /*******************/
	/*********************************************************************************************/
    public function pagination()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('Extractemail/pagination');
        $config['total_rows'] = $this->db->count_all('information');
        $config['per_page'] = 5;
        $config['num_links'] = 2;
        $config['use_page_numbers'] = false;
        $config['uri_segment'] = 0;

        $this->pagination->initialize($config);

        // Fetch data with pagination and pass it to your view
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->db->limit($config['per_page'], $offset);
        $this->load->model('extract_model');

        $data['information'] = $this->extract_model->get_information();

        $this->load->view('templets/header.php', $data);
        $this->load->view('contacts/index.php', $data);
        $this->load->view('templets/footer.php');
    }
	
	/*********************************************************************************************/
	                             /*********************/
								 /*    delet email   */
								 /*******************/
	/*********************************************************************************************/
    public function delete_email($id)
    {
        $this->load->model('extract_model');
        $this->extract_model->delete($id);
        redirect('index');
    }
	

/*********************************************************************************************/
	                             /*********************/
								 /*    search    */
								 /*******************/
/*********************************************************************************************/
public function search(){
	$this->load->model('extract_model');
	   $data['search']=$this->extract_model->search_email(trim($_GET['search']));
        $this->load->view('templets/header.php', $data);
        $this->load->view('contacts/search.php',$data);
        $this->load->view('templets/footer.php');

}

}
