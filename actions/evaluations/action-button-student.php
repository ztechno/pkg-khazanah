<?php


$action = '<a href="'.routeTo('evaluations/hasil-student',['id'=>$d->id]).'" class="btn btn-sm btn-success">Hasil Penilaian</a>';
$action .= '<a href="'.routeTo('evaluations/do',['id'=>$d->id]).'" class="btn btn-sm btn-info ml-2">Lakukan Penilaian</a>'; 

return $action;
