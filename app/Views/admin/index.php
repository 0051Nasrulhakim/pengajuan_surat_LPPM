<?= $this->include('admin/header'); ?>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <!-- header -->    
        <!-- main content area start -->
        <div class="main-content">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="col-md-6 col-sm-8 ">
                    <div class="nav-btn pull-left" style="margin-top: 25px;">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="row align-items-center head-info">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"><?= $slug?></h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix info-user">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="<?=base_url()?>/assets/admin/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= session()->username?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?=base_url()?>/auth/log_out">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
            <?php echo $this->renderSection('content'); ?>
            </div>
        </div>        
        <!-- main content area end -->
    <!-- footer -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul"></h5>
            </div>
            <div class="modal-body">
                <div class="isi">
                    <p id="isi"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Tutup</button>
                <button type="button" class="btn btn-primary" id="tampilkan">perbarui</button>
            </div>
            </div>
        </div>
    </div>
    <script>
            Pusher.logToConsole = true;

            var pusher = new Pusher('b0620d205cd319bb0d47', {
            cluster: 'ap1'
            });
            
            // pusher 1
            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(pesan) {
                var bel = new Audio('<?= base_url()?>/doorbell.mp3');
                bel.currentTime = 0;
                bel.play();

                $('#exampleModal').modal('show')
                $('#judul').text(JSON.stringify(pesan.judul));
                $('#isi').text(JSON.stringify(pesan.isi));
                
                
                var close = document.getElementById('close')
                var tampilkan = document.getElementById('tampilkan')

                close.addEventListener('click', function(){
                    $('#exampleModal').modal('hide')
                })

                tampilkan.addEventListener('click', function(){
                    if(pesan.judul == "STUDI PENDAHULUAN"){
                        window.location = "http://localhost:8080/admin/studiPendahuluan";
                    }else if(pesan.judul == "PENGAJUAN PENELITIAN"){
                        window.location = "http://localhost:8080/admin/pengajuanPenelitian";
                    }else if(pesan.judul == "SURAT TUGAS"){
                        window.location = "http://localhost:8080/admin/suratTugas";
                    }else if(pesan.judul == "UJI VALIDITAS"){
                        window.location = "http://localhost:8080/admin/ujiValiditas";
                    }else if(pesan.judul == "DETERMINASI TANAMAN"){
                        window.location = "http://localhost:8080/admin/determinasi_tanaman";
                    }else if(pesan.judul == "SURAT TUGAS HKI"){
                        window.location = "http://localhost:8080/admin/suratTugasHKI";
                    }else if(pesan.judul == "SURAT TUGAS PUBLIKASI"){
                        window.location = "http://localhost:8080/admin/suratPublikasi";
                    }else if(pesan.judul == "ORAL PRESENTASI"){
                        window.location = "http://localhost:8080/admin/oral_presentasi";
                    }else if(pesan.judul == "ETHICAL CLEARENCE"){
                        window.location = "http://localhost:8080/admin/ethical";
                    }else if(pesan.judul == "IZIN PENELITIAN"){
                        window.location = "http://localhost:8080/admin/izin_penelitian";
                    }else if(pesan.judul == "IZIN PENGABDIAN MASYARAKAT"){
                        window.location = "http://localhost:8080/admin/izin_pengabdianMasyarakat";
                    }else if(pesan.judul == "TUGAS PENGABDIAN MASYARAKAT"){
                        window.location = "http://localhost:8080/admin/tugas_pengabdian";
                    }else if(pesan.judul == "TUGAS PENELITIAN"){
                        window.location = "http://localhost:8080/admin/tugas_penelitian";
                    }
                })
            });

            // pushser 2
            var channel2 = pusher.subscribe('my-channel');
    </script>

    <?php echo $this->include('admin/footer'); ?>