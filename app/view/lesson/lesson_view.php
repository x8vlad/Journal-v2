<?php /**
 * @var object $data
 */ ?>
<div class="container my-5">
    <h1>Schedule of your lesson</h1>
    <div class="col-lg-8 px-0">
        <table class="table" id="tableBlockLessens">
            <tr>
                <th>№</th
                <th>Subject</th>
                <th>Time start</th>
                <th>Time end</th>
                <th>Classroom</th>
            </tr>
            <tbody id="table-body-lessens">
            <!--here I need to feel table by controller data foreach echo "<pre>"; var_dump($lesson); die();-->

            <?php foreach ($data->schedule as $lesson) :  ?>
            <tr>
                <td> <?= htmlspecialchars($lesson['num_less']) ?> </td>
                <td> <?= htmlspecialchars($lesson['name_subject']) ?> </td>
                <td> <?= htmlspecialchars($lesson['start_less']) ?> </td>
                <td> <?= htmlspecialchars($lesson['end_less']) ?> </td>
                <td> <?= htmlspecialchars($lesson['classroom']) ?> </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <hr class="col-1 my-4">
        <div class="test_lesson"><?= $data->test_content ?></div>
        <hr class="col-1 my-4">

        <div class="form-check form-check-inline">
            <label class="form-check-label" for="arrow">Arrows</label>
            <input class="form-check-input" type="checkbox" id="arrow" name="option" value="arrows">
        </div>

        <br>

        <div class="form-check form-check-inline">
            <label class="form-check-label" for="pagination">Pagination</label>
            <input class="form-check-input" type="checkbox" id="pagination" name="option" value="pagination">
        </div>

        <hr class="col-1 my-4">

        <!-- arrows DISPLAY HIDDEN-->
        <div class="arrows" style="display:none;">
            <button type="submit" name="back" data-direction="prev" class="btn btn-dark btn-sm">&lt;</button>
            <button type="submit" name="next" data-direction="next" class="btn btn-dark btn-sm">&gt;</button>
        </div>

        <!-- pagination -->
        <nav aria-label="Page navigation example" class="paginationNav">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul>
        </nav>
        <hr class="col-1 my-4">
    </div>
</div>