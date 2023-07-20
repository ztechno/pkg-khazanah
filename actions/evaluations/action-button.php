<?php

$action = '';

if (in_array(auth()->role_id, [6, 3])) {
    $action = '<a href="'.routeTo('evaluations/hasil',['id'=>$d->id]).'" class="btn btn-sm btn-success">Hasil Penilaian</a>';
} 

$action .= '<a href="'.routeTo('evaluations/do',['id'=>$d->id]).'" class="btn btn-sm btn-info ml-2">Lakukan Penilaian</a>'; 

return $action;
