<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>   
    <div class="page">
        <div class="form">
            <div class="judul">
                Halaman Penyesuaian Nomor Surat
            </div>
            <?php
                $error = session('error_jumlah');
                if($error != null ){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
                $sukses = session('suskes');
                if($sukses != null ){
                    echo '<div class="alert alert-success">'.$sukses.'</div>';
                }
            ?>
           <?php foreach($jumlah_surat as $d):?>
            <form action="<?= base_url()?>/Crud/sesuaikan_nomor_surat">
                <div class="form-group row">
                    <label for="hal" class="col-sm-3 col-form-label">JUMLAH SURAT YANG TELAH TERBIT PADA TAHUN <?= date('Y')?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="jumlah_surat_yang_telah_terbit" value="<?=$d['total'] . ' SURAT YANG TELAH TERBIT'?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-3 col-form-label">NOMOR SURAT SEKARANG</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nomor_surat_sekarang" value="<?= $nomor_surat[0]['total']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-3 col-form-label">BUAT NOMOR SURAT DIMULAI DARI NOMOR</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="dimulai_dari">
                    </div>
                </div>
                <div class="tombol" style=" text-align: right;">
                    <button class="btn btn-sm btn-primary" onclick="return confirm('ANDA YAKIN INIGIN MENGUBAH PENOMORAN OTOMATIS KE NOMOR YANG DIMAKSUD')">Ubah Nomor Surat</button>
                </div>
            </form>
            <?php endforeach;?>
        </div>
    </div>
<?= $this->endSection();?>
