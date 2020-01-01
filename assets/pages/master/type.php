</section>
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Jenis Sampah | Bank Sampah</h3>
                    <div class="pull-right">
                        <a class="btn btn-sm btn-success" title="tambah data" data-toggle="modal" data-target="#addType"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th>Nama</th>
                                <th width="50px">#</th>
                            </tr>
                        </thead>
                        <?php
                        $no  = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM `tabel_jenis`");
                        while ($res = mysqli_fetch_array($sql)) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$res['nama_jensam']?></td>
                                <td>
                                    <a href="?page=master&data=members&a=del&id=<?=$res['id_jensam']?>" onclick="return confirm('Yaking Ingin menghapus?')"><i class="fa fa-trash"></i></a>    
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
    <div class="modal fade" id="addType">
        <div class="modal-dialog">
            <form class="modal-content" action="" method="post">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close">&times;</button>
                    <div class="modal-title">Form Tambah Jenis Sampah</div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Jenis Sampah</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button> -->
                    <button type="submit" name="save" class="btn btn-sm btn-success">
                        <i class="fa fa-plus"></i>
                        <span>Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>