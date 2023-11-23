<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <?php 
                $inputs 	= session()->getFlashdata('inputs_studiPendahuluan');
                $errors 	= session()->getFlashdata('errors_studiPendahuluan');
                $success    = session()->getFlashdata('success_studiPendahuluan');
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
            if(!empty($success)){
            ?>

            <div class="alert alert-success" role="alert">
                <?= $success;?>
            </div>

            <?php
                }
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
                EDIT Uji Validitas
            </div>
            <?php foreach($data as $d):?>
            <form action="<?= base_url()?>/Crud/update_ujiValiditas" enctype="multipart/form-data" method="POST">
                <input type="text" name="id" value="<?= $d['id']?>" hidden>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_surat" value="<?php if($d['nomor_surat']=="") {echo $nomor_surat[0]['total'].'/PT/LPPM/'.$bulan.'/'.$tahun;} else {echo $d['nomor_surat'];}?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lampiran" value="<?=$d['lampiran']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Hal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hal" value="<?=$d['hal']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal surat</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_surat" value="<?=$d['tanggal_surat']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                    <div class="col-sm-10">
                        <textarea name="ditujukan_kepada" id="ditujukan_kepada" class="form-control" rows="4" ><?=$d['ditujukan_kepada']?></textarea>
                        <!-- <input type="text" class="form-control" name="ditujukan_kepada" value="<?=$d['ditujukan_kepada']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Prodi Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prodi_mhs" value="<?=$d['prodi_mhs']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Fakultas Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fakultas_mhs" value="<?=$d['fakultas_mhs']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="<?=$d['universitas']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun_akademik" value="<?=$d['tahun_akademik']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="nama" id="nama" class="form-control" rows="4" ><?=$d['nama']?></textarea>
                        <!-- <input type="text" class="form-control" name="nama_nim_mhs" value="<?=$d['nama']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nim Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="nim" id="nim" class="form-control" rows="4" ><?=$d['nim']?></textarea>
                        <!-- <input type="text" class="form-control" name="nama_nim_mhs" value="<?=$d['nim']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="alamat_mhs" id="alamat_mhs" class="form-control" rows="4" ><?=$d['alamat_mhs']?></textarea>
                        <!-- <input type="text" class="form-control" name="alamat_mhs" value="" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                    <div class="col-sm-10">
                    <textarea name="dosen_pembimbing" id="dosen_pembimbing" class="form-control" rows="4"><?=$d['dosen_pembimbing']?></textarea>
                        <!-- <input type="text" class="form-control" name="dosen_pembimbing" value="" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Judul Penelitian</label>
                    <div class="col-sm-10">
                        <textarea name="judul_penelitian" id="judul_penelitian" class="form-control" rows="4"><?=$d['judul_penelitian']?></textarea>
                        <!-- <input type="text" class="form-control" name="judul_penelitian" value="" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Telfon</label>
                    <div class="col-sm-10">
                        <textarea name="nomor_telfon" id="nomor_telfon" class="form-control" rows="4"><?=$d['nomor_telfon']?></textarea>
                        <!-- <input type="text" class="form-control" name="judul_penelitian" value="" readonly> -->
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
                <div class="form-group btn row">    
                    <button class="btn btn-success"> simpan</button>
                </div>
            </form>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection();?>