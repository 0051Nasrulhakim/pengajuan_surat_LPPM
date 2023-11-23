<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Detail Surat Izin Pengabdian Masyarakat
            </div>
            <?php
                $sukes = session('sukses_update_pengabdianMasyarakat');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
                $error = session('pesan_error_nomor_surat_pengabdian_masyarakat');
                if($error != null ){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            
            <?php foreach($data as $d):?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" id="" value="<?=$d['id']?>" hidden>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_surat" value="<?= $d['nomor_surat']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_masuk" value="<?= $d['tanggal_masuk'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Lampiran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lampiran" value="<?= $d['lampiran']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="perihal" value="<?= $d['perihal']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Ditujukan_kepada</label>
                        <div class="col-sm-10">
                            <textarea name="ditujukan_kepada" id="ditujukan_kepada" rows="4" class="form-control" readonly><?= $d['ditujukan_kepada']?></textarea>
                            <!-- <input type="text" class="form-control" name="ditujukan_kepada" value="<?= $d['ditujukan_kepada']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">fakultas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fakultas" value="<?= $d['fakultas']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prodi" value="<?= $d['prodi']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">universitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">nama dosen</label>
                        <div class="col-sm-10">
                            <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control" readonly><?= $d['nama_dosen']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_dosen" value="<?= $d['nama_dosen']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">nidn</label>
                        <div class="col-sm-10">
                            <textarea name="nidn" id="nidn" rows="4" class="form-control" readonly><?= $d['nidn']?></textarea>
                            <!-- <input type="text" class="form-control" name="nidn" value="<?= $d['nidn']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control" readonly><?= $d['nama_mahasiswa']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $d['nama_mahasiswa']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <textarea name="nim" id="nim" rows="4" class="form-control" readonly><?= $d['nim']?></textarea>
                            <!-- <input type="text" class="form-control" name="nim" value="<?= $d['nim']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Judul Pengabdian</label>
                        <div class="col-sm-10">
                            <textarea name="judul_pengabdian" id="judul_pengabdian" rows="4" class="form-control" readonly><?= $d['judul_pengabdian']?></textarea>
                            <!-- <input type="text" class="form-control" name="judul_pengabdian" value="<?= $d['judul_pengabdian']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Yang Bertanda Tangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="<?= $d['nama_yang_bertanda_tangan']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">NIK Yang Bertanda Tangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik_yang_bertanda_tangan" value="<?= $d['nik_yang_bertanda_tangan']?>" readonly>
                        </div>
                    </div>
                </form>
                <div class="lokasi_tombol">
                    <a href="<?=base_url()?>/pdf_output/preview_pengabdianMasyarakat/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
                    <a href="<?=base_url()?>/admin/edit_pengabdianMasyarakat/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
                </div> 
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection(); ?>