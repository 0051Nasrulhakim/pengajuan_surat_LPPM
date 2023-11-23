<?= $this->extend('publik/index'); ?>
<?= $this->section('content'); ?>
    <div class="page">
        <div class="form">
            <div class="judul">
                Form Cek Status Pengajuan Surat
            </div>
            <form action="<?= base_url()?>/Cek_surat/cek_status_surat" method="post">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="">NIM atau NIDN</label>
                    <input type="text" class="form-control" name="nim_atau_nidn" id="nim_atau_nidn" placeholder="Masukkan NiM atau NIDN">
                </div>
                <div class="form-group">
                    <label for="">Jenis Surat yang di ajukan</label>
                    <select name="jenis_surat" id="" class="browser-default custom-select">
                        <option value="">Pilih Jenis Surat</option>
                        <option value="studi_pendahuluan">Studi Pendahuluan</option>
                        <option value="pengajuan_penelitian">Pengajuan Penelitian</option>
                        <option value="uji_validitas">Uji Validitas</option>
                        <option value="determinasi_tanaman">Determinasi Tanaman</option>
                        <option value="surat_tugas_hki">Memo Surat Tugas HKI</option>
                        <option value="surat_tugas_publikasi">Surat Tugas Publikasi</option>
                        <option value="surat_oral_presentasi">Surat Tugas Oral Presentasi</option>
                        <option value="surat_izin_ethical_clearance">Surat Izin Ethical Clearance</option>
                        <option value="surat_izin_penelitian">Surat Izin Penelitian</option>
                        <option value="surat_izin_pengabdian_masyarakat">Surat Izin Pengabdian Masyarakat</option>
                        <option value="surat_tugas_pengabdian">Surat Tugas Pengabdian</option>
                        <option value="surat_tugas_penelitian">Surat Tugas Penelitian</option>
                    </select>
                </div>
                <div class="tombol" style="margin-left: 80%;">
                    <button class="btn btn-sm btn-success">Cek Status Surat</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection()?>