<?php

$success_msg = get_flash_msg('success');
Validation::run([
    'id' => [
        'required', 'exists:evaluator_students'
    ]
], $_GET);

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods', [
    'status' => '1'
]);
    $evaluator_students = $db->single('evaluator_students', [
        'id'    => $_GET['id']
    ]);

    $db->query = "SELECT * FROM students WHERE id = (SELECT teacher_id FROM evaluation_subjects WHERE id=$evaluator_students->student_id)";
    $evaluator_students->student = $db->exec('single');

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


if (request() == 'POST') {

    $scoreArray     = $_POST['score'];

    echo '<pre>';
    print_r($_POST);
    die;

    foreach ($scoreArray as $questionId => $score) {
        $db->insert('evaluations', [
            'target'        => $_POST['target'],
            'teacher_id'    => $_POST['teacher_id'],
            'evaluator_id'  => $_GET['id'],
            'period_id'     => $_POST['period_id'],
            'question_id'   => $questionId,
            'score'         => $scoreArray[$questionId],
        ]);
    }

    set_flash_msg(['success' => 'Penilaian berhasil ditambahkan']);
    header('location:' . routeTo('evaluations/do?id=' . $_GET['id'] . ''));
}


// echo "<pre>";
// print_r($evaluator);
// die();

return compact('evaluator_students', 'categories_student', 'period', 'success_msg');
