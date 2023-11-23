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
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
    }
    .page{
        margin-left: 1.5cm;
        margin-right: 1.5cm;
    }
    table tr td{
        height: 25px;
        vertical-align: top;
    }
</style>
<body>
    <div class="page">
        <div class="judul" style="text-align: center;">
            <strong><p style="font-size: 15pt;">FORM <?= $data['perihal']?></p></strong>
        </div>
        <div class="isi">
            <table>
                <tr>
                    <td style="width: 180px;">Perihal</td>
                    <td>:</td>
                    <td><?= $data['perihal']?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $data['nama']?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?= $data['nim']?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>:</td>
                    <td><?= $data['fakultas']?></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>:</td>
                    <td><?= $data['prodi']?></td>
                </tr>
                <tr>
                    <td>Tahun Akademik</td>
                    <td>:</td>
                    <td><?= $data['tahun_akademik']?></td>
                </tr>
                <tr>
                    <td>Judul Penelitian</td>
                    <td>:</td>
                    <td><?= $data['judul_penelitian']?></td>
                </tr>
                <tr>
                    <td>Dosen Pembimbing</td>
                    <td>:</td>
                    <td><?= $data['dosen_pembimbing']?></td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td><?= $data['tanggal_pengajuan']?></td>
                </tr>
            </table>
        </div>
        <div class="footer" style="margin-top: 3%;">
            <table style="text-align: center; margin-left: auto;" >
                <tr>
                    <td>Kepala Prodi <?= $data['prodi']?></td>
                </tr>
                <tr>
                    <td style="height: 45px;"></td>
                </tr>
                <tr>
                    <td>Ttd.</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>