</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Master Data Sampah</h3>
                    <div class="pull-right">
                        <a class="btn btn-sm btn-success" title="tambah anggota" data-toggle="modal" data-target="#addTrash"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th>Nama Sampah</th>
                                <th>Kategori</th>
                                <th>Berat</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Operator</th>
                                <th width="50px">#</th>
                            </tr>
                        </thead>
                        <?php
                        $no  = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM `tabel_sampah`");
                        while ($res = mysqli_fetch_array($sql)) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$res['nama_sampah']?></td>
                                <td><?=$res['id_jensam']?></td>
                                <td><?=idr($res['harga_beli'])?></td>
                                <td><?=idr($res['harga_jual'])?></td>
                                <td><?=$res['stok']?></td>
                                <td>
                                    <a href="?page=master&data=trash&a=edit&id=<?=$res['id_sampah']?>"><i class="fa fa-edit"></i></a>    
                                    <a href="?page=master&data=trash&a=del&id=<?=$res['id_sampah']?>" onclick="return confirm('Yaking Ingin menghapus?')"><i class="fa fa-trash"></i></a>    
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
    <div class="modal fade" id="addTrash">
        <div class="modal-dialog">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close">&times;</button>
                    <div class="modal-title">Form Tambah Sampah</div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Sampah</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="jensam">Jenis Sampah</label>
                        <!-- <input type="text" class="form-control" name="jk" id="jk" required> -->
                        <select name="jensam" id="jensam" class="form-control" required>
                            <option value="">-- Pilih --</option>
                        <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM `tabel_jenis`");
                        while ($res = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?=$res['id_jensam']?>"><?=$res['nama_jensam']?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="beli">Harga Beli</label>
                        <input type="text" class="form-control" name="beli" id="beli" required>
                    </div>
                    <div class="form-group">
                        <label for="jual">Harga Jual</label>
                        <input type="text" class="form-control" name="jual" id="jual" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" min="4" name="stok" id="stok" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button> -->
                    <button type="submit" name="save" class="btn btn-success"><i class="fa fa-plus"></i> <span>Tambah</span></button>
                </div>
            </form>
        </div>
    </div>