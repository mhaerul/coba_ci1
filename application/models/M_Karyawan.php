<?php 
    class M_Karyawan extends CI_Model{
        function tampil_data(){
            $this->db->select("karyawan.*, divisi.divisi as division");
            $this->db->from("karyawan");
            $this->db->join('divisi','karyawan.divisi = divisi.id','left');
            return $this->db->get()->result();
        }
        
        function get_divisi() {
            return $this->db->get('divisi')->result();
        }
    }
?>