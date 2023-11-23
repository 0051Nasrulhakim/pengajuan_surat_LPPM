<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Detail Pengajuan Surat Tugas HKI
            </div>
            <?php
                $sukes = session('sukses_update_suratHKI');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }

                $error = session('pesan_error_nomor_surat_hki');
                if($error != null ){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            <?php foreach($data as $d):?>
            <form action="" enctype="text/plain">
                <input type="text" name="id" value="<?=$d['id']?>" id="" hidden>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tanggal_surat" value="<?= $d['nomor_surat']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_surat" value="<?= $d['tanggal_masuk']?>" readonly>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="<?= $d['nama_yang_bertanda_tangan']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">NIDN Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nidn_yang_bertanda_tangan" value="<?= $d['nidn_yang_bertanda_tangan']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Pangkat Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pangkat_yang_bertanda_tangan" value="<?= $d['pangkat_yang_bertanda_tangan']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Jabatan Yang Bertanda Tangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan_bertandatangan" value="<?= $d['jabatan_bertandatangan']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Pada Perguruan Tinggi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pada_perguruan_tinggi" value="<?= $d['pada_perguruan_tinggi']?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="nama_dosen" value="<?= $d['nama_dosen']?>" readonly> -->
                        <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control" readonly><?= $d['nama_dosen']?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">NIDN</label>
                    <div class="col-sm-10">
                        <textarea name="nidn" id="nidn" rows="4" class="form-control" readonly><?= $d['nidn']?></textarea>
                        <!-- <input type="text" class="form-control" name="nidn" value="<?= $d['nidn']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Pangkat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pangkat" value="<?= $d['pangkat']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">fakultas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fakultas" value="<?= $d['fakultas']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prodi" value="<?= $d['prodi']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Bentuk Tugas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="bentuk_tugas" value="<?= $d['bentuk_tugas']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Jenis Ciptaan</label>
                    <div class="col-sm-10">
                        
                        <input type="text" class="form-control" name="jenis_ciptaan" value="<?= $d['jenis_ciptaan']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <textarea name="judul" id="judul" rows="4" class="form-control" readonly><?= $d['judul']?></textarea>
                        <!-- <input type="text" class="form-control" name="judul" value="<?= $d['judul']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor Permohonan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_permohonan" value="<?= $d['nomor_permohonan']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal permohonan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_permohonan" value="<?= $d['tanggal_permohonan']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor Pencatatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_pencatatan" value="<?= $d['nomor_pencatatan']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun_terbit" value="<?= $d['tahun_terbit']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Yang dikategorikan Bidang</label>
                    <div class="col-sm-10">
                        <select name="dikategorikan" id="" class="custom-select" >
                            <option value="penelitian" <?php if($d['dikategorikan']=="penelitian") {echo "selected";}?>>Penelitian</option>
                            <option value="pengabdian" <?php if($d['dikategorikan']=="pengabdian") {echo "selected";}?>>pengabdian</option>
                        </select>
                    </div>
                </div>
            </form>
            <?php endforeach;?>
            <div class="lokasi_tombol" >
                <a href="<?=base_url()?>/pdf_output/preview_suratHKI/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
                <a href="<?=base_url()?>/admin/edit_suratHKI/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
            </div>
        </div>
    </div>
<?= $this->endSection()?>