<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NonAtk extends CI_Controller
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
        $data['title'] = "Non Atk";
        $data['nonatk'] = $this->admin->get('non_atk');
        $this->template->load('templates/dashboard', 'non_atk/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('jenis_nonatk', 'Jenis Non ATK', 'required|trim|is_unique[non_atk.jenis_nonatk]');
        $this->form_validation->set_rules('kode_nonatk', 'Kode Non AtK', 'required|trim|max_length[1]|numeric');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Non ATK";
            $this->template->load('templates/dashboard', 'non_atk/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('non_atk', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('nonatk');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('non_atk/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis Non ATK";
            $data['nonatk'] = $this->admin->get('non_atk', ['id_nonatk' => $id]);
            $this->template->load('templates/dashboard', 'non_atk/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('non_atk', 'id_nonatk', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('nonatk');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('non_atk/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('non_atk', 'id_nonatk', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('nonatk');
    }
}
