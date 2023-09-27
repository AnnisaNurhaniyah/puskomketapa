<?php

class Berita extends CI_Controller{

  public function index(){
    $data['artikel'] = $this->artikel_model->tampil_data('artikel')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('administrator/berita', $data);
    $this->load->view('templates_administrator/footer');
  }
}