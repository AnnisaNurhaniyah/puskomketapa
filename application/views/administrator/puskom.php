<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-info"></i> Informasi Pusat Komando
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <?= anchor('administrator/puskom/tambah_puskom', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah Informasi</button>') ?>

  <table class="table table-striped table-hover table-borderd">
    <tr>
      <th>NO</th>
      <th>JUDUL INFORMASI</th>
      <th>ISI INFORMASI</th>
      <th colspan="2">AKSI</th>
    </tr>

    <?php 
    $no = 1;
    foreach($puskom as $pkm): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $pkm->judul_puskom; ?></td>
      <td><?= $pkm->isi_puskom; ?></td>
      <td width="20px"><?= anchor('administrator/puskom/update/'.$pkm->id_puskom, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('administrator/puskom/delete/'.$pkm->id_puskom, '<div onclick="return confirm(\'Yakin akan menghapus?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>