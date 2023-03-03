<?php 

$conn   = conn();
$db     = new Database($conn);
$id     = $_GET['id'];

$db->query = ("UPDATE periods
                    SET status= 1
                    WHERE id = $id
                    ");
$db->exec();

Session::set(['aktifperiods' => $id]);

$db->query = ("UPDATE periods
                    SET status= 0
                    WHERE status = 1
                    AND id != $id
                    ");
$db->exec();


set_flash_msg(['success'=> 'Data berhasil di Aktifkan']);
header('Location:'.routeTo('crud/index',['table'=>'periods']));



?>