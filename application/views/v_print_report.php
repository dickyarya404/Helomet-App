<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h4>Print Report</h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>Report Available</th>
                                <th>Document</th>
                                <th>Download</th>
                                <th>Download Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->

</div>

<section id="section-to-print">
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="container">
            <div class="col-lg-12">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <div class="col-lg-4 offset-lg-4">
                                    <img src="<?= base_url(); ?>/assets/images/unugha-logo.png" alt="" style="width:300px;">
                                </div>
                            </div><br />
                            <div class="text-center">
                                <h4>
                                    Hellomet - AIoT for Helmet Detection
                                </h4>
                                <h5>Astra Polytechnic</h5> <br>
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

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date & Time</th>
                                        <th>Personel using Helmet</th>
                                        <th>Personel not using Helmet</th>
                                        <th>Total Personel</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $grand_total = 0;
                                    foreach ($filter as $key => $value) {

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?php echo date('D, d M Y - h:m', strtotime($value->dt_report_datetime)) ?>
                                            </td>

                                            <td><?php echo $value->dt_report_countusing ?></td>
                                            <td><?php echo $value->dt_report_countnotusing ?></td>
                                            <td><?php echo $value->dt_report_counttotal ?></td>
                                            <td>
                                                <?php if ($value->dt_report_status == 0) { ?>
                                                    <span class="badge rounded-pill bg-success"><i class="fa fa-check-circle"></i></span> <b style="color: green;">Safe</b>
                                                <?php } else if ($value->dt_report_status == 1) { ?>
                                                    <span class="badge rounded-pill bg-warning"><i class="fa fa-exclamation-circle"></i></span> <b style="color: yellow;">Warning</b>
                                                <?php } else if ($value->dt_report_status == 2) { ?>
                                                    <span class="badge rounded-pill bg-danger"><i class="fa fa-times-circle"></i></span>
                                                    <b style="color: red;">Not Safe</b><br>
                                                <?php } ?>
                                            </td>
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
    </div>
</section>

<section>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="container">
            <div class="col-lg-12">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="row no-print">
                            <div class="col-12">
                                <button class="btn btn-default" onclick="window.print()">Print Report</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>