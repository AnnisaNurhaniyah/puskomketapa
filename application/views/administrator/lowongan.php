<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-briefcase"></i> Lowongan Kerja
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <?= anchor('administrator/lowongan/tambah_lowongan', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah Loker</button>') ?>

  <table class="table table-striped table-hover table-borderd">
    <tr>
      <th>NO</th>
      <th>POSISI</th>
      <th>TANGGAL BUKA</th>
      <th>TANGGAL TUTUP</th>
      <th colspan="3">AKSI</th>
    </tr>

    <?php 
    $no = 1;
    foreach($lowongan as $loker): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $loker->posisi; ?></td>
      <td><?= $loker->tgl_buka; ?></td>
      <td><?= $loker->tgl_tutup; ?></td>
      <td width="20px"><?= anchor('administrator/lowongan/detail/'.$loker->id_lowongan, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
      <td width="20px"><?= anchor('administrator/lowongan/update/'.$loker->id_lowongan, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('administrator/lowongan/delete/'.$loker->id_lowongan, '<div onclick="return confirm(\'Apakah anda yakin akan menghapus lowongan?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>