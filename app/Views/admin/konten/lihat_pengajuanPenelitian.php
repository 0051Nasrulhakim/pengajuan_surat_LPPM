<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
<div class="page">
    <?php 
    // dd($data);
        $success    = session()->getFlashdata('success_edit_penelitian');
        $errors    = session()->getFlashdata('pesan_error_nomor_surat_penelitian');
    ?>
    
    <?php
    if(!empty($errors)){
    ?>
    <div class="alert alert-danger" role="alert">
        <ul>    
            <?= $errors;?>
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
    ?>
    <!--  -->
    <div class="form">
        <div class="judul">
            Form Pengajuan Penelitian
        </div>
        <?php foreach($data as $d):?>
        <form action="<?=base_url()?>/Crud/insertPengajuan_penelitian" enctype="multipart/form-data" method="POST">
            <input type="text" name="id" value="<?= $d['id']?>" hidden>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_surat" value="<?= $d['nomor_surat']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Lampiran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lampiran" value="<?=$d['lampiran']?>"readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">hal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="hal" value="Pengajuan Penelitian" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tanggal_masuk" value="<?=$d['tanggal_masuk']?>" readonly>
                </div>
            </div>
            
            
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                <div class="col-sm-10">
                    <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="5" class="form-control" readonly><?=$d['ditujukan_kepada']?></textarea>
                    <!-- <input type="text" class="form-control" name="nama_mahasiswa"> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Prodi Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="prodi" value="<?= $d['prodi_mhs']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">fakultas Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fakultas" value="<?= $d['fakultas_mhs']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Universitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Tahun akademik</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly name="tahun_akademik" value="<?= $d['tahun_akademik']?>" placeholder="2022/2023">
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                    <textarea name="nama" id="nama" rows="4" class="form-control" readonly><?= $d['nama_mahasiswa']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                    <textarea name="nim" id="nim" rows="4" class="form-control" readonly><?=$d['nim_mahasiswa']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                    <textarea name="alamat_mhs" id="alamat_mhs" rows="4" class="form-control" readonly><?= $d['alamat']?></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dosen_pembimbing" readonly value="<?=$d['dosen_pembimbing']?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Judul Penelitian</label>
                <div class="col-sm-10">
                    <textarea name="judul_penelitian" id="judul_penelitian" rows="5" readonly class="form-control"><?=$d['judul_penelitian']?></textarea>
                    <!-- <input type="text" class="form-control" name="judul_penelitian"> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Telfon</label>
                <div class="col-sm-10">
                    <!-- <textarea name="nomot_telfon" id="nomor_telfon" rows="5" readonly class="form-control"></textarea> -->
                    <input type="text" class="form-control" name="nomor_telfon" value="<?=$d['nomor_telfon']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Yang Bertanda Tangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="<?=$d['nama_yang_bertanda_tangan']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">NIK Yang Bertanda Tangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nik_yang_bertanda_tangan" value="<?=$d['nik_yang_bertanda_tangan']?>" readonly>
                </div>
            </div>
        </form>
            <div class="lokasi_tombol">
                <a href="<?=base_url()?>/pdf_output/preview_penelitian/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
                <a href="<?=base_url()?>/admin/edit_pengajuanPenelitian/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
            </div> 
        <?php endforeach?>
    </div>
</div>
    
<?= $this->endSection();?>