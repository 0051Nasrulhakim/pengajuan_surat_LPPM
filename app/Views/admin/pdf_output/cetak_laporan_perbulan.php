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

    <?php        
        $bulan = $data['bulan'];
        switch($bulan){
            case 'I':
                $bulan = 'Januari';
                break;
            case 'II':
                $bulan = 'FEBUARI';
                break;
            case 'III':
                $bulan = 'MARET';
                break;
            case 'IV':
                $bulan = 'APRIL';
                break;
            case 'V':
                $bulan = 'MEI';
                break;
            case 'VI':
                $bulan = 'JUNI';
                break;
            case 'VII':
                $bulan = 'JULI';
                break;
            case 'VIII':
                $bulan = 'AGUSTUS';
                break;
            case 'IX':
                $bulan = 'SEPTEMBER';
                break;
            case 'X':
                $bulan = 'OKTOBER';
                break;
            case 'XI':
                $bulan = 'NOVEMBER';
                break;
            case 'XII':
                $bulan = 'DESEMBER';
                break;
        }
    ?>
<body>
    <div class="page" style="margin-top: 2.2cm; margin-left: 2.3cm; margin-right: 2.3cm;">
        <div class="header" style="text-align: center;">
            <h1>LAPORAN SURAT MASUK SELAMA BULAN <?= $bulan?> TAHUN <?= $data['tahun']?> </h1>
            <h1>LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT UNIVERSITAS MUHAMMADIYAH PEKAJANGAN PEKALONGAN</h1>
        </div>
    <?php if($data['d'] != null){
    ?> 
        
        <div class="isi" style="margin-top: 20px;">
            
            <table border="1px solid black">
                <tr style="text-align: center">
                    <td style="width: 30px;">NO</td>
                    <td style="width: 150px;">Nomor Surat</td>
                    <td style="width: 220px;">NAMA PEMILIK</td>
                    <td style="width: 200px;">PERIHAL</td>
                    <td >DITUJUKAN KEPADA</td>
                <tr>
                <?php $i=1; foreach($data['d'] as $d):?>
                <tr>
                    <td style="text-align: center;"><?= $i++?></td>
                    <td><?= $d['nomor_surat']?></td>
                    <td><?= $d['nama_pemilik_surat']?></td>
                    <td><?= $d['hal']?></td>
                    <td><?= $d['ditujukan_kepada']?></td>
                </tr>
                <?php endforeach?>

            </table>
        </div>
    </div>
    <?php  
    }else{
    ?>
        <div class="err" style="text-align: center; margin-top: 20%; color: red;">
            <div class="border" style="padding: 40px; border: 1px solid;">
                <h1>" BELUM ADA SURAT YANG TERCETAK DI BULAN YANG DIMAKSUD ...! "</h1>
            </div>
        </div>
    <?php
    }
    ?>
    
</body>
</html>