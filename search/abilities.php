<?php
include('../header.php');

$params = array(
  'name' => '%'.get('ability-search').'%'
);

$abilities = query($database, $params, '../sql/search/searchabilities.sql');

?>

<div class="container" style="margin-top: 50px;">
  <h1>Search Abilities</h1>

  <form>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
      <input type="text" class="form-control" name="ability-search" placeholder="Search" aria-describedby="sizing-addon1">
    </div>
  </form>

  <br>

  <table class="table table-hover">
    <thead>
      <th>Ability</th>
      <th>Flavor Text</th>
    </thead>
    <tbody>
      <?php foreach($abilities as $ability) : ?>
            <tr>
              <td style="text-transform: capitalize;"><a href="../ability.php?id=<?php echo $ability['id']; ?>"><?php echo str_replace("-"," ",$ability['identifier']); ?></a></td>
              <td><?php echo $ability['flavor_text']; ?></td>
            </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<?php include('../footer.php'); ?>
