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

    $insert_produk = mysqli_query($koneksi,"INSERT INTO produk (nama_produk,deskripsi,harga,stock) VALUE('$nama_produk','$deskripsi','$harga','$stok')");
    if($insert_produk){
        header('location:stock.php');

    }else
    echo'
        <script>
        alert("gagal tambah produk")
        window.location.href="stock.php"
        </script>';
}
if(isset($_POST['tambahpelanggan'])){
    //deskripsi initial variable

    $nama_pelanggan = $_POST['nama_pelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];

    $insert_pelanggan = mysqli_query($koneksi,"INSERT INTO pelanggan (nama_pelanggan,notelp,alamat) VALUE('$nama_pelanggan','$notelp','$alamat')");
    if($insert_pelanggan){
        header('location:pelanggan.php');

    }else
    echo'
        <script>
        alert("gagal tambah pelanggan")
        window.location.href="pelanggan.php"
        </script>';
}
if(isset($_POST['tambahpesanan'])){
    //deskripsi initial variable

    $id_pelanggan = $_POST['id_pelanggan'];

    $insert_pesanan = mysqli_query($koneksi,"INSERT INTO pesanan (id_pelanggan) VALUE('$id_pelanggan')");
    if($insert_pesanan){
        header('location:index.php');

    }else
    echo'
        <script>
        alert("gagal tambah pelanggan")
        window.location.href="index.php"
        </script>';
}
if(isset($_POST['addproduk'])){
    //deskripsi initial variable

    $id_produk = $_POST['id_produk'];
    $idp = $_GET['idp'];
    $qty =$_GET['qty'];

    $insert = mysqli_query($koneksi,"INSERT INTO detail_pesanan (id_pesanan, id_produk, qty) VALUE('$idp', '$id_produk','$qty')");
    if($insert){
        header('location:view.php?idp='.$idp);

    }else
    echo'
        <script>
        alert("gagal tambah pelanggan")
        window.location.href="view.php"'.$idp.'
        </script>';
}
?>