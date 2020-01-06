<?php
include_once 'template/header.php';
$query = mysqli_query($conn, "SELECT * FROM activity WHERE endDate >= now() ");
?>
<div class="jumbotron">
    <div class="container mt-3">
        <div class="text-center">
            <h1 class="display-4"><span style="color: #100264;">DON</span><span style="color: #D74004">TEERS</span></h1>
            <p class="lead">Kami adalah sekelompok orang-orang biasa yang ingin menjadi bagian dari usaha dalam membuat Indonesia menjadi lebih baik.
                Misi kami adalah untuk membuat kolaborasi antara relawan dan komunitas dengan misi sosial menjadi lebih mudah</p>
            <hr class="my-4">
            <p class="lead">Ambil peran jadi relawan, ubah niat baik menjadi aksi baik untuk hari ini. </p>
            <a class="btn btn-primary btn-lg" id="btn-search-activity" href="#" role="button">Cari Aktivitas</a>
        </div>

    </div>
</div>

<div class="container">
    <div class="text-center mb-4">
        <h3>Aktivitas</h3>
        <hr class="activity-line">
    </div>
    <div id="content">
        <div class="row">
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <div class="col-sm-6 col-md-3">
                    <div class="card mb-4" style="width: 248px">
                        <img class="card-img-top" src="assets/img/5dbec9bad90416b226d22932_thumbnail370x250.jpg" alt="Card image cap">
                        <div class="card-body">
                            <?php if ($data['tipe'] == 'project') { ?>
                                <span class="my-2 mr-2 badge badge-pill badge-success badge-outlined" style="font-size: 8px"><?= $data['tipe'] ?></span>
                                <span class="my-2 badge badge-pill badge-success badge-outlined" style="font-size: 8px"><?= $data['category'] ?></span>
                            <?php } else if ($data['tipe'] == 'regular') { ?>
                                <span class="my-2 mr-2 badge badge-pill badge-warning badge-outlined" style="font-size: 8px"><?= $data['tipe'] ?></span>
                                <span class="my-2 badge badge-pill badge-warning badge-outlined" style="font-size: 8px"><?= $data['category'] ?></span>
                            <?php } else if ($data['tipe'] == 'event') { ?>
                                <span class="my-2 mr-2 badge badge-pill badge-danger badge-outlined" style="font-size: 8px"><?= $data['tipe'] ?></span>
                                <span class="my-2 badge badge-pill badge-danger badge-outlined" style="font-size: 8px"><?= $data['category'] ?></span>
                            <?php } ?>
                            <h5 class="card-title"><a href="activity.php?id=<?= $data['id']?>" class="text-dark" style="text-decoration: none"><?= $data['title'] ?></a></h5>
                            <small>
                                <p class="text-muted">Donteers Indonesia</p>
                            </small>
                            <hr class="p-1">
                            <p class="">Waktu & Tempat</p>
                            <ul class="list-unstyled text-secondary">
                                <li>
                                    <i class="fa fa-calendar text-secondary" aria-hidden="true"></i>

                                    <small class="ml-2"><?php echo date("d M Y", strtotime($data['startDate'])) ?> s/d </small> <br> <small class="ml-4"><?php echo date("d M Y", strtotime($data['endDate'])) ?></small>

                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <small class="ml-2">Malang</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="text-center mb-4">
        <a href="search-activity.php" class="btn btn-primary btn-lg" id="btn-search-activity">Lihat activitas lain</a>
        <hr class="activity-line">
    </div>
</div>
<?php
include_once 'template/footer.php';
?>