<?= $this->extend('admin/index'); ?>
    <?= $this->section('content'); ?>  
        <div class="page">
            <?php 
                $inputs 	= session()->getFlashdata('inputs_edit');
                $errors 	= session()->getFlashdata('errors_edit');
                $success    = session()->getFlashdata('success_edit');
            ?>
            
            <?php
            if(!empty($errors)){
            ?>
            <div class="alert alert-danger" role="alert">
                <ul>    
                    <?php foreach($errors as $e):?>
                        <li><?= $e?></li>
                    <?php endforeach;?>
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
            <div class="form">
                <div class="judul">
                    Format Permohonan Surat Tugas
                </div>
                <?php foreach($data as $d):?>
                <form action="<?=base_url()?>/Crud/update_suratTugas?>" method="POST">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <!-- <textarea name="nama" id="nama" rows="5" class="form-control">Nuniek Nizmah Fajriyah, M.Kep., Sp.KMB </textarea> -->
                            <input type="text" class="form-control" name="nomor_surat" value="<?=$d['nomor_surat']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="text" name="id" id="" value="<?=$d['id']?>" hidden>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama yang mengijinkan</label>
                        <div class="col-sm-10">
                            <!-- <textarea name="nama" id="nama" rows="5" class="form-control">Nuniek Nizmah Fajriyah, M.Kep., Sp.KMB </textarea> -->
                            <input type="text" class="form-control" name="nama_bertandatangan" value="<?=$d['nama_bertandatangan']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <textarea name="jabatan_bertandatangan" id="jabatan_bertandatangan" rows="5" class="form-control" ><?=$d['jabatan_bertandatangan']?></textarea>
                            <!-- <input type="text" class="form-control" name="jabatan_bertandatangan"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat_bertandatangan" id="alamat_bertandatangan" rows="4" class="form-control" ><?=$d['alamat_bertandatangan']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_mahasiswa"> -->
                        </div>
                    </div>
                    <!-- memberi tugas kepada -->
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-10">
                            <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control"><?=$d['nama_dosen']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_dosen" value="<?=$d['nama_dosen']?>" > -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <textarea name="jabatan" id="jabatan" rows="5" class="form-control" ><?=$d['jabatan']?></textarea>
                            <!-- <input type="text" class="form-control" name="keperluan"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <textarea name="nama_mahasiswa" id="nama_mahasiswa" rows="5" class="form-control" ><?=$d['nama_mahasiswa']?></textarea>
                            <!-- <input type="text" class="form-control" name="nama_mahasiswa" value="<?=$d['nama_mahasiswa']?>" > -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <textarea name="keperluan" id="keperluan" rows="5" class="form-control" ><?=$d['keperluan']?></textarea>
                            <!-- <input type="text" class="form-control" name="namaTempat"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hari / Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_pelaksanaan" value="<?=$d['tanggal_pelaksanaan']?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <textarea name="tujuan" id="tujuan" rows="5" class="form-control" ><?=$d['tujuan']?></textarea>
                            <!-- <input type="text" class="form-control" name="tujuan"> -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hari Tanggal Pengajuan Tugas</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_pengajuan" value="<?= date('Y-m-d')?>">
                        </div>
                    </div>
                    <div class="form-group btn row">    
                        <button class="btn btn-success"> simpan</button>
                    </div>
                </form>
                <?php endforeach;?>
            </div>
        </div>
    <?= $this->endSection();?>