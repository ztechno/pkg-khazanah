<?php

return [
    'tblname'    => [
        'field1','field2'
    ],
    'teachers'  => [
        'nik' => [
            'label' => 'NIK',
            'type'  => 'text'
        ],
        'name',
        'address' => [
            'label' => 'Alamat',
            'type'  => 'text'
        ],
        'phone' => [
            'label' => 'No. HP',
            'type'  => 'text'
        ],
        'functional_position' => [
            'label' => 'Jabatan Fungsional',
            'type'  => 'text'
        ],
        'structural_position' => [
            'label' => 'Jabatan Struktural',
            'type'  => 'text'
        ],
    ],
    'students'  => [
        'nik' => [
            'label' => 'NIK',
            'type'  => 'text'
        ],
        'name',
        'address' =>[
            'label' => 'Alamat',
            'type'  => 'text'
        ],
        'phone' =>[
            'label' => 'No. HP',
            'type'  => 'text'
        ],
    ],
    'parents'  => [
        'student_id' => [
            'label' => 'Siswa',
            'type'  => 'options-obj:students,id,name'
        ],
        'nik' => [
            'label' => 'NIK',
            'type'  => 'text'
        ],
        'name',
        'address' => [
            'label' => 'Alamat',
            'type'  => 'text'
        ],
        'phone' => [
            'label' => 'No. HP',
            'type'  => 'text'
        ],
    ],
    'categories'  => [
        'parent_id' => [
            'label' => 'Kategori Parent',
            'type'  => "options-obj:categories,id,CONCAT(name,' (',target,')')"
        ],
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'target' => [
            'label' => 'Target Soal',
            'type'  => 'options:Atasan|Penilai 1 dan 2|Teman Sejawat|Siswa|Orang Tua'
        ],
    ],
    'questions'  => [
        'categorie_id' => [
            'label' => 'Kategori',
            'type'  => "options-obj:categories,id,CONCAT(name,' (',target,')')"
        ],
        'description'  => [
            'label' => 'Deskripsi',
            'type'  => 'text'
        ],
    ],
    'evaluation_ranges'  => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'min_value' => [
            'label' => 'Nilai Min',
            'type'  => 'double'
        ],
        'max_value' => [
            'label' => 'Nilai Max',
            'type'  => 'double'
        ],
    ],
    'result_ranges'  => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'min_value' => [
            'label' => 'Nilai Min',
            'type'  => 'double'
        ],
        'max_value' => [
            'label' => 'Nilai Max',
            'type'  => 'double'
        ],
    ],
    'periods'  => [
        'name' => [
            'label' => 'Nama Periode',
            'type'  => 'text'
        ],
        'year' => [
            'label' => 'Tahun',
            'type'  => 'date',
        ]
    ],
    'evaluation_subjects' => [
        'teacher_id' => [
            'label' => 'Guru',
            'type'  => 'options-obj:teachers,id,name'
        ],
        'period_id' => [
            'label' => 'Periode',
            'type'  => 'options-obj:periods,id,name'
        ],
    ],
    'evaluators' => [
        'teacher_id' => [
            'label' => 'Guru',
            'type'  => 'options-obj:teachers,id,name'
        ],
        'subject_id' => [
            'label' => 'Subjek Penilaian',
            'type'  => 'options-obj:evaluation_subjects,id,(SELECT name FROM teachers WHERE teachers.id=evaluation_subjects.teacher_id)'
        ],
        'period_id' => [
            'label' => 'Periode',
            'type'  => 'options-obj:periods,id,name'
        ],
        'type' => [
            'label' => 'Tipe Penilaian',
            'type'  => 'options:Penilai|Teman Sejawat'
        ]
    ],
    'evaluator_students' => [
        'student_id' => [
            'label' => 'Siswa',
            'type'  => 'options-obj:students,id,name'
        ],
        'subject_id' => [
            'label' => 'Subjek Penilaian',
            'type'  => 'options-obj:evaluation_subjects,id,teacher_id'
        ],
        'period_id' => [
            'label' => 'Periode',
            'type'  => 'options-obj:periods,id,name'
        ],
    ],
    'evaluator_parents' => [
        'parent_id' => [
            'label' => 'Orang Tua',
            'type'  => 'options-obj:parents,id,name'
        ],
        'subject_id' => [
            'label' => 'Subjek Penilaian',
            'type'  => 'options-obj:evaluation_subjects,id,teacher_id'
        ],
        'period_id' => [
            'label' => 'Periode',
            'type'  => 'options-obj:periods,id,name'
        ],
    ],
    'question_assigns' => [
        'period_id' => [
            'label' => 'Periode',
            'type'  => 'options-obj:periods,id,name'
        ],
        'teacher_id' => [
            'label' => 'Guru',
            'type'  => 'options-obj:teachers,id,name'
        ],
        'target' => [
            'label' => 'Target',
            'type'  => 'text'
        ],
        'question_id' => [
            'label' => 'Pertanyaan',
            'type'  => 'options-obj:questions,id,description'
        ],
        'categorie_id' => [
            'label' => 'Kategori',
            'type'  => 'options-obj:categories,id,name'
        ],
    ],
    'evaluations' => [
        'period_id' => [
            'label' => 'Periode',
            'type'  => 'options-obj:periods,id,name'
        ],
        'teacher_id' => [
            'label' => 'Guru',
            'type'  => 'options-obj:teachers,id,name'
        ],
        'evaluator_id' => [
            'label' => 'Evaluator',
            'type'  => 'options-obj:evaluators,id,teacher_id'
        ],
        'question_id' => [
            'label' => 'Pertanyaan',
            'type'  => 'options-obj:questions,id,categorie_id'
        ],
        'score' => [
            'label' => 'Skor',
            'type'  => 'text'
        ],
        'target' => [
            'label' => 'Target',
            'type'  => 'text'
        ],
    ],
    
];