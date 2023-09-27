<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-info"></i> Perbarui Informasi
  </div>

  <?php foreach($puskom as $pkm): ?>

  <form action="<?= base_url('administrator/puskom/update_puskom_aksi') ?>" method="post">
  <div class="row">
    <div class="col-md-6">

      <div class="form-group">
        <label for="">Judul Informasi</label>
        <input type="text" name="judul_puskom" class="form-control" value="<?= $pkm->judul_puskom; ?>" placeholder="Masukkan Judul Informasi">
        <?= form_error('judul_puskom', '<div class="text-danger small">', '</div>'); ?>
      </div>
      <div class="form-group">
        <label for="">Isi Informasi</label>
        <input type="text" name="isi_puskom" class="form-control" value="<?= $pkm->isi_puskom; ?>" placeholder="Masukkan Isi Informasi">
        <?= form_error('isi_puskom', '<div class="text-danger small">', '</div>'); ?>
      </div>

      <button type="submit" class="btn btn-primary mb-5">Simpan</button>

    </div>
  </div>

  </form>


  <?php endforeach; ?>
</div>