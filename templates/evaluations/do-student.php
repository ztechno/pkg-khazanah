<?php load_templates('layouts/top') ?>
<div class="content">
    <div class="panel-header <?= config('theme')['panel_color'] ?>">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Penilaian Kinerja Guru</h2>
                    <h5 class="text-white op-7 mb-2">Memanajemen data Penilaian Kinerja Guru</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                   
                        <a href="<?= routeTo('evaluations/student') ?>" class="btn btn-warning btn-round">Kembali</a>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <?php require 'siswa.php' ?>
    </div>
</div>
<?php load_templates('layouts/bottom') ?>