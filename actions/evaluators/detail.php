<?php

$table = 'evaluators';
Page::set_title('Detail '._ucwords(__($table)));
$error_msg = get_flash_msg('error');
$success_msg = get_flash_msg('success');
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
   
    $db->query = ("SELECT * 
                    FROM periods 
                    WHERE status = 1
                    ");
    $priod = $db->exec("single");

    // echo '<pre>';
    // print_r($_POST);    
    foreach($_POST['subject_id'] as $key => $subject_id){
       
        $db->insert($table, [
                'teacher_id'    => $_POST['teacher_id'],
                'type'          => $_POST['type'],
                'period_id'     => $priod->id,
                'subject_id'    => $subject_id,
                
        ]);
    }
    // $insert = $db->insert($table,$_POST[$table]);

    if(file_exists('../actions/'.$table.'/after-insert.php'))
        require '../actions/'.$table.'/after-insert.php';

    set_flash_msg(['success'=>_ucwords(__($table)).' berhasil ditambahkan']);
    header('location:'.routeTo('evaluators/index'));
}



return compact('table','error_msg','old','fields','success_msg');