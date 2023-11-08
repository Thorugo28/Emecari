<?php
    session_start();
    include('php/conexão.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/x-icon" href="img/favicon_package_v0.16/favicon.ico">
</head>
<body>

    <header class="cabecalho">
        <div class="header__container">

            <a href="index.html"><img class="logo" src="img/logo_branca.png" alt="logo"></a>

            <div class="search__container">
                <form action="" class="search">
                    <input type="text" placeholder="Busque um produto..." name="q">
                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50"
                        style="fill:#FFFFFF;">
                        <path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path>
                        </svg></button>
                </form>
            </div>

            <nav class="menu__header">
                <a href="carrinho.html">
                    <img width="50" height="50" class="icone carrinho" src="https://img.icons8.com/ios/50/FFFFFF/shopping-cart-loaded--v1.png" alt="shopping-cart-loaded--v1"/>
                </a>
                <a href="login.php">
                    <img width="50" height="50" class="icone login" src="https://img.icons8.com/ios/50/FFFFFF/login-rounded-right--v1.png" alt="login-rounded-right--v1"/>
                </a>
            </nav>
        </div>
    </header>
    
    <form class="form__cadastro" action="cadastrar.php" method="POST">
        <h1>Crie sua conta</h1>

        <div class="info__p">
            <span>Informações pessoais</span>
            <div class="input__container">
                <label for="nome">Nome</label>
                <input type="text" name="nome" required>
            </div>

            <div class="input__container">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" required>
            </div>

            <div class="input__container">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" required>
            </div>

            <div class="input__container">
                <label for="celular">Celular</label>
                <input type="text" nam="celular">
            </div>
        </div>

        <div class="entrega">
            <span>Informações para entrega</span>
            <div class="input__container">
                <label for="estado">Estado</label>
                <input type="text" name="estado" maxlength="2" required>
            </div>

            <div class="input__container">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" required>
            </div>

            <div class="input__container">
                <label for="endereço">Endereço</label>
                <input type="text" name="endereço" required>
            </div>
        </div>

        <div class="input__container">
            <label for="email">E-mail</label>
            <input type="text" name="email" required>
        </div>

        <div class="input__container">
            <label for="senha">Senha</label>
            <input type="password" name="senha" required>
        </div>
        

         <button type="submit">Cadastrar</button>
    </form>


    <footer>
        <div class="footer-container">
            <div class="footer-icons">
                <a href="#"><i class='bx bxl-facebook-square' ></i></a>
                <a href="#"><i class='bx bxl-twitter' ></i></a>
                <a href="#"><i class='bx bxl-instagram' ></i></a>
                <a href="#"><i class='bx bxl-youtube' ></i></a>
            </div>
            <div class="footer-nav">
            <ul>
                <li><a href="#">Loja</a></li>
                <li><a href="#">Sobre Nos</a> </li>
                <li><a href="#">Contato</a></li>
                <li><a href="#">Ajuda</a></li>
                <li><a href="#">Politica de Privacidade</a></li>
                <li><a href="#">Termo e Condicoes</a></li>
                <li></li>
            </ul>
            </div>
            <div class="footer-botton">
                <p>Copyright &copy;2023;</p>
            </div>
        </div>
</footer>
</body>
</html>