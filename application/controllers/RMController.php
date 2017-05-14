<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RMController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
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
    
}