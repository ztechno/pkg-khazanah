<?php

return [
    'dashboard'             => 'default/index',
    'Master Data' => [
        'Data Guru'         => 'crud/index?table=teachers',
        'Data Siswa'        => 'crud/index?table=students',
        'Data Orang Tua'    => 'crud/index?table=parents',
        'Kategori Soal'     => 'crud/index?table=categories',
        'Bank Soal'         => 'crud/index?table=questions',
        'Range Penilaian'   => 'crud/index?table=evaluation_ranges',
        'Range Hasil'       => 'crud/index?table=result_ranges',
        'Periode Penilaian' => 'crud/index?table=periods'
    ],
    'Subjek Penilaian'   => 'evaluation_subjects/index',
    'Penilai'            => 'evaluators/index',
    'Penilai Siswa'    => 'evaluator_students/index',
    'Penilai Orang Tua'     => 'evaluator_parents/index',
    'Assign Soal'      => 'question_assigns/index',
    'Proses Penilaian'           => 'crud/index?table=evaluations',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];