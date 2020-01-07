<?php
    
    include "config.php";
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)){

        echo "<script>alert('Email belum diisi')</script>";
        header("Location:index.php");

    }else if (empty($password)){

        echo "<script>alert('Password belum diisi')</script>";
    header("Location:index.php");
    }else{

        session_start();

        $login = mysqli_query($conn, "select * from users where email='$email' and password='$password'");

        if (mysqli_num_rows($login) > 0){

            $data = mysqli_fetch_array($login);
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['nama_panggilan'];
            $_SESSION['email'] = $email;

            header("location:index.php?msg=login_success");

        }else{

            echo "<script>alert('Username atau Password salah')</script>";
            header("Location:index.php");
        }

    }
