<?php /* @var object $data */ ?>
<div class="container my-5">
  <table class="table">
    <thead>
      <th>Name subject</th>
      <th>ID subject</th>
      <th>AVG grade</th>
      <th>First period</th>
      <th>Second period</th>
  <tbody>
   <?php foreach($data->subjects as $items): ?>
        <tr>
          <th><?=htmlspecialchars($items['name'])?>  </th>
          <th>  <?=htmlspecialchars($items['sub_id'])?></th>
          <th class="<?=color_сell($items['avg_grade'])?>"><?=htmlspecialchars($items['avg_grade'])?></th>
          <th class="<?= color_сell($items['first_grade']) ?>"><?=htmlspecialchars($items['first_grade'])?></th>
          <th class="<?= color_сell($items['second_grade'])?>"><?=htmlspecialchars($items['second_grade'])?></th>
        </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
</div>