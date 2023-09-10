<?php 

$conn   = conn();
$db     = new Database($conn);

$total_siswa  = $db->exists('students');
$total_guru  = $db->exists('teachers');
$total_ortu  = $db->exists('parents');


return compact('total_siswa','total_guru', 'total_ortu');


?>