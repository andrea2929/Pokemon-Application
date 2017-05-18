<?php

  include('../header.php');

  $params = array(
    'hp' => gets('hp', 0),
    'attack' => gets('attack', 0),
    'defense' => gets('defense', 0),
    'spattack' => gets('spattack', 0),
    'spdefense' => gets('spdefense', 0),
    'speed' => gets('speed', 0)
  );

  $pokemon = query($database, $params, '../sql/search/searchbystatistics.sql');

?>

<div class="container" style="margin-top: 50px;">
  <h1>Search Statistics</h1>

  <form>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1">HP</span>
      <input type="number" class="form-control" min="0" name="statistics-search" placeholder="0" aria-describedby="sizing-addon1">
    </div>
    <br>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1">Attack</span>
      <input type="number" class="form-control" min="0" name="statistics-search" placeholder="0" aria-describedby="sizing-addon1">
    </div>
    <br>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1">Defense</span>
      <input type="number" class="form-control" min="0" name="statistics-search" placeholder="0" aria-describedby="sizing-addon1">
    </div>
    <br>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1">Special Attack</span>
      <input type="number" class="form-control" min="0" name="statistics-search" placeholder="0" aria-describedby="sizing-addon1">
    </div>
    <br>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1">Special Defense</span>
      <input type="number" class="form-control" min="0" name="statistics-search" placeholder="0" aria-describedby="sizing-addon1">
    </div>
    <br>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1">Speed</span>
      <input type="number" class="form-control" min="0" name="statistics-search" placeholder="0" aria-describedby="sizing-addon1">
    </div>
  </form>
</div>

<?php include('../footer.php'); ?>
