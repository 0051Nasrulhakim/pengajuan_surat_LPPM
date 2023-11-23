<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
<div class="page">
    <div class="form">
        <div class="judul">
            Form Uji Validitas
        </div>
        <?php
            $sukes = session('success_ujiValiditas');
            if($sukes != null ){
                echo '<div class="alert alert-success">'.$sukes.'</div>';
            }
            $error = session('pesan_error_ujiValiditas_error');
            if($error != null ){
                echo '<div class="alert alert-danger">'.$error.'</div>';
            }
        ?>
        <?php foreach($data as $d):?>
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_surat" value="<?=$d['nomor_surat']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lampiran" value="<?=$d['lampiran']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Hal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hal" value="<?=$d['hal']?>" readonly>
                    </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_surat" value="<?= $d['tanggal_surat']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="hal" class="col-sm-2 col-form-label">Hal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="hal" value="<?= $d['hal']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="Ditujukan Kepada" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="ditujukan_kepada"> -->
                    <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control" readonly><?= $d['ditujukan_kepada']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="Prodi Mahasiswa" class="col-sm-2 col-form-label">Prodi Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="prodi_mhs" value="<?= $d['prodi_mhs']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="fakultas Mahasiswa" class="col-sm-2 col-form-label">Fakultas Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fakultas_mhs" value="<?= $d['fakultas_mhs']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Universitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Tahun akademik</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tahun_akademik" readonly value="<?= $d['tahun_akademik']?>" placeholder="2021/2022">
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                    <textarea name="nama" id="nama" rows="4" class="form-control" readonly><?= $d['nama']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                    <textarea name="nim" id="nim" rows="4" class="form-control" readonly><?= $d['nim']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                    <textarea name="alamat_mhs" id="alamat_mhs" rows="4" class="form-control" readonly><?= $d['alamat_mhs']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                    <textarea name="dosen_pembimbing" id="dosen_pembimbing" rows="4" class="form-control" readonly><?= $d['dosen_pembimbing']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Judul Penelitian</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="tahun_akademik" placeholder="2021/2022"> -->
                    <textarea name="judul_penelitian" id="judul_penelitian" rows="4" class="form-control" readonly><?= $d['judul_penelitian']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="universitas" class="col-sm-2 col-form-label">Nomor Telfon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomor_telfon" value="<?= $d['nomor_telfon']?>" readonly>
                    <!-- <textarea name="judul_penelitian" id="judul_penelitian" rows="4" class="form-control"></textarea> -->
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
            <a href="<?=base_url()?>/pdf_output/preview_ujiValiditas/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
            <a href="<?=base_url()?>/admin/edit_ujiValiditas/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?= $this->endSection()?>