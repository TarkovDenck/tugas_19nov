<?php
require 'db.php';

$stmt = $pdo->query("SELECT id, name, email FROM customers");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Customers</title>
</head>
<body>
    <h1>Daftar Customers</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($customers) > 0): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= htmlspecialchars($customer['id']); ?></td>
                        <td><?= htmlspecialchars($customer['name']); ?></td>
                        <td><?= htmlspecialchars($customer['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="frorm.php">Tambah Data</a>
</body>
</html>
