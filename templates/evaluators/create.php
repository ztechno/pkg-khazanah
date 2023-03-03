<?php load_templates('layouts/top') ?>
<div class="content">
    <div class="panel-header <?=config('theme')['panel_color']?>">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Buat <?=_ucwords(__($table))?> Baru</h2>
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
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php 
                                $conn = conn();
                                $db   = new Database($conn);

                                $db->query = ("SELECT * FROM evaluation_subjects");
                                $datasubjects = $db->exec("all");
                                
                                $db->query = ("SELECT * FROM teachers");
                                $dataguru = $db->exec("all");
                                
                                $db->query = ("SELECT * FROM students");
                                $datasiswa = $db->exec("all");

                            

                                // echo '<pre>';
                                // print_r($datasubjects_id);
                                ?>

                            <div class="form-group">
                                <label for="" class>Guru</label>
                                <select name='teacher_id' class='form-control' placeholder='Target'>
                                    <option value=''>- Pilih -</option>
                                    <?php foreach ($dataguru as $key => $ds) {?>
                                    <option value='<?=$ds->id?>'><?=$ds->name?></option>

                                    <?php }?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class>Type</label>
                                <select name='type' class='form-control' placeholder='Type'>
                                    <option value=''>- Pilih -</option>
                                    <option value='1'>Penilai</option>
                                    <option value='2'>Teman Sejawat</option>

                                </select>
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


                                    <?php foreach ($datasubjects as $dsub) { ?>
                                    <?php foreach ($dataguru as $dg) {
                                        $namaguru[] = $dg->name;
                                    } 
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="subject_id[<?=$dsub->id?>]" alt="Checkbox"
                                                value="<?=$dsub->id?>"></td>
                                        <td>
                                            <?= $namaguru[$dsub->teacher_id]; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>



                            <div class="form-group">
                                <button class="btn btn-primary">Submit</button>
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