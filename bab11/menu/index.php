<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan</title>

<style>
    body {
        background-color: #333;
        color: white;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 80%;
        margin: auto;
        background-color: #f0f0f0;
        color: #333;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    header {
        background: url('./gambar/header.jpg') no-repeat center center;
        height: 200px;
        border-radius: 10px;
    }

    nav {
        margin-top: 20px;
    }

    nav a {
        display: inline-block;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        margin-right: 10px;
        border-radius: 5px;
    }

    nav a:hover {
        background-color: #45a049;
    }

    footer {
        margin-top: 20px;
        padding: 10px;
        background-color: #222;
        color: #ccc;
        text-align: center;
        border-radius: 10px;
    }

    iframe {
        width: 100%;
        height: 200px;
        margin-top: 20px;
    }
</style>

</head>

<body>

<div class="container">

    <center>
        <nav>
            <?php include 'menu.php'; ?>
        </nav>
    </center>

    <section>
        <?php
        $slink = isset($_GET['slink'])
            ? $_GET['slink']
            : 'profile.php';

        include $slink;
        ?>
    </section>

    <footer>
        <p>© 2024 Situs Kami. All rights reserved.</p>
    </footer>

</div>

</body>

</html>
