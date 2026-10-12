<center>

    <form name="cobaku" method="POST" action="case1.php">

        <table bgcolor="pink" width="50%">

            <tr bgcolor="deeppink">
                <td colspan="2" align="center">
                    <font color="midnightblue" size="5">
                        SWITCH CASE
                    </font>
                </td>
            </tr>

            <?php
            if (isset($_POST['hitung'])) {

                $kode = $_POST['kode'];
                $jumlah = $_POST['jlh'];

                echo "
                <tr>
                    <td align='right'>Nama Barang :</td>
                    <td>
                        <input type='text' name='kode' value='$kode' size='20'>
                    </td>
                </tr>";

                echo "
                <tr>
                    <td align='right'>Jumlah Barang :</td>
                    <td>
                        <input type='text' name='jlh' value='$jumlah' size='4'>
                    </td>
                </tr>";
            ?>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="hitung" value="Proses">
                </td>
            </tr>

            <?php

                switch ($kode) {

                    case "A001":
                        $nama = "Monitor";
                        $harga = 1500000;
                        $a = "img1.jpg";
                        break;

                    default:
                        $nama = "Keyboard";
                        $harga = 2500000;
                        $a = "img2.jpg";
                        break;
                }

                $total = $harga * $jumlah;

                echo "
                <tr>
                    <td align='right'>Nama Barang :</td>
                    <td>
                        <input type='text' name='nm_brg' value='$nama' size='20'>
                    </td>
                </tr>";

                echo "
                <tr>
                    <td align='right'>Harga Barang :</td>
                    <td>
                        <input type='text' name='harga' value='$harga' size='10'>
                    </td>
                </tr>";

                echo "
                <tr>
                    <td align='right'>Total Harga :</td>
                    <td>
                        <input type='text' name='total' value='$total' size='10'>
                    </td>
                </tr>";

                echo "
                <tr>
                    <td colspan='2' align='center'>
                        <img src='$a' width='300' height='200'>
                    </td>
                </tr>";
            }
            ?>

        </table>

    </form>

</center>

<?php
include("bawah.php");
?>
