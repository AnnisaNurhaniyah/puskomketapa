<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-newspaper"></i> Perbarui Artikel
  </div>

  <?php foreach($artikel as $atk): ?>
  <?= form_open_multipart('administrator/artikel/update_artikel_aksi'); ?>

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="">Judul</label>
          <input type="hidden" name="id_artikel" value="<?= $atk->id_artikel; ?>">
          <input type="text" name="judul" class="form-control" value="<?= $atk->judul; ?>">
          <?= form_error('judul', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Isi</label>
          <input type="text" name="isi" class="form-control" value="<?= $atk->isi; ?>" placeholder="Isi Artikel">
          <?= form_error('judul', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
            <img src="<?= base_url('assets/uploads/').$atk->gambar; ?>" style="width:20%;" placeholder="Isi Artikel">
          <label for="">Foto</label><br>
          <input type="file" name="userfile" value="<?= $atk->gambar; ?>">
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>

      </div>
    </div>

  <?php form_close(); ?>
  <?php endforeach; ?>
</div>