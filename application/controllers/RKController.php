<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RKController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('RModel');
    }
    public function index(){
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
        redirect(base_url("RKController"));
    }
    function RKSave(){
            $type = $this->input->post('type');
            if($type == "insert"){
                $data = array(
                    'Kkode_kelas' => $this->input->post('kode_kelas'),
                    'Kkelas' => $this->input->post('kelas'),
                    'Kjurusan' => $this->input->post('jurusan'),
                    'Kurutan' => $this->input->post('urutan'),
                    'Kkuota' => $this->input->post('kuota'),
                    'Kjumlah' => 0,
                    'Ktahun1' => $this->input->post('tahun1'),
                    'Ktahun2' => $this->input->post('tahun2'),
                    'Kstatus' => "Y"
                );
            }
            else if($type == "update"){
                $kode_kelas = array('Kkode_kelas' => $this->input->post('kode_kelas'));
                $data = array(
                    'Kkuota' => $this->input->post('kuota'),
                    'Kstatus' => $this->input->post('status')
                );
                if($this->input->post('kuota') < $this->input->post('jumlah')){
                    redirect(base_url("RKController"));
                }
                $this->db->where($kode_kelas);
            }
            $this->db->$type('tbkelas', $data);
            redirect(base_url("RKController"));
        }
    
}