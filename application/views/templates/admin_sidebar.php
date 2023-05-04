<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <!-- <div class="overlay"></div> -->
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <!-- <div class="search-bar"> -->
    <!-- <div class="search-icon"> -->
    <!-- <i class="material-icons">search</i> -->
    <!-- </div> -->
    <!-- <input type="text" placeholder="START TYPING..."> -->
    <!-- <div class="close-search"> -->
    <!-- <i class="material-icons">close</i> -->
    <!-- </div> -->
    <!-- </div> -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('admin') ?>">SIMA | Admin</a>

            </div>

        </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets/'); ?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $this->session->userdata('username'); ?></div>
                    <div class="email"><?= $this->session->userdata('email'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?= base_url() ?>user/profile/<?= $this->session->userdata('id'); ?>"><i
                                        class="material-icons">person</i>Profile</a>
                            </li>

                            <li><a href="<?= base_url('user/changepassword') ?>"><i
                                class="material-icons">lock</i>Change Password</a>
                            </li>

                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo site_url('auth') ?>"><i class="material-icons">input</i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN MENU</li>
                    <li class="active">
                        <a href="<?php echo base_url('admin') ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('user/getDataUser') ?>">
                            <i class="material-icons">person</i>
                            <span>Kelola User</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">menu</i>
                            <span>Kelola Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('admin/barang') ?>">
                                    <span>Data Barang</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Pengajuan</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?php echo base_url('admin/pengajuan') ?>">
                                            <span>Minggu ke 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/pengajuan2') ?>">
                                            <span>Minggu ke 2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/pengajuan3') ?>">
                                            <span>Minggu ke 3</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/pengajuan4') ?>">
                                            <span>Minggu ke 4</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url('pengajuan/dpengajuan') ?>">
                                    <span>Data Pengajuan</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/validasi_pengajuan') ?>">
                                    <span>Validasi Pengajuan</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('pengajuan/detpengajuan') ?>">
                                    <span>Detail Pengajuan</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/rekapBarang') ?>">
                                    <span>Rekap Barang</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">storage</i>
                            <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('admin/asal_barang') ?>">Asal Barang</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/jenis_barang') ?>">Jenis Barang</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/lantai') ?>">Lantai</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/golongan') ?>">Golongan</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/klasifikasi') ?>">Klasifikasi</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/sub_klasifikasi') ?>">SubKlasifikasi</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/lahan') ?>">Lahan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/bangunan') ?>">Bangunan</a>
                            </li>



                        </ul>

                    </li>



                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">file_download</i>
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('admin/laporan') ?>">Data Laporan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="header">LABELS</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Important</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2023 <a href="javascript:void(0);">Sistem Informasi Manajemen | Amikom Purwokerto</a>.
                </div>
                <div class="version">

                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->