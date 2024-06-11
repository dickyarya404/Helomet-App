<!DOCTYPE html>
<html>

<head>
    <title>Hellomet - Print Report</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="500x500" href="<?= base_url() ?>template/assets/images/hellomet.png">
    <title>Hellomet - <?= $title ?></title>
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>template/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>template/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>template/dist/css/style.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/assets/extra-libs/prism/prism.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- This page plugin CSS -->
    <link href="<?= base_url() ?>template/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Main content  -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <br>
                            </div>

                            <div class="text-center">
                                <div class="col-lg-4 offset-lg-4">
                                    <img src="<?= base_url(); ?>/assets/images/unugha-logo.png" alt="" style="width:300px;">
                                </div>
                            </div><br />
                            <div class="text-center">
                                <h4>
                                    Hellomet - AIoT for Helmet Detection
                                </h4>
                                <h5>Unugha Cilacap</h5> <br>
                            </div>

                            <div class="dropdown-divider"></div>
                            <div class="text-center">
                                <h5>
                                    <small><strong><?= $title ?></strong></small><br>
                                    <small><?= $subtitle ?></small>

                                </h5>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->

                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Personel using Helmet</th>
                                            <th>Personel not using Helmet</th>
                                            <th>Total Personel</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $grand_total = 0;
                                    foreach ($filter as $key => $value) {

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?php echo $value->dyear . " - " . $value->dmonth . " - "  . $value->dday ?>
                                            </td>

                                            <td><?php echo $value->wearing ?></td>
                                            <td><?php echo $value->notwearing ?></td>
                                            <td><?php echo $value->total ?></td>

                                            <!-- <td>
                                                <?php if ($value->stat == 0) { ?>
                                                    <i class="fas fa-check-circle" style="color: green;"></i><b style="color: green;">
                                                        Safe
                                                    <?php } else if ($value->stat == 1) { ?>
                                                        <i class="fas fa-exclamation-circle" style="color: yellow;"></i><b style="color: yellow;">
                                                            Warning
                                                        <?php } else if ($value->stat == 2) { ?>
                                                            <i class="fas fa-times-circle" style="color: red;"></i><b style="color: red;"> Not
                                                                Safe
                                                            <?php } ?>
                                            </td> -->

                                        </tr>

                                    <?php } ?>
                                    <tr>

                                        <!-- <td><strong>Grand Total</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><strong>Rp. <?= number_format($grand_total, 0) ?></strong></td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>


                    <!-- this row will not appear when printing -->
                </div>
            </div>
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->

    <script>
        window.print();
    </script>

</body>

</html>

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
    //document.getElementById("tanggalakhir").setAttribute("max", today);

    $(function() {
        $("#tanggalawal").on("change", function() {
            var selected = $(this).val();
            document.getElementById("tanggalakhir").setAttribute("min", selected);
        });
    });
</script>