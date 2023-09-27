<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-newspaper"></i> Form Tambah Artikel
  </div>

  <?= form_open_multipart('administrator/artikel/tambah_artikel_aksi'); ?>

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">Judul</label>
          <input type="text" name="judul" class="form-control" placeholder="Judul Artikel">
          <?= form_error('judul', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Isi</label>
          <input type="text" name="isi" class="form-control" placeholder="Isi Artikel">
          <?= form_error('isi', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Foto</label><br>
          <input type="file" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>

      </div>
    </div>

  <?php form_close(); ?>
</div>