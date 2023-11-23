<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Detail Surat Tugas Oral Presentasi
            </div>
            <?php
                $sukes = session('sukses_update_oralPresentasi');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
                $error = session('pesan_error_nomor_surat_tugas_oral');
                if($error != null ){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            
            <?php foreach($data as $d):?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" id="" value="<?= $d['id']?>" hidden>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_surat" value="<?= $d['nomor_surat']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_masuk" value="<?= date('Y-m-d')?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-10">
                            <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control" readonly><?= $d['nama']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_dosen" value="<?= $d['nama']?>" readonly> -->
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
                        <label for="hal" class="col-sm-2 col-form-label">Fakultas</label>
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
                        <label for="hal" class="col-sm-2 col-form-label">Universitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="universitas" value="<?= $d['universitas']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Bentuk Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bentuk_kegiatan" value="<?= $d['bentuk_kegiatan']?>" readonly readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea name="nama_kegiatan" id="nama_kegiatan" rows="4" class="form-control" readonly><?= $d['nama_kegiatan']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_kegiatan" value="<?= $d['nama_kegiatan']?>" readonly readonly> -->
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
                        <label for="hal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal" value="<?= $d['tanggal']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hal" class="col-sm-2 col-form-label">dikategorikan</label>
                        <div class="col-sm-10">
                            <select name="dikategorikan" id="" class="custom-select">
                                <option value="penelitian" <?php if($d['dikategorikan']=='penelitian'){echo 'selected';}?>>Penelitian</option>
                                <option value="pengabdian" <?php if($d['dikategorikan']=='pengabdian'){echo 'selected';}?>>Pengabdian</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="lokasi_tombol">
                    <a href="<?=base_url()?>/pdf_output/preview_oralPresentasi/<?=$d['id'];?>?nomor_surat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
                    <a href="<?=base_url()?>/admin/edit_oralPresentasi/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection();?>