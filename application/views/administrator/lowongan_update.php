<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-briefcase"></i> Perbarui Lowongan Kerja
  </div>

  <?php foreach($lowongan as $loker): ?>
  <?= form_open_multipart('administrator/lowongan/update_lowongan_aksi'); ?>

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">POSISI</label>
          <input type="hidden" name="id_lowongan" value="<?= $loker->id_lowongan; ?>">
          <input type="text" name="posisi" class="form-control" value="<?= $loker->posisi; ?>">
          <?= form_error('posisi', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">DESKRIPSI</label>
          <input type="text" name="deskripsi" class="form-control" value="<?= $loker->deskripsi; ?>">
          <?= form_error('deskripsi', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">TANGGAL BUKA</label>
          <input type="date" name="tgl_buka" class="form-control" value="<?= $loker->tgl_buka; ?>">
          <?= form_error('tgl_buka', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">TANGGAL TUTUP</label>
          <input type="date" name="tgl_tutup" class="form-control" value="<?= $loker->tgl_tutup; ?>">
          <?= form_error('tgl_tutup', '<div class="text-danger small">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>

      </div>
    </div>

  <?php form_close(); ?>
  <?php endforeach; ?>
</div>