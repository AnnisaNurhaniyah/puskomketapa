<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-eye"></i> Detail Artikel
  </div>

  <table class="table table-bordered table-hover table-striped">

    <?php foreach($detail as $dt): ?>
      <img class="mb-2" src="<?= base_url('assets/uploads/').$dt->gambar; ?>" alt="" style="width:20%;">
      <tr>
        <th>Judul</th>
        <td><?= $dt->judul; ?></td>
      </tr>
      <tr>
        <th>Isi</th>
        <td><?= $dt->isi; ?></td>
      </tr>

    <?php endforeach; ?>
  </table>

  <?= anchor('administrator/artikel', '<div class="btn btn-primary btn-sm mb-5">Kembali</div>') ?>
  
</div>