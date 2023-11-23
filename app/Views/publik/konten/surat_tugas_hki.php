<?= $this->extend('publik/index'); ?>
<?= $this->section('content'); ?>
    <?php 
        $errors 	= session()->getFlashdata('error_surat_tugas_hki');
        $success    = session()->getFlashdata('sukses_surat_tugas_hki');
        $limit      = session()->getFlashdata('Limit_pengajuan');
    ?>
    
<div class="page">
    <div class="form">
        <div class="judul">
            Form Surat Tugas HKI
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
        ?>

        <?php
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

        <form action="<?=base_url()?>/crud/insert_surat_tugas_hki" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_surat" value="<?= date('Y-m-d')?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Nama Dosen</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="nama_dosen"> -->
                    <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">NIDN</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="nidn"> -->
                    <textarea name="nidn" id="nidn" rows="4" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Pangkat</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="pangkat"> -->
                    <select name="pangkat" id="" class="browser-default custom-select">
                        <option value="-">Belum Mempunyai Pangkat</option>

                        <option value="Juru Muda /I.1">Juru Muda/I.A</option>
                        <option value="Juru Muda Tk 1 /I.B">Juru Muda Tk 1/I.B</option>
                        <option value="Juru /I.C">Juru/I.C</option>
                        <option value="Juru Tk 1 /I.D">Juru Tk 1/I.D</option>
                        
                        <option value="Juru Muda /I.1">Pengatur/II.A</option>
                        <option value="Pengatur Muda Tk 1 /II.B">Pengatur Muda Tk 1/II.B</option>
                        <option value="Pengatur /II.C">Pengatur /II.C</option>
                        <option value="Pengatur Tk 1 /II.D">Pengatur Tk 1/II.D</option>

                        <option value="Penata Muda /III.A">Penata Muda/III.A</option>
                        <option value="Penata Muda Tk 1 /III.B">Penata Muda Tk 1/III.B</option>
                        <option value="Penata /III.C">Penata/III.C</option>
                        <option value="Penata Tk 1 /III.D">Penata Tk 1/III.D</option>

                        <option value="Pembina /IV.A">Pembina /IV.A</option>
                        <option value="Pembina Tk 1 /IV.B">Pembina Tk 1/IV.B</option>
                        <option value="Pembina Utama Muda /IV.C">Pembina Utama Muda/IV.C</option>
                        <option value="Pembina Utama Madya /IV.D">Pembina Utama Madya/IV.D</option>
                        <option value="Pembina Utama /IV.E">Pembina Utama/IV.E</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="universitas" value="Univeritas Muhammadiyah Pekajangan Pekalongan">
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
                <label for="hal" class="col-sm-2 col-form-label">Prodi</label>
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
                <label for="hal" class="col-sm-2 col-form-label">Bentuk Tugas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bentuk_tugas" value="Memo Surat tugas HKI" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Jenis Ciptaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenis_ciptaan">
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="judul"> -->
                    <textarea name="judul" id="judul" rows="4" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Nomor Permohonan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomor_permohonan">
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Tanggal permohonan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_permohonan">
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Nomor Pencatatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomor_pencatatan">
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tahun_terbit">
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Yang dikategorikan Bidang</label>
                <div class="col-sm-10">
                    <select name="dikategorikan" id="" class="browser-default custom-select">
                        <option value="penelitian">Penelitian</option>
                        <option value="pengabdian">Pengabdian</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-success">Ajukan Surat</button>
        </form>
    </div>
</div>
<?= $this->endSection();?>