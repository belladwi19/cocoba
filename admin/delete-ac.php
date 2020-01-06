<?php 

    include_once 'config.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM activity WHERE id='$id'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($sql);

    if(is_file('img/'.$data['img']))
        unlink('img/'.$data['img']);

    $query2 = "DELETE FROM activity WHERE id='$id'";
    $sql2 = mysqli_query($conn,$query2);

    if($sql2)
    {
        header("Location:activity.php?msg=delete_success");
    }else{
        header("Location:activity.php?msg=delete_failed");
    }
