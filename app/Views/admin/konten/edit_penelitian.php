<?= $this->extend('admin/index'); ?>
    <?= $this->section('content'); ?>
        <div class="page">
            <?php foreach($data as $d):?>    
            <div class="form">
                <div class="judul">
                    EDIT Pengajuan Penelitian
                </div>
                <?php 
                        $inputs 	= session()->getFlashdata('inputs_edit_penelitian');
                        $errors 	= session()->getFlashdata('errors_edit_penelitian');
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
                    $sukes = session('pesan_error_nomor_surat_penelitian');
                    if($sukes != null ){
                        echo '<div class="alert alert-danger">'.$sukes.'</div>';
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
                
                <form action="<?= base_url()?>/Crud/updatePengajuan_penelitian" enctype="multipart/form-data" method="POST">
                    <input type="text" name="id" value="<?=$d['id']?>" hidden>
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
                        <label for="inputPassword" class="col-sm-2 col-form-label">hal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hal" value="<?=$d['hal']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_masuk" value="<?=$d['tanggal_masuk']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                        <div class="col-sm-10">
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="5" class="form-control" ><?=$d['ditujukan_kepada']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_mahasiswa"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Prodi Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prodi" value="<?=$d['prodi_mhs']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">fakultas Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fakultas" value="<?=$d['fakultas_mhs']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Universitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="universitas" value="<?=$d['universitas']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tahun akademik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tahun_akademik" value="<?=$d['tahun_akademik']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="universitas" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                            <textarea name="nama" id="nama" rows="4" class="form-control" ><?= $d['nama_mahasiswa']?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="universitas" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                            <textarea name="nim" id="nim" rows="4" class="form-control" ><?=$d['nim_mahasiswa']?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="universitas" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                            <textarea name="alamat" id="alamat" rows="4" class="form-control" ><?=$d['alamat']?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dosen_pembimbing" value="<?=$d['dosen_pembimbing']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Judul Penelitian</label>
                        <div class="col-sm-10">
                            <textarea name="judul_penelitian" id="judul_penelitian" rows="5" class="form-control" ><?=$d['judul_penelitian']?></textarea>
                            <!-- <input type="text" class="form-control" name="judul_penelitian"> -->
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
            </div>
            <?php endforeach;?>
        </div>
    <?= $this->endSection();?>
