<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Detail Surat Determinasi Tanaman
            </div>
            <?php
                $sukes = session('update_determinasiTanaman');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
                $error = session('pesan_error_nomor_surat_determinasi_tanaman');
                if($error != null ){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            <?php foreach($data as $d):?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tanggal_masuk" value="<?= $d['nomor_surat']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_masuk" value="<?= $d['tanggal_masuk']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hal" value="Izin Determinasi Tanaman" value="<?= $d['hal']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Lampiran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lampiran" value="<?= $d['lampiran']?>" readonly>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Ditujukan Kepada</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="ditujukan_kepada" value="" readonly> -->
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control" readonly><?= $d['ditujukan_kepada']?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $d['nama_mahasiswa']?>" readonly> -->
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control" readonly><?= $d['nama_mahasiswa']?></textarea>
                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="nim_mahasiswa" value="<?= $d['nim_mahasiswa']?>" readonly> -->
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control" readonly><?= $d['nim_mahasiswa']?></textarea>
                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fakultas_mhs" value="<?= $d['fakultas_mhs']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prodi_mhs" value="<?= $d['prodi_mhs']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tahun Akademik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tahun_akademik" value="<?= $d['tahun_akademik']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="alamat" value="<?= $d['alamat']?>" readonly> -->
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control" readonly><?= $d['alamat']?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="dosen_pembimbing" value="<?= $d['dosen_pembimbing']?>" readonly> -->
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control" readonly><?= $d['dosen_pembimbing']?></textarea>
                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Judul Penelitian</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="judul_penelitian" value="<?= $d['judul_penelitian']?>" readonly> -->
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control" readonly><?= $d['judul_penelitian']?></textarea>
                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nomor Telfon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_telfon" value="<?= $d['nomor_telfon']?>" readonly>
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
                    <a href="<?=base_url()?>/pdf_output/preview_determinasi_tanaman/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
                    <a href="<?=base_url()?>/admin/edit_determinasiTanaman/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection(); ?>