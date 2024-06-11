<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
    $url1 = $_SERVER['HTTP_HOST'];
    $url1 = $_SERVER['REQUEST_URI'];
    $url;
}
$page = $url;
$sec = "20"
?>
<!-- <meta http-equiv="refresh" content="<?php echo $sec; ?>" URL="<?php echo $page; ?>"> -->
<div class="col-7 align-self-center">
    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome, <?= $user['user_name']; ?></h3>
    <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a>Dashboard</a></br></br>
                </li>
            </ol>
        </nav>
    </div>
</div>

<?php
$serverName = "LAPTOP-9FK4RQP7";
$uid = "admin";
$pwd = "admin123";
$databaseName = "hellomet";

$connectionInfo = array(
    "UID" => $uid,
    "PWD" => $pwd,
    "Database" => $databaseName
);

#$con = mysqli_connect("localhost", "root", "", "hellomet"); //for mysql
$conn = sqlsrv_connect($serverName, $connectionInfo); //for sql server

if (!$conn) {
    echo "Problem in database connection..." . sqlsrv_error();
} else {
    $sql = "SELECT TOP 5 * FROM tb_dt_report ORDER BY dt_report_id";
    $sql2 = "SELECT TOP 5 dt_report_datetime, SUM (dt_report_countusing) as sumcountusing, SUM (dt_report_countnotusing) as sumcountnotusing FROM  tb_dt_report 
    GROUP BY tb_dt_report.dt_report_datetime 
    ORDER BY tb_dt_report.dt_report_datetime ASC";
    $result = sqlsrv_query($conn, $sql);
    $result2 = sqlsrv_query($conn, $sql2);
    $chart_data = "";
    while ($row = sqlsrv_fetch_array($result)) {
        $datetime[] =  $row['dt_report_datetime']->format('Y-m-d H:i:s');
        $countusing[] = $row['dt_report_countusing'];
        $countnotusing[] = $row['dt_report_countnotusing'];
    }

    while ($row = sqlsrv_fetch_array($result2)) {
        $datetime2[] =  $row['dt_report_datetime']->format('Y-m-d H:i:s');
        $countusing2[] = $row['sumcountusing'];
        $countnotusing2[] = $row['sumcountnotusing'];
    }
}


?>


