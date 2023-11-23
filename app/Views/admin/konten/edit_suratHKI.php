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
                Detail Uji Validitas
            </div>
        </div>
        <?php foreach($data as $d):
            if($d['dikategorikan']=="penelitian"){
                $kode_ketagori = 'PT';
            }else{
                $kode_ketagori = 'PM';
            }
        ?>
            <form action="<?= base_url()?>/Crud/update_suratHKI" enctype="multipart/form-data" method="POST">
                <input type="text" name="id" value="<?= $d['id']?>" hidden>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_surat" value="<?php if($d['nomor_surat']=="") {echo $nomor_surat[0]['total'].'/'.$kode_ketagori.'/LPPM/'.$bulan.'/'.$tahun;} else {echo $d['nomor_surat'];}?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_surat" value="<?= $d['tanggal_masuk']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="<?= $d['nama_yang_bertanda_tangan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">NIDN Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nidn_yang_bertanda_tangan" value="<?= $d['nidn_yang_bertanda_tangan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Pangkat Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pangkat_yang_bertanda_tangan" value="<?= $d['pangkat_yang_bertanda_tangan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Jabatan Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan_bertandatangan" value="<?= $d['jabatan_bertandatangan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Pada Perguruan Tinggi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pada_perguruan_tinggi" value="<?= $d['pada_perguruan_tinggi']?>">
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
                    <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>">
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
                    <label for="hal" class="col-sm-2 col-form-label">Bentuk Tugas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="bentuk_tugas" value="<?= $d['bentuk_tugas']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Jenis Ciptaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jenis_ciptaan" value="<?= $d['jenis_ciptaan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <textarea name="judul" id="judul" rows="4" class="form-control"><?= $d['judul']?></textarea>
                        <!-- <input type="text" class="form-control" name="judul" value="<?= $d['judul']?>"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor Permohonan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_permohonan" value="<?= $d['nomor_permohonan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal permohonan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_permohonan" value="<?= $d['tanggal_permohonan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor Pencatatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_pencatatan" value="<?= $d['nomor_pencatatan']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun_terbit" value="<?= $d['tahun_terbit']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Yang dikategorikan Bidang</label>
                    <div class="col-sm-10">
                        <select name="dikategorikan" id="" class="custom-select" >
                            <option value="penelitian" <?php if($d['dikategorikan']=="penelitian") {echo "selected";}?>>penelitian</option>
                            <option value="pengabdian" <?php if($d['dikategorikan']=="pengabdian") {echo "selected";}?>>pengabdian</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            </form>
        <?php endforeach;?>
    </div>
    <?= $this->endSection()?>