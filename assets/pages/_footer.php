    </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer" style="height: 45px !important;">
            <!-- <div class="pull-right hidden-xs">
                        <b>Version</b> 2.4.0
                    </div> -->
            <strong>Copyright &copy; 2017 - <?= date('Y') ?> <a target="_blank" href="http://unisnu.ac.id">Bank Sampah</a>.</strong> All rights
            reserved.
        </footer>

    </div>
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/jquery.dataTables.min.js"></script>
        <script src="./assets/js/npm.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/adminlte.min.js"></script>
        <script src="./assets/js/dataTables.bootstrap.min.js"></script>
        <script src="./assets/js/bootstrap-datepicker.min.js"></script>
        <script src="./assets/js/select2.min.js"></script>
        <script>
            $(function () {
                $('#trash').DataTable({
                    'paging'      : true,
                    'lengthChange': false,
                    // "lengthMenu": [
                    //     [5, 10, 15, -1],
                    //     [5, 10, 15, "All"]
                    // ],
                    'searching'   : false,
                    'ordering'    : false,
                    'info'        : false,
                    'autoWidth'   : false
                });
                $('.select2').select2();
            });
        </script>
    </body>
</html>