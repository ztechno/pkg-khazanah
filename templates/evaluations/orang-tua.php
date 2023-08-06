<div class="card">
    <div class="card-header">
        <h4 class="card-title">Penilaian Orang Tua (<?=$period->name?>) - <?=$evaluator_parents->parent->name?></h4>
    </div>
    <div class="card-body">
            <?php if($success_msg): ?>
                <div class="alert alert-success"><?=$success_msg?></div>
            <?php endif ?>
        <form action="" method="post">
            <input type="hidden" name="evaluator_id" value="<?=$evaluator_parents->id?>">
            <input type="hidden" name="target" value="Orang Tua">
            <input type="hidden" name="teacher_id" value="<?=$evaluator_parents->teacher->id?>">
            <input type="hidden" name="period_id" value="<?=$period->id?>">
            <?php foreach($categories_parent as $index => $category): ?>
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
                        <input type="number" name="score[<?=$question->id?>]" id="" class="form-control">
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <?php endforeach ?>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>