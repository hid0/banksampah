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
                    <table class="table table-bordered table-hover" id="trash">
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
                        $sql = mysqli_query($conn, "SELECT * FROM `tb_sampah` JOIN `tb_jenis` ON `tb_sampah`.`id_jenis`=`tb_jenis`.`id_jenis`");
                        while ($res = mysqli_fetch_array($sql)) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$no++;?>.</td>
                                <td><?=$res['nama_jenis'];?></td>
                                <td><?=$res['kategori'];?></td>
                                <td><?=$res['berat'];?></td>
                                <td><?=$res['lokasi'];?></td>
                                <td><?=$res['tgl'];?></td>
                                <td><?=$res['ket'];?></td>
                                <td><?=$res['operator'];?></td>
                                <td>
                                    <a class="btn btn-xs btn-warning" href="?page=master&data=trash&a=edit&id=<?=$res['id_sampah']?>"><i class="fa fa-edit"></i></a>    
                                    <a class="btn btn-xs btn-danger" href="?page=master&data=trash&a=del&id=<?=$res['id_sampah']?>" onclick="return confirm('Yaking Ingin menghapus?')"><i class="fa fa-trash"></i></a>    
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="box-footer">
                <?php
                // var_dump($sql);
                // echo $samp;
                // echo $ber;
                ?>
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
                        <label for="sampah">Nama Sampah</label>
                        <!-- <input type="text" class="form-control" name="jk" id="jk" required> -->
                        <select name="sampah" id="sampah" class="select2 form-control" style="width: 100%;" required>
                            <option value="">-- Pilih --</option>
                        <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM `tb_jenis`");
                        while ($res = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?=$res['id_jenis']?>"><?=$res['nama_jenis']?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ber">Berat</label>
                        <input type="number" class="form-control" name="ber" id="ber" required>
                    </div>
                    <div class="form-group">
                        <label for="lok">Lokasi</label>
                        <input type="text" class="form-control" name="lok" id="lok" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <input type="date" class="form-control" name="tgl" id="tgl" required>
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" id="ket" cols="10" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <button class="btn btn-warning" data-dismiss="modal"><i class="fa fa-remove"></i> <span>Tutup</span></button>
                    </div>
                    <div class="pull-right">
                        <button type="submit" name="save" class="btn btn-success"><i class="fa fa-plus"></i> <span>Tambah</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>