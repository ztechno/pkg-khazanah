<?php 
    extract($_POST);
    
    $conn = conn();
    $db   = new Database($conn);
   
    $db->query = "SELECT questions.*, categories.name as category_name 
                                    FROM questions 
                                    JOIN categories 
                                    ON categories.id=questions.categorie_id 
                                    WHERE categorie_id 
                                    IN (SELECT id FROM categories WHERE target = '$target')";

    // $db->query = ("SELECT questions.categorie_id, questions.description, categories.target
    //                  FROM questions
    //                  JOIN categories ON categories.id=questions.categorie_id
    //                 WHERE questions.categorie_id = '$target'
    //                   ");
    $datapertanyaan = $db->exec("all");

    
    ?>
<?php if($datapertanyaan) {?>
<table class="table">
    <thead>
        <tr>
            <th width="30px"> <input type="checkbox" onchange="checkAll(this)" alt="Checkbox" value="Pilih Semua"
                    data-checkbox-all="dataguru">
            </th>
            <th>Kategori</th>
            <th>Pertanyaan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datapertanyaan as $key => $dq) { ?>
        <tr>
            <td><input type="checkbox" name="question_id[<?=$key?>]" alt="Checkbox"
                    value="<?=$dq->id."-".$dq->categorie_id?>">
            </td>
            <td><?=$dq->category_name?></td>
            <td><?=$dq->description?></td>
        </tr>
        <?php } ?>

    </tbody>


</table>

<?php } else {?>
<p class="ml-3">Tidak ada pertanyaan</p>
<?php } ?>