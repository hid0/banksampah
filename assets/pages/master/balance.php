</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Master Tabungan</h3>
                    <div class="pull-right">
                        <a class="btn btn-sm btn-success" title="tambah anggota" data-toggle="modal" data-target="#addMember"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th>No Anggota</th>
                                <th width="105px">Tanggal</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th width="50px">#</th>
                            </tr>
                        </thead>
                        <?php
                        $no  = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM `tabel_tabungan`");
                        while ($res = mysqli_fetch_array($sql)) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$res['no_anggota']?></td>
                                <td><?=$res['tgl']?></td>
                                <td><?=$res['jml']?></td>
                                <td><?=$res['ket']?></td>
                                <td>
                                    <a href="?page=master&data=members&a=edit&id=<?=$res['id_tabungan']?>"><i class="fa fa-edit"></i></a>    
                                    <a href="?page=master&data=members&a=del&id=<?=$res['id_tabungan']?>" onclick="return confirm('Yaking Ingin menghapus?')"><i class="fa fa-trash"></i></a>    
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
                        <input type="text" class="form-control" name="al" id="al" required>
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
                            <option value="admin">Administrator</option>
                            <option value="member">Anggota</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button> -->
                    <button type="submit" name="save" class="btn btn-success"><i class="fa fa-plus"></i> <span>Tambah</span></button>
                </div>
            </form>
        </div>
    </div>