<?php
include_once 'template/header.php';
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM activity WHERE id='$id'");
    $data = mysqli_fetch_array($query);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <img src="admin/img/<?= $data['img'] ?>" alt="" class="img-fluid" width="100%">

        </div>
    </div>
</div>

<?php
include_once 'template/footer.php';
?>