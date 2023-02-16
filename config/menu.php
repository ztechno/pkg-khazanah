<?php

return [
    'dashboard' => 'default/index',
    'Master Data Guru' => 'crud/index?table=guru',
    'Master Data Siswa' => 'crud/index?table=data_siswa',
    'Master Data Orang Tua' => 'crud/index?table=data_orangtua',
    'Katagori Soal' => 'crud/index?table=kategori',
    'Bank Soal' => 'crud/index?table=bank_soal',
    'Range Penilaian' => 'crud/index?table=range_penilai',
    'Range Hasil' => 'crud/index?table=range_hasil',
    'Periode Penilaian' => 'crud/index?table=periode_penilai',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];