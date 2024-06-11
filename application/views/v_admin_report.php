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
                <p class="text-justify">On this page you can filter and print the helmet-wearing data on personnel by
                    entering parameters in the form of the start date and end date of the event from the desired data.
                </p>
                <div class="col-0 align-self-right">
                    <!-- <form class="form-inline" method="POST" action="">

                    <div class="col col-sm-12 form-inline">

                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="Start" name="tanggalawal" id="tanggalawal"
                            value="<?php echo isset($_POST['tanggalawal']) ? $_POST['tanggalawal'] : '' ?>"
                            onchange="displayDate1()" />
                        <label>To </label>
                        <input type="date" class="form-control" placeholder="End" name="tanggalakhir" id="tanggalakhir"
                            value="<?php echo isset($_POST['tanggalakhir']) ? $_POST['tanggalakhir'] : '' ?>"
                            onchange="displayDate2()" />

                        <div class="col col-sm-3">
                            <button class="btn btn-success" name="search">Filter</button>

                        </div>
                    </div>

                </form> -->

                    <div class="form-inline">
                        <?php echo form_open('c_report/admin_filterlaporan') ?>
                        <input type="hidden" name="nilaifilter" value="1" class="form-control">
                        <input type="date" class="form-control" placeholder="Start" name="tanggalawal" id="tanggalawal2" value="<?php echo isset($_POST['tanggalawal']) ? $_POST['tanggalawal'] : '' ?>" />
                        -
                        <input type="date" class="form-control" placeholder="End" name="tanggalakhir" id="tanggalakhir2" value="<?php echo isset($_POST['tanggalakhir']) ? $_POST['tanggalakhir'] : '' ?>" />
                        <button class="btn btn-primary" type="submit" value="Print"> Print Report</button>
                        <?php echo form_close() ?>

                    </div>

                </div>

                <br><br>

            </div>
        </div>
    </div>
</div>

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
    document.getElementById("tanggalawal2").setAttribute("max", today);
    //document.getElementById("tanggalakhir2").setAttribute("max", today);

    $(function() {
        $("#tanggalawal2").on("change", function() {
            var selected = $(this).val();
            document.getElementById("tanggalakhir2").setAttribute("min", selected);
        });
    });
</script>