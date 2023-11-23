<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <?php 
                $errors 	= session()->getFlashdata('error_update_suratPublikasi');
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
                Detail Pengajuan Surat Tugas Publikasi
            </div>
            <?php foreach($data as $d):
                if($d['dikategorikan']=="penelitian"){
                    $kode_ketagori = 'PT';
                }else{
                    $kode_ketagori = 'PM';
                }    
            ?>   
            <form action="<?= base_url()?>/crud/update_publikasi" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?=$d['id']?>" id="" hidden>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomor_surat" value="<?php if($d['nomor_surat']=="") {echo $nomor_surat[0]['total'].'/'.$kode_ketagori.'/LPPM/'.$bulan.'/'.$tahun;} else {echo $d['nomor_surat'];}?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_masuk" value="<?= $d['tanggal_masuk']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Bentuk Tugas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="bentuk_tugas" value="<?= $d['bentuk_tugas']?>">
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
                    <label for="hal" class="col-sm-2 col-form-label">Pangkat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pangkat" value="<?= $d['pangkat']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">fakultas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fakultas" value="<?= $d['fakultas']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prodi" value="<?= $d['prodi']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">judul</label>
                    <div class="col-sm-10">
                        <textarea name="judul" id="judul" rows="4" class="form-control"><?= $d['judul']?></textarea>
                        <!-- <input type="text" class="form-control" name="judul" value="<?= $d['judul']?>"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Jurnal/prosiding</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_jurnal" value="<?= $d['nama_jurnal']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor dan Volume</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_dan_volume" value="<?= $d['nomor_dan_volume']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">ISSN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="issn" value="<?= $d['issn']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="penerbit" value="<?= $d['penerbit']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Kategori Jurnal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kategori_jurnal" value="<?= $d['kategori_jurnal']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Terbit</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_terbit" value="<?= $d['tanggal_terbit']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Yang dikategorikan Bidang</label>
                    <div class="col-sm-10">
                        <select name="dikategorikan" id="" class="custom-select">
                            <option value="penelitian" <?php if($d['dikategorikan']=='penelitian') {echo "selected";}?>>Penelitian</option>
                            <option value="pengabdian" <?php if($d['dikategorikan']=='pengabdian') {echo "selected";}?>>Pengabdian</option>
                        </select>
                    </div>                  
                </div>
                <button class="btn btn-success">simpan</button>
            </form>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection();?>