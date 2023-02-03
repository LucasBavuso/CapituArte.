<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="princss.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    .borda {
        border: 2px solid black;
        background-color: #E4D6A7;
        radius: 10px;
    }
    </style>
    <?php
    //require_once("checarLogin.php");  
    ?>
</head>

<body style="margin: 0;">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <div style="background-color: #1c110a; height: 120px; margin: 0;">
        <a href="index.php"><img src="imagens/logore.png" alt="logo"
                style="width:220px; height:220px; position: absolute; top: -57px; left: -30px;">
        </a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="background-color: #e9b44c;">
            <h3 style="text-align: center; color:#9B2915">LOGIN USUÁRIO</h3>
        </div>
        <div class="posi" style=" right: 140px; ">
            <a href="logar.php">
                <button
                    style="height: 45px; background-color: #e9b44c;position: fixed; border-radius: 10px; top:38.2px">ENTRAR</button>
            </a>
        </div>
        <nav class="navbar navbar-expand-lg rounded"
            style="background-color: #e9b44c; position:absolute ;right: 150px; top:40px; ">
            <a class="nav-link dropdown-toggle px-2 " href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                CADASTRAR
            </a>
            <ul class="dropdown-menu" style="background-color: #facd74">
                <li><a class="dropdown-item" href="cadastro.php">Cadastrar cliente</a></li>
                <li><a class="dropdown-item" href="cadastromicro.php">Cadastrar Empreendedor</a></li>
                <li>
            </ul>
            </li>
        </nav>
    </div>
    <div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container mt-3">
            <div class="borda p-5 rounded">
                <h2>INSIRA SEUS DADOS DE USUÁRIO</h2>
                <hr>


                <form action="login.php" method="post">
                    <label for="Email do usuário">E-mail</label>
                    <input type="text" name="txtEmail" style="width: 99%; height: 40px; border-radius:5px" autofocus
                        placeholder="Insira seu e-mail" required />
                    <br>
                    <br>
                    <label for="Senha do usuário">Senha</label>
                    <input type="password" name="txtSenha" style="width: 99%; height: 40px; border-radius:5px"
                        placeholder="Insira sua senha" required />
                    <br>
                    <br>
                    <input type="radio" name="usuario" value="C" checked>Cliente
                    <br>
                    <input type="radio" name="usuario" value="M">Microempreendedor
                    <br>
                    <br>

                    <button type="submit" class="btn btn-warning">Enviar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>

                </form>
                <br>
                <br>
                <br>
                <br>
            </div>
</body>

</html>