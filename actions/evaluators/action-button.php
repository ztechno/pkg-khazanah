<?php 

$action_button = '<a href="'.routeTo('evaluators/detail',['teacher_id'=>$d->teacher_id,'type'=>$d->type,'period_id'=>$d->period_id]).'" class="btn btn-sm btn-info text-white mr-2"><i class="fas fa-eye"></i> Detail</a>';


return $action_button;


;

?>