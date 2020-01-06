</section>
<?php
// anggota, jenis, banyak sampah, level 
$s1 = mysqli_query($conn, "SELECT * FROM `tabel_anggota`");
$s2 = mysqli_query($conn, "SELECT * FROM `tb_jenis`");
$s3 = mysqli_query($conn, "SELECT SUM(berat) as bobot FROM `tb_sampah`");
$member = mysqli_num_rows($s1);
$jenis = mysqli_num_rows($s2);
$bobot = mysqli_fetch_array($s3);
?>
<section class="content">
<div class="row">
        <div class="col-md-3 col-sm-6 col-xl-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-sitemap"></i>
                </span>
                <div class="info-box-content">
                    <div class="info-box-text">Level</div>
                    <div class="info-box-number">3</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xl-12">
            <div class="info-box">
                <span class="info-box-icon bg-red">
                    <i class="fa fa-balance-scale"></i>
                </span>
                <div class="info-box-content">
                    <div class="info-box-text">Jenis</div>
                    <div class="info-box-number"><?=$jenis;?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xl-12">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <i class="fa fa-users"></i>
                </span>
                <div class="info-box-content">
                    <div class="info-box-text">Anggota</div>
                    <div class="info-box-number"><?=$member;?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xl-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue">
                    <i class="fa fa-trash"></i>
                </span>
                <div class="info-box-content">
                    <div class="info-box-text">Sampah Total</div>
                    <div class="info-box-number"><?=$bobot['bobot'];?> Kg</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">Master Data Sampah</div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover no-padding" id="trash">
                        <thead>
                            <th width="5px">No.</th>
                            <th>Nama Sampah</th>
                            <th>Kategori</th>
                            <th>Berat</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Operator</th>
                        </thead>
                        <tbody>
                            <?php
                            $no  = 1;
                            $sql = mysqli_query($conn, "SELECT * FROM `tb_sampah` JOIN `tb_jenis` ON `tb_sampah`.`id_jenis`=`tb_jenis`.`id_jenis`");
                            while ($res = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?=$no++;?>.</td>
                                <td><?=$res['nama_jenis'];?></td>
                                <td><?=$res['kategori'];?></td>
                                <td><?=$res['berat'];?></td>
                                <td><?=$res['lokasi'];?></td>
                                <td><?=localdate($res['tgl']);?></td>
                                <td><?=$res['ket'];?></td>
                                <td><?=$res['operator'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box box-info box-solid">
                <div class="box-header with-border">Export Data</div>
                <div class="box-body">
                    <a href="?page=export&data=trash" class="btn btn-success">
                        <i class="fa fa-cloud-download"></i><span> Export Excel</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>