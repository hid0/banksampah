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
</section>