<?php
include_once 'template/header.php';
include_once 'date_helper.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = mysqli_query($conn, "SELECT * FROM activity WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <img src="admin/img/<?= $data['img'] ?>" alt="" class="img-fluid" width="100%">
            <div class="mt-5" style="padding: 20px;background-color:#DFDFDF;text-align: justify;font-weight:400; font-size: 14px;">
                <p class=""><?= $data['description'] ?></p>
            </div>
            <div class="mt-4">
                <p style="font-weight:600">DETIL AKTIVITAS</p>
            </div>
            <hr>
            <div class="mt-4" style="font-weight:400; font-size: 14px;">
                <div class="row">
                    <div class="col-md-4">
                        Tugas Relawan
                    </div>
                    <div class="col-md-8">
                        <?= $data['tugas_relawan'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Perlengkapan Relawan
                    </div>
                    <div class="col-md-8">
                        <?= $data['perlengkapan_relawan'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Metode Briefing
                    </div>
                    <div class="col-md-8">
                        <?= $data['metode_briefing'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Kriteria Relawan/Informasi Tambahan
                    </div>
                    <div class="col-md-8">
                        <?= $data['informasi_tambahan'] ?>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-4">
            <div id="side-menu">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><?= $data['title'] ?></h6>
                        <?php if ($data['tipe'] == 'project') { ?>
                            <span class="my-2 mr-2 badge badge-pill badge-success badge-outlined"><?= $data['tipe'] ?></span>
                            <span class="my-2 badge badge-pill badge-success badge-outlined"><?= $data['category'] ?></span>
                        <?php } else if ($data['tipe'] == 'regular') { ?>
                            <span class="my-2 mr-2 badge badge-pill badge-warning badge-outlined"><?= $data['tipe'] ?></span>
                            <span class="my-2 badge badge-pill badge-warning badge-outlined"><?= $data['category'] ?></span>
                        <?php } else if ($data['tipe'] == 'event') { ?>
                            <span class="my-2 mr-2 badge badge-pill badge-danger badge-outlined"><?= $data['tipe'] ?></span>
                            <span class="my-2 badge badge-pill badge-danger badge-outlined"><?= $data['category'] ?></span>
                        <?php } ?>

                        <div class="mt-3">

                            <i class="far fa-clock"></i>
                            <span class="ml-2" style="font-weight: 600">Jadwal <?= $data['tipe'] ?></span>
                        </div>

                        <ul class="ml-4 list-unstyled" style="padding-top:10px; font-size: 14px;">
                            <li>
                                <div class="row">
                                    <?php


                                    $start_date = $data['startDate'];
                                    $end_date = $data['endDate'];

                                    while (strtotime($start_date) <= strtotime($end_date)) {
                                        $timestamp = strtotime($start_date);
                                        $day = day(date('N', $timestamp));


                                    ?>
                                        <div class="col-md-4">
                                            <?= $day; ?>
                                        </div>
                                        <div class="col-md-8">
                                            <?php echo date("h:i", strtotime($data['startTime'])) . " pagi" . " Sampai " . date("h:i", strtotime($data['endTime'])) . " sore "
                                            ?>
                                        </div>
                                    <?php

                                        $start_date = date("Y-m-d", strtotime("+1 days", strtotime($start_date)));
                                    } ?>

                                </div>
                            </li>
                        </ul>

                        <div class="ml-4" style="font-weight: 600">
                            Periode Aktivitas
                        </div>
                        <div class="ml-4" style="font-size: 14px;">
                            <?php
                            echo date("d", strtotime($data['startDate'])) . " " . month(date("n", strtotime($data['startDate']))) . " " . date("Y", strtotime($data['startDate']));
                            ?>
                            -
                            <?php
                            echo date("d", strtotime($data['endDate'])) . " " . month(date("n", strtotime($data['endDate']))) . " " . date("Y", strtotime($data['endDate']));
                            ?>
                        </div>

                        <div class="mt-3">
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="fas fa-map-marker-alt"></i> <span class="ml-1">
                                </div>
                                <div class="col-md-8" style="font-size: 14px;">
                                    <?= $data['location'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">

                            <?php if (isset($_SESSION['email'])) { ?>
                                <button class="btn btn-lg btn-warning btn-block text-white" style="font-weight: 600" data-toggle="modal" data-target="#modalRelawan"><i class="fas fa-user"></i> JADI RELAWAN</button>
                            <?php } else { ?>
                                <button class="btn btn-lg btn-warning btn-block text-white" style="font-weight: 600" id="not-login" data-toggle="modal" data-target="#modallogin"><i class="fas fa-user"></i> JADI RELAWAN</button>
                            <?php } ?>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-success text-white btn-block" style="font-weight: 600; height:45px;"><i class="far fa-envelope"></i>
                                kontak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<br>
<br>

<?php
include_once 'template/footer.php';
?>