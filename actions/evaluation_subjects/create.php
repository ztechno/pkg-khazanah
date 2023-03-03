<?php

$table = 'evaluation_subjects';
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
   
    $db->query = ("SELECT * 
                    FROM periods 
                    WHERE status = 1
                    ");
    $priod = $db->exec("single");

    foreach($_POST['teacher_id'] as $key => $teacher_id){
       
        $db->insert($table, [
                'teacher_id'    => $teacher_id,
                'period_id'      => $priod->id
        ]);
    }
    // $insert = $db->insert($table,$_POST[$table]);

    if(file_exists('../actions/'.$table.'/after-insert.php'))
        require '../actions/'.$table.'/after-insert.php';

    set_flash_msg(['success'=>_ucwords(__($table)).' berhasil ditambahkan']);
    header('location:'.routeTo('evaluation_subjects/index',['table'=>$table]));
}



return compact('table','error_msg','old','fields');