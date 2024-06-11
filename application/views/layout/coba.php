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
$sec = "10"
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
$serverName = "DESKTOP-7ANMMLK";
$uid = "admin";
$pwd = "admin";
$databaseName = "hellomet";

$connectionInfo = array(
    "UID" => $uid,
    "PWD" => $pwd,
    "Database" => $databaseName
);

$con = mysqli_connect("localhost", "root", "", "hellomet"); //for mysql
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
                        <h4 class="text-dark mb-1 font-weight-medium">
                            <?= date('d M Y - H:i', strtotime($dashboard1->dt_report_datetime)) ?></h4>
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
                        <h1 class="text-dark mb-1 font-weight-medium"><?= $dashboard1->dt_report_countusing ?>
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
                        <h1 class="text-dark mb-1 font-weight-medium">
                            <?= $dashboard1->dt_report_countnotusing ?>
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
                        <h3 class="text-dark mb-1 font-weight-medium">
                            <?php if ($dashboard1->dt_report_status == 0) { ?>
                                <span><i class="fas fa-check-circle" style="color: green; font-size: 26px;"></i><b style="color: green;">
                                        Safe </b></span>
                            <?php } else if ($dashboard1->dt_report_status == 1) { ?>
                                <span><i class="fas fa-exclamation-circle" style="color: yellow; font-size: 26px;"></i><b style="color: yellow;">
                                        Warning</b></span>
                            <?php } else if ($dashboard1->dt_report_status == 2) { ?>
                                <span><i class="fas fa-times-circle" style="color: red;"></i><b style="color: red;">
                                        Not
                                        Safe</b></span>
                            <?php } ?>
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
    <div class="col-lg-4 col-md-12">
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
    </div>

    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Graph of last 5 times Helmet Usage</h4>


                <!-- <canvas id="chart" style="height:283px; width:100%;"></canvas> -->
                <canvas id="linechart" style="height:283px; width:100%;"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Period Helmet Wear chart</h4>
                <!-- <div style="height:100%; width:250px;">
                    <input type="text" id="daterange_textbox" class="form-control" readonly />
                </div> -->
                <!-- <canvas id="bar_chart" height="40"> </canvas> -->
                <form action="<?php echo base_url(); ?>c_admin" method="POST">
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

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Graph 1</h4>

                <div class="mt-4 chartjs-chart">
                    <canvas id="chart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Graph 2</h4>

                <div class="mt-4 chartjs-chart">
                    <canvas id="bar" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table</h4>
                <p class="text-justify">On this page you can filter helmet use data on personnel by entering parameters such as start date and end date of the desired data and display them in a table.
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




<!-- bar chart -->
<script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tanggal); ?>,
            datasets: [{
                    label: 'Wearing Helmet',
                    backgroundColor: '#ff4f70',
                    borderColor: '#ff4f70',
                    data: <?php echo json_encode($wearing); ?>
                },
                {
                    label: 'Not Wearing Helmet',
                    backgroundColor: '#01caf1',
                    borderColor: '#01caf1',
                    data: <?php echo json_encode($notwearing); ?>
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
</script>

<!-- line chart -->
<script type="text/javascript">
    var chr = document.getElementById("linechart").getContext("2d");
    var data = {
        labels: <?php echo json_encode($datetime2); ?>,
        datasets: [

            {
                label: 'Wearing Helmet',
                backgroundColor: '#ff4f70',
                borderColor: '#ff4f70',
                fill: false,
                lineTension: 0.1,
                pointHoverBackgroundColor: "#ff4f70",
                pointHoverBorderColor: "#ff4f70",
                data: <?php echo json_encode($countusing2); ?>
            },
            {
                label: 'Not Wearing Helmet',
                backgroundColor: '#01caf1',
                borderColor: '#01caf1',
                fill: false,
                lineTension: 0.1,
                pointHoverBackgroundColor: "#01caf1",
                pointHoverBorderColor: "#01caf1",
                data: <?php echo json_encode($countnotusing2); ?>
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
</script>

<!------------------------------------------------------------------------------------------->

<!-- <script>

$(document).ready(function(){

    fetch_data();

    var sale_chart;

    function fetch_data(start_date = '', end_date = '')
    {
        var dataTable = $('#order_table').DataTable({
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            "ajax" : {
                url:"action.php",
                type:"POST",
                data:{action:'fetch', start_date:start_date, end_date:end_date}
            },
            "drawCallback" : function(settings)
            {
                
                var sales_date = [];
                var usinghelmet = [];
                var notusinghelmet = [];

                for(var count = 0; count < settings.aoData.length; count++)
                {
                    sales_date.push(settings.aoData[count]._aData[0]);
                    usinghelmet.push(parseFloat(settings.aoData[count]._aData[1]));
                    notusinghelmet.push(parseFloat(settings.aoData[count]._aData[2]));
                }

                var chart_data = {
                    labels:sales_date,
                    datasets:[
                        {
                            label : 'Using Helmet',
                            backgroundColor : 'rgb(255, 205, 86)',
                            color : '#fff',
                            data:usinghelmet
                        },
                        {
                            label : 'Not Using Helmet',
                            backgroundColor : 'rgb(255, 255, 86)',
                            color : '#fff',
                            data:notusinghelmet
                        }
                    ]   
                };

                var group_chart3 = $('#bar_chart');

                if(sale_chart)
                {
                    sale_chart.destroy();
                }

                sale_chart = new Chart(group_chart3, {
                    type:'bar',
                    data:chart_data
                });
            }
        });
    }

    $('#daterange_textbox').daterangepicker({
        ranges:{
            'Today' : [moment(), moment()],
            'Yesterday' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days' : [moment().subtract(29, 'days'), moment()],
            'This Month' : [moment().startOf('month'), moment().endOf('month')],
            'Last Month' : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        format : 'YYYY-MM-DD'
    }, function(start, end){

        $('#order_table').DataTable().destroy();

        fetch_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

    });

});

</script> -->

<!--------------------------------------------------------------------------------------------------->

<!-- /////////////////////////////////////////////////////// -->

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

        var chartBar = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labelss,
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