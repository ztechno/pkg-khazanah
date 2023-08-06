<?php

$success_msg = get_flash_msg('success');

$conn = conn();
$db   = new Database($conn);

$period = $db->single('periods', [
    'status' => '1'
]);

// ========================================= Guru ===========================================
if (auth()->role_id == 2) {
    
    Validation::run([
        'id' => [
            'required', 'exists:evaluators'
        ]
    ], $_GET);
    

    $evaluator = $db->single('evaluators', [
        'id' => $_GET['id']
    ]);

    $db->query = "SELECT * FROM teachers WHERE id = (SELECT teacher_id FROM evaluation_subjects WHERE id=$evaluator->subject_id)";
    $evaluator->teacher = $db->exec('single');

    $type = $evaluator->type == 1 ? 'Penilai' : 'Teman Sejawat';

    $categories = $db->all('categories', [
        'parent_id' => ['IS', 'NULL'],
        'target' => $type
    ]);

    $categories = array_map(function ($category) use ($db) {
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
    }, $categories);

    if (request() == 'POST') {
        if ($_POST['target'] == 1) {
            $target = 'Penilai';
        } elseif ($_POST['target'] == 2) {
            $target = 'Teman Sejawat';
        } else {
            $target = $_POST['target'];
        }
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
    
        set_flash_msg(['success' => 'Penilaian berhasil ditambahkan']);
        header('location:' . routeTo('evaluations/do?id=' . $_GET['id'] . ''));
    }

    return compact('evaluator', 'categories', 'period', 'success_msg');

}

// ========================================= Siswa ===========================================
if (auth()->role_id == 4) {
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

    if (request() == 'POST') {
        if ($_POST['target'] == 1) {
            $target = 'Penilai';
        } elseif ($_POST['target'] == 2) {
            $target = 'Teman Sejawat';
        } else {
            $target = $_POST['target'];
        }
        $scoreArray     = $_POST['score'];
    
        // echo '<pre>';
        // print_r($_POST);
        // die;
    
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
    
        set_flash_msg(['success' => 'Penilaian berhasil ditambahkan']);
        header('location:' . routeTo('evaluations/do?id=' . $_GET['id'] . ''));
    }

    return compact('evaluator_students', 'categories_student', 'period', 'success_msg');

}

// ========================================= Orang Tua ===========================================
if (auth()->role_id == 5) {
    Validation::run([
        'id' => [
            'required', 'exists:evaluator_parents'
        ]
    ], $_GET);
    $evaluator_parents = $db->single('evaluator_parents', [
        'id'    => $_GET['id']
    ]);

    $db->query = "SELECT * FROM parents WHERE id = (SELECT teacher_id FROM evaluation_subjects WHERE id=$evaluator_parents->subject_id)";
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

    if (request() == 'POST') {
        if ($_POST['target'] == 1) {
            $target = 'Penilai';
        } elseif ($_POST['target'] == 2) {
            $target = 'Teman Sejawat';
        } else {
            $target = $_POST['target'];
        }
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
    
        set_flash_msg(['success' => 'Penilaian berhasil ditambahkan']);
        header('location:' . routeTo('evaluations/do?id=' . $_GET['id'] . ''));
    }

    return compact('evaluator_parents', 'categories_parent', 'period', 'success_msg');

}




// echo "<pre>";
// print_r($evaluator);
// die();

// return compact('evaluator', 'evaluator_students', 'evaluator_parents', 'categories', 'categories_student', 'categories_parent', 'period', 'success_msg');
