<div class="card">
    <div class="card-header">
        <h4 class="card-title">Penilaian Kinerja Guru (<?=$period->name?>) - <?=$evaluator->teacher->name?></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-4">
                <?php if($success_msg): ?>
                <div class="alert alert-success"><?=$success_msg?></div>
                <?php endif ?>
                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                    <?php foreach($categories as $key => $category): ?>
                    <li class="nav-item submenu">
                        <a class="nav-link <?=$key==0?'active show':''?>" id="pills-<?=$category->id?>-tab" data-toggle="pill" href="#pills-<?=$category->id?>" role="tab" aria-controls="pills-<?=$category->id?>" aria-selected="true"><?=$category->name?></a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content">
                    <?php foreach($categories as $key => $category): ?>
                    <div class="tab-pane fade <?=$key==0?'show active':''?>" id="pills-<?=$category->id?>" role="tabpanel" aria-labelledby="pills-<?=$category->id?>">
                        <form action="" method="post">
                        <input type="hidden" name="target" value="<?=$evaluator->type?>">
                        <input type="hidden" name="evaluator_id" value="<?=$evaluator->id?>">
                        <input type="hidden" name="teacher_id" value="<?=$evaluator->teacher->id?>">
                        <input type="hidden" name="period_id" value="<?=$period->id?>">
                        <?php foreach($category->childs as $index => $child): ?>
                        <h4>KOMPETENSI <?=$index+1?>. <?=$child->name?></h4>

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Indikator</th>
                                <th>Nilai</th>
                            </tr>
                            <?php foreach($child->questions as $no => $question): ?>
                            <tr>
                                <td><?=$no+1?></td>
                                <td>
                                    <p><?=$question->description?></p>
                                </td>
                                <td>
                                    <input type="number" name="score[<?=$question->id?>]" id="" class="form-control">
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                        <?php endforeach ?>
                        <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>