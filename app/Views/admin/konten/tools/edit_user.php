<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>

    <div class="page">
        <div class="form">
            <div class="judul">
                EDIT USER
            </div>
            <?php
                $errors 	= session()->getFlashdata('error_edit_user');
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
            <?php foreach($data as $d):?>
            <form action="<?= base_url()?>/Crud/update_user" method="post">
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" value="<?= $d['username']?>">
                        <input type="text" class="form-control" name="id" value="<?= $d['id']?>" hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="<?= $d['nama']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" value="<?= $d['password']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hal" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select name="role" class="browser-default custom-select" id="">
                            <option value="">user biasa</option>
                            <option value="super admin" <?php if($d['role'] == 'super admin'){echo 'selected';}?>>super admin</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-sm btn-success">Simpan</button>
            </form>
            <?php endforeach;?>
        </div>
    </div>
<?php $this->endSection()?>