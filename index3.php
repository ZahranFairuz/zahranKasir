<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.receipt {
    width: 300px;
    padding: 20px;
    background-color: white;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.receipt h2 {
    text-align: center;
    margin-bottom: 20px;
}

.receipt p {
    margin: 0 0 10px 0;
    text-align: center;
    font-size: 14px;
}

.receipt table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.receipt table th,
.receipt table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    font-size: 12px;
}

.receipt table th {
    background-color: #f2f2f2;
}

.receipt table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.receipt table tr:last-child td {
    font-weight: bold;
}

.receipt table tr td[colspan="3"] {
    text-align: right;
    padding-right: 10px;
}

.receipt table tr:last-child td[colspan="3"] {
    text-align: right;
}

@media print {
    body {
        margin: 0;
        padding: 0;
    }
    .receipt {
        width: 100%;
        border: none;
        box-shadow: none;
    }
    .receipt h2,
    .receipt p,
    .receipt table {
        font-size: 10px;
    }
    .receipt table th,
    .receipt table td {
        padding: 4px;
    }
}

    </style>
</head>
<body>

<?php
session_start();
$totalHarga = 0;
$amountGiven = $_POST['amountGiven'];
$change = 0;

foreach ($_SESSION['kasir'] as $value) {
    $total = $value['jumlah'] * $value['harga'];
    $totalHarga += $total;
}

if ($amountGiven >= $totalHarga) {
    $change = $amountGiven - $totalHarga;
} else {
    echo "<p>Maaf, Uang Anda Tidak Cukup</p>";
    exit;
}

?>

<div class="receipt">
    <h2>Struk Pembayaran</h2>
    <p><strong>Date:</strong> <?php echo date('Y-m-d'); ?></p>
    <table border ="1">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php foreach($_SESSION['kasir'] as $value) { ?>
        <tr>
            <td><?php echo $value['produk']; ?></td>
            <td><?php echo $value['jumlah']; ?></td>
            <td><?php echo $value['harga']; ?></td>
            <td><?php echo $value['jumlah'] * $value['harga']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><?php echo $totalHarga; ?></td>
        </tr>
        <tr>
            <td colspan="3"><strong>Yang Dibayarkan</strong></td>
            <td><?php echo $amountGiven; ?></td>
        </tr>
        <tr>
            <td colspan="3"><strong>Kembalian</strong></td>
            <td><?php echo $change; ?></td>
        </tr>
    </table>
</div>

<?php
// Clear the session data
unset($_SESSION['kasir']);
?>

</body>
</html>