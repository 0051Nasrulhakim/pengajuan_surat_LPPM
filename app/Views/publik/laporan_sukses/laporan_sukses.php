<?= $this->extend('publik/index'); ?>
<?= $this->section('content'); ?>
    <style>
        table tr{
            height: 30px;
        }

    </style>
    <div class="page">
        <i class="fa fa-check" aria-hidden="true"></i> Pengajuan Surat Permohonan Penelitian Berhasil Silahkah download form di bawah kemudian di cetak untuk di tunjukkan ke LPPM
        <p style="text-align: center; margin-top: 6%;">Detail Permohonan Surat <?= session()->get('perihal')?></p>
        
        <table style="border: none;">
            <tr style="vertical-align: top;">
                <td>perihal</td>
                <td style="width: 8px;">:</td>
                <td><?= session()->get('perihal');  ?></td>
            </tr>
            <tr style="vertical-align: top;">
                <td>Nama</td>
                <td>:</td>
                <td><?= session()->get('nama');?></td>
            </tr>
            <tr style="vertical-align: top;">
                <td>NIM</td>
                <td>:</td>
                <td><?= session()->get('nim');?></td>
            </tr>
            <tr style="vertical-align: top;">
                <td>Fakultas</td>
                <td>:</td>
                <td><?= session()->get('fakultas');?></td>
            </tr>
            <tr style="vertical-align: top;">
                <td>Prodi</td>
                <td>:</td>
                <td><?= session()->get('prodi');?></td>
            </tr>
            <tr style="vertical-align: top;">
                <td>Tahun Akademik</td>
                <td>:</td>
                <td><?= session()->get('tahun_akademik');?></td>
            </tr>
            <tr style="vertical-align: top;">
                <td>Judul Penelitian</td>
                <td>:</td>
                <td><?= session()->get('judul_penelitian');?></td>
            </tr>
            <tr style="vertical-align: top;">
                <td>Dosen Pembimbing </td>
                <td>:</td>
                <td><?= session()->get('dosen_pembimbing');?></td>
            </tr>
            <tr style="vertical-align: top;">
                <td>Tanggal Pengajuan</td>
                <td>:</td>
                <td><?= session()->get('tanggal_pengajuan');?></td>
            </tr>
        </table>
        <div class="lokasi_tombol">
            <a href="<?=base_url()?>/pdf_output/selesai"><button type="submit" class="tombol tombol_biru"><i class="fa fa-eye" aria-hidden="true">Download</i></button></a>
        </div>
    </div>
<?= $this->endSection()?>