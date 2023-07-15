<?php

$action = '';

if(is_allowed(get_route_path('evaluations/do', []),auth()->user->id)):
    $action .= '<a href="'.routeTo('evaluations/do',['id'=>$d->id]).'" class="btn btn-sm btn-info">Lakukan Penilaian</a>'; 
endif;
// if(is_allowed(get_route_path('crud/edit',['table'=>$table]),auth()->user->id)):
//     $action .= '<a href="'.routeTo('crud/edit',['table'=>$table,'id'=>$d->id]).'" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>';
// endif;
// if(is_allowed(get_route_path('crud/delete',['table'=>$table]),auth()->user->id)):
//     $action .= '<a href="'.routeTo('crud/delete',['table'=>$table,'id'=>$d->id]).'" onclick="if(confirm(\'apakah anda yakin akan menghapus data ini ?\')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>';
// endif;

return $action;