<div class="card">
    <div class="card-header">
        <h4 class="card-title">Penilaian Kinerja Guru (<?=$period->name?>) - <?=$evaluator->teacher->name?></h4>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <?php foreach($categories as $index => $category): ?>
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
                        <input type="number" name="" id="" class="form-control">
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <?php endforeach ?>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>