<div class="card-group">
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center"></br></br>
                        <h4 class="text-dark mb-1 font-weight-medium" id="occurencetime">

                        </h4>
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Occurrence Time</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="clock"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h1 class="text-dark mb-1 font-weight-medium" id="wearinghelmet">
                        </h1>
                        <input type="hidden" id="wearTxt" value="<?= $dashboard1->dt_report_countusing ?>">
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Wearing Helmet</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="check-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h1 class="text-dark mb-1 font-weight-medium" id="notwearinghelmet">
                        </h1>
                        <input type="hidden" id="notwearTxt" value="<?= $dashboard1->dt_report_countnotusing ?>">
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Not Wearing Helmet</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="x-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center"></br></br>
                        <h3 class="text-dark mb-1 font-weight-medium" id="status">

                        </h3>
                    </div></br>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Status Area</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="info"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!-- <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Percentage of Total Personnel with latest data</h4>
                <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                <ul class="list-style-none mb-0">
                    <li class="mt-3">
                        <i class="fas fa-circle text-danger font-10 mr-2"></i>
                        <span class="text-muted">Wearing Helmet</span>
                        <span class="text-dark float-right font-weight-medium"><?= $dashboard1->dt_report_countusing ?>
                            Personel</span>
                    </li>
                    <li class="mt-3">
                        <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                        <span class="text-muted">Not Wearing Helmet</span>
                        <span class="text-dark float-right font-weight-medium"><?= $dashboard1->dt_report_countnotusing ?>
                            Personel</span>
                    </li></br>
                </ul>
            </div>
        </div>
    </div> -->


    <!-- <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Frequency of Helmet-wearing</h4>
                <div>
                    <canvas id="chart" style="height:283px; width:100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Fluctuations of Helmet-wearing</h4>


                <canvas id="linechart" style="height:283px; width:100%;"></canvas>
            </div>
        </div>
    </div> -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Graph of Last 5 times Helmet-wearing</h4>


                <!-- <canvas id="chart" style="height:283px; width:100%;"></canvas> -->
                <canvas id="linechart" style="height:100%; width:100%;"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Period Helmet-wearing Chart</h4>
                <!-- <div style="height:100%; width:250px;">
                    <input type="text" id="daterange_textbox" class="form-control" readonly />
                </div> -->
                <!-- <canvas id="bar_chart" height="40"> </canvas> -->
                <form action="<?php echo base_url(); ?>c_admin/" method="POST">
                    <div class="row align-items-center">
                        <br>
                        <div class="col-auto">
                            <input type="date" class="form-control" name="tanggalawal" id="tanggalawal" value="<?php echo isset($_POST['tanggalawal']) ? $_POST['tanggalawal'] : '' ?>" required="">
                        </div>
                        <div class="col-auto">
                            -
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control" name="tanggalakhir" id="tanggalakhir" value="<?php echo isset($_POST['tanggalakhir']) ? $_POST['tanggalakhir'] : '' ?>" required="">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" type="submit" name="filter">Filter</button>
                            <a href="">
                                <button class="btn btn-danger" type="button">Reset</button>
                            </a>
                        </div>
                    </div>
                </form>

                <!-- <canvas id="chart" style="height:100px; width:100%;"></canvas> -->
            </div>
        </div>
    </div>

    <div class="col-lg-5 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pie Chart of Helmet-wearing</h4>

                <div class="mt-4 chartjs-chart">
                    <canvas id="chart" height="200px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bar Chart of Helmet-wearing</h4>

                <div class="mt-4 chartjs-chart">
                    <canvas id="bar" height="200px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Helmet-wearing Report Table</h4>
                <p class="text-justify">In this table you can see reports of helmet-wearing within a certain time range
                </p>
                <table id="myTable" class="table table-striped table-bordered no-wrap">
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
                        <!-- <?php include 'rangesqlserver.php' ?> -->

                        <?php

                        if (isset($_POST['filter'])) {
                            $date1 = date("Y-m-d", strtotime($_POST['tanggalawal']));
                            $date2 = date("Y-m-d", strtotime($_POST['tanggalakhir']));
                            $sql = "SELECT * FROM  tb_dt_report WHERE tb_dt_report.dt_report_datetime between '$date1' and '$date2' ORDER BY tb_dt_report.dt_report_datetime ASC";
                            $query = sqlsrv_query($conn, $sql);
                            //$row=sqlsrv_num_rows($query);
                            $row = 1;
                            if ($row > 0) {
                                while ($fetch = sqlsrv_fetch_array($query)) {
                        ?>
                                    <tr>
                                        <td><?php echo $fetch['dt_report_datetime']->format("Y-m-d H:i:s") ?></td>
                                        <td><?php echo $fetch['dt_report_countusing'] ?></td>
                                        <td><?php echo $fetch['dt_report_countnotusing'] ?></td>
                                        <td><?php echo $fetch['dt_report_counttotal'] ?></td>
                                        <td class="text-center">
                                            <?php if ($fetch['dt_report_status'] == 0) { ?>
                                                <i class="fas fa-check-circle" style="color: green;"></i><b style="color: green;">
                                                    Safe
                                                <?php } else if ($fetch['dt_report_status'] == 1) { ?>
                                                    <i class="fas fa-exclamation-circle" style="color: yellow;"></i><b style="color: yellow;">
                                                        Warning
                                                    <?php } else if ($fetch['dt_report_status'] == 2) { ?>
                                                        <i class="fas fa-times-circle" style="color: red;"></i><b style="color: red;"> Not
                                                            Safe
                                                        <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                echo '
                                    <tr>
                                        <td colspan = "4"><center>Record Not Found</center></td>
                                    </tr>';
                            }
                        } else {
                            $query = sqlsrv_query($conn, "SELECT * FROM tb_dt_report");
                            while ($fetch = sqlsrv_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $fetch['dt_report_datetime']->format("Y-m-d H:i:s") ?></td>
                                    <td><?php echo $fetch['dt_report_countusing'] ?></td>
                                    <td><?php echo $fetch['dt_report_countnotusing'] ?></td>
                                    <td><?php echo $fetch['dt_report_counttotal'] ?></td>
                                    <td class="text-center">
                                        <?php if ($fetch['dt_report_status'] == 0) { ?>
                                            <i class="fas fa-check-circle" style="color: green;"></i><b style="color: green;">
                                                Safe
                                            <?php } else if ($fetch['dt_report_status'] == 1) { ?>
                                                <i class="fas fa-exclamation-circle" style="color: yellow;"></i><b style="color: yellow;">
                                                    Warning
                                                <?php } else if ($fetch['dt_report_status'] == 2) { ?>
                                                    <i class="fas fa-times-circle" style="color: red;"></i><b style="color: red;"> Not
                                                        Safe
                                                    <?php } ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">A Timed Helmet-wearing Chart</h4>
                <div style="height:100%; width:250px;">
                    <input type="text" id="daterange_textbox" class="form-control" readonly />
                </div> -->

<!-- <canvas id="chart" style="height:283px; width:100%;"></canvas> -->
<!-- <canvas id="bar_chart" height="40"> </canvas>

                <div class="col-lg-12 col-md-12">
                    <div>
                        <h2>&nbsp;</h2>
                    </div>
                    <table class="table table-striped table-bordered" id="order_table" name="order_table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Datetime</th>
                                <th>Count Using</th>
                                <th>Count Not Using</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->


</div>


<!-- <script>
    function getbeat(url) {
        $.ajax({
            async: false,
            url: url,
            method: "POST",
            success: function(data) {
                result = data;
            },
        });
        return result
    }

    var data = getbeat("c_admin/dashboard");
    console.log(data);
</script> -->

<!-- bar chart -->
<!-- <script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($datetime); ?>,
            datasets: [{
                    label: 'Wearing Helmet',
                    backgroundColor: '#ff4f70',
                    borderColor: '#ff4f70',
                    data: <?php echo json_encode($countusing); ?>
                },
                {
                    label: 'Not Wearing Helmet',
                    backgroundColor: '#01caf1',
                    borderColor: '#01caf1',
                    data: <?php echo json_encode($countnotusing); ?>
                }
            ]
        },



        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        },
    });
