<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Classes e Objetos</title>
</head>
<body id="telalog">
<main id="container">
    <form id="login_form" method="post" action="./classes/AutenticaUsuario.php">
        <div id="form_header">
            <img src="./assets/img/logo.png" alt="Versátil TI">
            <i id="mode_icon" class="fa-solid fa-moon"></i>
        </div>
        <div id="inputs">
            <div class="input-box">
                <label for="name">Name
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="login" name="login" required>
                    </div>
                </label>
            </div>
            <div class="input-box">
                <label for="senha">senha
                    <div class="input-field">
                        <i class="fa-solid fa-key"></i>
                        <input type="senha" id="senha" name="senha" required>
                    </div>
                </label>
            </div>
        </div>
        <button type="submit" id="login_button">Login</button>
    </form>
</main>
<script type="text/javascript" src="./assets/js/script.js"></script>
</body>
</html>