<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-briefcase"></i> Form Tambah Lowongan Kerja
  </div>

  <?= form_open_multipart('administrator/lowongan/tambah_lowongan_aksi'); ?>

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">POSISI</label>
          <input type="text" name="posisi" class="form-control" placeholder="Posisi kerja">
          <?= form_error('posisi', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">DESKRIPSI</label>
          <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Pekerjaan">
          <?= form_error('deskripsi', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">TANGGAL BUKA</label>
          <input type="date" name="tgl_buka" class="form-control">
          <?= form_error('tgl_buka', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">TANGGAL TUTUP</label>
          <input type="date" name="tgl_tutup" class="form-control">
          <?= form_error('tgl_tutup', '<div class="text-danger small">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>

      </div>
    </div>

  <?php form_close(); ?>
</div>