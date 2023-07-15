<?php

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

$categories = array_map(function($category) use ($db){
    $childs = $db->all('categories',[
        'parent_id' => $category->id
    ]);

    if($childs)
    {
        $childs = array_map(function($child) use ($db){
            $child->questions = $db->all('questions', ['categorie_id' => $child->id]);
    
            return $child;
        }, $childs);
    
        $category->childs = $childs;
    }

    $category->questions = $db->all('questions', ['categorie_id' => $category->id]);

    return $category;
}, $categories);

return compact('evaluator', 'categories', 'period');