<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-info"></i> Form Tambah Informasi
  </div>

  <form action="<?= base_url('administrator/puskom/tambah_puskom_aksi') ?>" method="post">

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">Judul Informasi</label>
          <input type="text" name="judul_puskom" class="form-control" placeholder="Masukkan Judul Informasi">
          <?= form_error('judul_puskom', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Isi Informasi</label>
          <textarea name="isi_puskom" id="" cols="30" rows="3" class="form-control" placeholder="Masukkan Isi Informasi"></textarea>
          <?= form_error('isi_puskom', '<div class="text-danger small">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>

      </div>
    </div>
  </form>


</div>