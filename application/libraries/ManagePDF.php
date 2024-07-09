<?php

use Clegginabox\PDFMerger\PDFMerger;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;

require_once FCPATH . 'vendor/autoload.php';

class ManagePDF
{
    public function merge_all($pdfs, $to)
    {
        try {
            $pm = new PDFMerger();
            //code...
            foreach ($pdfs as $file) {
                $pm->addPDF($file, 'all');
            }
            $pm->merge('file', $to);
        } catch (CrossReferenceException $th) {
            echo 'This PDF document probably uses a compression technique which is not supported! It supports only PDF version 1.4 & lesser.';
        } catch (Exception $e) {
            echo "Could not locate the PDF. Please re-upload the PDF or <a href=''>contact the administrator</a>.";
        }
    }
}
