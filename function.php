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
        $_SESSION['login'] = true;
        header('location:index.php');
    }else {
        //datanya tidak ada
        // gagal login

        echo'
        <script>
        alert("usernane atau pasword salah")
        window.location.href="login.php"
        </script>';
    }

}

if(isset($_POST['tambahproduk'])){
    //deskripsi initial variable

    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stock'];

    $insert_produk = mysqli_query($koneksi,"INSERT INTO produk (nama_produk,deskripsi,harga,stock) VALUE('$namaproduk','$deskripsi','$harga','$stok')");
    if($insert_produk){
        header('location:stock.php');

    }else
    echo'
        <script>
        alert("gagal tambah produk")
        window.location.href="stock.php"
        </script>';
}
?>