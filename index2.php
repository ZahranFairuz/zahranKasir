<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Kasir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <button type="submit" name="kirim" value="cetak"><a href="index1.php">Kembali</a></button>
    
    <div class="receipt">
        <h2>Struk Pembelian</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
      session_start();
      $totalHarga = 0;
      if(isset($_SESSION['kasir'])){
      foreach ($_SESSION['kasir'] as $value) {
          $total = $value['jumlah'] * $value['harga'];
          $totalHarga += $total;
      }
      ?>
      <tr>
          <td><?php echo $value['produk']; ?></td>
          <td><?php echo $value['jumlah']; ?></td>
          <td><?php echo $value['harga']; ?></td>
          <td><?php echo $total; ?></td>
      </tr>
      <?php } ?>
      <tr>
          <td colspan="3"><strong>Total</strong></td>
          <td id="totalAmount"><?php echo $totalHarga; ?></td>
      </tr>
  </table>
</div>
<div class="receipt-actions">
  <form action="index3.php" method="post">
      <label for="amountGiven">Yang Dibayarkan:</label>
      <input type="number" id="amountGiven" name="amountGiven" step="0.01">
      <button type="submit" name="bayar" onclick="calculateChange()">Bayar</button>
  </form>
</div>
</div>
<?php
                
                echo '</tbody>';
                echo '<tfoot>';
                echo '<tr>';
                echo '<td></td>';
                echo '</tr>';
                echo '</tfoot>';
                ?>
        </table>
    </div>
</body>
</html>
