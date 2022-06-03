<?php
require 'function.php';

if(isset($_GET['idp'])){
    $idp =$_GET['idp'];
}else
{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>aplikasi kasir</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">aplikasi kasir</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                order
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                stok data
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                barang masuk
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                kelola pelanggan
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                logout
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">data pesanan : <?= $idp;?></h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                        tambah pesanan
                                     </button>
                                <div class="container mt-3">

                                     
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data barang
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>nama produk</th>
                                            <th>harga satuan</th>
                                            <th>harga satuan</th>
                                            <th>subtotal</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get = mysqli_query($koneksi,"SELECT * FROM detail_pesanan p, produk pr WHERE p.id_produk=pr.id_produk");
                                        $i=1;
                                        while($p=mysqli_fetch_array($get)){
                                            $qty = $p['qty'];
                                            $harga = $p['harga'];
                                            $nama_produk = $p ['nama_produk'];
                                            $subtotal = $qty * $harga;
                                    
                                    
                                    ?>
                                        <tr>
                                            
                                            <td><?= $si++; ?></td>
                                            <td><?= $namaproduk; ?></td>
                                            <td><?= $harga; ?></td>
                                            <td><?= $qty; ?></td>
                                            <td><?= $subtotal; ?></td>
                                            <td>tampilkan | edit</td>
                                        </tr>
                                        <?php };?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; RIKO DWI 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">DATA PESANAN</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST">
      <!-- Modal body -->
      <div class="modal-body">
          PILIH BARANG
          <select name="id_produk " class="form-control" >
          <?php
          $getproduk = mysqli_query($koneksi,"SELECT * FROM produk");

          while($pr= mysqli_fetch_array($getproduk)){
              $id_produk = $pr['id_produk'];
              $nama_produk =$pr['nama_produk'];
              $stok =$pr['stok'];
              $deskripsi = $pr['deskripsi'];
          ?>

          <option value="<?=$id_produk; ?>"><?=$nama_produk;  ?> - <?=$deskripsi; ?></option>
          <?php
          }
          ?>
          </select>

          <input type="number" name="qty" class="form-control mt-3 " placeholder="quantyity">
          <input type="hidden" name="idp" value="<?= $idp?>">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-succes" name="addproduk">simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">tutup</button>
      </div>
      </form>

    </div>
  </div>
</div>
</html>
