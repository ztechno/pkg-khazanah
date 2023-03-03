<?php 

$conn   = conn();
$db     = new Database($conn);
$id     = $_GET['id'];

$db->query = ("UPDATE periods
                    SET status= 0
                    WHERE id = $id
                    ");
$db->exec();

Session::clear('aktifperiods');

set_flash_msg(['success'=> 'Data berhasil di Aktifkan']);
header('Location:'.routeTo('crud/index',['table'=>'periods']));



?>