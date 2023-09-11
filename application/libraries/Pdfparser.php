<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once   'vendor/autoload.php'; // Load composer autoload

use setasign\Fpdi\Fpdi;

class PdfParser
{
	public function parse($file)
	{
		$pdf = new Fpdi(); // Create an instance of Fpdi

		$pageCount = $pdf->setSourceFile($file); // Set the source file
		$text = '';

		for ($i = 1; $i <= $pageCount; $i++) {
			$templateId = $pdf->importPage($i); // Import each page

			$text .= $pdf->extractText($templateId); // Extract text from the imported page
		}

		return $text;
	}
}
