</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Data Anggota Bank Sampah</h3>
                    <div class="pull-right">
                        <a class="btn btn-sm btn-success" title="tambah anggota" data-toggle="modal" data-target="#addMember"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th>Nama</th>
                                <th width="10px">L/P</th>
                                <th>Alamat</th>
                                <th>No.Telp</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th width="80px">#</th>
                            </tr>
                        </thead>
                        <?php
                        $no  = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM `tabel_anggota`");
                        while ($res = mysqli_fetch_array($sql)) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$res['nama_anggota']?></td>
                                <td><?=$res['jenkel']?></td>
                                <td><?=$res['alamat']?></td>
                                <td><?=$res['telp']?></td>
                                <td><?=$res['username']?></td>
                                <td><?=$res['level']?></td>
                                <td>
                                    <a class="btn btn-xs btn-warning" href="?page=master&data=members&a=edit&id=<?=$res['no_anggota']?>"><i class="fa fa-edit"></i></a>    
                                    <a class="btn btn-xs btn-danger" href="?page=master&data=members&a=del&id=<?=$res['no_anggota']?>" onclick="return confirm('Yaking Ingin menghapus?')"><i class="fa fa-trash"></i></a>    
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- modal form add data -->
    <div class="modal fade" id="addMember">
        <div class="modal-dialog">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close">&times;</button>
                    <div class="modal-title">Form Tambah Anggota</div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Anggota</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <!-- <input type="text" class="form-control" name="jk" id="jk" required> -->
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="">-- select --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="al">Alamat</label>
                        <textarea name="al" id="al" cols="15" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No.Telp</label>
                        <input type="text" class="form-control" min="11" name="telp" id="telp" required>
                    </div>
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" class="form-control" min="4" name="user" id="user" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="text" class="form-control" min="4" name="pass" id="pass" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- select --</option>
                            <option value="administrator">Administrator</option>
                            <option value="admin">Admin</option>
                            <option value="member">Anggota</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
                    </div>
                    <div class="pull-right">
                        <button type="submit" name="save" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> <span>Tambah</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>