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
        font-size: 12pt;
        margin: 0;
        padding: 0;
        line-height: 0.5cm;
    }
    pre{
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
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
        <div class="page" style="margin-top: 4.5cm; margin-left: 2.5cm; margin-right: 1.4cm;">
            <div class="bismillah" style="text-align: center; margin-bottom: 3px;">
                <img src="<?=$data['bismillah']?>" style="width: 7cm; height: 0.7cm; ">
            </div>
            <div class="nomor-surat">
                <table>
                    <tr>
                        <td style="width: 76px;">Nomor</td>
                        <td>:</td>
                        <td style="width: 300px;"><?= $d['nomor_surat']?></td>
                        <td>Pekalongan, <?= tglIndonesia($d['tanggal_masuk'])?></td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>:</td>
                        <td><?= $d['lampiran']?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td><?= $d['perihal']?></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="kepada" style="margin-left: 2.2cm; margin-top: 1cm;">
                <p>Kepada Yth.</p>

                <div class="isi-kepada" style="margin-left: 2.2cm;"><pre><?=$d['ditujukan_kepada']?></pre></div>
                <div class="di" style="margin-top: 0.8cm;">
                    DI- TEMPAT.
                </div>
            </div>
            <div class="sambutan" style="margin-left: 2.2cm; margin-top: 0.4cm;">
                <p><i>Assalaamu’alaikum wa rahmatullahi wa bara kaatuh</i></p>
                <p>Sehubungan dengan rencana pelaksanaan penelitian dosen Fakultas <?= $d['fakultas']?> <?php if($d['prodi']!=""){echo "Prodi ".$d['prodi'];}?> <?= $d['universitas']?> berikut :</p>
            </div>
            <div class="isi" style="margin-left: 2.2cm;">
                <table style="border-collapse: collapse; text-align: center; margin-top: 0.2cm;" border="1px solid;">
                    <tr>
                        <td style="width: 35px;">No</td>
                        <td style="width: 180px;">Nama Peneliti</td>
                        <td style="width: 140px;">NIDN</td>
                        <td style="width: 200px;">Judul Penelitian</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">1</td>
                        <td style="vertical-align: top; text-align: left"><p style="margin-bottom: 40px; margin-left: 2px;"><?= $d['nama_peneliti']?></p></td>
                        <td style="vertical-align: top; text-align: left"><p style="margin-left: 4px"><?= $d['nidn']?></p></td>
                        <td style="vertical-align: top; text-align: left"><p style="margin-left: 4px;"><?= $d['judul_penelitian']?></p></td>
                    </tr>
                </table>
            </div>
            <div class="kalimat-penutup" style="margin-left: 2.2cm; margin-top: 0.2cm;">
                <p>Maka bersama ini kami sampaikan permohonan <i>Ethical Clearance</i> untuk penelitian tersebut di instansi yang bapak/ibu pimpin.</p>
                <p style="margin-top: 0.2cm;">Demikian permohonan kami, atas izin dan kerjasamanya kami sampaikan terima kasih.</p>
                <p style="margin-top: 0.2cm;"><i>Wa billahit taufiq wal hidayah</i></p>
                <p><i>Wassalaamu’alaikum wa rahmatullahi wa bara kaatuh.</i></p>
            </div>
            <div class="ttd" style="margin-top: 0.7cm;">
                <table style="text-align: center; margin-left: auto; ">
                    <tr>
                        <td><?= $d['universitas']?></td>                       
                    </tr>
                    <tr>
                        <td>Kepala LPPM</td>
                    </tr>
                    <tr>
                        <td style="height: 40px;"></td>
                    </tr>
                    <tr>
                        <td><p><u><?= $d['nama_yang_bertanda_tangan']?></u></p></td>
                    </tr>
                    <tr>
                        <td>NIK:<?= $d['nik_yang_bertanda_tangan']?></td>
                    </tr>

                </table>
            </div>
        </div>
    <?php endforeach;?>
</body>
</html>