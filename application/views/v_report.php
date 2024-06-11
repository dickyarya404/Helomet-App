<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h4>Helmet Detection Report</h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <form class="form-inline" method="POST" action="">
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
                    </form><br>

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
                            <?php include'range.php'?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>