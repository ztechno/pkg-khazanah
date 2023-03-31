<?php

$table = 'question_assigns';
Page::set_title('Tambah '._ucwords(__($table)));
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');
$fields = config('fields')[$table];


if(file_exists('../actions/'.$table.'/override-create-fields.php'))
    $fields = require '../actions/'.$table.'/override-create-fields.php';

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    if(file_exists('../actions/'.$table.'/before-insert.php'))
        require '../actions/'.$table.'/before-insert.php';
    
    $id     = $_GET['id'];
    $db->query = ("SELECT * 
                    FROM periods 
                    WHERE status = 1
                    ");
    $priod = $db->exec("single");
    
    $db->query = ("SELECT * 
                    FROM evaluation_subjects 
                    WHERE id = $id
                    ");
    $evaluation_sub = $db->exec("single");
    // echo '<pre>';
    // print_r($_POST);  
    // die;  
    foreach($_POST['question_id'] as $key => $question_id){
        $question_id    = explode("-", $question_id);
        $db->insert($table, [
            'question_id'    => $question_id[0],
            'categorie_id'   => $question_id[1],
            'teacher_id'     => $evaluation_sub->teacher_id,
            'period_id'      => $priod->id,
            'target'         => $_POST['target']
            ]);
        }
        
    // $insert = $db->insert($table,$_POST[$table]);

    if(file_exists('../actions/'.$table.'/after-insert.php'))
        require '../actions/'.$table.'/after-insert.php';

    set_flash_msg(['success'=>_ucwords(__($table)).' berhasil ditambahkan']);
    header('location:'.routeTo('question_assigns/index'));
}



return compact('table','error_msg','old','fields');