</script> -->

<!-- line chart -->
<script type="text/javascript">
    /* SCRIPT API DASHBOARD */
    function getdata(url) {
        var result;
        $.ajax({
            async: false,
            url: "http://localhost:8081/" + url,
            method: "GET",
            success: function(data) {
                result = data;
            },
        });
        return result
    }



    function dashboard() {
        var occurencetime = document.getElementById("occurencetime")
        var wearinghelmet = document.getElementById("wearinghelmet")
        var notwearinghelmet = document.getElementById("notwearinghelmet")
        var status = document.getElementById("status")

        var chr = document.getElementById("linechart").getContext("2d");

        //gradient Fill
        let gradient_blue = chr.createLinearGradient(0, 0, 0, 400);
        gradient_blue.addColorStop(0, "rgba(8, 204, 244,1");
        gradient_blue.addColorStop(1, "rgba(8, 204, 244,0.3");

        let gradient_red = chr.createLinearGradient(0, 0, 0, 400);
        gradient_red.addColorStop(0, "rgba(255, 92, 132,1");
        gradient_red.addColorStop(1, "rgba(255, 92, 132, 0.3");

        var api = getdata('Hellomet/c_admin/data');
        console.log(api['lastdata'])
        occurencetime.innerHTML = api['lastdata'].dt_report_datetime;
        wearinghelmet.innerHTML = api['lastdata'].dt_report_countusing;
        notwearinghelmet.innerHTML = api['lastdata'].dt_report_countnotusing;

        switch (api['lastdata'].dt_report_status) {
            case 0:
                status.innerHTML = `<span><i class="fas fa-check-circle" style="color: green; font-size: 26px;"></i><b style="color: green;">
                                        Safe </b></span>`
                break
            case 1:
                status.innerHTML = ` <span><i class="fas fa-exclamation-circle" style="color: yellow; font-size: 26px;"></i><b style="color: yellow;">
                                        Warning</b></span>`
                break
            case 2:
                status.innerHTML = `<span><i class="fas fa-times-circle" style="color: red;"></i><b style="color: red;">
                                        Not Safe</b></span>`

        }

        var data = {
            labels: api['datetime'],
            datasets: [

                {
                    label: 'Wearing Helmet',
                    backgroundColor: gradient_red,
                    borderColor: '#ff4f70',
                    fill: true,
                    lineTension: 0.1,
                    pointHoverBackgroundColor: "#ff4f70",
                    pointHoverBorderColor: "#ff4f70",
                    data: api['countusing']
                },
                {
                    label: 'Not Wearing Helmet',
                    backgroundColor: gradient_blue,
                    borderColor: '#01caf1',
                    fill: true,
                    lineTension: 0.1,
                    pointHoverBackgroundColor: "#01caf1",
                    pointHoverBorderColor: "#01caf1",
                    data: api['countnotusing']
                }
            ]
        };

        var myBarChart = new Chart(chr, {
            type: 'line',
            data: data,
            options: {
                legend: {
                    display: true
                },
                barValueSpacing: 20,
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                }
            }
        });
    }

    dashboard()

    var timer;

    function startTimer() {
        timer = setInterval(function() {
            dashboard()
        }, 3000);
    }

    startTimer();
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<!-- -->
<script type="text/javascript">
    $(document).ready(() => {

        <?php
        $js_array1 = json_encode($chartpie);
        $js_array2 = json_encode($chartbar);
        echo "var arrPie = " . $js_array1 . ";\n";
        echo "var arrBar = " . $js_array2 . ";\n";
        ?>

        var labelss = [],
            pie1 = [],
            pie2 = [];


        arrPie.forEach((data, index) => {
            pie1.push(parseInt(data.wearingpie))
            pie2.push(parseInt(data.notwearingpie))
        });


        var ctxPie = document.getElementById('chart').getContext('2d');
        var arrcolor = [];

        for (var i = 0; i < arrPie.length; i++) {

            arrcolor.push('#' + (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0'));
        }



        var chartPie = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: [
                    'Wearing Helmet',
                    'Not Wearing Helmet'
                ],
                datasets: [{
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)'
                    ],
                    data: [pie1, pie2]

                }]
            },
        });


        // =========================================

        labelss = [], datas = [], datas2 = [];

        arrBar.forEach((data, index) => {
            datas.push(parseInt(data.wearing))
            datas2.push(parseInt(data.notwearing))
            labelss.push(data.tanggal)
        });

        const maxBarSize = Math.max.apply(null, datas, datas2);
        let tempData = []
        let tempData2 = []
        datas.map((item, index) => {
            tempData.push("" + item);
        })
        datas = tempData;

        datas2.map((item, index) => {
            tempData2.push("" + item);
        })
        datas2 = tempData2;

        var ctxBar = document.getElementById('bar').getContext('2d');
        var arrcolor = [];

        for (var i = 1; i <= arrBar.length; i++) {

            arrcolor.push('#' + (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0'));
        }

        var api2 = getdata('Hellomet/c_admin/data');

        var chartBar = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: api2['datetime'],
                datasets: [{
                        label: 'Wearing Helmet',
                        backgroundColor: '#ff4f70',
                        borderColor: '#ff4f70',
                        data: datas
                    },
                    {
                        label: 'Not Wearing Helmet',
                        backgroundColor: '#01caf1',
                        borderColor: '#01caf1',
                        data: datas2
                    }
                ]

            },
            options: {
                responsive: true,
                hover: {
                    mode: 'label'
                },
                scales: {
                    xAxes: [{
                        beginAtZero: true,
                        display: true,
                        scaleLabel: {
                            display: true,
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            precision: 0,
                            beginAtZero: true,
                            max: maxBarSize,
                        }
                    }]
                },
            },
        });
    })
