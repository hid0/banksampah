</section>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data Anggota</h3>
                    <div class="pull-right">
                        <a href="?page=master&data=members" class="btn btn-sm btn-warning" title="Kembali"><i class="fa fa-chevron-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="box-body">
                    <?php 
                    $id = @$_GET['id'];
                    $sql = mysqli_query($conn, "SELECT * FROM `tabel_anggota` WHERE `no_anggota` = '$id'");
                    while ($res = mysqli_fetch_array($sql)) {
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama Anggota</label>
                            <input type="hidden" name="id"  value="<?=$res['no_anggota']?>">
                            <input type="text" class="form-control" name="nama" id="nama" value="<?=$res['nama_anggota']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control" required>
                                <option value="">-- select --</option>
                                <option value="L" <?=$res['jenkel'] == 'L' ? "selected" : null ?>>Laki-laki</option>
                                <option value="P" <?=$res['jenkel'] == 'P' ? "selected" : null ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="al">Alamat</label>
                            <textarea name="al" id="al" cols="15" rows="5" class="form-control"><?=$res['alamat']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telp">No.Telp</label>
                            <input type="text" class="form-control" min="11" name="telp" id="telp" value="<?=$res['telp']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" min="4" name="user" id="user" value="<?=$res['username']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" min="4" name="pass" id="pass" value="<?=$res['password']?>" placeholder="Kosongi Jika tidak diubah">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">-- select --</option>
                                <option value="admin" <?=$res['level'] == 'administrator' ? "selected" : null ?>>Administrator</option>
                                <option value="admin" <?=$res['level'] == 'admin' ? "selected" : null ?>>Admin</option>
                                <option value="member" <?=$res['level'] == 'member' ? "selected" : null ?>>Anggota</option>
                            </select>
                        </div>
                        <?php } ?>
                        <button type="submit" name="edit" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> <span>Edit</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>