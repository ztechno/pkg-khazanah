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
            'required', 'exists:evaluator_parents'
        ]
    ], $_GET);
    
    $evaluator_parents = $db->single('evaluator_parents', [
        'id'    => $_GET['id']
    ]);

    $db->query = "SELECT * FROM teachers WHERE id = (SELECT teacher_id FROM evaluation_subjects WHERE id=$evaluator_parents->subject_id)";
    $evaluator_parents->teacher = $db->exec('single');

    $categories_parent = $db->all('categories', [
        'parent_id' => ['IS', 'NULL'],
        'target' => 'Orang Tua'
    ]);

    $categories_parent = array_map(function ($category) use ($db) {
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
    }, $categories_parent);

$db->query = "SELECT *  
            -- COUNT(evaluations.score) as JUMLAH,
            -- SUM(evaluations.score) as TOTAL_NILAI
          FROM 
            evaluations
          WHERE 
            evaluator_id = $_GET[id]
          AND
            teacher_id = ".$evaluator_parents->teacher->id."
          AND target = 'Orang Tua'  
          ";

$score = $db->exec('all');

$dumpEvaluations = [];
foreach($score as $s)
{
    $dumpEvaluations[$s->question_id] = $s->score;
}

return compact('evaluator_parents', 'categories_parent', 'period', 'success_msg', 'dumpEvaluations');




// echo "<pre>";
// print_r($evaluator);
// die();

// return compact('evaluator', 'evaluator_parents', 'evaluator_parents', 'categories', 'categories_parent', 'categories_parent', 'period', 'success_msg');
