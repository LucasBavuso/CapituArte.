<!DOCTYPE html>
<html lang="en">

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
            <h3 style="text-align: center; color:#9B2915">CADASTRO CLIENTE</h3>
            <div class="posi" style=" right: 140px; ">
                <a href="logar.php">
                    <button
                        style="height: 45px; background-color: #e9b44c; border-radius: 10px; top:-8px; left:10%; position: absolute;">ENTRAR</button>
                </a>
                </a>
                <ul class="dropdown-menu" style="background-color: #facd74">
                    <li><a class="dropdown-item" href="cadastro.php">Cadastrar cliente</a></li>
                    <li><a class="dropdown-item" href="cadastromicro.php">Cadastrar Empreendedor</a></li>
                    <li>
                </ul>
                </li>
            </div>
        </div>
        <div class="container mt-3">

            <div class="borda p-5 rounded">
                <h2>INSIRA SEUS DADOS</h2>
                <hr>
                <form action="cadastrarmicro.php" method="post">

                    <label for="Nome do empreendedor">Nome</label>
                    <input type="text" name="txtNome" style="width: 100%; height: 40px; border-radius:5px" autofocus
                        required placeholder="Insira seu nome completo" id="nome" />
                    <br>
                    <br>
                    <label for="Email do empreendedor">E-mail</label>
                    <input type="text" name="txtEmail" style="width: 100%; height: 40px; border-radius:5px" required
                        placeholder="Insira seu e-mail" id="email" />
                    <br>
                    <br>
                    <label for="Senha do usuario">Senha</label>
                    <label for="" style="position:absolute; left:50.1%">Confirmar senha</label>
                    <br>
                    <input type="password" name="txtSenha" style="width: 49.8%; height: 40px; border-radius:5px"
                        placeholder="Insira sua senha" id="senha" />
                    <input type="password" name="" style="width: 49.8%; height: 40px; border-radius:5px"
                        placeholder="Insira sua senha" id="confirmasenha" />


                    <script>
                    var password = document.getElementById("senha"),
                        confirm_password = document.getElementById("confirmasenha");

                    function validatePassword() {
                        if (senha.value != confirmasenha.value) {
                            confirmasenha.setCustomValidity("Senhas diferentes!");
                        } else {
                            confirmasenha.setCustomValidity('');
                        }
                    }

                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                    </script>
                    <br>
                    <br>
                    <label for="CPF do empreendedor"> CPF </label>
                    <input type="text" style="width: 100%; height: 40px; border-radius:5px" name="txtCPF" required
                        placeholder="Insira os dígitos do seu CPF" id="CPF" />
                    <br>
                    <br>
                    <label for="Telefone do empreendedor">Telefone</label>
                    <input type="text" name="txtTelefone" style="width: 100%; height: 40px; border-radius:5px" required
                        placeholder="Insira os dígitos do seu telefone" id="telefone" />
                    <br>
                    <br>
                    <label for="Endereco do empreendedor">Dados de endereço</label>
                    <br>
                    <input type="text" name="txtCep" style="width: 30%; height: 40px; border-radius:5px" required
                        placeholder="Insira seu cep" id="cep" />
                    <input type="text" name="txtRua" style="width: 50%; height: 40px; border-radius:5px" required
                        placeholder="Insira o nome da sua rua" id="rua" />
                    <br>
                    <input type="text" name="txtNumero" style="width: 20%; height: 40px; border-radius:5px" required
                        placeholder="Número da residência" id="numero">
                    <input type="text" name="txtCidade" style="width: 50%; height: 40px; border-radius:5px" required
                        placeholder="Insira o nome da sua cidade" id="cidade" />
                        <input type="text" name="txtComplemento" style="width: 30%; height: 40px; border-radius:5px" required
                        placeholder="Insira o complemento" id="complemento" />
                        <br>
                        <br>
                        <label for="Chave pix do empreendedor">Chave pix</label>
                        <input type="text" name="txtPix" style="width: 100%; height: 40px; border-radius:5px"
                            placeholder="Insira sua chave pix" />
                        <br>
                        <br>
                        <button type="submit" class="btn btn-warning">Enviar</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>

                </form>
            </div>
</body>

</html>