<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <?php 
            $errors 	= session()->getFlashdata('error_tugas_pengabdian');
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
                Edit Tugas Penelitian
            </div>
        </div>
        <?php foreach($data as $d):?>
            <form action="<?= base_url()?>/Crud/update_tugasPenelitian" method="post">
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
                        <input type="text" class="form-control" name="tanggal_masuk" value="<?= $d['tanggal_masuk']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Yang Bertandatangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="<?= $d['nama_yang_bertanda_tangan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Jabatan Yang Bertandatangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan_yang_bertanda_tangan" value="<?= $d['jabatan_yang_bertanda_tangan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat" value="<?= $d['alamat']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-4 col-form-label">Membari Tugas Kepada : </label>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control"><?= $d['nama_dosen']?></textarea>
                        <!-- <input type="text" class="form-control" name="nama_dosen" value="<?= $d['nama_dosen']?>"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan" value="<?= $d['jabatan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="nama_mahasiswa" id="nama_mahasiswa" rows="4" class="form-control"><?= $d['nama_mahasiswa']?></textarea>
                        <!-- <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $d['nama_mahasiswa']?>"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Keperluan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keperluan" value="<?= $d['keperluan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Judul Penelitian</label>
                    <div class="col-sm-10">
                        <textarea name="judul_penelitian" id="judul_penelitian" rows="4" class="form-control"><?= $d['judul_penelitian']?></textarea>
                        <!-- <input type="text" class="form-control" name="judul_penelitian" value="<?= $d['judul_penelitian']?>"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal" value="<?= $d['tanggal']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tujuan</label>
                    <div class="col-sm-10">
                        <textarea name="tujuan" id="tujuan" rows="4" class="form-control"><?= $d['tujuan']?></textarea>
                        <!-- <input type="text" class="form-control" name="tujuan" value="<?= $d['tujuan']?>"> -->
                    </div>
                </div>
                <button class="btn btn-sm btn-success">Update</button>
            </form>
        <?php endforeach;?>
    </div>
<?= $this->endSection(); ?>