<?php 
    include('php/conexão.php');

    if(isset($_POST['email']) || isset($_POST['senha'])){

        if(strlen($_POST['email']) == 0){
            echo "Prencha seu e-mail";
        }else if(strlen($_POST['senha']) == 0){
            echo "Preencha sua senha";
        }else{

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ".$mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: php/painel.php");

            } else{
                echo "Falha ao logar! Email ou senha incorretos";
            }

        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mainPage.css">
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
                <a href="#">
                    <img width="50" height="50" class="icone login" src="https://img.icons8.com/ios/50/FFFFFF/login-rounded-right--v1.png" alt="login-rounded-right--v1"/>
                </a>
            </nav>
        </div>
    </header>


    <form action="" method="POST">
        <h1>Acesse sua conta</h1>

        <div>
            <label for="email">E-mail</label>
            <input type="text" name="email">
        </div>

        <div>
            <label for="senha">Senha</label>
            <input type="password" name="senha">
        </div>

        <button type="submit">Entrar</button>

        <div>
            <span>Não tem uma conta? clique abaixo para se cadastrar</span>
            <a href="#" type="btn">Cadastre-se</a>
        </div>
    </form>
</body>
</html>