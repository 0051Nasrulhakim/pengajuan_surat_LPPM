<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>

    <div class="page">
        <div class="form">
            <div class="judul">
                Daftar Pengajuan Surat Tugas Publikasi
            </div>
            <?php
                $sukes = session('selesaiPublikasi');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
            ?>
            <div class="table-responsive">
                <table class="table" id="daftar">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data as $d):?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?= $d['nama_dosen'];?></td>
                            <td><?= $d['tanggal_masuk'];?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin/lihat_suratPublikasi/<?=$d['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                <a href="<?=base_url()?>/admin/selesai_suratPublikasi/<?=$d['id']?>" onclick="return confirm('apakah sudah selesai dicetak..?')"><button class="tombol tombol_kuning">selesai</button></a>
                            </td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="page">
        <div class="form">
            <div class="judul">
                Daftar Pengajuan Surat Tugas Publikasi Tercetak
            </div>
            <?php
                $sukes = session('hapusPublikasi');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
            ?>
            <div class="table-responsive">
                <table class="table" id="tercetak">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($tercetak as $t):?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?= $t['nama_dosen'];?></td>
                            <td><?= $t['tanggal_masuk'];?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin//<?=$t['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                <a href="<?=base_url()?>/Crud/hapusPublikasi?id=<?=$t['id']?>&nama=<?=$t['nama_dosen']?>" onclick="return confirm('apakah sudah selesai dicetak..?')"><button class="tombol tombol_merah">hapus</button></a>
                            </td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#daftar').DataTable();
            $('#tercetak').DataTable();
        });        
    </script>
<?= $this->endSection();?>