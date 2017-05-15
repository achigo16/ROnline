<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RMController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model('RModel');
    }
    public function index(){
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
        redirect(base_url("RMController"));
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
        redirect(base_url("RMController"));
    }
    function RMExel(){
        $this->load->view('RMVExel');
    }
    function RMExSave(){
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
            $kode = $this->RModel->CKode("tbmapel", "Mkode_mapel", "M");
            $cek = $this->RModel->cari("tbmapel", array('Mnama_mapel' => $rowData[0][0]))->num_rows();
            if(!$cek > 0){
                $data = array(
                    'Mkode_mapel' => $kode,
                    'Mnama_mapel' => $rowData[0][0],
                    'Mkkm' => $rowData[0][1]
                );
                $insert = $this->db->insert("tbmapel", $data);
            }
        }
//        delete_files($data['file_path']);
        redirect(base_url("RMController"));
    }
    
}