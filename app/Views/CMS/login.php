<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="CMS/css2/login_style.css">
    <style>
        .error-message {
            color: red;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 2000);
            }
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="<?= base_url('/aksilogin') ?>" method="POST">
                <h1>login</h1>
                <hr>
                <p>Goldstep indonesia</p>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div id="error-message" class="error-message">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <label for="username">username</label>
                <input type="text" name="username" id="username" placeholder="username" required>

                <label for="password">password</label>
                <input type="password" name="password" id="password" placeholder="password" required>
                <button type="submit">login</button>
            </form>
        </div>
        <div class="right">
            <img src="cms/img/logo-goldstep.png" alt="">
        </div>
    </div>
</body>

</html>