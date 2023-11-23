<?= $this->extend('publik/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <?php 
            $errors 	= session()->getFlashdata('error_determinasiTanaman');
            $success    = session()->getFlashdata('success_determinasiTanaman');
            $limit      = session()->getFlashdata('Limit_pengajuan');
        ?>
        
        <?php
        if(!empty($errors)){
        ?>
        <div class="alert alert-danger" role="alert">
            <ul>    
                <?php foreach($errors as $e):?>
                    <li><?= $e?></li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php
            }
        ?>

    <?php
        if(!empty($limit)){
    ?>
    <div class="alert alert-danger" role="alert">
            <?= $limit;?>
    </div>
    <?php
        }
    ?>

        <!--  -->
        <?php
            if(!empty($success)){
        ?>

            <div class="alert alert-success" role="alert">
                <?= $success;?>
            </div>

        <?php
            }
        ?>
        <div class="form">
            <div class="judul">
                Form Surat Determinasi Tanaman
            </div>
            <form action="<?=base_url()?>/Crud/determinasi_tanaman" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_masuk" value="<?= date('Y-m-d')?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hal" value="Izin Determinasi Tanaman">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lampiran" value="-">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="Universitas Muhammadiyah Pekajangan Pekalongan" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="ditujukan_kepada"> -->
                        <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="nama_mahasiswa"> -->
                        <textarea name="nama_mahasiswa" id="nama_mahasiswa" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="nim_mahasiswa"> -->
                        <textarea name="nim_mahasiswa" id="nim_mahasiswa" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="fakultas_mhs"> -->
                        <select name="fakultas_mhs" id="" class="custom-select">
                            <option value="">PILIH FAKULTAS</option>
                            <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomo dan Bisnis (FEB)</option>
                            <option value="Fakultas Ilmu Kesehatan">Fakultas Ilmu Kesehatan (FIKES)</option>
                            <option value="Fakultas Teknik dan Ilmu Komputer">Fakultas Teknik dan Ilmu Komputer(FASTIKOM)</option>
                            <option value="Fakultas Lain...">Fakultas Lain</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="prodi_mhs"> -->
                        <select name="prodi_mhs" id="" class="browser-default custom-select">
                            <option value="">PILIH PROGRAM STUDI</option>
                            <option value="Diploma Tiga Akuntansi">D3 - Akuntansi</option>
                            <option value="Sarjana Akuntansi">S1 - Akuntansi</option>
                            <option value="Sarjana Ekonomi Syariah">S1 - Ekonomi Syariah</option>
                            <option value="Sarjana Manajement">S1 - Manajement</option>
                            <option value="Diploma Tiga Keperawatan">D3 - Keperawatan</option>
                            <option value="Sarjana Keperawatan">S1 - Keperawatan</option>
                            <option value="Diploma Tiga Kebidanan">D3 - Kebidanan</option>
                            <option value="Sarjana Kebidanan">S1 - Kebidanan</option>
                            <option value="Sarjana Fisioterapi">S1 - Fisioterapi</option>
                            <option value="Sarjana Farmasi">S1 - Farmasi</option>
                            <option value="Sarjana Pendidikan Jasmani dan Olahraga">S1 - Pendidikan Jasmani dan Olahraga</option>
                            <option value="Diploma Tiga Manajement Informatika">D3 - Management Informatika</option>
                            <option value="Diploma Tiga Teknik Elektro">D3 - Teknik Elektronika</option>
                            <option value="Diploma Tiga Teknik Mesin">D3 - Teknik Mesin</option>
                            <option value="Sarjana Informatika">S1 - Informatika</option>
                            <option value="Jurusan Lain...">Jurusan Lain...</option>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun_akademik">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="alamat"> -->
                        <textarea name="alamat" id="alamat" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="dosen_pembimbing"> -->
                        <textarea name="dosen_pembimbing" id="dosen_pembimbing" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Judul Penelitian</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="judul_penelitian"> -->
                        <textarea name="judul_penelitian" id="judul_penelitian" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor Telfon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_telfon">
                    </div>
                </div>
                <button class="btn btn-sm btn-success">Ajukan Surat</button>
            </form>
        </div>
    </div>
<?= $this->endSection(); ?>