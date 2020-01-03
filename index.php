<?php 

require('./assets/config/conf.php');

if($_GET['page'] == 'auth') {
    
    if ($_GET['to'] == 'login') {
        
        if (isset($_SESSION['user'])) {
            echo "<script>window.history.back();</script>";
            // echo "<script>document.location.href = '?page=dashboard';</script>";
        } else {
            echo "<title>Auth Login | Bank Sampah</title>";
            include "./assets/pages/auth/login.php";
            if (isset($_POST['login'])) {
                $user = trim(mysqli_real_escape_string($conn, $_POST['uname']));
                $pass = sha1(trim(mysqli_real_escape_string($conn, $_POST['passwd'])));
                $log  = mysqli_query($conn, "SELECT * FROM `tabel_anggota` WHERE `tabel_anggota`.`username`='$user' AND `tabel_anggota`.`password`='$pass'");
                $res  = mysqli_fetch_array($log);
                if (mysqli_num_rows($log) > 0) {
                    $_SESSION['user'] = $user;
                    $_SESSION['name'] = $res['nama_anggota'];
                    $_SESSION['level'] = $res['level'];
                    echo "<script>document.location.href = '?page=dashboard';</script>";
                } else {
                    echo "<script>alert('Login Anda Gagal');</script>";
                }
            }
        }
        
    } else if ($_GET['to'] == 'logout') {
        // logout
        unset($_SESSION['user']);
        unset($_SESSION['name']);
        unset($_SESSION['level']);
        echo "<script>document.location.href = '?page=auth&to=login';</script>";
    }
    
} else if ($_GET['page'] == 'dashboard') {
    
    if (isset($_SESSION['user'])) {
        include "./assets/pages/_header.php";
        echo "<title>Dashboard | Bank Sampah</title>";
        if ($_SESSION['level'] == 'administrator') {
            include "./assets/pages/dashboard/index.php";
        } else {
            include "./assets/pages/dashboard/data-kepor.php";
        }
        include "./assets/pages/_footer.php";
    } else {
        echo "<script>document.location.href = '?page=auth&to=login';</script>";
    }
    
} else if ($_GET['page'] == 'master') {
    
    if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'member') {
        echo "<script>document.location.href = '?page=404';</script>";
    } else {    
        if (isset($_SESSION['user'])) {
            if ($_GET['data'] == 'members') {
                
                if ($_GET['a'] == '') {
                    include "./assets/pages/_header.php";
                    echo "<title>Master Anggota | Bank Sampah</title>";
                    include "./assets/pages/master/members.php";
                    include "./assets/pages/_footer.php";
                    if (isset($_POST['save'])) {
                        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
                        $jk   = trim(mysqli_real_escape_string($conn, $_POST['jk']));
                        $al   = trim(mysqli_real_escape_string($conn, $_POST['al']));
                        $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));
                        $user = trim(mysqli_real_escape_string($conn, $_POST['user']));
                        $pass = sha1($_POST['pass']);
                        $level= trim(mysqli_real_escape_string($conn, $_POST['level']));

                        $sql = mysqli_query($conn, "INSERT INTO tabel_anggota (nama_anggota,jenkel,alamat,telp,username,password,level) VALUES ('$nama', '$jk', '$al', '$telp', '$user', '$pass', '$level')");
                        if ($sql) {
                            echo "<script>alert('Data Berhasil Ditambahkan!');</script>";
                            echo "<script>document.location.href = '?page=master&data=members';</script>";
                        } else {
                            echo "<script>alert('Data Gagal ditambah');</script>";
                        }
                    }
                } else if ($_GET['a'] == 'edit') {
                    include "./assets/pages/_header.php";
                    echo "<title>Edit Data Anggota | Bank Sampah</title>";
                    include "./assets/pages/master/member-edit.php";
                    include "./assets/pages/_footer.php";
                    if (isset($_POST['edit'])) {
                        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
                        $jk   = trim(mysqli_real_escape_string($conn, $_POST['jk']));
                        $al   = trim(mysqli_real_escape_string($conn, $_POST['al']));
                        $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));
                        $user = trim(mysqli_real_escape_string($conn, $_POST['user']));
                        $pass = sha1($_POST['pass']);
                        $level= trim(mysqli_real_escape_string($conn, $_POST['level']));

                        $sql = mysqli_query($conn, "UPDATE `tabel_anggota` SET `nama_anggota`='$nama', `jenkel`='$jk', `alamat`='$al', `telp`='$telp', `username`='$user', `password`='$pass', `level`='$level' WHERE `no_anggota`='$id'");
                        if ($sql) {
                            echo "<script>alert('Data Berhasil Diubah!');</script>";
                            echo "<script>document.location.href = '?page=master&data=members';</script>";
                        } else {
                            echo "<script>alert('Data Gagal diubah');</script>";
                        }
                    }
                    
                } else if ($_GET['a'] == 'del') {
                    $id = @$_GET['id'];
                    mysqli_query($conn, "DELETE FROM `tabel_anggota` WHERE `tabel_anggota`.`no_anggota` = '$id'");
                    echo "<script>alert('Data Terhapussss!!');</script>";
                    echo "<script>document.location.href = '?page=master&data=members';</script>";
                }

            } else if ($_GET['data'] == 'trash') {
                
                if ($_GET['a'] == '') {
                    include "./assets/pages/_header.php";
                    echo "<title>Master Sampah | Bank Sampah</title>";
                    include "./assets/pages/master/trash.php";
                    include "./assets/pages/_footer.php";
                    if (isset($_POST['save'])) {
                        $samp = trim(mysqli_real_escape_string($conn, $_POST['sampah']));
                        $ber  = trim(mysqli_real_escape_string($conn, $_POST['ber']));
                        $lok  = trim(mysqli_real_escape_string($conn, $_POST['lok']));
                        $tgl  = trim(mysqli_real_escape_string($conn, $_POST['tgl']));
                        $ket  = trim(mysqli_real_escape_string($conn, $_POST['ket']));
                        $oper = trim(mysqli_real_escape_string($conn, $_SESSION['name']));
                        
                        $sql = mysqli_query($conn, "INSERT INTO tb_sampah (id_sampah, id_jenis, berat, lokasi, tgl, ket, operator) VALUES ('', '$samp', '$ber', '$lok', '$tgl', '$ket', '$oper')");
                        
                        // if ($sql) {
                        //     echo "<script>alert('Data Berhasil Ditambahkan');</script>";
                        //     echo "<script>document.location.href = '?page=master&data=trash';</script>";
                        // } else {
                        //     echo "<script>alert('Data Gagal Ditambah');</script>";
                        // }
                    }
                } else if ($_GET['a'] == 'edit') {
                    include "./assets/pages/_header.php";
                    echo "<title>Edit Data Sampah | Bank Sampah</title>";
                    include "./assets/pages/master/trash-edit.php";
                    include "./assets/pages/_footer.php";
                } else if ($_GET['a'] == 'del') {
                    $id = @$_GET['id'];
                    mysqli_query($conn, "DELETE FROM `tb_sampah` WHERE `tb_sampah`.`id_sampah` = '$id'");
                    echo "<script>alert('Data Terhapussss!!');</script>";
                    echo "<script>document.location.href = '?page=master&data=trash';</script>";
                }

            } else if ($_GET['data'] == 'type') {

                if ($_GET['a'] == '') {
                    
                    include "./assets/pages/_header.php";
                    echo "<title>Master Jenis Sampah | Bank Sampah</title>";
                    include "./assets/pages/master/type.php";
                    include "./assets/pages/_footer.php";
                    if (isset($_POST['save'])) {
                        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
                        $cat  = trim(mysqli_real_escape_string($conn, $_POST['cat']));
                        $ket  = trim(mysqli_real_escape_string($conn, $_POST['ket']));
                        $sql = mysqli_query($conn, "INSERT INTO tb_jenis (nama_jenis, kategori, ket) VALUES ('$nama', '$cat', '$ket')");
                        if ($sql) {
                            echo "<script>alert('Data Berhasil Ditambahkan!');</script>";
                            echo "<script>document.location.href = '?page=master&data=type';</script>";
                        } else {
                            echo "<script>alert('Data Gagal ditambah');</script>";
                        }
                    }
                }
            }
        } else {
            echo "<script>document.location.href = '?page=auth&to=login';</script>";
        }
    }
} else if ($_GET['page'] == '404') {

    include "./assets/pages/_header.php";
    echo "<title>Access Denied | Bank Sampah</title>";
    include "./assets/pages/404.php";
    include "./assets/pages/_footer.php";

} else if ($_GET['page'] == 'settings') {
    
    if (isset($_SESSION['user'])) {
        include "./assets/pages/_header.php";
        echo "<title>Pengaturan | Bank Sampah</title>";
        include "./assets/pages/setting.php";
        include "./assets/pages/_footer.php";
    } else {
        echo "<script>document.location.href = '?page=auth&to=login';</script>";
    }
    
} else if ($_GET['page'] == 'export') {

    if ($_GET['data'] == 'trash') { ?>
        <table border="1" style="width: 100%;border-collapse:collapse;">
            <thead>
                <tr>
                    <th width="5px">No.</th>
                    <th>Nama Sampah</th>
                    <th>Kategori</th>
                    <th>Berat</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Operator</th>
                </tr>
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
                    <td><?=$res['berat'];?> Kg</td>
                    <td><?=$res['lokasi'];?></td>
                    <td><?=localdate($res['tgl']);?></td>
                    <td><?=$res['ket'];?></td>
                    <td><?=$res['operator'];?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php
    export_excel('BankSampah-Data-'.date('Y').'-'.time().'.xls');
    }
    
}
?>
