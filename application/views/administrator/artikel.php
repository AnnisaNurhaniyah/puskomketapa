<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-newspaper"></i> Artikel
  </div>

  <?= $this->session->flashdata('pesan'); ?>

  <?= anchor('administrator/artikel/tambah_artikel', '<button class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus fa-sm"></i> Tambah Artikel</button>') ?>

  <table class="table table-striped table-hover table-borderd">
    <tr>
      <th>NO</th>
      <th>Judul</th>
      <th>Gambar</th>
      <th colspan="3">AKSI</th>
    </tr>

    <?php 
    $no = 1;
    foreach($artikel as $atk): ?>
    <tr>
      <td width="20px;"><?= $no++; ?></td>
      <td><?= $atk->judul; ?></td>
      <td><?= $atk->gambar; ?></td>
      <td width="20px"><?= anchor('administrator/artikel/detail/'.$atk->id_artikel, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
      <td width="20px"><?= anchor('administrator/artikel/update/'.$atk->id_artikel, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
      <td width="20px"><?= anchor('administrator/artikel/delete/'.$atk->id_artikel, '<div onclick="return confirm(\'Apakah anda yakin akan menghapus artikel?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>