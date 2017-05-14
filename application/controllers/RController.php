<?php
class RController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('RModel');
    }
    
    public function index(){
        $this->load->view("RVBeranda");
    }
}