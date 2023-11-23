<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>


    <div class="page">
        <div class="form">
            <div class="judul">
                Daftar Pengajuan Surat Uji Validitas Belum Tercetak
            </div>            
            <!-- table atas -->
            <div class="table-responsive">
                <table class="table" id="daftar">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Pengajuan</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;foreach($data as $d):?>
                        <tr>
                            <th scope="row"><?= $i?></th>
                            <td style="width: 30%;"><?=$d['nama']?></td>
                            <td><?= $d['tanggal_surat']?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin/lihat_ujiValiditas/<?=$d['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                <a href="<?=base_url()?>/admin/selesaiUjiValiditas/<?=$d['id']?>" onclick="return confirm('apakah sudah selesai dicetak..?')"><button class="tombol tombol_kuning">Selesai</button></a>
                            </td>
                        </tr>
                        <?php $i++; endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="page">
        <div class="form">
            <div class="judul">
                Daftar Surat Uji Validitas Tercetak
            </div>
            <?php
                $sukes = session('success_delete_ujiValiditas');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
            ?>
            
            <!-- table atas -->
            <div class="table-responsive">
                <table class="table" id="tercetak">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Pengajuan</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;foreach($tercetak as $sc):?>
                        <tr>
                            <th scope="row"><?= $i?></th>
                            <td style="width: 30%;"><?=$sc['nama']?></td>
                            <td><?= $sc['tanggal_surat']?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin/lihat_ujiValiditas/<?=$sc['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                <a href="<?=base_url()?>/Crud/hapus_ujiValiditas/<?=$sc['id']?>" onclick="return confirm('apakah yakin ingin menghapus..?')"> <button class="tombol tombol_merah">hapus</button></a>
                            </td>
                        </tr>
                        <?php $i++; endforeach?>
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