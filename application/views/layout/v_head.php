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

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="<?php echo $sec; ?>" URL="<?php echo $page; ?>"> -->
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
    <link href="<?= base_url() ?>template/dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="<?= base_url() ?>template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?= base_url() ?>template/assets/libs/morris.js/morris.css" rel="stylesheet">
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

    <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://kit.fontawesome.com/9d1d9a82d2.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

    <link href="<?= base_url() ?>assets/library/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/library/daterangepicker.css" rel="stylesheet" />

    <script src="<?= base_url() ?>assets/library/jquery.min.js"></script>


</head>