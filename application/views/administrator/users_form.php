<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-user"></i> Form Tambah Users
  </div>

  <form action="<?= base_url('administrator/users/tambah_users_aksi') ?>" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" placeholder="Masukkan username" class="form-control">
          <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="Masukkan password" class="form-control">
          <?= form_error('password', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" placeholder="Masukkan email" class="form-control">
          <?= form_error('email', '<div class="text-danger small">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Level</label>
          <select name="level" id="" class="form-control">
            <?php
            if($level == 'admin'){ ?>
            <option value="admin" selected>Admin</option>
            <option value="user" selected>User</option>
            <?php
            }
            elseif($level == 'user'){ ?>

            <option value="admin"selected>Admin</option>
            <option value="user" >User</option>
            <?php
            }
            else{ ?>

            <option value="admin">Admin</option>
            <option value="user"selected>User</option>
            <?php } ?>

          </select>
          <?= form_error('level', '<div class="text-danger small">', '</div>'); ?>
        </div>

        <!-- <div class="form-group">
          <label for="">Blokir</label>
          <select name="blokir" id="" class="form-control">
            <?php
            if($blokir == 'Y'){ ?>
            <option value="Y" selected>Ya</option>
            <option value="N">Tidak</option>
            <?php
            }
            elseif($blokir == 'N'){ ?>

            <option value="Y">Ya</option>
            <option value="N" selected>Tidak</option>
            <?php
            }
            else{ ?>

            <option value="Y">Ya</option>
            <option value="N">Tidak</option>
            <?php } ?>

          </select>
          <?= form_error('blokir', '<div class="text-danger small">', '</div>'); ?>
        </div> -->
    
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>