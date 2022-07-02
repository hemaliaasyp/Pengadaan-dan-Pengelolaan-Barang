<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Jenis";
        $data['jenis'] = $this->admin->get('jenis');
        $this->template->load('templates/dashboard', 'jenis/data', $data);
    }

    // Validasi Edit
    private function validasie()
    {
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim');
        $this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'required|trim|max_length[2]|numeric');
    }


    // validasi atk
    private function _validasi()
    {
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim|is_unique[jenis.nama_jenis]');
        $this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'required|trim|max_length[2]|min_length[2]|numeric');
    }

    // validasi non atk
    private function validasi()
    {
        $this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'required|trim|max_length[1]|min_length[1]|numeric');
    }

    // Tambah ATK
    public function addatk()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis";
            $this->template->load('templates/dashboard', 'jenis/atk/addatk', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('jenis', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('jenis');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('jenis/atk/addatk');
            }
        }
    }

    // Tambah Non ATK
    public function addnonatk()
    {
        $this->validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis";
            $this->template->load('templates/dashboard', 'jenis/non_atk/add_nonatk', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('jenis', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('jenis');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('jenis/non_atk/add_nonatk');
            }
        }
    }

    // Edit ATK
    public function editatk($getId)
    {
        $id = encode_php_tags($getId);
        $this->validasie();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis";
            $data['jenis'] = $this->admin->get('jenis', ['id_jenis' => $id],);
           
            $this->template->load('templates/dashboard', 'jenis/atk/edit_atk', $data);
            
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('jenis', 'id_jenis', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('jenis');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('jenis/atk/edit_atk');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('jenis', 'id_jenis', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('jenis');
    }
}
