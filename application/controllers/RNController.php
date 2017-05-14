<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RNController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('RModel');
    }
    public function index(){
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
        redirect(base_url("RNController"));
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
                redirect(base_url("RNController"));
            }
            if(!$cek2>0){
                redirect(base_url("RNController"));
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
        redirect(base_url("RNController"));
    }
    
}