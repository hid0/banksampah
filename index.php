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

                    // echo "$nama, $jk, $al, $telp, $user, $pass, $level";
                    $e = "INSERT INTO tabel_anggota (nama_anggota,jenkel,alamat,telp,username,password,level) VALUES ('$nama', '$jk', '$al', '$telp', '$user', '$pass', '$level')";
                    $sql = mysqli_query($conn, $e);
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
                    $nama   = trim(mysqli_real_escape_string($conn, $_POST['nama']));
                    $jensam = trim(mysqli_real_escape_string($conn, $_POST['jensam']));
                    $beli   = trim(mysqli_real_escape_string($conn, $_POST['beli']));
                    $jual   = trim(mysqli_real_escape_string($conn, $_POST['jual']));
                    $stok   = trim(mysqli_real_escape_string($conn, $_POST['stok']));

                    // $sql = mysqli_query($conn, "INSERT INTO tabel_sampah () VALUES ()")
                }
            } else if ($_GET['a'] == 'edit') {
                include "./assets/pages/_header.php";
                echo "<title>Master Sampah | Bank Sampah</title>";
                include "./assets/pages/master/trash.php";
                include "./assets/pages/_footer.php";
            } else if ($_GET['a'] == 'del') {
                $id = @$_GET['id'];
                mysqli_query($conn, "DELETE FROM `tabel_sampah` WHERE `tabel_sampah`.`id_sampah` = '$id'");
                echo "<script>alert('Data Terhapussss!!');</script>";
                echo "<script>document.location.href = '?page=master&data=trash';</script>";
            }

        } else if ($_GET['data'] == 'balance') {
            
            include "./assets/pages/_header.php";
            echo "<title>Master Tabungan | Bank Sampah</title>";
            include "./assets/pages/master/balance.php";
            include "./assets/pages/_footer.php";
            
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
} else if ($_GET['page'] == 'transaction') {
    
    if (isset($_SESSION['user'])) {
        if ($_GET['data'] == 'sell') {
            
            include "./assets/pages/_header.php";
            echo "<title>Data Penjualan | Bank Sampah</title>";
            include "./assets/pages/transaction/sell.php";
            include "./assets/pages/_footer.php";
            
        } else if ($_GET['data'] == 'buy') {
            
            include "./assets/pages/_header.php";
            echo "<title>Data Pembelian | Bank Sampah</title>";
            include "./assets/pages/transaction/buy.php";
            include "./assets/pages/_footer.php";
            
        }
    } else {
        echo "<script>document.location.href = '?page=auth&to=login';</script>";
    }
    
} else if ($_GET['page'] == 'settings') {
    
    if (isset($_SESSION['user'])) {
        include "./assets/pages/_header.php";
        echo "<title>Pengaturan | Bank Sampah</title>";
        include "./assets/pages/setting.php";
        include "./assets/pages/_footer.php";
    } else {
        echo "<script>document.location.href = '?page=auth&to=login';</script>";
    }
    
}