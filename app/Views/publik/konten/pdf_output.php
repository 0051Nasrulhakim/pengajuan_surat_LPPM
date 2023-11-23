
<style>
    html{
        margin: 0;
        padding: 0;
    }
    .header{

        margin-top: 0.4cm;
        margin-right: 0.8cm;
        margin-left: 0.8cm;
        /* border: 1px solid blue; */
    }
    .header img{
        /* margin-top: ; */
        width: 2.5cm;
        height: auto;
    }
    .kopSurat{
        font-size: 15pt;
        color: rgb(25, 100, 69);
        /* border: 1px solid; */
        font-weight: 500;
        text-align: center;
    }
    .surat{
        /* border: 1px solid red; */
        /* font-size: px; */
        margin-left: 2.6cm;
        margin-right: 2.4cm;
    }
    .surat .isi table{
        /* border: 1px solid blue; */
        font-size: 12px;
    }
    p, .tanggal, .penanggung-jawab, .namaPenanggung_jawab, .nik{
        font-family: 'Times New Roman', arial;
        font-size: 12pt;
    }
    .namaPenanggung_jawab{
        margin-top: 1.4cm;
    }
    table{
        /* border: 2px solid; */
        font-family: 'Times New Roman', arial;
        font-size: 12px;
        margin-left: 0px;
    }
    .tandatangan{
        border: 1px solid red;
        text-align: center;
        
        margin-top: 0.7cm;
        /* height: 100%; */
        /* margin-bottom: 1px; */
        /* border: 1px solid; */
        float: right;
    }
    .alamat{
        margin-left: 35px;
        margin-right: 35px;
        margin-top: -40px;
        border-bottom: 1px solid rgb(25, 100, 69);
        font-family: 'Times New Roman', arial;
        font-size: 9pt;
        border-top: 1px solid rgb(25, 100, 69);
    }
    
    .alamat .isi{
        /* border: 1px solid; */
        /* border-right: 1px solid blue;
        border-left: 1px solid blue; */
        color: rgb(25, 100, 69);
        /* letter-spacing: 0.6px; */
        /* word-spacing: 1.7px; */
        /* text-align: center; */
        margin-left: 1.7cm;
        /* margin-right: 1.5cm; */
        margin-top: 2px;
        margin-bottom: 2px;
    }
    .header .sk{
        border: 1px solid;
    }
    .umpp img{
        margin-top: -4px;
        margin-bottom: -2px;
        /* border: 1px solid; */
        width: 160px;
        height: auto;
    }
    .surat .isi table{
        vertical-align: top;
    }
    .surat .isi table td{
        vertical-align: top;
        padding: 4px;
    }
    pre{
        /* border: 1px solid; */
        margin: none;
        text-align: left;
        font-size: 12pt;
        font-family: 'Times New Roman', arial;
    }
    .container-surat{
        font-size: 12pt ;
        margin-top: 0.7cm;
        margin-left: 2.5cm;
        margin-right: 1.2cm;
        font-family: 'Times New Roman', Times, serif;
    }
    .container-surat table{
        /* border: 1px solid; */
        font-size: 12pt;
    }
    .container-surat .kop .kiri{
        border: 1px solid;
        width: 50%;
    }
    .container-surat .kop .kanan{
        border: 1px solid;
        width: 40%;
    }
    .container-surat .kepada .isi table{
        margin-bottom: 5px;
        border: 1px solid;
        border-collapse: collapse;
    }
</style>


<?php 
    $gambar     = $data['gambar'];
    $umpp       = $data['umpp'];
    $bismillah  = $data['bismillah'];
    $data_2     = $data['data']; 
    // dd($data_2);
    $no = 1;
    foreach($data_2 as $d):
    $tangal = $d['tanggal_masuk']; 
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

<div class="container-surat" style=" margin-top: 4cm;">
    <div class="bismillah" style="text-align: center; margin-bottom: 2px;">
        <img src="<?=$bismillah?>" style="width: 7cm; height: 0.7cm;">
    </div>
    <table>
        <tr>
            <td style="width: 76px;">Nomor</td>
            <td>:</td>
            <td style="width: 340px;"><?=$d['nomor_surat']?></td>
            <td style="width: 216px; text-align: right;">Pekalongan, <?= tglIndonesia($tangal);?></td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td><?= $d['lampiran']?></td>
        </tr>
        <tr>
            <td>Hal</td>
            <td>:</td>
            <td><?= $d['hal']?></td>
        </tr>
    </table>
    <div class="kepada" style="margin-left: 2.4cm; margin-top: 1cm;">
        Kepada Yth :
        <div class="isi-kepada" style="margin-left: 2.4cm;"><pre><?=$d['ditujukan_kepada']?></pre></div>
        <div class="di" style="margin-top: 1cm;">
            DI- TEMPAT.
        </div>
        <div class="isi" style="margin-top: 10px; text-align: justify;">
            <i>Assalamu'alaikum Wr Wb.</i>
            <br> Dengan hormat,  Sehubungan dengan surat tugas akhir skripsi mahasiswa <?php if($d['prodi_mhs'] != null){echo "Prodi";}?> <?= $d['prodi_mhs']?> <?php if($d['fakultas_mhs'] != null){echo "Fakultas";}?> <?= $d['fakultas_mhs']?> <?=$d['universitas']?> Tahun akademik <?=$d['tahun_akademik']?>, Perkenankanlah mahasiswa kami untuk melakukan 
            <?php if( $d['hal'] == 'Permohonan Izin Studi Pendahuluan'){echo "Studi Pendahuluan";}
                    elseif($d['hal'] == 'Uji Validitas'){echo "uji validitas";}
            ?> di instansi yang bapak/ibu pimpin. Adapun identitas mahasiswa kamu sebagai berikut : 
            <table style="margin-top: 5px;">
                <tr style="text-align: center;">
                    <td style="width: 25px; border: 1px solid">No</td>
                    <td style="width: 140px;">Nama / NIM</td>
                    <td style="width: 175px; border: 1px solid">Dosen Pembimbing</td>
                    <td style="width: 180px; border: 1px solid">Judul Penelitian</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; text-align: center;"><?= $no?></td>
                    <td style="vertical-align: top; padding: 5px; border: 1px solid; text-align: left;"><?= $d['nama_mahasiswa']. ' ' . $d['nim_mahasiswa']. ' ' .$d['alamat']?> </td>
                    <td style="vertical-align: top; padding: 5px; border: 1px solid; text-align: justify;"><?=$d['dosen_pembimbing']?></td>
                    <td style="vertical-align: top; padding: 5px; border: 1px solid; text-align: justify;"><?= $d['judul_penelitian']?></td>
                </tr>
            </table>
        </div>
        <div class="penutup" style="border: 1px solid;">
            Demikian Permohonan kami, atas pemberian izinya kami ucapkan terima kasih.<br>
            <i>Wassalamu'alaikum Wr Wb.</i>
        </div>

        <div class="tandatangan">
            <div class="universitas">
                Universitas Muhammadiyah Pekajangan Pekalongan
            </div>
            <div class="penanggung-jawab" style="font-size: 12pt;">
                Kepala LPPM
            </div>
            <div class="namaPenanggung_jawab" style="font-size: 12pt;">
                <b> <u> Nuniek Nizmah Fajriyah, M.Kep., Sp.KMB </u></b>
            </div>
            <div class="nik" style="font-size: 12pt;">
                NIP. 1970090819931007
            </div>
        </div>
    </div>

</div>
<?php $no++; endforeach;?>