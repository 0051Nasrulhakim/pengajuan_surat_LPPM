<?= $this->extend('publik/index'); ?>
<?= $this->section('content'); ?>
    <?php 
        $errors 	= session()->getFlashdata('error_pengabdian_masyarakat');
        $success    = session()->getFlashdata('sukses_pengabdian_masyarakat');
        $limit    = session()->getFlashdata('Limit_pengajuan');
    ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Form Surat Izin Pengabdian Masyarakat
            </div>
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
                if(!empty($success)){
            ?>

            <div class="alert alert-success" role="alert">
                <ul>    
                    <li><?= $success?></li>
                </ul>
            </div>
            <?php 
                }
                if(!empty($limit)){
            ?>
                <div class="alert alert-danger" role="alert">
                    <ul>    
                        <li><?= $limit?></li>
                    </ul>
                </div>
            <?php 
                }
            ?>

            <form action="<?= base_url()?>/Crud/pengabdian_masyarakat" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_masuk" value="<?= date('Y-m-d')?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lampiran" value="-">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="perihal" value="Permohonan Izin Pengabdian" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Ditujukan_kepada</label>
                    <div class="col-sm-10">
                        <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="ditujukan_kepada"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">fakultas</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="fakultas"> -->
                        <select name="fakultas" id="" class="custom-select">
                            <option value="">PILIH FAKULTAS</option>
                            <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomo dan Bisnis (FEB)</option>
                            <option value="Fakultas Ilmu Kesehatan">Fakultas Ilmu Kesehatan (FIKES)</option>
                            <option value="Fakultas Teknik dan Ilmu Komputer">Fakultas Teknik dan Ilmu Komputer(FASTIKOM)</option>
                            <option value="Fakultas Lain...">Fakultas Lain</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">prodi</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="prodi"> -->
                        <select name="prodi" id="" class="browser-default custom-select">
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
                    <label for="hal" class="col-sm-2 col-form-label">universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="Universitas Muhammadiyah Pekajangan Pekalongan" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">nama dosen</label>
                    <div class="col-sm-10">
                        <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="nama_dosen"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">nidn</label>
                    <div class="col-sm-10">
                        <textarea name="nidn" id="nidn" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="nidn"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="nama_mahasiswa" id="nama_mahasiswa" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="nama_mahasiswa"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <textarea name="nim" id="nim" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="nim"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Judul Pengabdian</label>
                    <div class="col-sm-10">
                        <textarea name="judul_pengabdian" id="judul_pengabdian" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="judul_pengabdian"> -->
                    </div>
                </div>
                <button class="btn btn-success">Ajukan Surat</button>
            </form>
        </div>
    </div>
<?= $this->endSection();?>