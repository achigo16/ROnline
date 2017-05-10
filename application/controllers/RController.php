<?php
class RController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('RModel');
    }
    
    public function index(){
        $this->load->view("RVBeranda");
    }
    
    //Siswa (RS)
        function RSiswa(){
            $data['isi'] = $this->RModel->cek("tbsiswa")->result();
            $this->load->view("RVSiswa", $data);
        }
        function RSInput(){
            $status = array('Kstatus' => "Y");
            $data['data_kelas'] = $this->RModel->cari("tbkelas", $status)->result();
            $this->load->view("RVSInput", $data);
        }
        function RSEdit(){
            $nis = array('Snis' => $this->uri->segment(3));
            $data['isi'] = $this->RModel->cari("tbsiswa", $nis)->row_array();
            $this->load->view('RVSEdit', $data);
        }
        function RSDelete(){
            $Snis = array('Snis' => $this->uri->segment(3));
            $Nnis = array('Nnis' => $this->uri->segment(3));
            $siswa = $this->RModel->cari("tbsiswa", $Snis)->row_array();
            $kelas = $this->RModel->cari("tbkelas", array('Kkode_kelas' => $siswa['Skode_kelas']))->row_array();
            $tambah = array('Kjumlah' => ($kelas['Kjumlah'] -= 1));
            $this->db->where(array('Kkode_kelas' => $siswa['Skode_kelas']));
            $this->db->update('tbkelas', $tambah);
            $this->db->where($Snis);
            $this->db->delete('tbsiswa');
            $this->db->where($Nnis);
            $this->db->delete('tbnilai');
            redirect(base_url("RController/RSiswa"));
        }
        function RSSave(){
            $type = $this->input->post('type');
            $tgl = date('Y-m-d', strtotime($this->input->post('tanggal')));
            if($type == "insert"){
                $data = array(
                    'Snis' => $this->input->post('nis'),
                    'Snisn' => $this->input->post('nisn'),
                    'Snama' => $this->input->post('nama'),
                    'Stempat' => $this->input->post('tempat'),
                    'Stanggal' => $tgl,
                    'Sjk' => $this->input->post('jk'),
                    'Sagama' => $this->input->post('agama'),
                    'Skode_kelas' => $this->input->post('kode_kelas'),
                    'Salamat' => $this->input->post('alamat'),
                    'Stelp' => $this->input->post('telp'),
                    'Sstatus' => "Y"
                );
                
                $kelas = $this->RModel->cari("tbkelas", array('Kkode_kelas' => $this->input->post('kode_kelas')))->row_array();
                $tambah = array('Kjumlah' => ($kelas['Kjumlah'] += 1));
                $this->db->where(array('Kkode_kelas' => $this->input->post('kode_kelas')));
                $this->db->update('tbkelas', $tambah);
                
                $cek = $this->RModel->cari("tbsiswa", array('Snis' => $this->input->post('nis')))->num_rows();
                if($cek>0){
                    redirect(base_url("RController/RSiswa"));
                }
            }
            else if($type == "update"){
                $nis = array('Snis' => $this->input->post('nis'));
                $data = array(
                    'Snama' => $this->input->post('nama'),
                    'Stempat' => $this->input->post('tempat'),
                    'Stanggal' => $tgl,
                    'Sjk' => $this->input->post('jk'),
                    'Sagama' => $this->input->post('agama'),
                    'Salamat' => $this->input->post('alamat'),
                    'Stelp' => $this->input->post('telp'),
                    'Sstatus' => $this->input->post('status')
                );
                $this->db->where($nis);
            }
            $this->db->$type('tbsiswa', $data);
            redirect(base_url("RController/RSiswa"));
        }
    //END Siswa
    
    //Kelas (RK)
        function RKelas(){
            $data['isi'] = $this->RModel->cek("tbkelas")->result();
            $this->load->view("RVKelas", $data);
        }
        function RKInput(){
            $data['kode'] = $this->RModel->CKode("tbkelas", "Kkode_kelas", "K");
            $this->load->view("RVKInput", $data);
        }
        function RKEdit(){
            $kode_kelas = array('Kkode_kelas' => $this->uri->segment(3));
            $data['isi'] = $this->RModel->cari("tbkelas", $kode_kelas)->row_array();
            $this->load->view('RVKEdit', $data);
        }
        function RKDelete(){
            $kode_kelas = array('Kkode_kelas' => $this->uri->segment(3));
            $cek1 = $this->RModel->cari("tbnilai", array('Nkode_kelas' => $this->uri->segment(3)))->num_rows();
            $cek2 = $this->RModel->cari("tbsiswa", array('Skode_kelas' => $this->uri->segment(3)))->num_rows();
            if(!$cek1>0 && $cek2<=0){
                $this->db->where($kode_kelas);
                $this->db->delete('tbkelas');
            }
            redirect(base_url("RController/RKelas"));
        }
        function RKSave(){
            $type = $this->input->post('type');
            if($type == "insert"){
                $data = array(
                    'Kkode_kelas' => $this->input->post('kode_kelas'),
                    'Kkelas' => $this->input->post('kelas'),
                    'Kjurusan' => $this->input->post('jurusan'),
                    'Kurutan' => $this->input->post('urutan'),
                    'Kkouta' => $this->input->post('kouta'),
                    'Kjumlah' => 0,
                    'Ktahun1' => $this->input->post('tahun1'),
                    'Ktahun2' => $this->input->post('tahun2'),
                    'Kstatus' => "Y"
                );
            }
            else if($type == "update"){
                $kode_kelas = array('Kkode_kelas' => $this->input->post('kode_kelas'));
                $data = array(
                    'Kkouta' => $this->input->post('kouta'),
                    'Kstatus' => $this->input->post('status')
                );
                if($this->input->post('kouta') < $this->input->post('jumlah')){
                    redirect(base_url("RController/RKelas"));
                }
                $this->db->where($kode_kelas);
            }
            $this->db->$type('tbkelas', $data);
            redirect(base_url("RController/RKelas"));
        }
    //END Kelas
    
    //Mata Pelajaran (RM)
        function RMapel(){
            $data['isi'] = $this->RModel->cek("tbmapel")->result();
            $this->load->view("RVMapel", $data);
        }
        function RMInput(){
            $data['kode'] = $this->RModel->CKode("tbmapel", "Mkode_mapel", "M");
            $this->load->view("RVMInput", $data);
        }
        function RMEdit(){
            $kode_mapel = array('Mkode_mapel' => $this->uri->segment(3));
            $data['isi'] = $this->RModel->cari("tbmapel", $kode_mapel)->row_array();
            $this->load->view('RVMEdit', $data);
        }
        function RMDelete(){
            $kode_mapel = array('Mkode_mapel' => $this->uri->segment(3));
            $cek = $this->RModel->cari("tbnilai", array('Nkode_mapel' => $this->uri->segment(3)))->num_rows();
            if(!$cek>0){
                $this->db->where($kode_mapel);
                $this->db->delete('tbmapel');
            }
            redirect(base_url("RController/RMapel"));
        }
        function RMSave(){
            $type = $this->input->post('type');
            if($type == "insert"){
                $data = array(
                    'Mkode_mapel' => $this->input->post('kode_mapel'),
                    'Mnama_mapel' => $this->input->post('nama'),
                    'Mkkm' => $this->input->post('kkm')
                );
            }
            else if($type == "update"){
                $kode_mapel = array('Mkode_mapel' => $this->input->post('kode_mapel'));
                $data = array(
                    'Mkkm' => $this->input->post('kkm')                    
                );
                $this->db->where($kode_mapel);
            }
            $this->db->$type('tbmapel', $data);
            redirect(base_url("RController/RMapel"));
        }
    //END Mata Pelajaran
    
    //Nilai (RN)
        function RNilai(){
            $data['isi'] = $this->RModel->cek("tbnilai")->result();
            $this->load->view("RVNilai", $data);
        }
        function RNInput(){
            $data['kode'] = $this->RModel->CKode("tbnilai", "Nkode_nilai", "N");
            $status = array('Kstatus' => "Y");
            $data['data_kelas'] = $this->RModel->cari("tbkelas", $status)->result();
            $status = array('Sstatus' => "Y");
            $data['data_siswa'] = $this->RModel->cari("tbsiswa", $status)->result();
            $data['data_mapel'] = $this->RModel->cek("tbmapel")->result();
            $this->load->view("RVNInput", $data);
        }
        function RNEdit(){
            $kode_nilai = array('Nkode_nilai' => $this->uri->segment(3));
            $data['data_nilai'] = $this->RModel->cari("tbnilai", $kode_nilai)->row_array();
            $data_nilai = $this->RModel->cari("tbnilai", $kode_nilai)->row_array();
            $data['data_siswa'] = $this->RModel->cari("tbsiswa", array('Snis' => $data_nilai['Nnis']))->row_array();
            $data['data_mapel'] = $this->RModel->cari("tbmapel", array('Mkode_mapel' => $data_nilai['Nkode_mapel']))->row_array();
            $data['data_kelas'] = $this->RModel->cari("tbkelas", array('Kkode_kelas' => $data_nilai['Nkode_kelas']))->row_array();
            $this->load->view('RVNEdit', $data);
        }
        function RNDelete(){
            $kode_nilai = array('Nkode_nilai' => $this->uri->segment(3));
            $this->db->where($kode_nilai);
            $this->db->delete('tbnilai');
            redirect(base_url("RController/RNilai"));
        }
        function RNSave(){
            $type = $this->input->post('type');
            if($type == "insert"){
                $data = array(
                    'Nkode_nilai' => $this->input->post('kode_nilai'),
                    'Nnis' => $this->input->post('nis'),
                    'Nkode_kelas' => $this->input->post('kode_kelas'),
                    'Nsemester' => $this->input->post('semester'),
                    'Nkode_mapel' => $this->input->post('kode_mapel'),
                    'Nnilai_harian' => $this->input->post('harian'),
                    'Nnilai_uts' => $this->input->post('uts'),
                    'Nnilai_uas' => $this->input->post('uas'),
                    'Nnilai_akhir' => ($this->input->post('harian')+$this->input->post('uts')+$this->input->post('uas'))/3,
                    'Nnilai_praktek' => $this->input->post('praktek'),
                    'Nnilai_sikap' => $this->input->post('sikap')
                );
                $cek1 = $this->RModel->cari("tbnilai", array('Nnis' => $this->input->post('nis'), 'Nkode_kelas' => $this->input->post('kode_kelas'), 'Nkode_mapel' => $this->input->post('kode_mapel'), 'Nsemester' => $this->input->post('semester')))->num_rows();
                $cek2 = $this->RModel->cari("tbsiswa", array('Snis' => $this->input->post('nis'), 'Skode_kelas' => $this->input->post('kode_kelas')))->num_rows();
                if($cek1>0){
                    redirect(base_url("RController/RNilai"));
                }
                if(!$cek2>0){
                    redirect(base_url("RController/RNilai"));
                }
            }
            else if($type == "update"){
                $kode_nilai = array('Nkode_nilai' => $this->input->post('kode_nilai'));
                $data = array(
                    'Nnilai_harian' => $this->input->post('harian'),
                    'Nnilai_uts' => $this->input->post('uts'),
                    'Nnilai_uas' => $this->input->post('uas'),
                    'Nnilai_akhir' => ($this->input->post('harian')+$this->input->post('uts')+$this->input->post('uas'))/3,
                    'Nnilai_praktek' => $this->input->post('praktek'),
                    'Nnilai_sikap' => $this->input->post('sikap')
                );
                $this->db->where($kode_nilai);
            }
            $this->db->$type('tbnilai', $data);
            redirect(base_url("RController/RNilai"));
        }
    //END Nilai
    
    //Cetak (RC)
        function RCetak(){
            $data['siswa'] = $this->RModel->cek("tbsiswa")->result();
            $data['kelas'] = $this->RModel->cek("tbkelas")->result();
            $this->load->view('RVCetak', $data);
        }
    //END Cetak
}