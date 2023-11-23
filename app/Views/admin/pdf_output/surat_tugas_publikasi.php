<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    *{
        font-size: 12pt;
        margin: 0;
        padding: 0;
        line-height: 0.5cm;
    }
    table tr td{
        padding-bottom: 0.2cm;
    }
</style>

<?php 
    $tangal = date('Y-m-d'); 
    date('d F Y', strtotime($tangal));

    function tglIndonesia($tgl){
        $nama_bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tgl);
        return $pecahkan[2] . ' ' . $nama_bulan [ (int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
?>

<body>
    <?php foreach($data['data'] as $d):?>
        <div class="page" style="margin-top: 4.5cm; margin-left: 2.5cm; margin-right: 1.7cm; ">
            <div class="nomor-surat" style="text-align: center; margin-bottom: 0.5cm;">
                <div class="isi" style="width: auto; margin-left: auto; margin-right: auto;">
                    <p>SURAT TUGAS</p>
                    <hr style="width: 130px; margin-left: auto; margin-right: auto;">
                    <p>Nomor : <?= $d['nomor_surat']?></p>
                </div>
            </div>

            <div class="isi-surat">
                <p style="margin-bottom: 0.2cm;">Yang bertanda tangan dibawah ini :</p>
                <table style="margin-left: 0.5cm; margin-bottom: 0.2cm;">
                    <tr>
                        <td style="width: 235px;">1. Nama </td>
                        <td>:</td>
                        <td><?= $d['nama_yang_bertanda_tangan']?></td>
                    </tr>
                    <tr>
                        <td>2. Nidn </td>
                        <td>:</td>
                        <td><?= $d['nidn_yang_bertanda_tangan']?></td>
                    </tr>
                    <tr>
                        <td>3. Pangkat/Golongan </td>
                        <td>:</td>
                        <td><?= $d['pangkat_yang_bertanda_tangan']?></td>
                    </tr>
                    <tr>
                        <td>4. Jabatan </td>
                        <td>:</td>
                        <td><?= $d['jabatan_masyarakat']?></td>
                    </tr>
                    <tr>
                        <td>5. Pada Perguruan Tinggi </td>
                        <td>:</td>
                        <td><?= $d['pada_perguruan_tinggi']?></td>
                    </tr>
                </table>

                <p style="margin-bottom: 0.2cm;">Memberikan Tugas Kepada :</p>
                <table style="margin-left: 0.5cm; margin-bottom: 0.2cm;">
                    <tr>
                        <td style="width: 235px;">1. Nama </td>
                        <td>:</td>
                        <td><?= $d['nama_dosen']?></td>
                    </tr>
                    <tr>
                        <td>2. Nidn </td>
                        <td>:</td>
                        <td><?= $d['nidn']?></td>
                    </tr>
                    <tr>
                        <td>3. Pangkat/Golongan </td>
                        <td>:</td>
                        <td><?= $d['pangkat']?></td>
                    </tr>
                    <tr>
                        <td>4. Fakultas/Prodi </td>
                        <td>:</td>
                        <td><?= $d['fakultas']; if($d['fakultas']&&$d['prodi'] != ""){echo ' / ';}; if($d['prodi'] != ""){echo $d['prodi'];}?></td>
                    </tr>
                    <tr>
                        <td>5. Perguruan Tinggi </td>
                        <td>:</td>
                        <td><?= $d['universitas'] ?></td>
                    </tr>
                </table>

                <table style="margin-bottom: 0.2cm;">
                    <tr>
                        <td style="width: 253px;">Bentuk Tugas/ Kegiatan </td>
                        <td>:</td>
                        <td><?= $d['bentuk_tugas']?></td>
                    </tr>
                    <tr>
                        <td>Judul </td>
                        <td>:</td>
                        <td><?= $d['judul']?></td>
                    </tr>
                    <tr>
                        <td>Nama Jurnal / Prosiding </td>
                        <td>:</td>
                        <td><?= $d['nama_jurnal']?></td>
                    </tr>
                    <tr>
                        <td>Volume/ISSN/Penerbit </td>
                        <td>:</td>
                        <td><?= $d['nomor_dan_volume'].' / '.$d['issn'].' / '.$d['penerbit']?></td>
                    </tr>
                    <tr>
                        <td>Kategori Jurnal/Prosiding </td>
                        <td>:</td>
                        <td><?= $d['kategori_jurnal']?></td>
                    </tr>
                    <tr>
                        <td>Hari/Tanggal Terbit </td>
                        <td>:</td>
                        <td><?= tglIndonesia($d['tanggal_terbit']); ?></td>
                    </tr> 
                    <tr>
                        <td>Yang Dikategorikan Bidang </td>
                        <td>:</td>
                        <td><?= $d['dikategorikan']?></td>
                    </tr>
                </table>
                <p>Demikian harap dilaksanakan dengan sebaik - baiknya.</p>
            </div>
            <p style="text-align: right; margin-right: 16%; margin-top: 5%;">Pekalongan, <?= tglIndonesia($d['tanggal_masuk'])?></p>
            <table style="width: 100%; ; text-align: center; margin-left: auto; margin-right: auto;">
                <tr>
                    <td>Yang Diberi Tugas</td>
                    <td style="width: 50px;"></td>
                    <td>Yang Memberi Tugas</td>
                </tr>
                <tr>
                    <td style="height: 70   px;"></td>
                </tr>
                <tr>
                    <td><?= $d['nama_dosen']?></td>
                    <td style="width: 50px;"></td>
                    <td><?= $d['nama_yang_bertanda_tangan']?></td>
                </tr>
            </table>

        </div>
    <?php endforeach;?>
</body>
</html>