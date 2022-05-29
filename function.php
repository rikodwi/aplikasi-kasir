<?php
session_start();
$koneksi = mysqli_connect('localhost','root','','kasir');
if(isset($_POST['login'])) {
    //initial variable
    $username = $_POST ['username'];
    $pasword = $_POST ['pasword'];

    $check = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND pasword='$pasword'");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        //jika datanya ada dan di temukan
        //berhasil login
        $_SESSION['login']=true;
        header('location:index.php');
    }else{
        //datanya tidak ada
        // gagal login

        echo'
        <script>
        alert("usernane atau pasword salah")
        window.location.href="login.php"
        </script>';
    }

}
?>