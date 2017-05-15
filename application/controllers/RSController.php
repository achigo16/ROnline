<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RSController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model('RModel');
    }
    public function index(){
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
        redirect(base_url("RSController"));
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
                redirect(base_url("RSController"));
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
        redirect(base_url("RSController"));
    }
    function RSExel(){
        $this->load->view('RSVExel');
    }
    function RSExSave(){
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
            $cek = $this->RModel->cari("tbsiswa", array('Snis' => $rowData[0][0]))->num_rows();
            if(!$cek > 0){
                $data = array(
                    'Snis' => $rowData[0][0],
                    'Snisn' => $rowData[0][1],
                    'Snama' => $rowData[0][2],
                    'Stempat' => $rowData[0][3],
                    'Stanggal' => date('Y-m-d', strtotime($rowData[0][4])),
                    'Sjk' => $rowData[0][5],
                    'Sagama' => $rowData[0][6],
                    'Skode_kelas' => $rowData[0][7],
                    'Salamat' => $rowData[0][8],
                    'Stelp' => $rowData[0][9],
                    'Sstatus' => $rowData[0][10]
                );
                $kelas = $this->RModel->cari("tbkelas", array('Kkode_kelas' => $rowData[0][7]))->row_array();
                $tambah = array('Kjumlah' => ($kelas['Kjumlah'] += 1));
                $this->db->where(array('Kkode_kelas' => $rowData[0][7]));
                $this->db->update('tbkelas', $tambah);
                $insert = $this->db->insert("tbsiswa",$data);
            }
        }
//        delete_files($data['file_path']);
        redirect(base_url("RSController"));
    }
}