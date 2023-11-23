<?= $this->extend('admin/index'); ?>
    <?= $this->section('content'); ?>  
        <div class="page">
            <div class="form">
                <div class="judul">
                    Format Permohonan Surat Tugas
                </div>
                
                <?php
                    $sukes = session('pesan_error_nomor_surat');
                    if($sukes != null ){
                        echo '<div class="alert alert-danger">'.$sukes.'</div>';
                    }
                ?>
                
                        
                <?php foreach($data as $d):?>
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <!-- <textarea name="nama" id="nama" rows="5" class="form-control">Nuniek Nizmah Fajriyah, M.Kep., Sp.KMB </textarea> -->
                            <input type="text" class="form-control" name="nomor_surat" value="<?=$d['nomor_surat']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama yang mengijinkan</label>
                        <div class="col-sm-10">
                            <!-- <textarea name="nama" id="nama" rows="5" class="form-control">Nuniek Nizmah Fajriyah, M.Kep., Sp.KMB </textarea> -->
                            <input type="text" class="form-control" name="nama_bertandatangan" value="<?=$d['nama_bertandatangan']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <textarea name="jabatan_bertandatangan" id="jabatan_bertandatangan" rows="5" class="form-control" readonly><?=$d['jabatan_bertandatangan']?></textarea>
                            <!-- <input type="text" class="form-control" name="jabatan_bertandatangan"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat_bertandatangan" id="alamat_bertandatangan" rows="4" class="form-control" readonly><?=$d['alamat_bertandatangan']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_mahasiswa"> -->
                        </div>
                    </div>
                    <!-- memberi tugas kepada -->
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-10">
                            <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control" readonly><?=$d['nama_dosen']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_dosen" value="<?=$d['nama_dosen']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <textarea name="jabatan" id="jabatan" rows="5" class="form-control" readonly><?=$d['jabatan']?></textarea>
                            <!-- <input type="text" class="form-control" name="keperluan"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <textarea name="nama_mahasiswa" id="nama_mahasiswa" rows="5" class="form-control" readonly><?=$d['nama_mahasiswa']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_mahasiswa" value="<?=$d['nama_mahasiswa']?>" readonly> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <textarea name="keperluan" id="keperluan" rows="5" class="form-control" readonly><?=$d['keperluan']?></textarea>
                            <!-- <input type="text" class="form-control" name="namaTempat"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hari / Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_pelaksanaan" value="<?=$d['tanggal_pelaksanaan']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <textarea name="tujuan" id="tujuan" rows="5" class="form-control" readonly><?=$d['tujuan']?></textarea>
                            <!-- <input type="text" class="form-control" name="tujuan"> -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hari Tanggal Pengajuan Tugas</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_pengajuan" value="<?= date('Y-m-d')?>">
                        </div>
                    </div>
                    
                </form>
                    <div class="lokasi_tombol">
                        <a href="<?= base_url()?>/Pdf_output/cetak/<?=$d['id'];?>"><button class="tombol tombol_hijau"><i class="fa fa-download" aria-hidden="true" >Download</i></button></a>
                        <a href="<?=base_url()?>/pdf_output/preview/<?=$d['id'];?>?nomorsurat=<?=$d['nomor_surat']?>"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Preview</i></button></a>
                        <a href="<?=base_url()?>/admin/edit/<?=$d['id'];?>"><button class="tombol tombol_kuning"><i class="fa fa-pencil" aria-hidden="true">Edit</i></button></a>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        
    <?= $this->endSection();?>