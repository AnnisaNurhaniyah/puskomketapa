<nav class="navbar navbar-light bg-success text-light">
  <img class="navbar-brand text-light" src="assets/img/Icon_Puskom_Dengan_Arti.svg" alt="">
  <a class="text-light" href="">BERANDA</a>
  <a class="text-light" href="about">TENTANG</a>
  <a class="text-light" href="administrator/berita">ARTIKEL</a>
  <a class="text-light" href="">KARIR</a>
  <a class="text-light" href="">KONTAK</a>
  <a class="text-light" href="">PROGRAM</a>
  <a class="text-light" href="administrator/auth">LOG IN</a>
</nav>

<!-- beranda -->
<section>
  <div>
    <br>
    <br>
    <img src="assets/img/Group 1.png" width=600 height=400  style="float:right;">
    <div>
      <br>
      <h1 style="font-size:4em; color:black;"><b>PUSAT KOMANDO KETAHANAN PANGAN</h1>
      <br>
      <h4>Unit Kerja yang bertanggung jawab terhadap integritas data, penyajian informasi dan pemanfaatan data 
        Ketahanan Pangan Provinsi Jawa Barat untuk mendukung kegiatan monitoring dan informasi pangan.</h4>
        <br>
        <br>
        <br>
    </div>
  </div>
</section>
<!-- akhir beranda -->

<!-- tentang puskom -->
<div class="card text-center m-3">
  <div class="card-header">
    <strong>TENTANG PUSAT KOMANDO</strong>
  </div>
  <div class="card-body">
    <p class="card-text">
      Mari kenali lebih dalam tentang pusat komando ketahanan pangan yang ada di dinas ketahanan pangan dan 
      peternakan jawa barat.
    </p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Selengkapnya...
    </button>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Tentang Pusat Komando</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <?php foreach($puskom as $pkm): ?>
          
          <p><strong><?= $pkm->judul_puskom; ?></strong>
          </p>
          
          <p><?= $pkm->isi_puskom; ?>
          </p>

          
        <?php endforeach; ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- akhir tentang puskom -->

<!-- program -->
<section>
  <div>
    <br>
    <br>
    <a href="https://simawas.jabarprov.go.id" target="_blank">
    <img src="assets/img/simawas_pagi_icon.svg" width=500 height=400  style="float:left;">
    </a>
    <div>
      <h1 style="font-size:4em; color:black;"><b>PRODUK UNGGULAN</h1>
      <br>
      <h1 style="font-size:4em; color:black;"><b>SIMAWAS PAGI</h1>
      <br>
      <h4>SIMAWAS PAGI merupakan produk inovasi dari Pusat Komando Ketahanan Pangan Jawa Barat yang berupaya 
        secara integratif menjadi penyokong terwujudnya Ketahanan Pangan dan Gizi yang Berkelanjutan melalui 
        terobosan teknologi informasi, serta transformasi data digital.</h4>
        <br>
        <br>
        <br>
    </div>
  </div>
</section>
<!-- akhir program -->

<div class="row m-2">
  <?php foreach($informasi as $info): ?>
  <div class="col-md-3">
    <div class="card">
      <span class="display-2 text-center text-info"><i class="<?= $info->icon; ?>"></i></span>
      <div class="card-body text-center">
        <h5 class="card-title badge badge-primary"><?= $info->judul_informasi; ?></h5>
        <p class="card-text"><?= $info->isi_informasi; ?></p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#informasiModal">
          Selengkapnya...
        </button>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<form action="<?= base_url('landing_page/kirim_pesan') ?>" method="post">
  <div class="row mt-5 mb-5 ml-2 mr-2 justify-content-md-center">
    <div class="col-md-8">
      <div class="alert alert-primary">
        <i class="fas fa-envelope-open-text"></i> HUBUNGI KAMI
      </div>
      <?= $this->session->flashdata('pesan'); ?>

      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control">
        <?= form_error('nama', '<div class="text-danger small">', '</div>') ?>
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control">
        <?= form_error('email', '<div class="text-danger small">', '</div>') ?>
      </div>
      <div class="form-group">
        <label for="">Pesan</label>
        <textarea name="pesan" id="" cols="30" rows="3" class="form-control"></textarea>
        <?= form_error('pesan', '<div class="text-danger small">', '</div>') ?>
      </div>
      <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
  </div>
</form>
