<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Detail Pengajuan Penelitian
            </div>
            <?php
            // dd($nomor_surat);
                    $sukes = session('pesan_error_studi_pendahuluan');
                    if($sukes != null ){
                        echo '<div class="alert alert-danger">'.$sukes.'</div>';
                    }
            ?>
            <?php foreach($data as $d):?>
            <form action="" enctype="multipart/form-data" method="POST">
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
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tanggal_surat" value="<?=$d['tanggal_surat']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                    <div class="col-sm-10">
                        <textarea name="alamat_mhs" id="alamat_mhs" class="form-control" rows="4" readonly><?=$d['ditujukan_kepada']?></textarea>
                        <!-- <input type="text" class="form-control" name="ditujukan_kepada" value="<?=$d['ditujukan_kepada']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Prodi Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prodi_mhs" value="<?=$d['prodi_mhs']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Fakultas Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fakultas_mhs" value="<?=$d['fakultas_mhs']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="<?=$d['universitas']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun_akademik" value="<?=$d['tahun_akademik']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="nim" id="nim" class="form-control" rows="4" readonly><?=$d['nama']?></textarea>
                        <!-- <input type="text" class="form-control" name="nama_nim_mhs" value="<?=$d['nama']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">nim Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="nim" id="nim" class="form-control" rows="4" readonly><?=$d['nim']?></textarea>
                        <!-- <input type="text" class="form-control" name="nama_nim_mhs" value="<?=$d['nama']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="alamat_mhs" id="alamat_mhs" class="form-control" rows="4" readonly><?=$d['alamat_mhs']?></textarea>
                        <!-- <input type="text" class="form-control" name="alamat_mhs" value="<?=$d['alamat_mhs']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                    <div class="col-sm-10">
                    <textarea name="dosen_pembimbing" id="dosen_pembimbing" class="form-control" rows="4" readonly><?=$d['dosen_pembimbing']?></textarea>
                        <!-- <input type="text" class="form-control" name="dosen_pembimbing" value="<?=$d['dosen_pembimbing']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Judul Penelitian</label>
                    <div class="col-sm-10">
                        <textarea name="judul_penelitian" id="judul_penelitian" class="form-control" rows="4" readonly><?=$d['judul_penelitian']?></textarea>
                        <!-- <input type="text" class="form-control" name="judul_penelitian" value="<?=$d['judul_penelitian']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Telfon</label>
                    <div class="col-sm-10">
                        <!-- <textarea name="judul_penelitian" id="judul_penelitian" class="form-control" rows="4" readonly><?=$d['judul_penelitian']?></textarea> -->
                        <input type="text" class="form-control" name="no_telfon" value="<?=$d['nomor_telfon']?>" readonly>
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
                <a href="<?=base_url()?>/pdf_output/preview_studiPendahuluan/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
                <a href="<?=base_url()?>/admin/edit_studiPendahuluan/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
            </div>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection();?>