<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilangan Ganjil / Genap</title>

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

    .result {
        margin-top: 20px;
    }
</style>

</head>

<body>

<div class="container">

    <h1>Menentukan Bilangan Ganjil / Genap</h1>

    <form method="POST" action="">

        <label for="xbil">Masukkan Bilangan:</label>

        <input
            type="text"
            name="xbil"
            id="xbil"
            value="<?php echo isset($_POST['xbil']) ? $_POST['xbil'] : ''; ?>"
        >

        <input
            type="submit"
            value="Proses"
            name="hitung"
        >

        <input
            type="reset"
            value="Reset"
        >

        <div class="result">

            <?php
            if (isset($_POST['hitung'])) {
                $xbil = $_POST['xbil'];

                if (is_numeric($xbil)) {
                    $hsl = $xbil % 2;

                    $xket = ($hsl == 0)
                        ? "Bilangan Genap"
                        : "Bilangan Ganjil";

                    echo "Keterangan:
                        <input
                            type='text'
                            readonly
                            value='$xket'
                        >";
                } else {
                    echo "<p style='color:red;'>
                        Silakan masukkan angka yang valid.
                    </p>";
                }
            }
            ?>

        </div>

    </form>

</div>

</body>

</html>
