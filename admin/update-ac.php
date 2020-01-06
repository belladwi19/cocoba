<?php ob_start();
$title = "Update";
include_once 'template/header.php';
include_once 'config.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM activity WHERE id='$id'");
$data = mysqli_fetch_array($query);

?>
<div class="card shadow  mb-4 py-3 border-bottom-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="display: inline">Update Activity</h6>

    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for=""><strong>Title</strong></label>
                        <input type="text" name="title" id="title" placeholder="title..." class="form-control border-1 bg-light sm" value="<?= $data['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Description</strong></label>
                        <textarea class="form-control border-1 bg-light sm" name="description" id="description" placeholder="description...."><?= $data['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Category</strong></label>
                        <select name="category" class="form-control border-1 sm bg-light">
                            <option value="<?= $data['category'] ?>"><?= $data['category'] ?></option>
                            <option value="penanggulangan bencana">Penanggulangan Bencana</option>
                            <option value="lingkungan">Lingkungan</option>
                            <option value="pengembangan masyarakat">Pengembangan Masyarakat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Location</strong></label>
                        <input type="text" name="location" id="location" class="form-control border-1 sm bg-light" value="<?= $data['location'] ?>">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Image</strong></label>
                        <input type="file" name="new_img" id="new_img" class="form-control border-1 sm bg-light">
                    </div>
                </div>
                <div class="col">
                    <div class="fom-group mb-2">
                        <label for="">Type</label>
                        <select name="tipe" class="form-control border-1 bg-light sm" id="tipe">
                            <option value="<?= $data['tipe'] ?>" selected><?= $data['tipe'] ?></option>
                            <option value="project">Project</option>
                            <option value="regular">Regular</option>
                            <option value="event">event</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input value="<?= $data['startDate'] ?>" id="startDate" name="startDate" />
                    </div>
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input id="endDate" name="endDate" value="<?= $data['endDate'] ?>" />
                    </div>
                    <div id="timePick" style="display: none">
                        <div class="form-group">
                            <label for="">Time Start</label>
                            <input value="<?= $data['startTime'] ?>" id="startTime" name="startTime" />
                        </div>
                        <div class="form-group" id="endTime">
                            <label for="">Time Start</label>
                            <input value="<?= $data['endTime'] ?>" id="EndTime" name="EndTime" />
                        </div>
                    </div>
                </div>
            </div>



            <button type="button" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary" name="Submit">Save changes</button>

        </form>
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

    var selectedTipe = "<?= $data['tipe'] ?>";
    if (selectedTipe == 'project') {
        $('#timePick').hide();
    }
    if (selectedTipe == "regular") {
        $('#timePick').show();
    } else if (selectedTipe == 'event') {
        $('#timePick').show();

    }


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


<?php

if (isset($_POST['Submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $tipe = $_POST['tipe'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $startTime = $_POST['startTime'];
    $EndTime = $_POST['EndTime'];

    $img = $_FILES['new_img']['name'];
    $tmp = $_FILES['new_img']['tmp_name'];

    echo $img;
    echo $tmp;

    if ($tipe == 'project') {

    if ($img != '') {


        $new_name = date('dmHYis') . $img;

        $path = 'img/' . $new_name;
        if (move_uploaded_file($tmp, $path)) {
            if (is_file('img/' . $data['img']))
                unlink('img/' . $data['img']);

            $query2 = "UPDATE activity SET title = '$title', description='$description', category='$category', tipe='$tipe', startDate='$startDate', endDate='$endDate', location='$location', img='$new_name' WHERE id='$id'";

            $sql2 = mysqli_query($conn, $query2);

            if ($sql2) {
               header('Location:activity.php?msg=success_update');
            }else{
                    
                header('Location:activity.php?msg=failed_update');
            }
        }
    } else {

        $query3 = "UPDATE activity SET title = '$title', description='$description', category='$category', tipe='$tipe', startDate='$startDate', endDate='$endDate', location='$location' WHERE id='$id'";

        $sql3 = mysqli_query($conn, $query3);
        if ($sql3) {
               header('Location:activity.php?msg=success_update');
            }else{
                    
                header('Location:activity.php?msg=failed_update');
            }
    }
    } else if ($tipe == 'regular') {

        if ($img != '') {


            $new_name = date('dmHYis') . $img;

            $path = 'img/' . $new_name;
            if (move_uploaded_file($tmp, $path)) {
                if (is_file('img/' . $data['img']))
                    unlink('img/' . $data['img']);

                $query2 = "UPDATE activity SET title = '$title', description='$description', category='$category', tipe='$tipe', startDate='$startDate', endDate='$endDate', location='$location', startTime='$startTime', endTime='$EndTime', img='$new_name' WHERE id='$id'";

                $sql2 = mysqli_query($conn, $query2);

                if ($sql2) {
                    header('Location:activity.php?msg=success_update');
                } else {
                    header('Location:activity.php?msg=failed_update');
                }
            }
        } else {



            $query3 = "UPDATE activity SET title = '$title', description='$description', category='$category', tipe='$tipe', startDate='$startDate', endDate='$endDate', location='$location', startTime='$startTime', endTime='$EndTime' WHERE id='$id' ";

            $sql3 = mysqli_query($conn, $query3);
            if ($sql3) {
                header('Location:activity.php?msg=success_update');
            } else {
                header('Location:activity.php?msg=failed_update');
            }
        }
    } else if ($tipe == 'event') {

        if ($img != '') {


            $new_name = date('dmHYis') . $img;

            $path = 'img/' . $new_name;
            if (move_uploaded_file($tmp, $path)) {
                if (is_file('img/' . $data['img']))
                    unlink('img/' . $data['img']);

                $query2 = "UPDATE activity SET title = '$title', description='$description', category='$category', tipe='$tipe', startDate='$startDate', endDate='$endDate', location='$location', startTime='$startTime', endTime='$EndTime', img='$new_name' WHERE id='$id'";

                $sql2 = mysqli_query($conn, $query2);

                if ($sql2) {
                    header('Location:activity.php?msg=success_update');
                } else {
                    header('Location:activity.php?msg=failed_update');
                }
            }
        } else {



            $query3 = "UPDATE activity SET title = '$title', description='$description', category='$category', tipe='$tipe', startDate='$startDate', endDate='$endDate', location='$location', startTime='$startTime', endTime='$EndTime' WHERE id='$id' ";

            $sql3 = mysqli_query($conn, $query3);
            if ($sql3) {
                header('Location:activity.php?msg=success_update');
            } else {
                header('Location:activity.php?msg=failed_update');
            }
        }
    }
}
?>