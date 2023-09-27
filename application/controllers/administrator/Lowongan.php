<?php

class Lowongan extends CI_Controller{

  public function index(){
    $data['lowongan'] = $this->lowongan_model->tampil_data('lowongan')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/lowongan', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function detail($id){
    $data['detail'] = $this->lowongan_model->ambil_id_lowongan($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/lowongan_detail', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_lowongan(){
    $data['lowongan'] = $this->lowongan_model->tampil_data('lowongan')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/lowongan_form', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_lowongan_aksi(){
    $this->_rules();
    if($this->form_validation->run() == FALSE){
      $this->tambah_lowongan();
    }
    else{
      $posisi           = $this->input->post('posisi');
      $deskripsi        = $this->input->post('deskripsi');
      $tgl_buka         = $this->input->post('tgl_buka');
      $tgl_tutup        = $this->input->post('tgl_tutup');
      
      $data = array(
        'posisi'         => $posisi,
        'deskripsi'      => $deskripsi,
        'tgl_buka'       => $tgl_buka,
        'tgl_tutup'      => $tgl_tutup,
      );

      $this->lowongan_model->insert_data($data, 'lowongan');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Lowongan pekerjaan berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/lowongan');
    }
  }

  public function update($id){
    $where = array('id_lowongan' => $id);

    $data['lowongan']   = $this->db->query("SELECT * FROM lowongan WHERE id_lowongan='$id'")->result();
    $data['detail']    = $this->lowongan_model->ambil_id_lowongan($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/lowongan_update', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function update_lowongan_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->update();
    }
    else{
      $id             = $this->input->post('id_lowongan');
      $posisi         = $this->input->post('posisi');
      $deskripsi      = $this->input->post('deskripsi');
      $tgl_buka       = $this->input->post('tgl_buka');
      $tgl_tutup      = $this->input->post('tgl_tutup');
      
      $data = array(
        'posisi'         => $posisi,
        'deskripsi'      => $deskripsi,
        'tgl_buka'       => $tgl_buka,
        'tgl_tutup'      => $tgl_tutup,
      );

      // print_r($data);
      // die;

      $where = array(
        'id_lowongan' => $id,
      );

      $this->lowongan_model->update_data($where, $data, 'lowongan');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Lowongan kerja berhasil diperbaharui
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/lowongan');
    }
  }

  public function delete($id){
    $where = array('id_lowongan' => $id);
    $this->lowongan_model->hapus_data($where, 'lowongan');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Lowongan kerja berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/lowongan');
  }

  public function _rules(){
    $this->form_validation->set_rules('posisi', 'posisi', 'required', [
      'required' => 'Posisi lowongan pekerjaan wajib diisi!'
    ]);
    $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', [
      'required' => 'Deskripsi lowongan pekerjaan wajib diisi!'
    ]);
    $this->form_validation->set_rules('tgl_buka', 'tgl_buka', 'required', [
      'required' => 'Tanggal buka pendaftaran wajib diisi!'
    ]);
    $this->form_validation->set_rules('tgl_tutup', 'tgl_tutup', 'required', [
      'required' => 'Tanggal tutup pendaftaran wajib diisi!'
    ]);
  }
}