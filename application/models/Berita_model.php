<?php

class Berita_model extends CI_Model{
  
  public $table = 'artikel';
  public $id    = 'id_artikel';
  public $order = 'DESC';

  public function tampil_data($table){
    return $this->db->get($table);
  }
}