<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>

    <div class="page">
        <div class="form">
            <div class="judul">
                Daftar Pengajuan Surat Tugas
            </div>
            <div class="table-responsive">
                <table class="table" id="atas">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Tanggal pengajuan</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i=1; foreach($data as $d):?>
                            <tr>
                                <th scope="row"><?=$i?></th>
                                <td style="width: 30%;"><?= $d['nama_dosen'];?></td>
                                <td><?= $d['tanggal_pengajuan'];?></td>
                                <td style="text-align: center;">
                                    <a href="<?=base_url()?>/admin/lihat/<?=$d['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                    <a href="<?=base_url()?>/admin/selesaiSuratTugas/<?=$d['id']?>" onclick="return confirm('apakah sudah selesai dicetak..?')"><button class="tombol tombol_kuning">Selesai</button></a>
                                </td>
                            </tr>
                            <?php $i++; endforeach;?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="page">
        <div class="form">
            <div class="judul">
                Daftar Surat Tugas Tercetak
            </div>
            <?php
                $sukes = session('success_delete');
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
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <?php $i=1; foreach($sudah_cetak as $sc):?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td style="width: 30%;"><?= $sc['nama_dosen'];?></td>
                            <td><?= $sc['tanggal_pengajuan'];?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin/lihat/<?=$sc['id']?>"><button class="tombol tombol_hijau">Lihat</button></a>
                                <a href="<?=base_url()?>/Crud/hapusSt/<?=$sc['id']?>" onclick="return confirm('apakah yakin ingin menghapus..?')"> <button class="tombol tombol_merah">hapus</button></a>
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
                $('#atas').DataTable();
            });
        </script>

<?= $this->endSection();?>