<?= $this->extend('admin/index'); ?>
    <?= $this->section('content'); ?>
        <div class="page">
            <div class="form">
                <div class="judul">
                    Daftar Pengajuan Penelitian
                </div>
                <?php
                    $sukes = session('success_delete_pegajuan_penelitian');
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
                                <td><?= $d['nama_mahasiswa'];?></td>
                                <td><?= $d['tanggal_masuk'];?></td>
                                <td style="text-align: center;">
                                    <a href="<?=base_url()?>/admin/lihatPengajuanPenelitian/<?=$d['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                    <a href="<?=base_url()?>/admin/selesai/<?=$d['id']?>" onclick="return confirm('apakah sudah selesai dicetak..?')"><button class="tombol tombol_kuning">selesai</button></a>
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
                    Daftar Pengajuan Penelitian Tercetak
                </div>
                <?php
                    $sukes = session('success_delete_pegajuan_penelitian');
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
                        <?php $i=1; foreach($belum_cetak as $bc):?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?= $bc['nama_mahasiswa'];?></td>
                            <td><?= $bc['tanggal_masuk'];?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin/lihatPengajuanPenelitian/<?=$bc['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                <a href="<?=base_url()?>/Crud/hapusPengajuanPenelitian/<?=$bc['id']?>"><button class="tombol tombol_merah">Hapus</button></a>
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
            $('#tercetak').DataTable();
            $('#daftar').DataTable();
        });        
    </script>
    <?= $this->endSection();?>

