<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <?php 
                $errors 	= session()->getFlashdata('error_edit_izinPenelitian');
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
                Edit Surat Tugas Izin Penelitian
            </div>
            <?php foreach($data as $d):?>
                <form action="<?= base_url()?>/Crud/update_izinPenelitian" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" id="" value="<?= $d['id']?>" hidden>
                    <div class="form-group row">    
                        <label for="hal" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_surat" value="<?php if($d['nomor_surat']=="") {echo $nomor_surat[0]['total'].'/PT/LPPM/'.$bulan.'/'.$tahun;} else {echo $d['nomor_surat'];}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_masuk" value="<?= $d['tanggal_masuk']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Lampiran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lampiran" value="<?= $d['lampiran']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="perihal" value="<?= $d['perihal']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                        <div class="col-sm-10">
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control"><?= $d['ditujukan_kepada']?></textarea>
                            <!-- <input type="text" class="form-control" name="ditujukan_kepada" value="<?= $d['ditujukan_kepada']?>" > -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fakultas" value="<?= $d['fakultas']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prodi" value="<?= $d['prodi']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-10">
                            <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control"><?= $d['nama_dosen']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_dosen" value="<?= $d['nama_dosen']?>"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">NIDN</label>
                        <div class="col-sm-10">
                            <textarea name="nidn" id="nidn" rows="4" class="form-control"><?= $d['nidn']?></textarea>
                            <!-- <input type="text" class="form-control" name="nidn" value="<?= $d['nidn']?>"> -->
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
                        <label for="hal" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <textarea name="nim" id="nim" rows="4" class="form-control"> <?= $d['nim']?></textarea>
                            <!-- <input type="text" class="form-control" name="nim" value="<?= $d['nim']?>"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Judul Penelitian</label>
                        <div class="col-sm-10">
                            <textarea name="judul_penelitian" id="judul_penelitian" rows="4" class="form-control"><?= $d['judul_penelitian'] ?></textarea>
                            <!-- <input type="text" class="form-control" name="judul_penelitian" value="<?= $d['judul_penelitian']?>"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Yang Bertanda Tangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="<?= $d['nama_yang_bertanda_tangan']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">NIK Yang Bertanda Tangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik_yang_bertanda_tangan" value="<?= $d['nik_yang_bertanda_tangan']?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                </form>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection(); ?>