<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-eye"></i> Detail Lowongan Kerja
  </div>

  <table class="table table-bordered table-hover table-striped">

    <?php foreach($detail as $dt): ?>
      <tr>
        <th>Posisi</th>
        <td><?= $dt->posisi; ?></td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <td><?= $dt->deskripsi; ?></td>
      </tr>
      <tr>
        <th>Tanggal Buka</th>
        <td><?= $dt->tgl_buka; ?></td>
      </tr>
      <tr>
        <th>Tanggal Tutup</th>
        <td><?= $dt->tgl_tutup; ?></td>
      </tr>

    <?php endforeach; ?>
  </table>

  <?= anchor('administrator/lowongan', '<div class="btn btn-primary btn-sm mb-5">Kembali</div>') ?>
  
</div>