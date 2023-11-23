<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Detail Pengajuan Surat Tugas Publikasi
            </div>
            <?php
                $sukes = session('sukses_update_suratPublikasi');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
                $error = session('pesan_error_nomor_surat_tugas_publikasi');
                if($error != null ){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            <?php foreach($data as $d):?>   
            <form action="" enctype="text/plain">
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
                    <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Bentuk Tugas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="bentuk_tugas" value="<?= $d['bentuk_tugas']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control" readonly><?= $d['nama_dosen']?></textarea>
                        <!-- <input type="text" class="form-control" name="nama_dosen" value="<?= $d['nama_dosen']?>" readonly> -->
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
                    <label for="hal" class="col-sm-2 col-form-label">judul</label>
                    <div class="col-sm-10">
                        <textarea name="judul" id="judul" rows="4" class="form-control" readonly><?= $d['judul']?></textarea>
                        <!-- <input type="text" class="form-control" name="judul" value="<?= $d['judul']?>" readonly> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Jurnal/prosiding</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_jurnal" value="<?= $d['nama_jurnal']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nomor dan Volume</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_dan_volume" value="<?= $d['nomor_dan_volume']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">ISSN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="issn" value="<?= $d['issn']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="penerbit" value="<?= $d['penerbit']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Kategori Jurnal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kategori_jurnal" value="<?= $d['kategori_jurnal']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Terbit</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_terbit" value="<?= $d['tanggal_terbit']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Yang dikategorikan Bidang</label>
                    <div class="col-sm-10">
                        <select name="dikategorikan" id="" class="custom-select" readonly>
                            <option value="penelitian" <?php if($d['dikategorikan']=='penelitian') {echo "selected";}?>>Penelitian</option>
                            <option value="pengabdian" <?php if($d['dikategorikan']=='pengabdian') {echo "selected";}?>>Pengabdian</option>
                        </select>
                    </div>

                </div>
            </form>
            <div class="lokasi_tombol">
                <a href="<?=base_url()?>/pdf_output/preview_suratPublikasi/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
                <a href="<?=base_url()?>/admin/edit_suratPublikasi/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
            </div>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection();?>