<form name="cobaku" method="POST" action="">
    <table>
        <tr>
            <td>Kode Barang :</td>
            <td>
                <input type="text" name="kode" size="20">
            </td>
        </tr>

        <tr>
            <td>Jumlah Barang :</td>
            <td>
                <input type="text" name="jlh" size="20" style="margin-top: 10px;">
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="hitung" value="Proses">
            </td>
        </tr>
    </table>

    <?php
    if (isset($_POST['hitung'])) {
        $kode = $_POST['kode'];
        $jumlah = $_POST['jlh'];

        $nama = "";
        $harga = 0;
        $a = "";
        $total = 0;

        if (is_numeric($jumlah)) {

            if ($kode == "A001") {
                $nama = "Monitor";
                $harga = 1500000;
                $a = "img1.jpg";

            } elseif ($kode == "A002") {
                $nama = "Keyboard";
                $harga = 2500000;
                $a = "img2.jpg";

            } else {
                $nama = "Tidak Diketahui";
                $a = "";
            }

            $total = $harga * $jumlah;

        } else {
            echo "Jumlah barang harus berupa angka.<br>";
        }

        if (isset($nama)) {
            echo "<table>";

            echo "<tr>
                    <td>Nama Barang :</td>
                    <td>
                        <input type='text' name='nm_brg' value='$nama' size='20'>
                    </td>
                  </tr>";

            echo "<tr>
                    <td>Harga Barang :</td>
                    <td>$harga</td>
                  </tr>";

            echo "<tr>
                    <td>Total Harga :</td>
                    <td>$total</td>
                  </tr>";

            if (!empty($a)) {
                echo "<tr>
                        <td colspan='2'>
                            <img src='$a' width='300' height='200'>
                        </td>
                      </tr>";
            }

            echo "</table>";
        }
    }
    ?>
</form> 