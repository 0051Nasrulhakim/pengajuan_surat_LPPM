<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        font-size: 12pt;
        margin: 0;
        padding: 0;
        line-height: 0.5cm;
    }
    table{
        border-collapse: collapse;
        width: 100%;
    }
    table tr td{
        padding: 3px;
    }
</style>
<body>     
    <div class="page" style="margin-top: 2.2cm; margin-left: 2.3cm; margin-right: 2.3cm;">
        <div class="header" style="text-align: center;">
            <h1>LAPORAN SURAT MASUK SELAMA TAHUN <?= $data['data']['0']['tahun']?> </h1>
            <h1>LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT UNIVERSITAS MUHAMMADIYAH PEKAJANGAN PEKALONGAN</h1>
        </div>
        <div class="isi" style="margin-top: 20px;">
            <?php foreach($data as $d):?>
            <table border="1px solid black">
                <tr style="text-align: center">
                    <td style="width: 30px;">NO</td>
                    <td style="width: 150px;">Nomor Surat</td>
                    <td style="width: 220px;">NAMA PEMILIK</td>
                    <td style="width: 200px;">PERIHAL</td>
                    <td >DITUJUKAN KEPADA</td>
                <tr>
                <?php $i=1; foreach($d as $v):?>
                <tr>
                    <td style="text-align: center;"><?= $i++?></td>
                    <td><?= $v['nomor_surat']?></td>
                    <td><?= $v['nama_pemilik_surat']?></td>
                    <td><?= $v['hal']?></td>
                    <td><?= $v['ditujukan_kepada']?></td>
                </tr>
                <?php endforeach?>

            </table>
            <?php endforeach?>
        </div>
    </div>
</body>
</html>