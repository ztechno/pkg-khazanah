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
            'label' => 'Address',
            'type'  => 'text'
        ],
        'phone' => [
            'label' => 'Phone',
            'type'  => 'text'
        ],
        'functional_position' => [
            'label' => 'Functional Position',
            'type'  => 'text'
        ],
        'structural_position' => [
            'label' => 'Structural Position',
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
            'label' => 'Address',
            'type'  => 'text'
        ],
        'phone' =>[
            'label' => 'Phone',
            'type'  => 'text'
        ],
    ],
    'parents'  => [
        'student_id' => [
            'label' => 'Student',
            'type'  => 'options-obj:students,id,name'
        ],
        'nik' => [
            'label' => 'NIK',
            'type'  => 'text'
        ],
        'name',
        'address' => [
            'label' => 'Address',
            'type'  => 'text'
        ],
        'phone' => [
            'label' => 'Phone',
            'type'  => 'text'
        ],
    ],
    'categories'  => [
        'name',
        'target' => [
            'label' => 'Target',
            'type'  => 'text'
        ],
    ],
    'questions'  => [
        'categorie_id' => [
            'label' => 'Categorie',
            'type'  => 'options-obj:categories,id,name'
        ],
        'description'  => [
            'label' => 'description',
            'type'  => 'text'
        ],
    ],
    'evaluation_ranges'  => [
        'name',
        'min_value' => [
            'label' => 'Min Value',
            'type'  => 'double'
        ],
        'max_value' => [
            'label' => 'Max Value',
            'type'  => 'double'
        ],
    ],
    'result_ranges'  => [
        'name',
        'min_value' => [
            'label' => 'Min Value',
            'type'  => 'double'
        ],
        'max_value' => [
            'label' => 'Max Value',
            'type'  => 'double'
        ],
    ],
    'periods'  => [
        'name',
        'year' => [
            'label' => 'Year',
            'type'  => 'date',
        ]
    ],
    'evaluation_subjects' => [
        'teacher_id' => [
            'label' => 'Teacher',
            'type'  => 'options-obj:teachers,id,name'
        ],
        'period_id' => [
            'label' => 'Period',
            'type'  => 'options-obj:periods,id,name'
        ],
    ],
    'evaluators' => [
        'teacher_id' => [
            'label' => 'Teacher',
            'type'  => 'options-obj:teachers,id,name'
        ],
        'subject_id' => [
            'label' => 'Subject',
            'type'  => 'options-obj:evaluation_subjects,id,teacher_id'
        ],
        'period_id' => [
            'label' => 'Period',
            'type'  => 'options-obj:periods,id,name'
        ],
        'type' => [
            'label' => 'Type',
            'type'  => 'options:Penilai|Teman Sejawat'
        ]
    ],
    'evaluator_students' => [
        'student_id' => [
            'label' => 'Student',
            'type'  => 'options-obj:students,id,name'
        ],
        'subject_id' => [
            'label' => 'Subject',
            'type'  => 'options-obj:evaluation_subjects,id,teacher_id'
        ],
        'period_id' => [
            'label' => 'Period',
            'type'  => 'options-obj:periods,id,name'
        ],
    ],
    'evaluator_parents' => [
        'parent_id' => [
            'label' => 'Parent',
            'type'  => 'options-obj:parents,id,name'
        ],
        'subject_id' => [
            'label' => 'Subject',
            'type'  => 'options-obj:evaluation_subjects,id,teacher_id'
        ],
        'period_id' => [
            'label' => 'Period',
            'type'  => 'options-obj:periods,id,name'
        ],
    ],
    'question_assigns' => [
        'period_id' => [
            'label' => 'Period',
            'type'  => 'options-obj:periods,id,name'
        ],
        'teacher_id' => [
            'label' => 'Teacher',
            'type'  => 'options-obj:teachers,id,name'
        ],
        'target' => [
            'label' => 'Target',
            'type'  => 'text'
        ],
        'question_id' => [
            'label' => 'Question',
            'type'  => 'options-obj:questions,id,description'
        ],
        'categorie_id' => [
            'label' => 'Categories',
            'type'  => 'options-obj:categories,id,name'
        ],
    ],
    'evaluations' => [
        'period_id' => [
            'label' => 'Period',
            'type'  => 'options-obj:periods,id,name'
        ],
        'teacher_id' => [
            'label' => 'Teacher',
            'type'  => 'options-obj:teachers,id,name'
        ],
        'evaluator_id' => [
            'label' => 'Evaluator',
            'type'  => 'options-obj:evaluators,id,teacher_id'
        ],
        'question_id' => [
            'label' => 'Question',
            'type'  => 'options-obj:questions,id,categorie_id'
        ],
        'score' => [
            'label' => 'Score',
            'type'  => 'text'
        ],
        'target' => [
            'label' => 'Target',
            'type'  => 'text'
        ],
    ],
    
];