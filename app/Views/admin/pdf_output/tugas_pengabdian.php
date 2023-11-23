<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    *{
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
        margin: 0;
        padding: 0;
        line-height: 0.5cm;
    }
    pre{
        font-family: 'Times New Roman', Times, serif;
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

    <?php foreach($data['data'] as $d):?>
        <div class="page" style="margin-top: 4.5cm; margin-left: 2.5cm; margin-right: 1.7cm;">
            
            <div class="nomor-surat" style="text-align: center; margin-bottom: 0.5cm;">
                <div class="isi" style="width: auto; margin-left: auto; margin-right: auto;">
                    <p>SURAT TUGAS</p>
                    <hr style="width: 130px; border: 1px solid; margin-left: auto; margin-right: auto;">
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
                        <td>2. Jabatan </td>
                        <td>:</td>
                        <td><?= $d['jabatan_yang_bertanda_tangan']?></td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td>3. Alamat </td>
                        <td>:</td>
                        <td><?= $d['alamat']?></td>
                    </tr>
                </table>
                <p style="margin-bottom: 0.2cm;">Memberikan Tugas Kepada :</p>
                <table style="margin-left: 0.5cm; margin-bottom: 0.2cm;">
                    <tr style="vertical-align: top;">
                        <td style="width: 235px;">1. Nama Dosen </td>
                        <td>:</td>
                        <td><pre><?= $d['nama_dosen']?></pre></td>
                    </tr>
                    <tr>
                        <td>2. Jabatan </td>
                        <td>:</td>
                        <td><?= $d['jabatan']?></td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td>3. Nama Mahasiswa </td>
                        <td>:</td>
                        <td><pre><?= $d['nama_mahasiswa']?></pre></td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td>4. Keperluan </td>
                        <td>:</td>
                        <td><?= $d['keperluan']?></td>
                    </tr>
                    <tr>
                        <td>5. Hari/Tanggal </td>
                        <td>:</td>
                        <td><?= tglIndonesia( $d['tanggal']); ?></td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td>5. Tujuan </td>
                        <td>:</td>
                        <td><?= $d['tujuan'] ?></td>
                    </tr>
                </table>
                <p>Demikian surat tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.</p>
                <p>Trimakasih.</p>
                <p>Wassalamu'alaikum Wr. Wb.</p>
            </div>
            <p style="text-align: right; margin-right: 16%; margin-top: 5%;">Pekalongan, <?= tglIndonesia($d['tanggal_masuk'])?></p>
            <table style="width: 100%; text-align: center; margin-left: auto; margin-right: auto;">
                <tr>
                    <td>Yang Diberi Tugas</td>
                    <td style="width: 50px;"></td>
                    <td>Yang Memberi Tugas</td>
                </tr>
                <tr>
                    <td style="height: 100px;"></td>
                </tr>
                <tr>
                    <td><?= $d['nama_dosen']?></td>
                    <td style="width: 50px;"></td>
                    <td>Nuniek Nizmah F,M.Kep., Sp.KMB</td>
                </tr>
            </table>
        </div>
    <?php endforeach?>
</body>
</html>