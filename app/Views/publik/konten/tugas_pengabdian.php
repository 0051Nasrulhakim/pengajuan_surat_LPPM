<?= $this->extend('publik/index'); ?>
<?= $this->section('content'); ?>
    <?php 
        $errors 	= session()->getFlashdata('error_tugas_pengabdian');
        $success    = session()->getFlashdata('sukses_tugas_pengabdian');
        $limit      = session()->getFlashdata('Limit_pengajuan');
    ?>
     <div class="page">
        <div class="form">
            <div class="judul">
                Form Surat Tugas Pengabdian Masyarakat
            </div>
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
                if(!empty($success)){
            ?>

            <div class="alert alert-success" role="alert">
                <ul>    
                    <li><?= $success?></li>
                </ul>
            </div>
            <?php
                }
                if(!empty($limit)){
            ?>
    
                <div class="alert alert-danger" role="alert">
                    <ul>    
                        <li><?= $limit?></li>
                    </ul>
                </div>
            <?php 
                }
            ?>
            <form action="<?= base_url()?>/Crud/insert_tugasPengabdian" method="post">
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_masuk" value="<?= date('Y-m-d')?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Yang Bertandatangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_yang_bertanda_tangan" value="Nuniek Nizmah F,M.Kep., Sp.KMB">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Jabatan Yang Bertandatangan</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="jabatan_yang_bertanda_tangan" value=""> -->
                        <textarea name="jabatan_yang_bertanda_tangan" id="jabatan_yang_bertanda_tangan" rows="4" class="form-control">Ketua Lembaga Penelitian, dan Pengabdian Masyarakat Universitas Muhammadiyah Pekajangan Pekalongan</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat" value="Jl. Raya Pekajangan No.1 A Kec. Kedungwuni Kab.Pekalongan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-4 col-form-label">Membari Tugas Kepada : </label>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <textarea name="nama_dosen" id="nama_dosen" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="nama_dosen" > -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <textarea name="nama_mahasiswa" id="nama_mahasiswa" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="nama_mahasiswa"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Keperluan</label>
                    <div class="col-sm-10">
                        <!-- <textarea name="keperluan" id="keperluan" rows="4" class="form-control"></textarea> -->
                        <input type="text" class="form-control" name="keperluan" value="Pengabdian kepada masyarakat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Tujuan</label>
                    <div class="col-sm-10">
                        <textarea name="tujuan" id="tujuan" rows="4" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="tujuan"> -->
                    </div>
                </div>
                <button class="btn btn-sm btn-success"> Ajukan Surat</button>
            </form>
        </div>
    </div>
<?= $this->endSection(); ?>
