</section>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Pengaturan Akun</h3>
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
                    </div>
                    <div class="form-group">
                        <!-- password -->
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control" value="<?=$res['password'];?>">
                    </div>
                    <div class="form-group">
                        <div class="pull-left">
                            <button type="submit" name="save" class="btn btn-success"><i class="fa fa-save"></i> <span>Simpan</span></button>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</section>