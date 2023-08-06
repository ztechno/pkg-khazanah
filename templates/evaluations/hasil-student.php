<?php load_templates('layouts/top') ?>
<div class="content">
    <div class="panel-header <?= config('theme')['panel_color'] ?>">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Hasil Penilaian</h2>
                    <h5 class="text-white op-7 mb-2">Memanajemen data Penilaian Kinerja Guru</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    
                        <a href="<?= routeTo('evaluations/student') ?>" class="btn btn-warning btn-round">Kembali</a>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
     
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Penilaian Guru (<?=$period->name?>) - <?=$evaluator_students->teacher->name?></h4>
            </div>
            <div class="card-body">
                    <?php if($success_msg): ?>
                        <div class="alert alert-success"><?=$success_msg?></div>
                    <?php endif ?>
                <form action="" method="post">
                    <input type="hidden" name="evaluator_id" value="<?=$evaluator_students->id?>">
                    <input type="hidden" name="target" value="Siswa">
                    <input type="hidden" name="teacher_id" value="<?=$evaluator_students->teacher->id?>">
                    <input type="hidden" name="period_id" value="<?=$period->id?>">
                    <?php foreach($categories_student as $index => $category): ?>
                        <h4><?=$index+1?>. <?=$category->name?></h4>
        
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Pernyataan</th>
                            <th>Nilai</th>
                        </tr>
                        <?php foreach($category->questions as $no => $question): ?>
                        <tr>
                            <td><?=$no+1?></td>
                            <td>
                                <p><?=$question->description?></p>
                            </td>
                            <td>
                                <input type="number" name="score[<?=$question->id?>]" value="<?=$dumpEvaluations[$question->id]?>" id="" class="form-control">
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                    <?php endforeach ?>
                    <!-- <button class="btn btn-primary">Submit</button> -->
                </form>
            </div>
        </div>
    </div>
</div>

<?php load_templates('layouts/bottom') ?>