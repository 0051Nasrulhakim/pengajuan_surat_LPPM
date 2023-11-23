<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>

    <div class="page">
        <div class="form">
            <div class="judul">
                DAFTAR USER
            </div>
            <?php
                $sukes = session('sukses_user');
                if($sukes != null ){
                    echo '<div class="alert alert-success">'.$sukes.'</div>';
                }
                $sukes_edit = session('sukses_edit');
                if($sukes_edit != null ){
                    echo '<div class="alert alert-success">'.$sukes_edit.'</div>';
                }
                $selesai = session('sukses_hapus');
                if($selesai != null ){
                    echo '<div class="alert alert-success">'.$selesai.'</div>';
                }
                $error = session('gagal_hapus');
                if($error != null ){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
    
            <a href="<?= base_url()?>/admin/tambah_user"><button type="submit" style="padding: 4px;" class="tombol tombol_hijau">Tambah</button></a>
            <div class="table-responsive">
                <table class="table" id="daftar_user">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data as $d):?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $d['username']?></td>
                            <td><?= $d['role']?></td>
                            <td style="text-align: center;">
                                <a href="<?=base_url()?>/admin/edit_user/<?=$d['id']?>"><button class="tombol tombol_hijau">Edit</button></a>
                                <a href="<?=base_url()?>/Crud/hapus_user/<?=$d['id']?>?username=<?= $d['username']?>" onclick="return confirm('apakah yakin ingin menghapus user..?')"><button class="tombol tombol_kuning">Hapus</button></a>
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
            $('#daftar_user').DataTable();
        });        
    </script>
<?= $this->endSection()?>