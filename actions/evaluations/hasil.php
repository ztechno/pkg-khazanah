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

// ========================================= Guru ===========================================
$evaluator = $db->single('evaluators',[
    'id' => $_GET['id']
]);

$db->query = "SELECT * FROM teachers WHERE id = (SELECT teacher_id FROM evaluation_subjects WHERE id=$evaluator->subject_id)";
$evaluator->teacher = $db->exec('single');

$type = $evaluator->type == 1 ? 'Penilai' : 'Teman Sejawat';
$categories = $db->all('categories',[
    'parent_id' => ['IS', 'NULL'],
    'target' => $type
]);


$categories = array_map(function($category) use ($db) {
    $childs = $db->all('categories', [
        'parent_id' => $category->id
    ]);

    if ($childs) {
        $childs = array_map(function($child) use ($db) {
            $child->questions = $db->all('questions', ['categorie_id' => $child->id]);

           
            foreach ($child->questions as $question) {
                $evaluator_id = $_GET['id']; 
                $score = $db->all('evaluations', ['question_id' => $question->id, 'evaluator_id' => $evaluator_id]);
                $question->score = $score ? $score : 0; 
            }

            return $child;
        }, $childs);

        $category->childs = $childs;
    }

    $category->questions = $db->all('questions', ['categorie_id' => $category->id]);

    return $category;
}, $categories);

$db->query = "SELECT *, sum(evaluations.score) as TOTAL_SCORE, teachers.name FROM categories
LEFT JOIN questions ON questions.categorie_id=categories.id
LEFT JOIN evaluations ON evaluations.question_id=questions.id
LEFT JOIN teachers ON evaluations.teacher_id=teachers.id
WHERE evaluations.evaluator_id = $evaluator->id";

$group = $evaluator->type == 2 ? 'evaluations.question_id' : 'questions.categorie_id';

$db->query .= " GROUP BY $group";

$scores = $db->exec('all');
$dump_scores = [];
foreach($scores as $score)
{
    if($evaluator->type == 2)
    {
        $dump_scores[$score->question_id] = $score->TOTAL_SCORE;
    }
    else
    {
        $dump_scores[$score->categorie_id] = $score->TOTAL_SCORE;
    }
}


$db->query = "SELECT * FROM result_ranges";
$keterangan = $db->exec('all');

return compact('evaluator', 'categories', 'categories_student', 'period', 'averageScoreByCategory', 'dump_scores', 'keterangan');