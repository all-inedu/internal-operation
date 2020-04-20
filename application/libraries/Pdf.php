<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once APPPATH . '/third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf as Dompdf;
class Pdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='potrait'){
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }
}
?>