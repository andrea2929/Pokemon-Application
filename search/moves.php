<?php

  include('../header.php');

  $params = array(
    'name' => '%'.get('move-search').'%'
  );

  $moves = query($database, $params, '../sql/search/searchmoves.sql');

?>

<div class="container" style="margin-top: 50px;">
  <h1>Search Moves</h1>

  <form>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
      <input type="text" class="form-control" name="move-search" placeholder="Moves" aria-describedby="sizing-addon1">
    </div>
  </form>

  <br>

  <table class="table table-hover">
    <thead>
      <th>Moves</th>
      <th>Flavor Text</th>
      <th>Power</th>
      <th>PP</th>
      <th>Accuracy</th>
      <th>Priority</th>
    </thead>
    <tbody>
      <?php foreach($moves as $move) : ?>
            <tr>
              <td style="text-transform: capitalize;"><?php echo str_replace("-"," ",$move['identifier']); ?></td>
              <td><?php echo str_replace("$"."effect_chance",$move['effect_chance'],$move['short_effect']); ?></td>
              <td><?php echo $move['power']; ?></td>
              <td><?php echo $move['pp']; ?></td>
              <td><?php echo $move['accuracy']; ?></td>
              <td><?php echo $move['priority']; ?></td>
            </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<?php include('../footer.php'); ?>
