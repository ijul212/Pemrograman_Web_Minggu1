<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persegi Panjang</title>

<style>
    body {
        background-color: #f0f8ff;
        font-family: Arial, sans-serif;
    }

    .container {
        margin: auto;
        width: 50%;
        padding: 20px;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    h1 {
        color: #ff6347;
        text-align: center;
    }

    input[type="text"],
    input[type="submit"],
    input[type="reset"] {
        padding: 10px;
        margin: 10px 0;
        width: 100%;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type="submit"],
    input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #45a049;
    }
</style>

</head>

<body>

<div class="container">

    <h1>Menghitung Luas Persegi Panjang</h1>

    <form method="POST" action="">

        <label for="xpjg">Masukkan Panjang:</label>

        <input
            type="text"
            name="xpjg"
            id="xpjg"
            value="<?php echo isset($_POST['xpjg']) ? $_POST['xpjg'] : ''; ?>"
        >

        <label for="xlbr">Masukkan Lebar:</label>

        <input
            type="text"
            name="xlbr"
            id="xlbr"
            value="<?php echo isset($_POST['xlbr']) ? $_POST['xlbr'] : ''; ?>"
        >

        <input
            type="submit"
            value="Hitung"
            name="xhitung"
        >

        <input
            type="reset"
            value="Reset"
        >

        <?php
        if (isset($_POST['xhitung'])) {
            $xpjg = $_POST['xpjg'];
            $xlbr = $_POST['xlbr'];

            if (is_numeric($xpjg) && is_numeric($xlbr)) {
                $xluas = $xpjg * $xlbr;

                echo "<p>Hasil: Luas Persegi Panjang adalah $xluas</p>";
            } else {
                echo "<p style='color:red;'>Input harus berupa angka.</p>";
            }
        }
        ?>

    </form>

</div>

</body>

</html>
