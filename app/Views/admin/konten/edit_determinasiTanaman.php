<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <?php 
            $errors 	= session()->getFlashdata('error_update_suratHKI');
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

            <!--  -->
        <?php
                
        $tahun = date('Y');
        $bulan = date('m');
            switch($bulan){
                case '01':
                    $bulan = 'I';
                    break;
                case '02':
                    $bulan = 'II';
                    break;
                case '03':
                    $bulan = 'III';
                    break;
                case '04':
                    $bulan = 'IV';
                    break;
                case '05':
                    $bulan = 'V';
                    break;
                case '06':
                    $bulan = 'VI';
                    break;
                case '07':
                    $bulan = 'VII';
                    break;
                case '08':
                    $bulan = 'VIII';
                    break;
                case '09':
                    $bulan = 'IX';
                    break;
                case '10':
                    $bulan = 'X';
                    break;
                case '11':
                    $bulan = 'XI';
                    break;
                case '12':
                    $bulan = 'XII';
                    break;
            }
        ?>
        <div class="form">
            <div class="judul">
                Edit Determinasi Tanaman
            </div>
        </div>
        <?php foreach($data as $d):?>
            <form action="<?=base_url()?>/Crud/update_determinasiTanaman" method="post" enctype="multipart/form-data">
                <input type="text" name="id" value="<?= $d['id']?>" hidden>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_surat" value="<?php if($d['nomor_surat']=="") {echo $nomor_surat[0]['total'].'/PT/LPPM/'.$bulan.'/'.$tahun;} else {echo $d['nomor_surat'];}?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_masuk" value="<?= $d['tanggal_masuk']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hal" value="Izin Determinasi Tanaman" value="<?= $d['hal']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lampiran" value="<?= $d['lampiran']?>">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="ditujukan_kepada" value="<?= $d['ditujukan_kepada']?>"> -->
                        <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control"><?= $d['ditujukan_kepada']?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $d['nama_mahasiswa']?>"> -->
                        <textarea name="nama_mahasiswa" id="nama_mahasiswa" rows="4" class="form-control"><?= $d['nama_mahasiswa']?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="nim_mahasiswa" value="<?= $d['nim_mahasiswa']?>"> -->
                        <textarea name="nim_mahasiswa" id="nim_mahasiswa" rows="4" class="form-control"><?= $d['nim_mahasiswa']?></textarea>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fakultas_mhs" value="<?= $d['fakultas_mhs']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prodi_mhs" value="<?= $d['prodi_mhs']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun_akademik" value="<?= $d['tahun_akademik']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="alamat" value="<?= $d['alamat']?>"> -->
                        <textarea name="alamat" id="alamat" rows="4" class="form-control"><?= $d['alamat']?></textarea>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="dosen_pembimbing" value="<?= $d['dosen_pembimbing']?>"> -->
                        <textarea name="dosen_pembimbing" id="dosen_pembimbing" rows="4" class="form-control"><?= $d['dosen_pembimbing']?></textarea>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Judul Penelitian</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="judul_penelitian" value="<?= $d['judul_penelitian']?>"> -->
                        <textarea name="judul_penelitian" id="judul_penelitian" rows="4" class="form-control"><?= $d['judul_penelitian']?></textarea>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor Telfon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_telfon" value="<?= $d['nomor_telfon']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="<?=$d['nama_yang_bertanda_tangan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">NIK Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nik_yang_bertanda_tangan" value="<?=$d['nik_yang_bertanda_tangan']?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Update</button>
            </form>
        <?php endforeach;?>
    </div>
<?= $this->endSection(); ?>
