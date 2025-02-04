<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Perpustakaan SD Krendetan</title>
    <link rel="icon" href="img/log.png">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87CEFA;
            background-image: url('img/sd.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Tambahkan properti ini */
            height: 80vh;
            /* Pastikan tinggi body 100% dari viewport */
            margin: 0;
            padding: 0;
        }


        .login-kotak {
            width: 300px;
            padding: 20px;
            background-color: white;
            margin: 100px auto;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-kotak">
        <?php
        // Cek jika form telah disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Hardcoded username dan password
            $username = "admin";
            $password = "sdkrendetan1985";

            // Ambil data dari form
            $input_username = $_POST['username'];
            $input_password = $_POST['password'];

            // Cek apakah username dan password cocok
            if ($input_username == $username && $input_password == $password) {
                // Jika cocok, redirect ke halaman sukses
                header("Location: dashboard.php");
                exit();
            } else {
                // Jika tidak cocok, tampilkan pesan error
                $error_message = "Username atau Password salah!";
            }
        }
        ?>
        <h2>Login</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">

            <?php
            if (!empty($error_message)) {
                echo "<p class='error'>$error_message</p>";
            }
            ?>
        </form>
    </div>
    </div>
</body>

</html>