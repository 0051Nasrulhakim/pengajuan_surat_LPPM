<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Detail Tugas Pengabdian
            </div>
            <?php
                $sukes = session('update_tugas_pengabdian');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
            ?>
            <?php
                $error = session('pesan_error_nomor_surat_tugas_pengabdian');
                if($error != null ){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            <?php foreach($data as $d):?>
                <form action="">
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tanggal_masuk" value="<?= $d['nomor_surat']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tanggal_masuk" value="<?= $d['tanggal_masuk']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Yang Bertandatangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="<?= $d['nama_yang_bertanda_tangan']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Jabatan Yang Bertandatangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jabatan_yang_bertanda_tangan" value="<?= $d['jabatan_yang_bertanda_tangan']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" value="<?= $d['alamat']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-4 col-form-label">Membari Tugas Kepada : </label>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-10">
                            <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control" readonly><?= $d['nama_dosen']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_dosen" value="<?= $d['nama_dosen']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jabatan" value="<?= $d['jabatan']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <textarea name="nama_mahasiswa" id="nama_mahasiswa" rows="4" class="form-control" readonly><?= $d['nama_mahasiswa']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $d['nama_mahasiswa']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <textarea name="keperluan" id="keperluan" rows="4" class="form-control" readonly><?= $d['keperluan']?></textarea>
                            <!-- <input type="text" class="form-control" name="keperluan" value="<?= $d['keperluan']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tanggal" value="<?= $d['tanggal']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <textarea name="tujuan" id="tujuan" rows="4" class="form-control" readonly><?= $d['tujuan']?></textarea>
                            <!-- <input type="text" class="form-control" name="tujuan" value="<?= $d['tujuan']?>" readonly> -->
                        </div>
                    </div>
                </form>
                <div class="lokasi_tombol">
                    <a href="<?=base_url()?>/pdf_output/preview_tugasPengabdian/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
                    <a href="<?=base_url()?>/admin/edit_tugasPengabdian/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection(); ?>