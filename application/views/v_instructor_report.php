<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Helmet Report</li>
                    </ol>
                </nav><br>
                <h4 class="card-title">Helmet Personel Report</h4>
                <p class="text-justify">On this page you can filter helmet-wearing data on personnel by entering parameters such as start date and end date of the desired data and display them in a table.
                </p>
                <div class="col-0 align-self-right">
                    <form class="form-inline" method="POST" action="">

                        <input type="date" class="form-control" placeholder="Start" name="tanggalawal" id="tanggalawal" value="2022-11-17" onchange="displayDate1()" />
                        &nbsp; - &nbsp;
                        <input type="date" class="form-control" placeholder="End" name="tanggalakhir" id="tanggalakhir" value="2022-11-20" onchange="displayDate2()" />

                        <div class="col col-sm-3">
                            <button class="btn btn-success" name="search">Filter</button>
                        </div>

                    </form>

                    <!-- <div class="form-inline">
                        <?php echo form_open('c_report/admin_filterlaporan') ?>
                        <input type="hidden" name="nilaifilter" value="1" class="form-control">
                        <input type="date" class="form-control" placeholder="Start" name="tanggalawal" id="tanggalawal2"
                            value="<?php echo isset($_POST['tanggalawal']) ? $_POST['tanggalawal'] : '' ?>" />
                        -
                        <input type="date" class="form-control" placeholder="End" name="tanggalakhir" id="tanggalakhir2"
                            value="<?php echo isset($_POST['tanggalakhir']) ? $_POST['tanggalakhir'] : '' ?>" />
                        <button class="btn btn-primary" type="submit" value="Print"> Print Report</button>
                        <?php echo form_close() ?>

                    </div> -->
                    <br>
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>Date & Time</th>
                                <th>Personel using Helmet</th>
                                <th>Personel not using Helmet</th>
                                <th>Total Personel</th>
                                <th>Status</th>
                                <!-- <th style="width: 200px;">Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'rangesqlserver.php' ?>
                        </tbody>
                    </table>

                </div>

                <br><br>

            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable({
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ],
        });
    });
</script> -->

<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("tanggalawal").setAttribute("max", today);
    document.getElementById("tanggalakhir").setAttribute("max", today);

    $(function() {
        $("#tanggalawal").on("change", function() {
            var selected = $(this).val();
            document.getElementById("tanggalakhir").setAttribute("min", selected);
        });
    });
</script>