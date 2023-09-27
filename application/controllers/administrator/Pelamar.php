<?php

class Pelamar extends CI_Controller{

  public function index(){
    $data['pelamar'] = $this->pelamar_model->tampil_data('pelamar')->result();

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/pelamar', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function detail($id){
    $data['detail'] = $this->pelamar_model->ambil_id_pelamar($id);
    $data['detail'] = $this->persyaratan_model->ambil_id_persyaratan($id);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/pelamar_detail', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function kirim_email($id){
    $where = array('id_hubungi'=>$id);
    $data['pelamar'] = $this->pelamar_model->kirim_data($where, 'pelamar')->result();

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/form_kirim_email', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function kirim_email_aksi(){
    $to_email = $this->input->post('email');
    $subject = $this->input->post('subject');
    $message = $this->input->post('pesan');

    $config = [
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'protocol'  => 'smtp',
      'smtp_host' => 'smtp.gmail.com',
      'smtp_user' => 'emai_pengirim@gmail.com',  // Email gmail
      'smtp_pass'   => '123456789',  // Password gmail
      'smtp_crypto' => 'ssl',
      'smtp_port'   => 465,
      'crlf'    => "\r\n",
      'newline' => "\r\n"
    ];

    $this->load->library('email', $config);

    $this->email->from('emai_pengirim@gmail.com', 'Universitas Pekanbaru');
    $this->email->to($to_email);
    $this->email->subject($subject);
    $this->email->message($message);

    if($this->email->send()){
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Pesan terkirim
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/hubungi_kami');
    }
    else{
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Pesan tidak terkirim
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('administrator/hubungi_kami');
    }
  }

  public function delete($id){
    $where = array('id_hubungi' => $id);
    $this->pelamar_model->hapus_data($where, 'pelamar');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data pesan user berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/hubungi_kami');
  }


}