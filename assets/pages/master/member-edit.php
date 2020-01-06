</section>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data Anggota</h3>
                    <div class="pull-right">
                        <a href="?page=master&data=members" class="btn btn-sm btn-warning" title="Kembali"><i class="fa fa-chevron-left"></i> Kembali</a>
                        <a class="btn btn-sm btn-danger" title="Edit Password" data-toggle="modal" data-target="#changePass"><i class="fa fa-unlock"></i></a>
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