<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method ="POST" action="">
        nama: <input type="text" name="nama"><br>
        password: <input type="Password" name="password"><br>
        jenis kelamin: <br>
        <input type="radio" name="kelamin" value="pria">Pria
        <input type="radio" name="kelamin" value="Wanita">Wanita<br>
        Hobi: <br>
        <input type="checkbox" name="hobi" value="tidur">Tidur<br>
        <input type="checkbox" name="hobi" value="bersepeda">Bersepeda<br>
        <input type="checkbox" name="hobi" value="lain">Lainnya<br>
        <input type="submit" name="Kirim" value="Kirim">
        <input type="Reset" value="Ulangi">
    </form>    

    <?php
        if(isset($_POST['Kirim'])){
            $nama = $_POST['nama'];
            $password = $_POST['password'];
            $kelamin = $_POST['kelamin'];
            $hobi = $_POST['hobi'];
            echo ("Nama: $nama<br>");
            echo ("Password: $password<br>");
            echo ("Jenis Kelamin: $kelamin<br>");
            echo ("Hobi: $hobi<br>");
        }  
    ?>
</body>
</html>