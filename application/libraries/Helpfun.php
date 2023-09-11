<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helpfun extends CI_Controller  {
	public function extract_text($file_name){
		$parser = new \Smalot\PdfParser\Parser();

		$pdf = $parser->parseFile("./upload/" . $file_name);
		$text = $pdf->getText();

		preg_match_all("/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/", $text, $emails);
		$email = $emails[0];
		if (count($email) > 1)
		 {
			foreach ($email as $item) {
				if (filter_var($item, FILTER_VALIDATE_EMAIL)) {

					$name_and_address = strstr($item, '@', true);
					$name = explode(".", $name_and_address);
					if (count($name) == 2) {
						$firstname = $name[0];
						$lastname = $name[1];
						$q = $this->db->select('first_name', 'last_name')
							->from('information')
							->where(array('first_name' => $firstname, 'last_name' => $lastname, 'email' => $item))->get();
						if ($q->num_rows() == 0) {
							//insert goes here
							$data2 = [
								'first_name' => $firstname,
								'last_name' => $lastname,
								'email' => $item,
							];
							$this->db->insert('information', $data2);
							redirect('index');

						}

					} else {
						$firstname = $name[0];

						$q = $this->db->select('first_name')
							->from('information')
							->where(array('first_name' => $firstname, 'last_name' => null, 'email' => $item))->get();
						if ($q->num_rows() == 0) {
							//insert goes here
							$data2 = [
								'first_name' => $firstname,
								'email' => $item,
							];

							$this->db->insert('information', $data2);
							redirect('index');

						}
					}
				} else {
					redirect('index');
				}
			}
		} elseif (count($email) == 1)
		 {
			$email = implode($email);
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$name_and_address = strstr($email, '@', true);
				$name = explode(".", $name_and_address);
				if (count($name) == 2) {
					$firstname = $name[0];
					$lastname = $name[1];
					$q = $this->db->select('first_name', 'last_name', 'email')
						->from('information')
						->where(array('first_name' => $firstname, 'last_name' => $lastname, 'email' => $email))->get();
					if ($q->num_rows() == 0) {
						//insert goes here
						$data2 = [
							'first_name' => $firstname,
							'last_name' => $lastname,
							'email' => $email,
						];
						$this->db->insert('information', $data2);
						redirect('index');
					}
				} else {
					$firstname = $name[0];

					$q = $this->db->select('first_name')
						->from('information')
						->where(array('first_name' => $firstname, 'last_name' => null, 'email' => $email))->get();
					if ($q->num_rows() == 0) {
						//insert goes here
						$data2 = [
							'first_name' => $firstname,
							'email' => $email,
						];
						$this->db->insert('information', $data2);
						redirect('index');
					}
				}
			} else {

				redirect('index');

			}

		} else {
			redirect('index');
		}

	}
}
