    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © Unugha Cilacap 2024
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/owl-carousel.js"></script>
    <script src="<?= base_url(); ?>/assets/js/animation.js"></script>
    <script src="<?= base_url(); ?>/assets/js/imagesloaded.js"></script>
    <script src="<?= base_url(); ?>/assets/js/custom.js"></script>

    <!-- Additional Scripts Datatables -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>

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

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

    </body>


    </html>

    