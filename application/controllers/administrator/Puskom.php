<?php

class Puskom extends CI_Controller{

  public function index(){
    $data['puskom'] = $this->puskom_model->tampil_data('puskom')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/puskom', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function detail($id){
    $data['detail'] = $this->puskom_model->ambil_id_puskom($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/puskom_detail', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_puskom(){
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/puskom_form');
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_puskom_aksi(){
    $this->_rules();
    if($this->form_validation->run() == FALSE){
      $this->tambah_puskom();
    }
    else{
      $id_puskom    = $this->input->post('id_puskom');
      $judul_puskom = $this->input->post('judul_puskom');
      $isi_puskom   = $this->input->post('isi_puskom');

      $data = array(
        'judul_puskom' => $judul_puskom,
        'isi_puskom'   => $isi_puskom,
      );

      $this->puskom_model->insert_data($data, 'puskom');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Informasi pusat komando berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/puskom');
    }
  }

  public function update($id){
    $where = array('id_puskom' => $id);
    $data['puskom']     = $this->puskom_model->edit_data($where, 'puskom')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/puskom_update', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function update_puskom_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id_puskom');
      $this->update($id);
    }
    else{
      $id           = $this->input->post('id_puskom');
      $judul_puskom = $this->input->post('judul_puskom');
      $isi_puskom   = $this->input->post('isi_puskom');

      $data = array(
        'judul_puskom' => $judul_puskom,
        'isi_puskom'   => $isi_puskom,
      );

      // print_r($data);
      // die;

      $where = array(
        'id_puskom' => $id,
      );

      $this->puskom_model->update_data($where, $data, 'puskom');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Informasi pusat komandi berhasil diperbaharui
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/puskom');
    }
  }

  public function delete($id){
    $where = array('id_puskom' => $id);
    $this->puskom_model->hapus_data($where, 'puskom');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Informasi pusat komando berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/puskom');
  }

  public function _rules(){
    $this->form_validation->set_rules('judul_puskom', 'judul_puskom', 'required', [
      'required' => 'Judul Informasi wajib diisi!'
    ]);
    $this->form_validation->set_rules('isi_puskom', 'isi_puskom', 'required', [
      'required' => 'Isi puskom wajib diisi!'
    ]);
  }
}