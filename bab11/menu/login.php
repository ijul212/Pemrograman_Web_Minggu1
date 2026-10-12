<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>

<style>
    body {
        background-color: #f0f8ff;
        font-family: Arial, sans-serif;
    }

    .login-container {
        margin: auto;
        width: 50%;
        padding: 20px;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    h2 {
        color: #ff6347;
        text-align: center;
    }

    input[type="text"],
    input[type="password"],
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

    input[type="reset"] {
        background-color: #f44336;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    input[type="reset"]:hover {
        background-color: #d32f2f;
    }

    .form-footer {
        margin-top: 10px;
        color: #555;
        text-align: center;
    }
</style>

</head>

<body>

<div class="login-container">

    <h2>Login User</h2>

    <form method="POST" action="ganjil.php">

        <label for="username">Masukkan Username:</label>

        <input
            type="text"
            id="username"
            name="username"
            placeholder="Enter Username"
            required
        >

        <label for="password">Masukkan Password:</label>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter Password"
            required
        >

        <input
            type="submit"
            value="Proses"
        >

        <input
            type="reset"
            value="Reset"
        >

    </form>

    <div class="form-footer">
        <p>&copy; 2024 Website</p>
    </div>

</div>

</body>

</html>
