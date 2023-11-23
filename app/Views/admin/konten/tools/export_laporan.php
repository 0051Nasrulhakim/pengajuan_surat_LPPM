<?= $this->extend('admin/index'); ?>
<?= $this->section('content'); ?>   

    <div class="row">
        <div class="col-md-6">
            <div class="page">
                <div class="form">
                    <div class="judul" style="margin-bottom: 5%;">
                        <strong>Export EXCELL Laporan Surat</strong>
                    </div>
                    <?php
                        $errors 	= session()->getFlashdata('export_error_excell');
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
                    <form action="<?= base_url()?>/excell_output/export_excell" method="post">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Bulan</label>
                            <div class="col-sm-9">
                                <select name="dari_bulan" id="" class="custom-select">
                                    <option value="">PILIH BULAN</option>
                                    <option value="I">Janurai</option>
                                    <option value="II">Febuari</option>
                                    <option value="III">Maret</option>
                                    <option value="IV">April</option>
                                    <option value="V">Mei</option>
                                    <option value="VI">Juni</option>
                                    <option value="VII">Juli</option>
                                    <option value="VIII">Agustus</option>
                                    <option value="IX">September</option>
                                    <option value="X">Oktober</option>
                                    <option value="XI">November</option>
                                    <option value="XII">Desember</option>
                                    <option value="CETAK_SEMUA">CETAK SATU TAHUN</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tahun" id="">
                            </div>
                        </div>
                        <div class="lokasi_tombol" style="margin-right: 3%;">
                            <button class="tombol tombol_hijau">Export EXCELL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end excell -->
        
        <div class="col-md-6">
            <div class="page">
                <div class="form">
                    <div class="judul" style="margin-bottom: 5%;">
                        <strong>Export PDF Laporan Surat</strong>
                    </div>
                    <?php
                        $errors 	= session()->getFlashdata('error_export_pdf');
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
                    <form action="<?= base_url()?>/pdf_output/export_pdf" method="post">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Bulan</label>
                            <div class="col-sm-9">
                                <select name="dari_bulan" id="" class="custom-select">
                                    <option value="">PILIH BULAN</option>
                                    <option value="I">Janurai</option>
                                    <option value="II">Febuari</option>
                                    <option value="III">Maret</option>
                                    <option value="IV">April</option>
                                    <option value="V">Mei</option>
                                    <option value="VI">Juni</option>
                                    <option value="VII">Juli</option>
                                    <option value="VIII">Agustus</option>
                                    <option value="IX">September</option>
                                    <option value="X">Oktober</option>
                                    <option value="XI">November</option>
                                    <option value="XII">Desember</option>
                                    <option value="CETAK_SEMUA">CETAK SATU TAHUN</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tahun" id="">
                            </div>
                        </div>
                        <div class="lokasi_tombol" style="margin-right: 3%;">
                            <button class="tombol tombol_merah">Export PDF</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection();?>
