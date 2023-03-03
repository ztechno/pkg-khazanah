<?php load_templates('layouts/top') ?>
<div class="content">
    <div class="panel-header <?=config('theme')['panel_color']?>">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Detail <?=_ucwords(__($table))?> </h2>
                    <h5 class="text-white op-7 mb-2">Memanajemen data <?=_ucwords(__($table))?></h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="<?=routeTo('evaluators/index')?>" class="btn btn-warning btn-round">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php if($error_msg): ?>
                        <div class="alert alert-danger"><?=$error_msg?></div>
                        <?php endif ?>
                        <?php if($success_msg): ?>
                        <div class="alert alert-success"><?=$success_msg?></div>
                        <?php endif ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php 
                                $conn = conn();
                                $db   = new Database($conn);
                                // $id             = $_GET['id'];
                                $period_id      = $_GET['period_id'];
                                $teacher_id     = $_GET['teacher_id'];
                                $type           = $_GET['type'];

                                $db->query = ("SELECT * FROM evaluation_subjects");
                                $datasubjects = $db->exec("all");
                                
                                $db->query = ("SELECT * FROM teachers");
                                $dataguru = $db->exec("all");
                                
                                $db->query = ("SELECT * FROM students");
                                $datasiswa = $db->exec("all");


                                $db->query = ("SELECT evaluators.*, IF(type=1,'Penilai','Teman Sejawat') type, teachers.name namaguru
                                               FROM evaluators
                                               JOIN teachers ON teachers.id=evaluators.teacher_id
                                               WHERE evaluators.teacher_id = '$teacher_id'
                                               AND evaluators.period_id = '$period_id'
                                            --    AND evaluators.type = '$type'
                                ");
                                $dataevaluator = $db->exec("single");

                                $db->query = ("SELECT evaluators.subject_id, evaluators.teacher_id 
                                                FROM evaluators
                                                WHERE teacher_id = '$teacher_id' ");

                                $datasubjectsdetail = $db->exec("all");


                            
                                // echo '<pre>';
                                // print_r($dataevaluator);
                                ?>

                            <div class="form-group">
                                <label for="" class>Guru</label>
                                <br>
                                <p><?=$dataevaluator->namaguru?></p>
                            </div>
                            <div class="form-group">
                                <label for="" class>Type</label>
                                <br>
                                <p><?=$dataevaluator->type?></p>

                            </div>
                            <div class="form-group">
                                <label for="" class>Subject</label>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10px"> <input type="checkbox" onchange="checkAll(this)"
                                                alt="Checkbox" value="Pilih Semua" data-checkbox-all="dataguru">
                                        </th width="10px">
                                        <th> Pilih Semua</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $namaguru = []; ?>
                                    <?php $dsubdetail = []; ?>
                                    <?php $dsubdetailteacher = []; ?>

                                    <?php 
                                    foreach ($datasubjectsdetail as $k => $d) {
                                        $dsubdetail[$d->subject_id] = $d->subject_id;
                                    }    
                                    ?>

                                    <?php 
                                    foreach ($dataguru as $dg) {
                                        $namaguru[$dg->id] = $dg->name;
                                    } 
                                    foreach ($datasubjects as $key => $dsub) {
                                        
                                    
                                    ?>
                                    <tr>
                                        <td><input type="checkbox"
                                                <?=isset($dsubdetail[$dsub->id])&& $dsubdetail[$dsub->id] ? "checked" : null?>
                                                name="subject_id[<?=$key?>]" alt="Checkbox" value="<?=$dsub->id?>">
                                        </td>
                                        <td>
                                            <?=$namaguru[$dsub->teacher_id]?>
                                        </td>
                                    </tr>

                                    <?php } ?>



                                </tbody>
                            </table>



                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php load_templates('layouts/bottom') ?>

<script>
$("#tahun").datepicker({
    format: 'yyyy',
    viewMode: "years",
    minViewMode: "years"
});

function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    }
}
</script>