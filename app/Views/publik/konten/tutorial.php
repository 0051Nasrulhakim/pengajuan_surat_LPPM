<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="tes" style="text-align: center;">
            <strong> PETUNJUK DAN TATACARA PENGAJUAN SURAT DI LPPM MELALUI WEBSITE </strong>
        </div>
        <div class="isi" style="margin-top: 4%;">
            <strong> A. Petunjuk dan cara pengisian formulir pengajuan surat untuk mahasiswa di LPPM </strong>
            <p style="margin-left: 3%;">Ketentuan : Setiap mahasiswa hanya dapat mengajukan surat maximal 3x dalam sehari</p>
            <ol style="margin-left: 7%;">
                <li>Pilih menu mahasiswa. </li>
                <li>pilih jenis surat yang akan di ajukan</li>
                <li>Isi semua field pada form yang tersedia. jika ada bagian yang kosong silahkan isi dengan tanda "-" (tanpa tanda petik) </li>
                <li>Pada fild <strong>Ditujukan kepada</strong> usahakan mengawali tulisan dengan nomor. Contoh :
                    <br><img src="<?= $data['gambar1']?>" style="width: 620px;">
                </li>
                <li>Untuk field fakultas jika pada field tidak terdapat fakultas yang di maksud maka dapat di isi fakultas lain. kemudian pemberitahuan fakultas yang di maksud ke bagian pencetak surat LPPM. contoh : <br> <img src="<?= $data['gambar2']?>" style="width: 620px;">
                </li>
                <li>Untuk Field tahun akademik di isi format penulisan "tahun/tahun" misal (2022/2023) contoh : <br> <img src="<?= $data['gambar3']?>" style="width: 620px;"></li>
                <li>Setelah semuanya terisi klik "AJUKAN SURAT"</li>
                <li>Jika Pengajuan surat berhasil akan muncul tampilan seperti 
                    <br><img src="<?= $data['gambar4']?>" style="width: 620px;">
                </li>
                <li>klik download. setelah terdownload silahkan cetak form tersebut kemudian minta ttd ke prodi terkait setelah itu bawa form tersebut ke bagian pencetak surat lppm </li>
            </ol>
        </div>    
        <div class="isi" style="margin-top: 4%;">
            <strong>B. Petunjuk dan cara pengisian formulir pengajuan surat untuk Dosen di LPPM </strong>
            <ol style="margin-left: 7%;">
                <li>Pilih menu Dosen. </li>
                <li>pilih jenis surat yang akan di ajukan</li>
                <li>Isi semua field pada form yang tersedia. jika ada bagian yang kosong silahkan isi dengan tanda "-" (tanpa tanda petik) </li>
                <li>pada field pangkat silahkan pilih pangkat jika belum mempunyai pangkat silahkan pilih <strong> belum mempunyai pangkat</strong> <br> <img src="<?= $data['gambar7']?>" style="width: 620px">
                </li>
                <li>Untuk field fakultas jika pada field tidak terdapat fakultas yang di maksud maka dapat di isi fakultas lain. kemudian pemberitahuan fakultas yang di maksud ke bagian pencetak surat LPPM. contoh : <br> <img src="<?= $data['gambar8']?>" style="width: 620px;">
                </li>
                <li>
                  Jika field prodi tidak di perlukan maka dapat dibiarkan saja di posisi "PILIH PROGRAM STUDI"  
                </li>
                <li>Setelah semua fild terisi klik tombol ajukan surat. setelah itu lakukan kofirmasi kepada bagian pencetak surat lppm</li>
            </ol>
        </div>
        <div class="isi" style="margin-top: 4%;">
            <strong>C. Mahasiswa mapun dosen dapat mengecek status pengajuan surat apakah sudah tercetak atau belum dengan cara</strong>
            <ol style="margin-left: 7%;">
                <li>Masuk he halaman dashboard</li>
                <li>Pilih menu cek status Pengajuan</li>
                <li>masukkan nama</li>
                <li>Masukkan NIM anda</li>
                <li>Kemudian pulih jenis surat yang telah di ajukan contoh : <br>
                    <img src="<?= $data['gambar18']?>" alt="" style="width: 620px;">
                </li>
                <li>Jika data ditemukan maka sistem akan menampilan hasil : <br>
                    <img src="<?= $data['gambar19']?>" alt="" style="width: 620px;">
                </li>

            </ol>
        </div>
</body>
</html>