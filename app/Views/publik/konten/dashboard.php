
<?= $this->extend('publik/index'); ?>
<?= $this->section('content'); ?>
    <style>
        .card .card-text{
            height: 90px;
        }
        .row .col .dh{
            padding: 10px;
            display: flex;
            justify-content: center;
        }
    </style>
    <div class="page">
        <div class="form">
            <div class="judul">
                Dashboard Pembuatan Surat LPPM
            </div>
            <div class="row" style="align-items: center;">
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #2A2550; color: white;">
                            TUTORIAL 
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Tutorial Mengisi form pengajuan surat di website LPPPM</p>
                            <a href="<?= base_url()?>/pdf_output/tutorial_pengisian" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #2A2550; color: white;">
                            CEK STATUS PENGAJUAN 
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Mengecek Status Proses Pembuatan Surat</p>
                            <a href="<?= base_url()?>/home/cek_status_surat" class="btn btn-sm btn-primary"><i class="fa fa-list" aria-hidden="true"></i> Cek</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid; ">
                        <div class="card-header text-center" style="background-color: #005555; color: white;" >
                            <i class="fa fa-graduation-cap"></i> Mahasiswa
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Surat Pengajuan Studi Pendahuluan</p>
                            <a href="<?= base_url()?>/home/studiPendahuluan" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #005555; color: white;" >
                            <i class="fa fa-graduation-cap"></i> Mahasiswa
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Surat Pengajuan Penelitian</p>
                            <a href="<?= base_url()?>/home/pengajuan" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #005555; color: white;" >
                            <i class="fa fa-graduation-cap"></i> Mahasiswa
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Pengajuan Pembuatan Surat Uji Validitas</p>
                            <a href="<?= base_url()?>/home/ujiValiditas" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #005555; color: white;" >
                            <i class="fa fa-graduation-cap"></i> Mahasiswa
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Pengajuan Surat Determinasi Tanaman</p>
                            <a href="<?= base_url()?>/home/determinasi_tanaman" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>

                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #4C3575; color: white;">
                            <i class="fa fa-users"></i> Dosen
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Surat Tugas HKI</p>
                            <a href="<?= base_url()?>/home/surat_tugas_hki" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #4C3575; color: white;">
                            <i class="fa fa-users"></i> Dosen
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Surat Tugas Publikasi</p>
                            <a href="<?= base_url()?>/home/surat_tugas_publikasi" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #4C3575; color: white;">
                            <i class="fa fa-users"></i> Dosen
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Surat Tugas Oral Presentasi</p>
                            <a href="<?= base_url()?>/home/surat_tugas_oral_presentasi" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #4C3575; color: white;">
                            <i class="fa fa-users"></i> Dosen
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Surat Izin Ethical Clearance</p>
                            <a href="<?= base_url()?>/home/izin_ethical_clearance" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #4C3575; color: white;">
                            <i class="fa fa-users"></i> Dosen
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Pengajuan Surat Izin Penelitian</p>
                            <a href="<?= base_url()?>/home/surat_izin_penelitian" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #4C3575; color: white;">
                            <i class="fa fa-users"></i> Dosen
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Pengajuan Surat Izin Pengabdian Masyarakat</p>
                            <a href="<?= base_url()?>/home/pengabdian_masyarakat" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #4C3575; color: white;">
                            <i class="fa fa-users"></i> Dosen
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Pengajuan Pembuatan Surat Tugas Pengabdian</p>
                            <a href="<?= base_url()?>/home/tugas_pengabdian" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-4 dh">
                    <div class="card" style="width: 13rem; border: 1px solid;">
                        <div class="card-header text-center" style="background-color: #4C3575; color: white;">
                            <i class="fa fa-users"></i> Dosen
                        </div>  
                        <div class="card-body">
                            <p class="card-text">Buat Pengajuan Pembuatan Surat Tugas Penelitian</p>
                            <a href="<?= base_url()?>/home/tugas_penelitian" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ajukan Surat</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?= $this->endSection()?>