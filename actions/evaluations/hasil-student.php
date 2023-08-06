<?php

$success_msg = get_flash_msg('success');

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods', [
    'status' => '1'
]);


// ========================================= Siswa ===========================================

    Validation::run([
        'id' => [
            'required', 'exists:evaluator_students'
        ]
    ], $_GET);
    
    $evaluator_students = $db->single('evaluator_students', [
        'id'    => $_GET['id']
    ]);

    $db->query = "SELECT * FROM teachers WHERE id = (SELECT teacher_id FROM evaluation_subjects WHERE id=$evaluator_students->subject_id)";
    $evaluator_students->teacher = $db->exec('single');

    $categories_student = $db->all('categories', [
        'parent_id' => ['IS', 'NULL'],
        'target' => 'Siswa'
    ]);

    $categories_student = array_map(function ($category) use ($db) {
        $childs = $db->all('categories', [
            'parent_id' => $category->id
        ]);

        if ($childs) {
            $childs = array_map(function ($child) use ($db) {
                $child->questions = $db->all('questions', ['categorie_id' => $child->id]);
                return $child;
            }, $childs);

            $category->childs = $childs;
        }

        $category->questions = $db->all('questions', ['categorie_id' => $category->id]);

        return $category;
    }, $categories_student);

$db->query = "SELECT *  
            -- COUNT(evaluations.score) as JUMLAH,
            -- SUM(evaluations.score) as TOTAL_NILAI
          FROM 
            evaluations
          WHERE 
            evaluator_id = $_GET[id]
          AND
            teacher_id = ".$evaluator_students->teacher->id."
          AND target = 'Siswa'  
          ";

$score = $db->exec('all');

$dumpEvaluations = [];
foreach($score as $s)
{
    $dumpEvaluations[$s->question_id] = $s->score;
}

return compact('evaluator_students', 'categories_student', 'period', 'success_msg', 'dumpEvaluations');




// echo "<pre>";
// print_r($evaluator);
// die();

// return compact('evaluator', 'evaluator_students', 'evaluator_parents', 'categories', 'categories_student', 'categories_parent', 'period', 'success_msg');
