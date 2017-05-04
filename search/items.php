<?php

  include('../header.php');

  $params = array(
    'name' => '%'.get('item-search').'%'
  );

  $items = query($database, $params, '../sql/search/searchitems.sql');

?>

<div class="container" style="margin-top: 50px;">
  <h1>Search Items</h1>

  <form>
    <div class="input-group input-group">
      <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
      <input type="text" class="form-control" name="item-search" placeholder="Search" aria-describedby="sizing-addon1">
    </div>
  </form>

  <br>

  <table class="table table-hover">
    <thead>
      <th>Item</th>
      <th>Flavor Text</th>
    </thead>
    <tbody>
      <?php foreach($items as $item) : ?>
            <tr>
              <td style="text-transform: capitalize;"><?php echo str_replace("-"," ",$item['identifier']); ?></td>
              <td><?php echo $item['flavor_text']; ?></td>
            </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include('../footer.php'); ?>
