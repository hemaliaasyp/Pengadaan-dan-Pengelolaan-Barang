<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kode_model extends CI_Model
{


    public function getUniqueKode($id)
    {
        $jumlah = $this->db->get_where('barang', array('kode' => $id))->num_rows();
        for ($i = 1; $i <= $jumlah; $i++) {
            if (strlen($id) == 2) {
                $kodejumlah = $id . str_pad($i, 2, '0', STR_PAD_LEFT);
            } else {
                $kodejumlah = $id . str_pad($i, 3, '0', STR_PAD_LEFT);
            }


            $idkode = $this->db->get_where('barang', array('kode_barang ' => $kodejumlah))->num_rows();

            if ($idkode == 0) {
                return ['banyakbarang' => $i];
            }

            
        }
    }
    public function getKode($id)
    {
        $checkSameKode = $this->getUniqueKode($id);
        if ($checkSameKode != null) {
            return $checkSameKode;
            
        }
        else {
            $this->db->select("count('kode') as banyakbarang");
            $this->db->from('barang');
            $this->db->where('kode', $id);
            $jumlah = $this->db->get()->result_array()[0]['banyakbarang'];
            $jumlah += 1;
            return ['banyakbarang' => $jumlah];
    

        }
      
    }
   
}
