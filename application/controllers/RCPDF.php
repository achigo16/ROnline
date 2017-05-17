<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RCPDF extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('RModel');
    }
    public function index(){
        $data['isi'] = $this->RModel->cek("tbconfig")->result();
        $this->load->view("RCConfig", $data);
    }
    function conPDF(){
        $this->load->view("RVCConfig");
    }
    function editPDF(){
        $id = array('Cid' => $this->uri->segment(3));
        $data['isi'] = $this->RModel->cari("tbconfig", $id)->row_array();
        $this->load->view('RVCCEdit', $data);
    }
    function deletePDF(){
        $id = array('Cid' => $this->uri->segment(3));
        $this->db->where($id);
        $this->db->delete('tbconfig');
        redirect(base_url("RCPDF"));
    }
    function SaveConPDF(){
        if($this->input->post('tipe') == "Footer"){
            $jenis = "F";
        }
        else if($this->input->post('tipe') == "Header"){
            $jenis = "H";
        }
        $id = $this->RModel->CKode("tbnilai", "Nkode_nilai", $jenis);
        $type = $this->input->post('type');
        if($type == "insert"){
            $data = array(
                'Cid' => $id,
                'Cnama' => $this->input->post('nama'),
                'Ctipe' => $this->input->post('tipe'),
                'Cisi' => $this->input->post('isi')
            );
        }
        else if($type == "update"){
            $id = array('Cid' => $this->input->post('id'));
            $data = array(
                'Cisi' => $this->input->post('isi')
            );
            $this->db->where($id);
        }
        $this->db->$type('tbconfig', $data);
        redirect(base_url("RCPDF"));
    }
}