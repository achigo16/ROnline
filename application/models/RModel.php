<?php
class RModel extends CI_Model{
    
    public function cek($table){
        if($table=="tbsiswa"){
            $this->db->select('*');
            $this->db->from($table);
            $this->db->join('tbkelas', 'tbsiswa.Skode_kelas = tbkelas.Kkode_kelas');
            $isi = $this->db->get();
            return $isi;
        }else if($table=="tbnilai"){
            $this->db->select('*');
            $this->db->from($table);
            $this->db->join('tbsiswa', 'tbsiswa.Snis = tbnilai.Nnis');
            $this->db->join('tbkelas', 'tbkelas.Kkode_kelas = tbnilai.Nkode_kelas');
            $this->db->join('tbmapel', 'tbmapel.Mkode_mapel = tbnilai.Nkode_mapel');
            $isi = $this->db->get();
            return $isi;
        }else{
            return $this->db->get($table);
        }
    }
    
    function cari($table, $data){
        return $this->db->get_where($table, $data);
    }
    
    function cariNilai($table, $data){
        if($table=="tbnilai"){
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($data);
            $this->db->join('tbmapel', 'tbmapel.Mkode_mapel = tbnilai.Nkode_mapel');
            $isi = $this->db->get();
            return $isi;
        }
    }
    
    function CKode($table, $data, $awal){
        $this->db->select('RIGHT('.$table.'.'.$data.',1) as kode', FALSE);
        $this->db->order_by($data,'DESC');    
        $this->db->limit(1);     
        $query = $this->db->get($table);
        if($query->num_rows() <> 0){  
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        }
        else{       
            $kode = 1;     
        }
        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
        $kodejadi = $awal.$kodemax;     
        return $kodejadi;  
    }
}