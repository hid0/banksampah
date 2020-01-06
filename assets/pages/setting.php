</section>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Pengaturan Akun</h3>
                    <div class="pull-right">
                        <a class="btn btn-xs btn-warning" title="Edit Password" data-toggle="modal" data-target="#changePass"><i class="fa fa-unlock"></i></a>
                    </div>
                </div>
                <form class="box-body" method="post" action="">
                    <?php
                    $user = $_SESSION['user'];
                    $sql = mysqli_query($conn, "SELECT * FROM `tabel_anggota` WHERE `tabel_anggota`.`username`='$user'");
                    while ($res = mysqli_fetch_array($sql)) {
                    ?>
                    <div class="form-group">
                        <!-- nama anggota -->
                        <label for="nama">Nama Lengkap</label>
                        <input type="hidden" name="id" value="<?=$res['no_anggota'];?>">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?=$res['nama_anggota'];?>">
                    </div>
                    <div class="form-group">
                        <!-- jenkel -->
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="">-- select --</option>
                            <option value="L" <?=$res['jenkel'] == 'L' ? "selected" : null ?>>Laki-laki</option>
                            <option value="P" <?=$res['jenkel'] == 'P' ? "selected" : null ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- alamat -->
                        <label for="al">Alamat</label>
                        <textarea name="alamat" id="al" cols="15" rows="3" class="form-control"><?=$res['alamat'];?></textarea>
                    </div>
                    <div class="form-group">
                        <!-- telp -->
                        <label for="telp">No.Telp</label>
                        <input type="text" name="telp" id="telp" class="form-control" value="<?=$res['telp'];?>">
                    </div>
                    <div class="form-group">
                        <!-- username -->
                        <label for="user">Username</label>
                        <input type="text" name="user" id="user" class="form-control" value="<?=$res['username'];?>" readonly>
                        <h6 class="help-block">Jika Ingin Mengganti Username Silahkan hubungi Administrator!!!</h6>
                    </div>
                    <div class="form-group">
                        <div class="pull-left">
                            <button type="submit" name="change" class="btn btn-success"><i class="fa fa-edit"></i> <span>Simpan</span></button>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="changePass">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" action="" method="post">
            <div class="modal-header">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <!-- password -->
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control">
                </div>
                <div class="form-group">
                    <!-- password -->
                    <label for="pass2">Password Confirmation</label>
                    <input type="password" name="pass2" id="pass2" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="submit" name="changePw" class="btn btn-success"><i class="fa fa-edit"></i> <span>Ubah</span></button>
                </div>
                <div class="pull-left">
                    <button class="btn btn-warning" data-dismiss="modal"><i class="fa fa-remove"></i> <span>Tutup</span></button>
                </div>
            </div>
        </form>
    </div>
</div>