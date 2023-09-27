<?php

class Artikel extends CI_Controller{

  public function index(){
    $data['artikel'] = $this->artikel_model->tampil_data('artikel')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/artikel', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function detail($id){
    $data['detail'] = $this->artikel_model->ambil_id_artikel($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/artikel_detail', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_artikel(){
    $data['artikel'] = $this->artikel_model->tampil_data('artikel')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/artikel_form', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_artikel_aksi(){
    $this->_rules();
    if($this->form_validation->run() == FALSE){
      $this->tambah_artikel();
    }
    else{
      $judul           = $this->input->post('judul');
      $isi             = $this->input->post('isi');
      $gambar          = $_FILES['gambar'];
      if($gambar=''){
      }
      else{
        $config['upload_path']   = './assets/uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|tiff';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar')){
          echo "Gagal Upload!";
          die();
        }
        else{
          $gambar = $this->upload->data('file_name');
        }
      }

      $data = array(
        'judul'         => $judul,
        'isi'           => $isi,
        'gambar'        => $gambar,
      );

      $this->artikel_model->insert_data($data, 'artikel');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data artikel berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/artikel');
    }
  }

  public function update($id){
    $where = array('id_artikel' => $id);

    $data['artikel']   = $this->db->query("SELECT * FROM artikel WHERE id_artikel='$id'")->result();
    $data['detail']    = $this->artikel_model->ambil_id_artikel($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/artikel_update', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function update_artikel_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->update();
    }
    else{
      $id           = $this->input->post('id_artikel');
      $judul         = $this->input->post('judul');
      $isi           = $this->input->post('isi');
      $gambar         = $_FILES['userfile']['name'];
      if($gambar){
        $config['upload_path']   = './assets/uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|tiff';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('userfile')){
          $userfile = $this->upload->data('file_name');
          $this->db->set('gambar', $userfile);
        }
        else{
          echo "Gagal upload!";
        }
      }

      $data = array(
        'judul'         => $judul,
        'isi'           => $isi,
      );

      // print_r($data);
      // die;

      $where = array(
        'id_artikel' => $id,
      );

      $this->artikel_model->update_data($where, $data, 'artikel');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data artikel berhasil diperbaharui
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/artikel');
    }
  }

  public function delete($id){
    $where = array('id_artikel' => $id);
    $this->artikel_model->hapus_data($where, 'artikel');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data artikel berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/artikel');
  }

  public function _rules(){
    $this->form_validation->set_rules('judul', 'judul', 'required', [
      'required' => 'Judul artikel wajib diisi!'
    ]);
    $this->form_validation->set_rules('isi', 'isi', 'required', [
      'required' => 'Isi artikel wajib diisi!'
    ]);
  }
}