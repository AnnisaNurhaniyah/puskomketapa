<nav class="navbar navbar-light bg-success text-light">
  <a class="text-light" href="../landing_page">BERANDA</a>
  <a class="text-light" href="about">TENTANG</a>
  <a class="text-light" href="administrator/berita">ARTIKEL</a>
  <a class="text-light" href="">KARIR</a>
  <a class="text-light" href="">KONTAK</a>
  <a class="text-light" href="">PROGRAM</a>
  <a class="text-light" href="administrator/auth">LOG IN</a>
</nav>

<div class="card text-center m-3">
  <div class="card-header">
    <strong>Artikel</strong>
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
        <?php foreach($artikel as $atk): ?>
          
          <p><strong><?= $atk->judul; ?></strong>
          </p>
          
          <p><?= $atk->isi; ?>
          </p>

          <p><?= $atk->gambar; ?>
          </p>

          
        <?php endforeach; ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
