<?php
require_once(APPPATH . 'vendor/autoload.php');

function extract_email_addresses($file_path)
{
	$parser = new \Smalot\PdfParser\Parser();
	$pdf = $parser->parseFile($file_path);
	$text = $pdf->getText();

	$email_pattern = "/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/";
	preg_match_all($email_pattern, $text, $matches);

	return $matches[0];
}
