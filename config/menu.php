<?php

return [
    'dashboard'             => 'default/index',
    'Master Data Teachers'  => 'crud/index?table=teachers',
    'Master Data Students'  => 'crud/index?table=students',
    'Master Data Parents'   => 'crud/index?table=parents',
    'Categories'            => 'crud/index?table=categories',
    'Questions'             => 'crud/index?table=questions',
    'Evaluation Ranges'     => 'crud/index?table=evaluation_ranges',
    'Result Ranges'         => 'crud/index?table=result_ranges',
    'Periods'               => 'crud/index?table=periods',
    'Evaluation Subjects'   => 'crud/index?table=evaluation_subjects',
    'Evaluators'            => 'crud/index?table=evaluators',
    'Evaluator Students'    => 'crud/index?table=evaluator_students',
    'Evaluator Parents'     => 'crud/index?table=evaluator_parents',
    'Question Assigns'      => 'crud/index?table=question_assigns',
    'Evaluations'           => 'crud/index?table=evaluations',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];