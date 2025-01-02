<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/') ?>js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/admin/') ?>images/logo.svg" />
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?= base_url('assets/admin/') ?>images/faces/face28.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a href="<?= base_url('admin/Settings') ?>" class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a href="<?= base_url('Login') ?>" class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/Dashboard') ?>">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/Dashboard/laporan_company') ?>">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Laporan Perusahaan</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <?php $this->load->view($page); ?>
                <footer class="footer">

                </footer>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?= base_url('assets/admin/') ?>vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url('assets/admin/') ?>vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/admin/') ?>js/off-canvas.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/template.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/settings.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/todolist.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/chart.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= base_url('assets/admin/') ?>js/dashboard.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#editor').summernote({
            height: 200
        });
    </script>
</body>

</html>