<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <?php 
                $errors 	= session()->getFlashdata('error_edit_pengabdianMasyarakat');
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
                Detail Uji Validitas
            </div>

            <?php foreach($data as $d):?>
                <form action="<?= base_url()?>/Crud/update_pengabdianMasyarakat" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" id="" value="<?=$d['id']?>" hidden>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_surat" value="<?php if($d['nomor_surat']=="") {echo $nomor_surat[0]['total'].'/PM/LPPM/'.$bulan.'/'.$tahun;} else {echo $d['nomor_surat'];}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_masuk" value="<?= $d['tanggal_masuk'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Lampiran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lampiran" value="<?= $d['lampiran']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="perihal" value="<?= $d['perihal']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Ditujukan_kepada</label>
                        <div class="col-sm-10">
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control"><?= $d['ditujukan_kepada']?></textarea>
                            <!-- <input type="text" class="form-control" name="ditujukan_kepada" value="<?= $d['ditujukan_kepada']?>"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">fakultas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fakultas" value="<?= $d['fakultas']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prodi" value="<?= $d['prodi']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">universitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">nama dosen</label>
                        <div class="col-sm-10">
                            <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control"><?= $d['nama_dosen']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_dosen" value="<?= $d['nama_dosen']?>"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">nidn</label>
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
                            <textarea name="nim" id="nim" rows="4" class="form-control"><?= $d['nim']?></textarea>
                            <!-- <input type="text" class="form-control" name="nim" value="<?= $d['nim']?>"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Judul Pengabdian</label>
                        <div class="col-sm-10">
                            <textarea name="judul_pengabdian" id="judul_pengabdian" rows="4" class="form-control"><?= $d['judul_pengabdian']?></textarea>
                            <!-- <input type="text" class="form-control" name="judul_pengabdian" value="<?= $d['judul_pengabdian']?>"> -->
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
                    <button class="btn btn-success">Simpan</button>
                </form>
            <?php endforeach?>
        </div>
    </div>
<?= $this->endSection(); ?>