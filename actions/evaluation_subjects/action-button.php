<?php 

$action_button = '<a href="'.routeTo('evaluation_subjects/pilihsoal',['id'=>$d->id]).'" class="btn btn-sm btn-success text-white"><i class="fas fa-edit"></i> Pilih Soal</a>'." ".'<a href="'.routeTo('evaluation_subjects/hasil',['id'=>$d->id]).'" class="btn btn-sm btn-info text-white"><i class="fas fa-list"></i> Hasil Penilaian</a>';


return $action_button;


;

?>