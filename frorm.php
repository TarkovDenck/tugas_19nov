<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!empty($name) && !empty($email)) {
        $stmt = $pdo->prepare("INSERT INTO customers (name, email) VALUES (:name, :email)");
        try {
            $stmt->execute(['name' => $name, 'email' => $email]);
            $message = "Data berhasil ditambahkan!";
        } catch (PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    } else {
        $message = "Semua field harus diisi!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
</head>
<body>
    <h1>Input Data Customer</h1>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <form method="POST" action="">
        <label for="name">Nama:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="view.php">Lihat Data</a>
</body>
</html>
