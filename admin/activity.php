<?php
$title = 'Activity';
include_once 'template/header.php';
include_once 'config.php';

$query = mysqli_query($conn, "SELECT * FROM activity");

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="display: inline">Update Example</h6>
        <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#addActivity" style="display: inline">add activity</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['title'] ?></td>
                            <td><?= $data['location'] ?></td>
                            <td><?= $data['tipe'] ?></td>
                            <td><?= $data['category'] ?></td>
                            <td><?= $data['startDate'] ?></td>
                            <td><?= $data['endDate'] ?></td>
                            <td>
                                <a href="update-ac.php?id=<?= $data['id'] ?>" class="btn btn-warning">Update</a>
                                <a href="delete-ac.php?id=<?= $data['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal add -->
<div class="modal fade" id="addActivity" tabindex="-1" role="dialog" aria-labelledby="addActivityLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addActivityLabel">Tambah Aktivitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body ">
                    <div class="!row">
                        <div class="!col">
                            <div class="form-group">
                                <label for=""><strong>Title</strong></label>
                                <input type="text" name="title" id="title" placeholder="title..." class="form-control border-1 bg-light sm">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Description</strong></label>
                                <textarea class="form-control border-1 bg-light sm" name="description" id="editor" placeholder="description...."></textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="fom-group mb-2">
                                        <label for="">Type</label>
                                        <select name="tipe" class="form-control border-1 bg-light sm" id="tipe">
                                            <option value="" selected>-- Choose --</option>
                                            <option value="project">Project</option>
                                            <option value="regular">Regular</option>
                                            <option value="event">event</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for=""><strong>Category</strong></label>
                                        <select name="category" class="form-control border-1 sm bg-light">
                                            <option value="">-- Choose --</option>
                                            <option value="penanggulangan bencana">Penanggulangan Bencana</option>
                                            <option value="lingkungan">Lingkungan</option>
                                            <option value="pendidikan">Pendidikan</option>
                                            <option value="pengembangan masyarakat">Pengembangan Masyarakat</option>
                                            <option value="hak asasi manusia">Hak Asasi Manusia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for=""><strong>Location</strong></label>
                                <input type="text" name="location" id="location" class="form-control border-1 sm bg-light">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Image</strong></label>
                                <input type="file" name="img" id="img" class="form-control border-1 sm bg-light">
                            </div>
                        </div>
                        <div class="!col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <input id="startDate" name="startDate" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <input id="endDate" name="endDate" />
                                    </div>
                                </div>
                            </div>


                            <div id="timePick" style="display: none">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Time Start</label>
                                            <input id="startTime" name="startTime" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group" id="endTime">
                                            <label for="">Time Start</label>
                                            <input id="EndTime" name="EndTime" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Heading -->
                        <div class="sidebar-heading">
                            <p style="font-weight: 600">DETIL AKTIVITAS</p>
                        </div>
                        <hr class="sidebar-divider">
                        <div class="detail-aktivitas">
                            <div class="form-group">
                                <label for=""><strong>Tugas Relawan</strong></label>
                                <textarea name="tugas_relawan" id="editor2" placeholder="Tugas Relawan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Perlengkapan Relawan</strong></label>
                                <textarea name="perlengkapan_relawan" id="editor3" placeholder="Perlengkapan Relawan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Metode Briefing</strong></label>
                                <textarea name="metode_briefing" id="editor4" placeholder="Metode Briefing"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Kriteria Relawan/Informasi Tambahan

                                    </strong></label>
                                <textarea name="informasi_tambahan" id="editor5" placeholder="Kriteria Relawan/Informasi Tambahan"></textarea>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="Send">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal delete -->
