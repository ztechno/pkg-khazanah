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

// ========================================= Siswa ===========================================
$evaluator_students = $db->single('evaluator_students', [
    'id'    => $_GET['id']
]);

// $db->query = "SELECT * FROM students WHERE id = (SELECT teacher_id FROM evaluation_subjects WHERE id=$evaluator_students->subject_id)";
// $evaluator_students->student = $db->exec('single');

// $categories_student = $db->all('categories',[
//     'parent_id' => ['IS', 'NULL'],
//     'target' => 'Siswa'
// ]);

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

// $categories_student = array_map(function($category) use ($db){
//     $childs = $db->all('categories',[
//         'parent_id' => $category->id
//     ]);

//     if($childs)
//     {
//         $childs = array_map(function($child) use ($db){
//             $child->questions = $db->all('questions', ['categorie_id' => $child->id]);
    
//             return $child;
//         }, $childs);
    
//         $category->childs = $childs;
//     }

//     $category->questions = $db->all('questions', ['categorie_id' => $category->id]);

//     return $category;
// }, $categories_student);

if(request() == 'POST')
{
    // echo '<pre>';
    // print_r($_POST);
    // die;
    $target         = $_POST['target'] == 1 ? 'Penilai' : 'Teman Sejawat';
    $scoreArray     = $_POST['score'];

    foreach ($scoreArray as $questionId => $score) {
        $db->insert('evaluations', [
            'target'        => $target,
            'teacher_id'    => $_POST['teacher_id'],
            'evaluator_id'  => $_GET['id'],
            'period_id'     => $_POST['period_id'],
            'question_id'   => $questionId,
            'score'         => $scoreArray[$questionId],
        ]);
    }
   
    set_flash_msg(['success'=> 'Penilaian Kinerja Guru berhasil ditambahkan']);
    header('location:'.routeTo('evaluations/do?id='.$_GET['id'].''));
}

return compact('evaluator', 'categories', 'categories_student', 'period', 'success_msg');