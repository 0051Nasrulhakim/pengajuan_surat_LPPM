<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LPPM - ICO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- data tabel -->
    <!-- table css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

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
                    <!-- <a href="index.html"><img src="<?=base_url()?>/assets/admin/images/icon/logo.png" alt="logo"></a> -->
                    <h3 style="color: white;"> ADMIN <br>LPPM - UMPP</h3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu" style="overflow: auto; margin-bottom: 60px;">>
                            <li class="<?= $kategori == 'Dashboard' ? 'active': '' ?>">
                                <a href="<?=base_url()?>/admin" ><i class="ti-dashboard"></i><span>dashboard</span></a>
                                
                            </li>
                            <li class="<?= $kategori == 'Mahasiswa' ? 'active': '' ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-graduation-cap"></i><span>Mahasiswa
                                    </span></a>
                                <ul class="collapse">
                                    <li class="<?= $slug == 'Studi Pendahuluan' ? 'active': '' ?>"><a href="<?=base_url()?>/admin/studiPendahuluan">Studi Pendahuluan</a></li>
                                    <li class="<?= $slug == 'Pengajuan Penelitian' ? 'active': '' ?>"><a href="<?=base_url()?>/admin/pengajuanPenelitian">Pengajuan Penelitian</a></li>
                                    <li class="<?= $slug == 'Uji Validitas' ? 'active': '' ?>"><a href="<?=base_url()?>/admin/ujiValiditas">Uji Validitas</a></li>
                                    <li class="<?= $slug == 'Determinasi Tanaman' ? 'active': '' ?>"><a href="<?=base_url()?>/admin/determinasi_tanaman">Determinasi Tanaman</a></li>
                                </ul>
                            </li>
                            <li class="<?= $kategori == 'Dosen' ? 'active': '' ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i><span>Dosen</span></a>
                                <ul class="collapse">
                                    <!-- <li class="<?= $slug == 'Surat Tugas' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/suratTugas">Surat Tugas</a></li> -->
                                    <li class="<?= $slug == 'Surat Tugas HKI' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/suratTugasHKI">Surat Tugas HKI</a></li>
                                    <li class="<?= $slug == 'Surat Tugas Publikasi' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/suratPublikasi">Surat Tugas Publikasi</a></li>
                                    <li class="<?= $slug == 'Surat Oral Presentasi' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/oral_presentasi">Surat Oral Presentasi</a></li>
                                    <li class="<?= $slug == 'Surat Ethical Clearance' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/ethical">Surat Ethical Clearance </a></li>
                                    <li class="<?= $slug == 'Izin Penelitian' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/izin_penelitian">Izin Penelitian </a></li>
                                    <li class="<?= $slug == 'Izin Pengabdian Masyarakat' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/izin_pengabdianMasyarakat">Izin Pengadian Masyarakat </a></li>
                                    <li class="<?= $slug == 'Tugas Pengabdian Masyarakat' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/tugas_pengabdian">Tugas Pengabdian </a></li>
                                    <li class="<?= $slug == 'Tugas Penelitian' ? 'active': '' ?>" ><a href="<?= base_url()?>/admin/tugas_penelitian">Tugas Penelitian </a></li>
                                </ul>
                            </li>
                            <li class="<?= $kategori == 'TOOLS' ? 'active': '' ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>PENGATURAN</span></a>
                                <ul class="collapse">
                                    <li class="<?= $slug == 'User Page' ? 'active': '' ?>" <?php if(session()->role == ""){echo 'hidden';}?>><a href="<?=base_url()?>/admin/user_page">User Page</a></li>
                                    <li class="<?= $slug == 'Export Laporan Surat' ? 'active': '' ?>"><a href="<?=base_url()?>/admin/export_laporan">EXPORT LAPORAN SURAT</a></li>
                                    <li class="<?= $slug == 'Penyesuaian Nomor Surat' ? 'active': '' ?>"><a href="<?=base_url()?>/admin/penyesuaian_nomor">PENYESUAIAN NOMER SURAT</a></li>
                                </ul>
                            </li>
                            <li class="<?= $slug == 'Log Out' ? 'active': '' ?>"><a href="<?=base_url()?>/auth/log_out">Log Out</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- header area start -->
        
        <!-- header area end -->