</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {

        fetch_data();

        var sale_chart;

        function fetch_data(start_date = '', end_date = '') {
            var dataTable = $('#order_table').DataTable({
                "processing": true,
                "serverSide": true,
                "dataSrc": "",
                "order": [],
                "ajax": {
                    url: "actioncopy.php",
                    type: "POST",
                    data: {
                        action: 'fetch',
                        start_date: start_date,
                        end_date: end_date
                    }
                },
                "drawCallback": function(settings) {

                    var sales_date = [];
                    var usinghelmet = [];
                    var notusinghelmet = [];

                    for (var count = 0; count < settings.aoData.length; count++) {
                        sales_date.push(settings.aoData[count]._aData[1]);
                        usinghelmet.push(parseFloat(settings.aoData[count]._aData[2]));
                        notusinghelmet.push(parseFloat(settings.aoData[count]._aData[3]));
                    }

                    var chart_data = {
                        labels: sales_date,
                        datasets: [{
                                label: 'Wearing Helmet',
                                backgroundColor: '#ff4f70',
                                color: '#fff',
                                data: usinghelmet
                            },
                            {
                                label: 'Not Wearing Helmet',
                                backgroundColor: '#01caf1',
                                color: '#fff',
                                data: notusinghelmet
                            }
                        ]
                    };

                    var group_chart3 = $('#bar_chart');

                    if (sale_chart) {
                        sale_chart.destroy();
                    }

                    sale_chart = new Chart(group_chart3, {
                        type: 'bar',
                        data: chart_data
                    });
                }
            });
        }

        $('#daterange_textbox').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            format: 'YYYY-MM-DD'
        }, function(start, end) {

            $('#order_table').DataTable().destroy();

            fetch_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

        });

    });
</script> -->


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
    //document.getElementById("tanggalakhir").setAttribute("max", today);

    $(function() {
        $("#tanggalawal").on("change", function() {
            var selected = $(this).val();
            document.getElementById("tanggalakhir").setAttribute("min", selected);
        });
    });
</script>


<script>

</script>