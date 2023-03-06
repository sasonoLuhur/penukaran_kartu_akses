<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplikasi Tamu - Registrasi</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="../../index.html">Aplikasi Tamu</a>
                <a class="navbar-brand brand-logo-mini" href="../../index.html">AT</a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="../../images/faces/user.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="../../pages/akun.html">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url().'admin' ?>">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Tamu</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="<?php echo base_url().'admin/pengunjung_registrasi' ?>">Registrasi</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url().'admin/list_aktivasi_kartu' ?>">Aktivasi
                                        Kartu</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="<?php echo base_url().'admin/list_deaktivasi_kartu'?>">Deaktivasi
                                        kartu</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Laporan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../../pages/laporan-tamu.html">Data
                                        Tamu</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Tamu</h4>
                                    <?php foreach($pengunjung as $p){ ?>

                                    <form class="form-sample" action="<?php echo base_url().'admin/pengunjung_update'?>"
                                        method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $p->pengunjung_id; ?>">
                                                        <input type="text" name="nama" value="<?php echo $p->nama; ?>"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">NIK</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nomor_ktp"
                                                            value="<?php echo $p->nomor_ktp; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-9">
                                                        <select name="jenis_kelamin" class="form-control">
                                                            <option value="<?php echo $p->jenis_kelamin; ?>" disabled
                                                                selected="selected">Pilih
                                                            </option>
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="alamat"
                                                            value="<?php echo $p->alamat; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" name="email"
                                                            value="<?php echo $p->email; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">No Hp/WA</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nomor_hp"
                                                            value="<?php echo $p->nomor_hp; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- </form> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Detail Kunjungan</h4>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">keterangan</label>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="keterangan"
                                                    value="<?php echo $p->keterangan; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tujuan">Tujuan</label>
                                            <select id="tujuan" name="tujuan" required class="form-control">
                                                <option value="<?php echo $p->tujuan_id; ?>" selected="selected">
                                                </option>
                                                <?php foreach($tujuan as $t){ ?>
                                                <option value="<?php echo $t->tujuan_id; ?>"><?php echo $t->tujuan; ?>
                                                </option>
                                                <?php } ?>

                                            </select>
                                            <div class="form-group">
                                                <label>Tanggal </label>
                                                <input type="date" name="tanggal" value="<?php echo $p->tanggal; ?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">edit</button>

                                        </form>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <!-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>-->
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../../vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <script src="../../vendors/select2/select2.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/hoverable-collapse.js"></script>
        <script src="../../js/template.js"></script>
        <script src="../../js/settings.js"></script>
        <script src="../../js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="../../js/file-upload.js"></script>
        <script src="../../js/typeahead.js"></script>
        <script src="../../js/select2.js"></script>
        <!-- End custom js for this page-->
</body>

</html>