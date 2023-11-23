<?= $this->extend('admin/index'); ?>
    <?= $this->section('content'); ?>   
        <div class="page">
            <div class="form">               
                <div class="tes">
                    <div class="judul">
                        <h4>Dashboard Admin</h4>
                    </div>
                    <div class="isi">
                        <strong>Keterangan dan fungsi setiap fitur</strong>
                        <ol style="margin-left: 7%;">
                            <li><strong>A. Fitur lihat : </strong><br>
                                <img src="<?= base_url()?>/assets/publik/tutorial/form_9.jpg"><br>
                                untuk melihat detail surat yang telah diajukan contoh : <br>
                                <img src="<?= base_url()?>/assets/publik/tutorial/form_10.jpg"><br>
                                secara default permohonan surat yang telah diajukan nomor suratnya kosong. untuk memberi nomor surat klik edit.
                                <img src="<?= base_url()?>/assets/publik/tutorial/form_11.jpg"><br>
                                setelah itu maka akan menampilkan halaman edit surat dan nomor surat sudah terisi otomatis sesuai settingan. untuk merubah masuk ke menu pengaturan -> penyesuaian nomor surat atau lihat tutorial di bawah (Nomor 2 Point E). <br><br>
                                untuk mendownload surat klik download surat. dengan ketentuan (NOMOR SURAT HARUS SUDAH TERISI) <br>
                                <img src="<?= base_url()?>/assets/publik/tutorial/form_13.jpg"><br><br><br>
                                <strong>B. Fitur Selesai : <br></strong>
                                <img src="<?= base_url()?>/assets/publik/tutorial/form_14.jpg"><br>
                                <strong>TOMBOL INI WAJIB DI TEKAN KETIKA SURAT TELAH SELESAI DICETAK</strong> Guna untuk melakukan update pada sistem pengecekan. setelah itu surat akan pindah ke tabel bawah. setelah berada di tabel bawah maka akan terdapat fitur hapus. <br>
                                <img src="<?= base_url()?>/assets/publik/tutorial/form_15.jpg"><br>
                                fitur ini dapat menghapus surat ketika surat tidak terpakai lagi.<br><br><br>
                            </li>
                            <li>
                                 <strong> Menu Pengaturan : <br></strong>
                                 <strong> C. Fitur User page <br></strong>
                                 fitur ini untuk menambah, edit, dan hapus user untuk login ke halaman admin. <br><br>
                                 <strong> D. Export Laporan</strong><br>
                                 menu ini digunakan untuk membuat laporan surat yang telah tercatek. laporan dapat di export dalam bentuk excell ataupun pdf. <br><br>
                                 <img src="<?= base_url()?>/assets/publik/tutorial/form_16.jpg"><br><br><br>
                                 <strong> E. Fitur Penyesuaian nomor : <br></strong>
                                 Penomoran surat pada sistem ini di generate secara otomatis. untuk mengatur awal penomoran surat dapat dilakukan disini <br>
                                 <img src="<?= base_url()?>/assets/publik/tutorial/form_17.jpg"><br>
                                 untuk mengatur start awal nomor silahkan masukkan angka yang dimaksud ke dalam field yang tersedia. setelah itu klik ubah nomor surat. setelah ter ubah nomor surat seterusnya akan mengikuti penomoran sebelumnya
                            </li>        
                        </ol>
                    </div>
                </div>            
            </div>

        </div>
    <?= $this->endSection();?>