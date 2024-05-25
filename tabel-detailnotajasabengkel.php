<?php

require_once 'detailnotajasabengkel.php';
require_once 'jasabengkel.php';
require_once 'notajasa.php';

$notajasa = new notajasa;
$jasabengkel = new jasabengkel;
$detailnotajasabengkel = new detailnotajasabengkel;

// Delete pemesanan
if(isset($_POST['delete'])){
    $id_nota_jasa = $_POST['id_nota_jasa'];
    $id_jasa = $_POST['id_jasa'];

    $detailnotajasabengkel->delete($id_nota_jasa, $id_jasa);

    header("Location: tabel-detailnotajasabengkel.php");
}

// Tambah detail
if(isset($_POST['add'])){
    // id_pemesanan, id_calon_konsumen, tgl_pemesanan, status_pemesanan, alamat_pengirima, total_harga
    $id_nota_jasa = $_POST['ID_nota_jasa'];
    $id_jasa = $_POST['id_jasa'];

    $detailnotajasabengkel->store($id_nota_jasa, $id_jasa);
    
    header("Location: tabel-detailnotajasabengkel.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                        <a href="index.html"><img src="assets/images/logo/logo.svg" alt="AHHAS" srcset="">AHHAS</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <!---Dashboard -->
                        <li class="sidebar-item ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>dashboard</span>
                            </a>
                        </li>

                            <!-- PKB -->
                            <!-- <li class="sidebar-item ">
                            <a href="pkb.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>PKB</span>
                            </a>
                        </li> -->

                           <!---Kendaraan -->
                           <!-- <li class="sidebar-item ">
                            <a href="tabel-kendaraan.php" class='sidebar-link'>
                                <i class="bi bi-book-fill"></i>
                                <span>Kendaraan</span>
                            </a>
                        </li> -->

                          <!---Pemnbelian -->
                          <li class="sidebar-item ">
                            <a href="tabel-pemilik.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>pemilik</span>
                            </a>
                        </li>
                            <!-- jasabengkel -->
                            <li class="sidebar-item ">
                            <a href="tabel-jasabengkel.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Jasa Bengkel</span>
                            </a>
                        </li>
                        <!-- detail nota jasa -->
                        <li class="sidebar-item ">
                            <a href="tabel-detailnotajasabengkel.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Detail nota jasa</span>
                            </a>
                        </li>
                           <!--- Sperpat -->
                           <li class="sidebar-item ">
                            <a href="tabel-notajasa.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Nota jasa</span>
                            </a>
                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Components</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Alert</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Badge</a>
                                </li>
                            </ul>
                        </li>

                        

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Form Editor</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="form-editor-quill.html">Quill</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-ckeditor.html">CKEditor</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-summernote.html">Summernote</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-tinymce.html">TinyMCE</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tabel Detail Nota Jasa Bengkel</h3>
                            <button type="button" class="btn btn-info mb-3 mt-4 d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#tambah">
                                <span class="bi bi-plus-square me-2" style="padding-top: 2px;"></span>Tambah Detail Nota Jasa Bengkel
                            </button>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Detail Nota Jasa Bengkel</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-borderless" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID NOTA JASA</th>
                                        <th scope="col">ID JASA</th>
                                        <th scope="col">TGL NOTA JASA</th>
                                        <th scope="col">NAMA JASA</th>
                                        <th scope="col" class="text-center">HAPUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($detailnotajasabengkel->show() as $dnjsb) : ?>
                                        <tr>
                                            <td scope="col"><?= $dnjsb['ID_nota_jasa'] ?></td>
                                            <td scope="col"><?= $dnjsb['ID_jasa'] ?></td>
                                            <td scope="col"><?= $dnjsb['Tgl_nota_jasa'] ?></td>
                                            <td scope="col"><?= $dnjsb['Nama_jasa'] ?></td>
                                            <td class="d-flex justify-content-center">
                                               <button type="button" class="btn btn-danger d-flex" data-bs-toggle="modal" data-bs-target="#delete<?=$dnjsb['ID_nota_jasa'].$dnjsb['ID_jasa']?>">
                                                   <li class="bi bi-trash me-1" style="list-style-type: none; padding-top: 6px"></li>
                                                   <div style="padding-top: 4px">Hapus</div>
                                               </button>
                                           </td>
                                        </tr>
                                    <?php endforeach; ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <?php foreach ($detailnotajasabengkel->show() as $value){
        echo'
            <div id="delete'.$value['ID_nota_jasa'].$value['ID_jasa'].'" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-end">
                                <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="mt-1">
                                <h4>Yakin untuk menghapus?</h4>	
                                <p>Apakah benar anda ingin menghapus '.$value['ID_nota_jasa'].$value['ID_jasa'].' ?</p>
                            </div>
                            <div class="d-flex flex-row-reverse mt-3">
                                <form action="" method="post">
                                    <input type="hidden" name="id_nota_jasa" value="'.$value['ID_nota_jasa'].'" class="form-control col-6">
                                    <input type="hidden" name="id_jasa" value="'.$value['ID_jasa'].'" class="form-control col-6">
                                    <button class="btn btn-danger" type="submit" name="delete">Hapus</button>
                                </form>
                                <button class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }?>

    <!-- Modal Tambah Barang -->
    <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jasa Bengkel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3 mt-3">
                                    <label for="id_nota_jasa" class="form-label">No Nota Jasa</label>
                                    <select class="form-select border-1 rounded mt-2" name="ID_nota_jasa" size="5">
                                        <option selected>Pilih Nota Jasa</option>
                                        <?php foreach($notajasa->show() as $nj) {
                                            echo '<option value="'.$nj['ID_nota_jasa'].'">'.$nj['ID_nota_jasa'].'</option>';
                                        } ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="id_jasa" class="form-label">Jasa</label>
                                    <select class="form-select border-1 rounded mt-2" name="id_jasa" size="5">
                                        <option selected>Pilih Jasa</option>
                                        <?php foreach($jasabengkel->show() as $jb) {
                                            echo '<option value="'.$jb['ID_jasa'].'">'.$jb['Nama_jasa'].'</option>';
                                        } ?>
                                    </select>
                                </div>

                                <div class="submit mt-4">
                                    <button type="submit" name="add" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
            </div>
    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>