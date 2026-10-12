<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penjualan Barang</title>
    <style>
        body { background: yellow; font-family: Arial, sans-serif; }
        .header { background: blue; color: white; padding: 20px; font-size: 24px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">FORM PENJUALAN BARANG</div>
    <br>
    <form method="POST" action="">
        Kode Barang: <input type="text" name="kodeBarang"><br><br>
        Nama Barang: <input type="text" name="namaBarang"><br><br>
        Harga Barang: <input type="text" name="hargaBarang"><br><br>
        Jumlah Barang:
        <input type="radio" name="jumlahBarang" value="10">10
        <input type="radio" name="jumlahBarang" value="20">20
        <input type="radio" name="jumlahBarang" value="30">30
        <input type="radio" name="jumlahBarang" value="40">40<br><br>
        Metode Bayar:
        <select name="metodeBayar">
            <option value="Cash">Cash</option>
            <option value="Kredit">Kredit</option>
        </select>
        <input type="submit" name="Proses" value="Proses">
    </form>

    <?php
        if (isset($_POST['Proses'])) {
            $kodeBarang = $_POST['kodeBarang'];
            $namaBarang = $_POST['namaBarang'];
            $hargaBarang = $_POST['hargaBarang'];
            $jumlahBarang = $_POST['jumlahBarang'];
            $metodeBayar = $_POST['metodeBayar'];

            echo ("<br>Kode Barang: $kodeBarang<br>");
            echo ("Nama Barang: $namaBarang<br>");
            echo ("Harga Barang: $hargaBarang<br>");
            echo ("Jumlah Barang: $jumlahBarang<br>");
            echo ("Metode Bayar: $metodeBayar<br>");
        }
    ?>
</body>
</html>