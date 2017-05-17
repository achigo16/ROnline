<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RCController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('RModel');
    }
    public function index(){
        $data['siswa'] = $this->RModel->cek("tbsiswa")->result();
        $data['kelas'] = $this->RModel->cek("tbkelas")->result();
        $data['header'] = $this->RModel->cari("tbconfig", array('Ctipe' => "header"))->result();
        $data['footer'] = $this->RModel->cari("tbconfig", array('Ctipe' => "footer"))->result();
        $this->load->view('RVCetak', $data);
    }
    function RCPDF(){
        $this->load->helper(array('dompdf', 'file'));

        $data['siswa'] = $this->RModel->cari("tbsiswa", array('Snis' => $this->input->post('nis')))->row_array();
        $data['kelas'] = $this->RModel->cari("tbkelas", array('Kkode_kelas' => $this->input->post('kode_kelas')))->row_array();
        $data['header'] = $this->RModel->cari("tbconfig", array('Cid' => $this->input->post('header')))->row_array();
        $data['footer'] = $this->RModel->cari("tbconfig", array('Cid' => $this->input->post('footer')))->row_array();
        $data['nilai'] = $this->RModel->cariNilai("tbnilai", array('Nnis' => $this->input->post('nis'), 'Nkode_kelas' => $this->input->post('kode_kelas'), 'Nsemester' => $this->input->post('semester')))->result();
        $data['semester'] = $this->input->post('semester');
        $cek = $this->RModel->cari("tbnilai", array('Nnis' => $this->input->post('nis'), 'Nkode_kelas' => $this->input->post('kode_kelas'), 'Nsemester' => $this->input->post('semester')))->num_rows();

        $html = $this->load->view('RVCRaport', $data, true);

        $filename = 'Raport Siswa ';
        $paper = 'A4';
        $orientation = 'potrait';

        if($cek>0){
            pdf_create($html, $filename, $paper, $orientation);
        }
        else{
            redirect(base_url("RCController"));
        }
    }
}