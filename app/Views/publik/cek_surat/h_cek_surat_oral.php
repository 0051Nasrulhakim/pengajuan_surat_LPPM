<?= $this->extend('publik/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Cek Surat <?= $kode?>
            </div>
            <div class="table-responsive">
                <table class="table" id="cek">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">NIDN</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($data)):?>
                            <?php $i=1; foreach($data as $d):?>
                            <tr>
                                <td scope="row"><?=$i?></td>
                                <td scope="row"><?=$d['nama']?></td>
                                <td scope="row"><?=$d['nidn']?></td>
                                <td scope="row"><?=$d['tanggal_masuk']?></td>
                                <td scope="row"><?=$d['status_pengajuan']?></td>
                            </tr>
                            <?php $i++; endforeach;?>
                        <?php endif;?>
                        <?php if(empty($data)):?>
                            <td colspan="4" style="text-align: center;"><H4>Data Surat Tidak Ditemukan</H4></td>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection()?>