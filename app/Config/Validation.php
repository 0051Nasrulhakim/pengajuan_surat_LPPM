<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $izin_ethical_clearance =[
        'nama_peneliti'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama  peneliti',
            ]
        ],
        'judul_penelitian'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi judul Penelitian',
            ]
        ],
        'ditujukan_kepada'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi ditujukan kepada',
            ]
        ],
    ];

    public $izin_penelitian = [
        'ditujukan_kepada'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi kolom ditujukan Kepada',
            ]
        ],
        'judul_penelitian'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi judul Penelitian',
            ]
        ],
    ];
    public $pengabdian_masyarakat = [
        'judul_pengabdian'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi judul pengabdian',
            ]
        ],
        'ditujukan_kepada' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi ditujukan kepada',
            ]
        ],
    ];

    public $tugasPengabdian = [
        'nama_yang_bertanda_tangan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama yang bertanda tangan',
            ]
        ],
        'nama_dosen' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama dosen',
            ]
        ],
    ];
    
    public $tugas_penelitian = [
        'nama_yang_bertanda_tangan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama yang bertanda tangan',
            ]
        ],
        'nama_dosen' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama dosen',
            ]
        ],
    ];

    public $tambah_user = [
        'password' => [
            'rules'     => 'required|min_length[8]',
            'errors'    => [
                'required'  => 'silahkan isi password',
                'min_length'=> 'Password Minimal 8 karakter'
            ]
        ],
        'nama' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi password',
            ]
        ],
        'username' => [
            'rules'     => 'required|min_length[5]|is_unique[admin.username]',
            'errors'    => [
                'required'  => 'silahkan isi Username',
                'min_length'=> 'Password Minimal 8 karakter',
                'is_unique' => 'username telah digunakan'
            ]
        ],

    ];
    public $edit_user = [
        'password' => [
            'rules'     => 'required|min_length[8]',
            'errors'    => [
                'required'  => 'silahkan isi password',
                'min_length'=> 'Password Minimal 8 karakter'
            ]
        ],
        'nama' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi password',
            ]
        ],
        'username' => [
            'rules'     => 'required|min_length[5]',
            'errors'    => [
                'required'  => 'silahkan isi Username',
                'min_length'=> 'Password Minimal 8 karakter',
                'is_unique' => 'username telah digunakan'
            ]
        ],

    ];

    public $determinasi_tanaman = [
        'nama_mahasiswa'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama mahasiswa',
            ]
        ],
        'judul_penelitian'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi judul Penelitian',
            ]
        ],
        'fakultas_mhs' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi fakultas mahasiswa',
            ]
        ],
    ];
    public $surat_tugas_hki = [
        'nama_dosen'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama dosen',
            ]
        ],
        'dikategorikan'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi dikategorikan',
            ]
        ],
        'jenis_ciptaan'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi jenis ciptaan jika kosong isi dengan -',
            ]
        ],
        'tanggal_permohonan'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal permohonan',
            ]
        ],
    ];
    public $tugas_publikasi =[
        'tanggal_masuk'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal masuk',
            ]
        ],
        'nama_dosen'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama dosen',
            ]
        ],
        'dikategorikan'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan pilih dikategorikan',
            ]
        ],
        'tanggal_terbit' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan pilih dikategorikan',
            ]
        ],
    ];
    public $oral_presentasi = [
        'nama'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama_dosen',
            ]
        ],
        'tanggal'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal',
            ]
        ],
        'judul'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi judul',
            ]
        ],
    ];
    public $pengajuanPenelitian = [
        'nim_mahasiswa'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nim',
            ]
        ],
        'nama_mahasiswa' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama',
            ]
        ],
        'prodi_mhs'          => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi prodi',
            ]
        ],
        'fakultas_mhs'       => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi fakultas',
            ]
        ],
        'tahun_akademik' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tahun akademik',
            ]
        ],
        'dosen_pembimbing' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi dosen pembimbing',
            ]
        ],
        'judul_penelitian' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi judul penelitian',
            ]
        ],
        'tanggal_masuk' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal masuk',
            ]
        ],
    ];

    public $pengajuanSuratTugas = [
        'nomor_surat' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nomor surat',
            ]
        ],
        'nama_bertandatangan'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama yang bertandatangan',
            ]
        ],
        'jabatan_bertandatangan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi Alamat yang bertandatangan',
            ]
        ],
        'alamat_bertandatangan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi alamat',
            ]
        ],
        'nama_dosen' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama dosen',
            ]
        ],
        'jabatan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi jabatan',
            ]
        ],
        'nama_mahasiswa' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama mahasiswa jika kosong isi dengan "-"',
            ]
        ],
        'keperluan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi keperluan jika kososng isi dengan tanda "-"',
            ]
        ],
        'tanggal_pelaksanaan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal pelaksanaan',
            ]
        ],
        'tujuan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tujuan',
            ]
        ],
        'tanggal_pengajuan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal pengajuan',
            ]
        ],
    ];
    public $insertpengajuanSuratTugas = [
        'nama_bertandatangan'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama yang bertandatangan',
            ]
        ],
        'jabatan_bertandatangan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi Alamat yang bertandatangan',
            ]
        ],
        'alamat_bertandatangan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi alamat',
            ]
        ],
        'nama_dosen' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama dosen',
            ]
        ],
        'jabatan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi jabatan',
            ]
        ],
        'nama_mahasiswa' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama mahasiswa jika kosong isi dengan "-"',
            ]
        ],
        'keperluan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi keperluan jika kososng isi dengan tanda "-"',
            ]
        ],
        'tanggal_pelaksanaan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal pelaksanaan',
            ]
        ],
        'tujuan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tujuan',
            ]
        ],
        'tanggal_pengajuan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal pengajuan',
            ]
        ],
    ];
    public $update_suratHKI = [
         // ],
        // 'nomor_surat' => [
        //     'rules'     => 'is_unique[surat_tugas_hki.nomor_surat]',
        //     'errors'    => [
        //         'is_unique'  => 'NOMOR SUDAH DIGUNAKAN. SILAHKAN TAMBAH 1 NOMOR LAGI',
        //     ]
        // ],
        'tanggal_pengajuan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal pengajuan',
            ]
        ],
        'nama_dosen' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi Nama Dosen',
            ]
        ],
    ];
    public $update_publikasi =[
        'nama_dosen' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi Nama Dosen',
            ]
        ],
        'judul' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi Judul',
            ]
        ]
    ];
    public $export_error_pdf = [
        'dari_bulan' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan masukkan dari bulan',
            ]
        ],
        'tahun' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan masukkan tahun',
            ]
        ],
    ];
    public $studiPendahuluan = [
        // 'nomor_surat' => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'  => 'silahkan isi nomor surat',
        //     ]
        // ],
        // 'lampiran' => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'  => 'silahkan isi lampiran',
        //     ]
        // ],
        'tanggal_surat' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tanggal pengajuan',
            ]
        ],
        'hal' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi hal',
            ]
        ],
        'ditujukan_kepada' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi ditujukan kepada',
            ]
        ],
        // 'prodi_mhs' => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'  => 'silahkan isi prodi',
        //     ]
        // ],
        // 'fakultas_mhs' => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'  => 'silahkan isi fakultas',
        //     ]
        // ],
        'universitas' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi universitas',
            ]
        ],
        'tahun_akademik' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi tahun akademik',
            ]
        ],
        'nama' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nama mahasiswa',
            ]
        ],
        'nim' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nim mahasiswa',
            ]
        ],
        'alamat_mhs' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi alamat mahasiswa',
            ]
        ],
        'dosen_pembimbing' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi dosen pembimbing',
            ]
        ],
        'judul_penelitian' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi judul penelitian',
            ]
        ],
        'nomor_telfon' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'silahkan isi nomor telfon',
            ]
        ],
    ];
    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
