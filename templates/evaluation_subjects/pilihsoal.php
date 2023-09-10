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
                    <a href="<?=routeTo('evaluation_subjects/index',[])?>"
                        class="btn btn-warning btn-round">Kembali</a>
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

                            <div class="form-group">
                                <label for="" class>Target</label>
                                <select name='target' id='target' class='form-control' placeholder='Target'>
                                    <option value=''>- Pilih -</option>
                                    <option value='Penilai'>Penilai</option>
                                    <option value='Teman Sejawat'>Teman Sejawat</option>
                                    <option value='Orang Tua'>Orang Tua</option>
                                    <option value='Siswa'>Siswa</option>
                                </select>
                            </div>



                            <div class="datasoal"></div>

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
$('#target').change(function() {
    return load_data()
})

load_data();

function load_data(target) {
    $.ajax({
        method: "POST",
        url: "<?=routeTo('evaluation_subjects/datasoal')?>",
        data: {
            target: $('#target').val()
        },
        success: function(hasil) {
            $('.datasoal').html(hasil);
        }
    });
}
$('#target').change(function() {
    var target = $("#target").val();
    load_data(target);

});

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