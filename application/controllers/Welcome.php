<?php





defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function parsePDF()
	{
		$parser = new \Smalot\PdfParser\Parser();
		$data[] = $this->contact_model->get_file();
		foreach ($data as $key => $item) {
			foreach ($item as $items) {
//				print_r($items['file']);
				$pdf = $parser->parseFile("./upload/" . $items['file']);
	    $text = $pdf->getText();
		 preg_match_all("/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]/", $text, $matches);
		 $email = $matches[0];
//		preg_split("/./", $email);
         $email = implode($email);
//		 echo $email;
		$name_and_address = strstr($email, '@', true);
//		echo $name_and_address;
//		$name=implode($name_and_address);
		$name = explode(".", $name_and_address);
        if (count($name) == 2) {
			$firstname = $name[0];
			$lastname = $name[1];
			echo "$firstname <br>";
			echo $lastname;
		} else {
			$firstname = $name[0];
			echo "$firstname <br>";

		}


	   }
		}
	}

}
