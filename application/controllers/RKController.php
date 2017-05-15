<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RKController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
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
    function RKExel(){
        $this->load->view('RKVExel');
    }
    function RKExSave(){
        $fileName = time().$_FILES['file']['name'];
         
        $config['upload_path'] = './asset/temp/'; 
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload', $config);
         
        if(! $this->upload->do_upload('file')){
            $this->upload->display_errors();
        }
        
        $data = $this->upload->data();
        $inputFileName = './asset/temp/'.$data['file_name'];
        
        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        
        for ($row = 2; $row <= $highestRow; $row++){   
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $kode = $this->RModel->CKode("tbkelas", "Kkode_kelas", "K");
            $cek = $this->RModel->cari("tbkelas", array('Kkelas' => $rowData[0][0], 'Kjurusan' => $rowData[0][1], 'Kurutan' => $rowData[0][2],'Ktahun1' => $rowData[0][4],'Ktahun2' => $rowData[0][5]))->num_rows();
            if(!$cek > 0){
                $data = array(
                    'Kkode_kelas' => $kode,
                    'Kkelas' => $rowData[0][0],
                    'Kjurusan' => $rowData[0][1],
                    'Kurutan' => $rowData[0][2],
                    'Kjumlah' => 0,
                    'Kkuota' => $rowData[0][3],
                    'Ktahun1' => $rowData[0][4],
                    'Ktahun2' => $rowData[0][5],
                    'Kstatus' => $rowData[0][6]
                );
                $insert = $this->db->insert("tbkelas",$data);
            }
        }
        unlink($inputFileName);
        redirect(base_url("RKController"));
    }
}