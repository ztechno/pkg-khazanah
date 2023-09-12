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
                    <a href="<?=routeTo('evaluation_subjects/index')?>" class="btn btn-warning btn-round">Kembali</a>
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

                                $db->query = ("SELECT * FROM teachers");
                                $data = $db->exec("all");
                            ?>
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
                                    <?php foreach ($data as $key => $dg) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="teacher_id[<?=$dg->id?>]" alt="Checkbox"
                                                value="<?=$dg->id?>"></td>
                                        <td><?=$dg->name?></td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <div class="form-group mb-3">
                                <label for="">Rata-Rata Kehadiran</label>
                                <input type="text" name="kehadiran" id="" class="form-control mb-3" required>
                            </div>



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