<?php
    include_once("conexao.php");
    require_once("checarLogin.php");    
    if(isset($_POST["txtNome"])){
        $idCliente = $_GET["idCliente"];
        $nome = $_POST["txtNome"];
        $email = $_POST["txtEmail"];
        $senha = $_POST["txtSenha"];
        $cpf = $_POST["txtCPF"];
        $telefone = $_POST["txtTelefone"];
        $cep = $_POST["txtCep"];
        $rua = $_POST["txtRua"];
        $numero = $_POST["txtNumero"];
        $cidade = $_POST["txtCidade"];
        $complemento = $_POST["txtComplemento"];

        $sqlUpdate = "UPDATE tbcliente
            SET 
            nomeCompleto = '$nome',
            email =  '$email',
            senha = '$senha',
            cpf = '$cpf',
            telefone = '$telefone',
            cep = '$cep',
            rua = '$rua',
            numeroCasa = '$numero',
            cidade = '$cidade',
            complemento = '$complemento'
            WHERE idCliente = $idCliente";
            //echo $sqlUpdate;
        if($conn->query($sqlUpdate) === TRUE){
?>
            <script>
                alert("Registro atualizado com sucesso!");
                window.location = "selectcliente.php";
            </script>
<?php
        }
        else{
            ?>
            <script>
                alert("Erro ao altualizar registro");
                window.history.back();
            </script>
<?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="princss.css">
    <title>Editar Cliente</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <style>
    .borda {
        border: 2px solid black;
        background-color: #E4D6A7;
        radius: 10px;
    }
    </style>

</head>

<body>
    <div style="background-color: #1c110a; height: 120px; margin: 0;">
        <a href="princlog.php"><img src="imagens/logore.png" alt="logo"
                style="width:220px; height:220px; position: absolute; top: -57px; left: -30px;">
        </a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="background-color: #e9b44c;">
            <h3 style="text-align: center;color:#9B2915">EDITAR OS DADOS DO CLIENTE</h3>
        </div>


        <?php
            if(isset($_GET["idCliente"])){
                $idCliente = $_GET["idCliente"];
                $sql = "SELECT * FROM tbcliente WHERE idCliente = $idCliente";
                $consulta = $conn->query($sql);
                $cliente = $consulta->fetch_assoc();
            }
        ?>


        <div class="container mt-3">

            <div class="borda p-5 rounded">
                <h2>EDITAR OS DADOS DO CLIENTE</h2>
                <hr>
                <form action="editarcliente.php?idCliente=<?php echo $_GET['idCliente'] ?>" method="post">


                    <label for="Nome do empreendedor">Nome</label>
                    <input type="text" name="txtNome" value="<?php echo $cliente["nomeCompleto"] ?>"
                        style="width: 100%; height: 40px; border-radius:5px" autofocus required
                        placeholder="Insira seu nome completo" id="nome" />
                    <br>
                    <br>
                    <label for="Email do empreendedor">E-mail</label>
                    <input type="text" name="txtEmail" value="<?php echo $cliente["email"] ?>"
                        style="width: 100%; height: 40px; border-radius:5px" required placeholder="Insira seu e-mail"
                        id="email" />
                    <br>
                    <br>
                    <label for="Senha do empreendedor">Senha</label>
                    <input type="password" name="txtSenha" value="<?php echo $cliente["senha"] ?>"
                        style="width: 100%; height: 40px; border-radius:5px" required placeholder="Insira sua senha"
                        id="senha" />
                    <br>
                    <br>
                    <label for="CPF do empreendedor"> CPF </label>
                    <input type="text" style="width: 100%; height: 40px; border-radius:5px" name="txtCPF"
                        value="<?php echo $cliente["cpf"] ?>" required placeholder="Insira os dígitos do seu CPF"
                        id="CPF" />
                    <br>
                    <br>
                    <label for="Telefone do empreendedor">Telefone</label>
                    <input type="text" name="txtTelefone" value="<?php echo $cliente["telefone"] ?>"
                        style="width: 100%; height: 40px; border-radius:5px" required
                        placeholder="Insira os dígitos do seu telefone" id="telefone" />
                    <br>
                    <br>
                    <label for="Endereco do empreendedor">Dados de endereço</label>
                    <br>
                    <input type="text" name="txtCep" value="<?php echo $cliente["cep"] ?>"
                        style="width: 30%; height: 40px; border-radius:5px" required placeholder="Insira seu cep"
                        id="cep" />
                    <input type="text" name="txtRua" value="<?php echo $cliente["rua"] ?>"
                        style="width: 50%; height: 40px; border-radius:5px" required
                        placeholder="Insira o nome da sua rua" id="rua" />
                    <br>
                    <input type="text" name="txtNumero" value="<?php echo $cliente["numeroCasa"] ?>"
                        style="width: 20%; height: 40px; border-radius:5px" required placeholder="Número da residência"
                        id="numero">
                    <input type="text" name="txtCidade" value="<?php echo $cliente["cidade"] ?>"
                        style="width: 50%; height: 40px; border-radius:5px" required
                        placeholder="Insira o nome da sua cidade" id="cidade" />
                    <input type="text" name="txtComplemento" value="<?php echo $cliente["complemento"] ?>"
                        style="width: 30%; height: 40px; border-radius:5px" required placeholder="Insira o complemento"
                        id="complemento" />
                    <br>
                    <br>
                    <button type="submit" class="btn btn-warning">Enviar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
</body>

</html>