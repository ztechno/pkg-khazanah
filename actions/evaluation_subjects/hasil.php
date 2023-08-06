<?php

$success_msg = get_flash_msg('success');
Validation::run([
    'id' => [
        'required','exists:evaluators'
    ]
], $_GET);

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods',[
    'status' => '1'
]);


// $db->query = "SELECT *, sum(evaluations.score) as TOTAL_SCORE, teachers.name FROM categories
// LEFT JOIN questions ON questions.categorie_id=categories.id
// LEFT JOIN evaluations ON evaluations.question_id=questions.id
// LEFT JOIN teachers ON evaluations.teacher_id=teachers.id
// WHERE evaluations.evaluator_id = $evaluation_subjects->id
// AND evaluations.target = 'Teman Sejawat' ";

$db->query = "SELECT 
            *,
            AVG(evaluations.score) as NILAI
            -- COUNT(evaluations.score) as JUMLAH,
            -- SUM(evaluations.score) as TOTAL_NILAI
          FROM 
            evaluation_subjects
          INNER JOIN
            evaluations 
                ON 
                evaluations.teacher_id=evaluation_subjects.teacher_id AND
                evaluations.period_id=evaluation_subjects.period_id
          WHERE 
            evaluation_subjects.id = $_GET[id]
          AND evaluations.target = 'Siswa'  
          GROUP BY evaluations.teacher_id
          ";

$dataSiswa = $db->exec('all');

$db->query = "SELECT 
            *,
            AVG(evaluations.score) as NILAI
          FROM 
            evaluation_subjects
          INNER JOIN
            evaluations 
                ON 
                evaluations.teacher_id=evaluation_subjects.teacher_id AND
                evaluations.period_id=evaluation_subjects.period_id
          WHERE 
            evaluation_subjects.id = $_GET[id]
          AND evaluations.target = 'Orang Tua'  
          -- GROUP BY evaluations.teacher_id
          ";

$dataOrangtua = $db->exec('all');

$db->query = "SELECT 
            *,
            AVG(evaluations.score) as NILAI
          FROM 
            evaluation_subjects
          INNER JOIN
            evaluations 
                ON 
                evaluations.teacher_id=evaluation_subjects.teacher_id AND
                evaluations.period_id=evaluation_subjects.period_id
          WHERE 
            evaluation_subjects.id = $_GET[id]
          AND evaluations.target = 'Penilai'  
          -- GROUP BY evaluations.teacher_id
          ";

$dataPenilai = $db->exec('all');

$db->query = "SELECT 
            *,
            ROUND(AVG(evaluations.score)) as NILAI
          FROM 
            evaluation_subjects
          INNER JOIN
            evaluations 
                ON 
                evaluations.teacher_id=evaluation_subjects.teacher_id AND
                evaluations.period_id=evaluation_subjects.period_id
          WHERE 
            evaluation_subjects.id = $_GET[id]
          AND evaluations.target = 'Teman Sejawat'  
          -- GROUP BY evaluations.teacher_id
          ";

$dataTeman = $db->exec('all');

$db->query = "SELECT evaluation_subjects.*, teachers.name, teachers.nik 
              FROM evaluation_subjects
              JOIN teachers
              ON teachers.id = evaluation_subjects.teacher_id 
              WHERE evaluation_subjects.id =  $_GET[id]";
$data = $db->exec("single");

// echo '<pre>';
// print_r($data);
// die;

return compact('period', 'dataSiswa','dataPenilai','dataTeman', 'dataOrangtua', 'keterangan', 'data');