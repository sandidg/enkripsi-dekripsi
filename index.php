<?php
    // Deklarasi variabel
    $pesan = "";
    $hasilEnkripsi = "";
    $hasilDekripsi = "";
    $kunci = "";

    // Memeriksa apakah ada data yang dikirimkan melalui formulir
    if (isset($_POST['submit'])) {
        $pesan = $_POST['pesan'];
        $kunci = $_POST['kunci'];

        // Melakukan enkripsi dengan algoritma AES-128
        $hasilEnkripsi = openssl_encrypt($pesan, 'AES-128-ECB', $kunci);

        // Melakukan dekripsi dengan algoritma AES-128
        $hasilDekripsi = openssl_decrypt($hasilEnkripsi, 'AES-128-ECB', $kunci);
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Enkripsi-Dekripsi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        form {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 22px); /* Adjusted width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            align-self: center; /* Memposisikan tombol di tengah */
        }

        button:hover {
            background-color: #0056b3;
        }

        .hasil {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .hasil p {
            margin: 0 0 10px 0;
        }

        .hasil .hasil-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Aplikasi Enkripsi-Dekripsi</h1>

    <form method="post">
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" rows="5" placeholder="Masukkan pesan..."><?php echo $pesan; ?></textarea>

        <label for="kunci">Kunci:</label>
        <input type="text" id="kunci" name="kunci" placeholder="Masukkan kunci..." value="<?php echo $kunci; ?>">

        <button type="submit" name="submit">Enkripsi/Dekripsi</button>
    </form>

    <div class="hasil">
        <?php
            // Memeriksa apakah hasil enkripsi atau dekripsi tidak kosong
            if ($hasilEnkripsi != "") {
                echo "<p class='hasil-title'>Hasil Enkripsi:</p><p>$hasilEnkripsi</p>";
            }

            if ($hasilDekripsi != "") {
                echo "<p class='hasil-title'>Hasil Dekripsi:</p><p>$hasilDekripsi</p>";
            }
        ?>
    </div>
</body>
</html>
