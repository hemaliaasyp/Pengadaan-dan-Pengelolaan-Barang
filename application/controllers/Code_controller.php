<?php defined('BASEPATH') or exit('No direct script access allowed');

class Code_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kode_model', 'Kode');
        
    }

    public function getCodebarang($id = null)
    {

        
        echo json_encode($this->Kode->getKode($id));
       
        
    }


}
