<?php 

class DocketController extends CI_Controller
{
    public function make(){
        $this->load->library('ManagePDF');
        $this->managepdf->merge_all(['./uploads/CA_20240510.pdf','./uploads/CA_20240510.pdf', './uploads/CA_20240510.pdf'], "./uploads/final.pdf");
    }
}
