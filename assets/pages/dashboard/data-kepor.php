</section>
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xl-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-users"></i>
                </span>
                <div class="info-box-content">
                    <div class="info-box-text">Anggota</div>
                    <div class="info-box-number">50</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xl-12">
            <div class="info-box">
                <span class="info-box-icon bg-red">
                    <i class="fa fa-dollar"></i>
                </span>
                <div class="info-box-content">
                    <div class="info-box-text">Balance</div>
                    <div class="info-box-number"><?=idr('4000000')?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xl-12">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <i class="fa fa-line-chart"></i>
                </span>
                <div class="info-box-content">
                    <div class="info-box-text">Transaction</div>
                    <div class="info-box-number">412</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xl-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue">
                    <i class="fa fa-trash"></i>
                </span>
                <div class="info-box-content">
                    <div class="info-box-text">Trash Total</div>
                    <div class="info-box-number">604 Kg</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">Master Data Sampah</div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover no-padding">
                        <thead>
                            <th>No.</th>
                            <th>Nama Sampah</th>
                            <th>Kategori</th>
                            <th>Berat</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Operator</th>
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
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box box-info box-solid">
                <div class="box-header with-border">Export Data</div>
            </div>
        </div>
    </div>
</section>