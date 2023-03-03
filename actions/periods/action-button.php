<?php 

$action_button = "";

if($d->status == 0){
    $action_button .= '<a href="'.routeTo('periods/prosesaktif',['id'=>$d->id]).'" class="btn btn-sm btn-success text-white"><i class="fas fa-check"></i> Aktifkan</a>';
}
else if($d->status == 1){
$action_button .= '<a href="'.routeTo('periods/prosesnonaktif',['id'=>$d->id]).'" class="btn btn-sm btn-default text-white"><i class="fas fa-times"></i> Non Aktifkan</a>';
}

return $action_button;


;

?>