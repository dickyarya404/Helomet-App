<!-- End Container Fluid  -->
</div>

<footer class="footer text-center text-muted">
    <strong>Copyright &copy; <?= date('Y'); ?> <a>Hellomet - AIoT for Helmet Detection</a>.</strong> All rights
    reserved.
</footer>

<!-- End Page wrapper  -->
</div>

</div>



<script>
    function displayDate1() {
        var a = document.getElementById("tanggalawal").value;
        document.getElementById("tanggalawal2").value = a;
    }

    function displayDate2() {
        var a = document.getElementById("tanggalakhir").value;
        document.getElementById("tanggalakhir2").value = a;
    }
</script>

<script>
    var chBar = document.getElementById("chBar");
    if (chBar) {
        new Chart(chBar, {
            type: 'bar',
            data: {
                labels: ["S", "M", "T", "W", "T", "F", "S"],
                datasets: [{
                        data: [589, 445, 483, 503, 689, 692, 634],
                        backgroundColor: colors[0]
                    },
                    {
                        data: [639, 465, 493, 478, 589, 632, 674],
                        backgroundColor: colors[1]
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,
                        categoryPercentage: 0.5
                    }]
                }
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy',
                'csv',
                'excel',
                'pdf',
                'print'
            ]
        });
    });
</script>


<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="<?= base_url() ?>template/dist/js/app-style-switcher.js"></script>
<script src="<?= base_url() ?>template/dist/js/feather.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>

<script src="<?= base_url() ?>template/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="<?= base_url() ?>template/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>template/dist/js/custom.min.js"></script>


<!--This page plugins -->
<script src="<?= base_url() ?>template/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/datatable/datatable-basic.init.js"></script>
<script src="<?= base_url(); ?>assets/js/jamServer.js"></script>
<script src="<?= base_url(); ?>assets/js/chart-bar.js"></script>
<script src="<?= base_url(); ?>assets/js/chart-line.js"></script>



<!--This page JavaScript -->
<script src="<?= base_url() ?>template/assets/extra-libs/c3/d3.min.js"></script>
<script src="<?= base_url() ?>template/assets/extra-libs/c3/c3.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/chartist/dist/chartist.min.js"></script>

<script src="<?= base_url() ?>template/dist/js/pages/dashboards/dashboard1.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/dashboards/dashboard1.js"></script>

<!-- Chart JS -->
<!-- <script src="<?= base_url() ?>template/dist/js/pages/chartjs/chartjs.init.min.js"></script> -->
<script src="<?= base_url() ?>template/dist/js/pages/chartjs/chartjs.init.js"></script>
<script src="<?= base_url() ?>template/assets/libs/chart.js/dist/Chart.min.js"></script>

<!--Morris JavaScript -->
<script src="<?= base_url() ?>template/assets/libs/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/morris.js/morris.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/morris/morris-data.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script src="<?= base_url() ?>assets/library/moment.min.js"></script>
<script src="<?= base_url() ?>assets/library/daterangepicker.min.js"></script>
<script src="<?= base_url() ?>assets/library/Chart.bundle.min.js"></script>
<!-- <script src="<?= base_url() ?>assets/library/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/library/dataTables.bootstrap5.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</body>

</html>