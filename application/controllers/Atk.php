<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atk extends CI_Controller
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
        $data['title'] = "ATK & Jasa";
        $data['atk'] = $this->admin->get('atk');
        $this->template->load('templates/dashboard', 'atk/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('jenis_atk', 'Jenis ATK', 'required|trim|is_unique[atk.jenis_atk]');
        $this->form_validation->set_rules('kode_atk', 'Kode AtK', 'required|trim|max_length[2]|min_length[2]|numeric');
    }
  public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis ATK & jasa";
            $this->template->load('templates/dashboard', 'atk/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('atk', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('atk');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('atk/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis ATK & Jasa";
            $data['atk'] = $this->admin->get('atk', ['id_atk' => $id]);
            $this->template->load('templates/dashboard', 'atk/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('atk', 'id_atk', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('atk');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('atk/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('atk', 'id_atk', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('atk');
    }
}
