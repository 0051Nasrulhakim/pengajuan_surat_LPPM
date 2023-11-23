<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LPPM - ICO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>/assets/admin/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/custom.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/metisMenu.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/typography.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/default-css.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/styles.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/admin/css/responsive.css">
    <!-- modernizr css -->
    <!-- <script src="<?=base_url()?>/assets/js/vendor/modernizr-2.8.3.min.js"></script> -->
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?=base_url()?>"><img src="<?=base_url()?>/assets/publik/logo.png" alt="logo"><p style="color: white; margin-top:8px;">LPPM - UMPP </p></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu" style="overflow: auto; margin-bottom: 60px;">
                            <li class="<?= $kategori == 'Dashboard' ? 'active': '' ?>">
                                <a href="<?=base_url()?>/home" ><i class="ti-dashboard"></i><span>dashboard</span></a>
                                
                            </li>
                            <li class="<?= $kategori == 'Mahasiswa' ? 'active': '' ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-graduation-cap"></i><span>Mahasiswa
                                    </span></a>
                                <ul class="collapse">
                                    <li class="<?= $slug == 'Studi Pendahuluan' ? 'active': '' ?>"><a href="<?=base_url()?>/home/studiPendahuluan">Studi Pendahuluan</a></li>
                                    <li class="<?= $slug == 'Pengajuan Penelitian' ? 'active': '' ?>"><a href="<?=base_url()?>/home/pengajuan">Pengajuan Penelitian</a></li>
                                    <li class="<?= $slug == 'Uji Validitas' ? 'active': '' ?>"><a href="<?=base_url()?>/home/ujiValiditas">Uji Validitas</a></li>
                                    <li class="<?= $slug == 'Determinasi Tanaman' ? 'active': '' ?>"><a href="<?=base_url()?>/home/determinasi_tanaman">Determinasi Tanaman</a></li>
                                </ul>
                            </li>
                            <li class="<?= $kategori == 'Dosen' ? 'active': '' ?>" style="margin-bottom: 20%;">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i><span>Dosen</span></a>
                                <ul class="collapse">
                                    <!-- <li  class="<?= $slug == 'Surat Tugas' ? 'active': '' ?>"><a href="<?= base_url()?>/home/dosen_suratTugas">Surat Tugas</a></li> -->
                                    <li  class="<?= $slug == 'Surat Tugas Hki' ? 'active': '' ?>"><a href="<?= base_url()?>/home/surat_tugas_hki">Memo Surat Tugas Hki</a></li>
                                    <li  class="<?= $slug == 'Surat Tugas Publikasi' ? 'active': '' ?>"><a href="<?= base_url()?>/home/surat_tugas_publikasi">Memo Surat Tugas Publikasi</a></li>
                                    <li  class="<?= $slug == 'Surat Tugas Oral Presentasi' ? 'active': '' ?>"><a href="<?= base_url()?>/home/surat_tugas_oral_presentasi">Surat Tugas Oral Presentasi</a></li>
                                    <li  class="<?= $slug == 'Izin Ethical Clearance' ? 'active': '' ?>"><a href="<?= base_url()?>/home/izin_ethical_clearance">Surat Izin Ethical Clearance</a></li>
                                    <li  class="<?= $slug == 'Izin Penelitian' ? 'active': '' ?>"><a href="<?= base_url()?>/home/surat_izin_penelitian">Surat Izin Penelitian</a></li>
                                    <li  class="<?= $slug == 'Izin Pengabdian Masyarakat' ? 'active': '' ?>"><a href="<?= base_url()?>/home/pengabdian_masyarakat">Surat Izin Pengabdian masyarakat</a></li>
                                    <li  class="<?= $slug == 'Tugas Pengabdian Masyarakat' ? 'active': '' ?>"><a href="<?= base_url()?>/home/tugas_pengabdian">Surat Tugas Pengabdian</a></li>
                                    <li  class="<?= $slug == 'Tugas Penelitian' ? 'active': '' ?>"><a href="<?= base_url()?>/home/tugas_penelitian">Surat Tugas Penelitian</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- header area start -->
        <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left" style="margin-left: -17px !important;">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                        <div class="search-box pull-left" style="margin-top: 10px; margin-left: -12px !important; margin-right: -13px !important;">
                            <div class="row">
                                <div class="col">
                                    <h5><?php if($kategori == 'Dosen'){echo '<i class="fa fa-users" aria-hidden="true" style="margin-right:8px;"></i>';}else if($kategori == 'Mahasiswa'){echo '<i class="fa fa-graduation-cap"  aria-hidden="true" style="margin-right:8px;"></i>';}else if($kategori == 'Dashboard'){echo '<i class="ti-dashboard" aria-hidden="true" style="margin-right:8px;"></i>';}?><?= $slug?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        
                    </div>
                </div>
            </div>
            <!-- header area end -->
