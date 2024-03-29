
<table  class ="table table-striped">
    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($positions as $position): ?>
          <tr>
              <td><?= $position["symbol"] ?></td>  
              <td><?= $position["name"] ?></td>
              <td><?= $position["shares"] ?></td>
              <td>$ <?= number_format($position["price"],2) ?></td>  
          </tr>
        <?php endforeach ?>  
        <tr>
            <td colspan="3">CASH</td>
            <td>$ <?= number_format($cash[0]["cash"],2) ?></td>
        </tr>
    </tbody>
</table>
