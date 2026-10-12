<?php
$kodeBarang   = isset($_POST['kode_barang'])   ? $_POST['kode_barang']   : '';
$jumlahBarang = isset($_POST['jumlah_barang']) ? $_POST['jumlah_barang'] : '';
$metodeBayar  = isset($_POST['metode_bayar'])  ? $_POST['metode_bayar']  : 'Cash';

$namaBarang  = '';
$hargaBarang = '';
$totalHarga  = '';
$diskon      = '';
$totalBayar  = '';
$pesan       = '';

function cariBarang($kode)
{
    $nama  = '';
    $harga = '';

    switch (strtoupper(trim($kode))) {
        case 'A001':
            $nama  = 'Mouse';
            $harga = 5000000;
            break;
        case 'A002':
            $nama  = 'Headphone';
            $harga = 750000;
            break;
        case 'A003':
            $nama  = 'CPU';
            $harga = 2300000;
            break;
        default:
            $nama  = '';
            $harga = '';
            break;
    }

    return ['nama' => $nama, 'harga' => $harga];
}

if (isset($_POST['cari'])) {
    $hasil       = cariBarang($kodeBarang);
    $namaBarang  = $hasil['nama'];
    $hargaBarang = $hasil['harga'];

    if ($namaBarang === '') {
        $pesan = 'Kode Barang tidak ditemukan! Gunakan A001, A002, atau A003.';
    }

    $jumlahBarang = '';
    $totalHarga   = '';
    $diskon       = '';
    $totalBayar   = '';
}

if (isset($_POST['proses'])) {
    $hasil       = cariBarang($kodeBarang);
    $namaBarang  = $hasil['nama'];
    $hargaBarang = $hasil['harga'];
    $jumlah      = (int) $jumlahBarang;

    if ($namaBarang === '') {
        $pesan = 'Kode Barang belum valid. Isi kode yang benar lalu klik "Cari" dulu.';
    } elseif ($jumlah <= 0) {
        $pesan = 'Jumlah Barang harus diisi dengan angka lebih dari 0.';
    } else {
        $totalHargaNum = $hargaBarang * $jumlah;

        if ($metodeBayar === 'Kredit' && $jumlah > 20) {
            $diskonNum = 0.05 * $totalHargaNum;
        } elseif ($metodeBayar === 'Cash' && $jumlah > 5) {
            $diskonNum = 0.12 * $hargaBarang;
        } else {
            $diskonNum = 0;
        }

        $totalBayarNum = $totalHargaNum - $diskonNum;

        $totalHarga = number_format($totalHargaNum, 0, ',', '.');
        $diskon     = number_format($diskonNum, 0, ',', '.');
        $totalBayar = number_format($totalBayarNum, 0, ',', '.');
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Penjualan Barang</title>
<style>
    * { box-sizing: border-box;
        print-color-adjust: exact;
 }
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #e8e8e8;
        margin: 0;
        padding: 30px 12px;
        display: flex;
        justify-content: center;
    }
    .form-container {
        width: 460px;
        max-width: 100%;
        border: 2px solid #000;
        background: #ffff00;
    }
    .form-header {
        background: #0000ff;
        color: #ffffff;
        text-align: center;
        padding: 26px 10px;
        font-size: 24px;
        font-weight: bold;
    }
    .form-body {
        padding: 20px 25px 25px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 6px 4px;
        font-size: 14px;
    }
    .label-cell {
        width: 125px;
        font-weight: bold;
        color: #000080;
        white-space: nowrap;
    }
    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 6px 8px;
        border: 1px solid #888888;
        font-size: 14px;
        background: #ffffff;
    }
    button {
        margin-left: 6px;
        padding: 6px 16px;
        background: #d9d9d9;
        border: 1px solid #888888;
        border-radius: 3px;
        cursor: pointer;
        font-size: 14px;
    }
    button:hover { background: #c6c6c6; }
    .input-with-button {
        display: flex;
    }
    .pesan {
        color: #b30000;
        font-weight: bold;
        font-size: 13px;
        margin: 0 0 10px;
    }
    .cetak-row {
        margin-top: 10px;
    }

</style>
</head>
<body>

<div class="form-container">
    <div class="form-header">FORM PENJUALAN BARANG</div>
    <div class="form-body">

        <?php if ($pesan !== ''): ?>
            <p class="pesan"><?php echo htmlspecialchars($pesan); ?></p>
        <?php endif; ?>

        <form name="formPenjualan" method="POST" action="">
            <table>
                <tr>
                    <td class="label-cell"><label for="kode_barang">Kode Barang</label></td>
                    <td>
                        <div class="input-with-button">
                            <input type="text" id="kode_barang" name="kode_barang"
                                   value="<?php echo htmlspecialchars($kodeBarang); ?>">
                            <button type="submit" name="cari" value="1">Cari</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="nama_barang">Nama Barang</label></td>
                    <td>
                        <input type="text" id="nama_barang" name="nama_barang"
                               value="<?php echo htmlspecialchars($namaBarang); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="harga_barang">Harga Barang</label></td>
                    <td>
                        <input type="text" id="harga_barang" name="harga_barang"
                               value="<?php echo $hargaBarang !== '' ? number_format($hargaBarang, 0, ',', '.') : ''; ?>"
                               readonly>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="jumlah_barang">Jumlah Barang</label></td>
                    <td>
                        <input type="number" id="jumlah_barang" name="jumlah_barang" min="0" step="1"
                               value="<?php echo htmlspecialchars($jumlahBarang); ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="metode_bayar">Metode Bayar</label></td>
                    <td>
                        <div class="input-with-button">
                            <select id="metode_bayar" name="metode_bayar">
                                <option value="Cash" <?php echo ($metodeBayar === 'Cash') ? 'selected' : ''; ?>>Cash</option>
                                <option value="Kredit" <?php echo ($metodeBayar === 'Kredit') ? 'selected' : ''; ?>>Kredit</option>
                            </select>
                            <button type="submit" name="proses" value="1">Proses</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="total_harga">Total Harga</label></td>
                    <td>
                        <input type="text" id="total_harga" name="total_harga"
                               value="<?php echo htmlspecialchars($totalHarga); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="diskon">Diskon</label></td>
                    <td>
                        <input type="text" id="diskon" name="diskon"
                               value="<?php echo htmlspecialchars($diskon); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="total_bayar">Total Bayar</label></td>
                    <td>
                        <input type="text" id="total_bayar" name="total_bayar"
                               value="<?php echo htmlspecialchars($totalBayar); ?>" readonly>
                    </td>
                </tr>
            </table>

            <div class="cetak-row">
                <button type="button" onclick="window.print()">Cetak</button>
            </div>
        </form>

    </div>
</div>

</body>
</html>