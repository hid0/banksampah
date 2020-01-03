</section>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Master Sampah</h3>
                    <div class="pull-right">
                        <a href="?page=master&data=trash" class="btn btn-sm btn-warning" title="Kembali"><i class="fa fa-chevron-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="box-body">
                    <?php
                    $id = @$_GET['id'];
                    $sql = mysqli_query($conn, "SELECT * FROM `tb_sampah` JOIN `tb_jenis` ON `tb_sampah`.`id_jenis`=`tb_jenis`.`id_jenis` WHERE `tb_sampah`.`id_sampah` = '$id'");
                    while ($res = mysqli_fetch_array($sql)) {
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="sampah">Nama Sampah</label>
                            <input type="hidden" class="form-control" name="id_sampah" id="id_sampah" value="<?=$res['id_sampah'];?>">
                            <select name="sampah" id="sampah" class="select2 form-control" style="width: 100%;" readonly>
                                <option value="<?=$res['id_jenis']?>"><?=$res['nama_jenis']?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ber">Berat</label>
                            <input type="number" class="form-control" name="ber" id="ber" value="<?=$res['berat'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lok">Lokasi</label>
                            <input type="text" class="form-control" name="lok" id="lok" value="<?=$res['lokasi'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <input type="date" class="form-control" name="tgl" id="tgl" value="<?=$res['tgl'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea name="ket" id="ket" cols="10" rows="3" class="form-control"><?=$res['ket'];?></textarea>
                        </div>
                        <?php } ?>
                        <button type="submit" name="ganti" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> <span>Edit</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>