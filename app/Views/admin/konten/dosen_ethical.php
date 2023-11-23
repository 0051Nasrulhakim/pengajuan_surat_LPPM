<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>

    <div class="page">
        <div class="form">
            <div class="judul">
                Daftar Pengajuan Ethical Clearance 
            </div>
            <?php
                $sukes = session('selesai_ethical');
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
                            <td><?= $d['nama_peneliti'];?></td>
                            <td><?= $d['tanggal_masuk'];?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin/lihat_ethical/<?=$d['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                <a href="<?=base_url()?>/admin/selesai_ethical/<?=$d['id']?>" onclick="return confirm('apakah sudah selesai dicetak..?')"><button class="tombol tombol_kuning">selesai</button></a>
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
                Daftar Pengajuan Ethical Clearance Tercetak
            </div>
            <?php
                $sukes = session('hapus_ethical');
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
                            <td><?= $t['nama_peneliti'];?></td>
                            <td><?= $t['tanggal_masuk'];?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin//<?=$t['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                <a href="<?=base_url()?>/Crud/hapus_ethical?id=<?=$t['id']?>&nama=<?=$t['nama_peneliti']?>" onclick="return confirm('apakah sudah selesai dicetak..?')"><button class="tombol tombol_merah">hapus</button></a>
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