<div class="modal fade" id="DeteleModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteModal">Are you Sure to Delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Yes !" below if you sure to delete
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Yes !</button>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'template/footer.php';
?>
<script>
    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#startDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        minDate: today,
        format: 'yyyy-mm-dd',
        maxDate: function() {
            return $('#endDate').val();
        }
    });
    $('#endDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'yyyy-mm-dd',
        minDate: function() {
            return $('#startDate').val();
        }
    });
    $('#startTime').timepicker();
    $('#EndTime').timepicker();

    $('#tipe').change(function() {
        var selectedVal = $('#tipe option:selected').val();
        if (selectedVal == 'project') {
            $('#timePick').hide();
        } else if (selectedVal == 'regular') {
            $('#timePick').show();
            // $("#endTime").show();
        } else if (selectedVal == 'event') {
            $('#timePick').show();
            // $("#endTime").hide();
        }
    })
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('There was a problem initializing the editor.', error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('There was a problem initializing the editor.', error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor3'))
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('There was a problem initializing the editor.', error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor4'))
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('There was a problem initializing the editor.', error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor5'))
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('There was a problem initializing the editor.', error);
        });
</script>

<?php

if (isset($_POST['Send'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $tipe = $_POST['tipe'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $startTime = $_POST['startTime'];
    $EndTime = $_POST['EndTime'];
    $tugas_relawan = $_POST['tugas_relawan'];
    $perlengkapan_relawan = $_POST['perlengkapan_relawan'];
    $metode_briefing = $_POST['metode_briefing'];
    $informasi_tambahan = $_POST['informasi_tambahan'];
    $foto = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];

    $foto_baru = date('mdYHis') . $foto;

    $path = 'img/' . $foto_baru;

    if ($tipe == 'project') {
        if (move_uploaded_file($tmp, $path)) {
            $query = "INSERT INTO activity(title,description, location, img, category, tipe, startDate, endDate, tugas_relawan, perlengkapan_relawan, metode_briefing, informasi_tambahan) VALUES('$title','$description','$location','$foto_baru' ,'$category','$tipe','$startDate','$endDate', $tugas_relawan, $perlengkapan_relawan, $metode_briefing, $informasi_tambahan)";


            $run = mysqli_query($conn, $query);
            if ($run) {
                header("Location:activity.php?msg=success_create");
            } else {
                header("Location:activity.php?msg=failed_create");
            }
        }
    } else if ($tipe == 'regular') {
        if (move_uploaded_file($tmp, $path)) {
            $timeStart = date('h:i:s', strtotime($startTime));
            $timeEnd = date('h:i:s', strtotime($EndTime));

            $query = "INSERT INTO activity(title,description, location, img, category, tipe, startDate, endDate, startTime, endTime, tugas_relawan, perlengkapan_relawan, metode_briefing, informasi_tambahan) VALUES('$title','$description','$location','$foto_baru', '$category','$tipe','$startDate','$endDate','$timeStart','$timeEnd', $tugas_relawan, $perlengkapan_relawan, $metode_briefing, $informasi_tambahan)";


            $run = mysqli_query($conn, $query);
            if ($run) {
                header("Location:activity.php?msg=success_create");
            } else {
                header("Location:activity.php?msg=failed_create");
            }
        }
    } else {
        if (move_uploaded_file($tmp, $path)) {
            $timeStart = date('h:i:s', strtotime($startTime));
            $timeEnd = date('h:i:s', strtotime($EndTime));

            $query = "INSERT INTO activity(title,description, location, img, category, tipe, startDate, endDate, startTime, endTime, tugas_relawan, perlengkapan_relawan, metode_briefing, informasi_tambahan) VALUES('$title','$description','$location','$foto_baru', '$category','$tipe','$startDate','$endDate','$timeStart','$timeEnd', $tugas_relawan, $perlengkapan_relawan, $metode_briefing, $informasi_tambahan)";


            $run = mysqli_query($conn, $query);
            if ($run) {
                header("Location:activity.php?msg=success_create");
            } else {
                header("Location:activity.php?msg=failed_create");
            }
        }
    }
}
?>