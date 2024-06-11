<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h4>Profile</h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="container">
            <form id="contact" action="" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="fill-form">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="item">
                                        <div class="portfolio-item">
                                            <div class="thumb">
                                                <img src="<?= base_url('assets/images/profile/') . $user['user_image']; ?>"
                                                    alt="" class="rounded-circle" style="width:200px;height:200px;">
                                            </div>
                                            <div class="down-content">
                                                <h5><?= $user['user_name']; ?></h5>
                                                <span>Instructure</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div style="text-align:left;">
                                        <b>Email ID</b>
                                    </div>

                                    <div style="text-align:left;">
                                        <b>User ID</b>
                                    </div>

                                    <div>&nbsp;</div>

                                    <div style="text-align:left;">
                                        <b>Username</b>
                                    </div>

                                    <div style="text-align:left;">
                                        <span><?= $user['user_username']; ?></span>
                                    </div>

                                    <div>&nbsp;</div>

                                    <div style="text-align:left;">
                                        <b>Account Activated</b>
                                    </div>

                                    <div style="text-align:left;">
                                        <span>-</span>
                                    </div>



                                </div>

                                <div class="col-lg-3">
                                    <div style="text-align:left;">
                                        <span><?= $user['user_email']; ?></span>
                                    </div>

                                    <div style="text-align:left;">
                                        <?= $user['user_id']; ?>
                                    </div>

                                    <div>&nbsp;</div>

                                    <div style="text-align:left;">
                                        <b>Phone Number</b>
                                    </div>

                                    <div style="text-align:left;">
                                        <span><?= $user['user_phonenumber']; ?></span>
                                    </div>

                                    <div>&nbsp;</div>

                                    <div style="text-align:left;">
                                        <b>Last Login</b>
                                    </div>

                                    <div style="text-align:left;">
                                        <span><?= $user['user_lastlogin']; ?></span>
                                    </div>


                                </div>

                                <div class="col-lg-3">
                                    <div style="text-align:left;">
                                        &nbsp;
                                    </div>

                                    <div style="text-align:left;">
                                        &nbsp;
                                    </div>

                                    <div>&nbsp;</div>

                                    <div style="text-align:left;">
                                        <b>Address</b>
                                    </div>

                                    <div style="text-align:left;">
                                        <span><?= $user['user_address']; ?></span>
                                    </div>

                                    <div>&nbsp;</div>

                                    <div style="text-align:left;">
                                        <b>Download Counts</b>
                                    </div>

                                    <div style="text-align:left;">
                                        <span>-</span>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div>&nbsp;</div>
    <div>&nbsp;</div>


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

    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           
                                <b><h4>Print Report</h4></b>

                                <!-- <form class="form-inline" method="POST" action="">

                                    <div class="col col-sm-12 form-inline">

                                        <label>Date</label>
                                        <input type="date" class="form-control" placeholder="Start" name="tanggalawal" id="tanggalawal"
                                            value="<?php echo isset($_POST['tanggalawal']) ? $_POST['tanggalawal'] : '' ?>" onchange="displayDate1()" />
                                        <label>To </label>
                                        <input type="date" class="form-control" placeholder="End" name="tanggalakhir" id="tanggalakhir"
                                            value="<?php echo isset($_POST['tanggalakhir']) ? $_POST['tanggalakhir'] : '' ?>" onchange="displayDate2()"/>

                                        <div class="col col-sm-3">
                                            <button class="btn btn-success" name="search">Filter</button>


                                    </div>

                                </form> -->

                        </div>
                        <div class="card-body">
                            <!-- <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered">
                                    <thead class="thead-primary">
                                        <tr class="text-center">
                                            <th>Date & Time</th>
                                            <th>Personel using Helmet</th>
                                            <th>Personel not using Helmet</th>
                                            <th>Total Personel</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include'range.php'?>

                                    </tbody>
                                </table>
                            </div> -->

                            <?php echo form_open('c_report/filterlaporan') ?>
                            <input type="hidden" name="nilaifilter" value="1" class="form-control">
                            <label>Date</label>
                            <input type="date" class="form-control" placeholder="Start" name="tanggalawal"
                                id="tanggalawal2"
                                value="<?php echo isset($_POST['tanggalawal']) ? $_POST['tanggalawal'] : '' ?>" />
                            <label>To </label>
                            <input type="date" class="form-control" placeholder="End" name="tanggalakhir"
                                id="tanggalakhir2"
                                value="<?php echo isset($_POST['tanggalakhir']) ? $_POST['tanggalakhir'] : '' ?>" />
                            <br>
                            <div>
                                <button class="btn btn-primary" type="submit" value="Print"> Print
                                    Report</button>
                                <?php echo form_close() ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>