<?php
include 'conexao.php'
require_once("checarLogin.php");  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Micro</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .table{
            border: 1px solid black;
            /* background-color: #E4D6A7; */
            radius: 10px;
        }
    </style>
</head>
<body>
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
            <h3 style="text-align: center;color:#9B2915">CLIENTES CADASTRADOS</h3>
        </div>
    <?php
        $sql = "SELECT * FROM tbcliente order by idCliente";
        $dadosMicro = $conn->query($sql);

        if($dadosMicro-> num_rows > 0){
    ?>
            <table class="table table-strip">
            <thead>
                <tr>
                <th scope="col">Id Cliente</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
                <th scope="col">CPF</th>
                <th scope="col">Telefone</th>
                <th scope="col">CEP</th>
                <th scope="col">Rua</th>
                <th scope="col">Numero</th>
                <th scope="col">Cidade</th>
                <th scope="col">Complemento</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
                </tr>
            </thead>
            
            <?php    
        }
        ?>
        <?php
            while($exibir = $dadosMicro -> fetch_assoc()){
        ?>
                <tr>
                    <td><?php echo $exibir["idCliente"] ?></td>
                    <td><?php echo $exibir["nomeCompleto"]?></td>
                    <td><?php echo $exibir["email"]?></td>
                    <td><?php echo $exibir["senha"]?></td>
                    <td><?php echo $exibir["cpf"]?></td>
                    <td><?php echo $exibir["telefone"]?></td>
                    <td><?php echo $exibir["cep"]?></td>
                    <td><?php echo $exibir["rua"]?></td>
                    <td><?php echo $exibir["numeroCasa"]?></td>
                    <td><?php echo $exibir["cidade"]?></td>
                    <td><?php echo $exibir["complemento"]?></td>
                    <td> <a href= "editarcliente.php?idCliente=<?php echo $exibir['idCliente'] ?>"> Editar</td>
                    <td> <a href= "#" onclick = "confirmarExclusao(
                            '<?php echo $exibir["idCliente"] ?> ',
                            '<?php echo $exibir["nomeCompleto"]?>'
                        )">Excluir
                    </td>
                    
                </tr>
                
                <?php
            }
            ?>
            </table>
           

         <script>
            function confirmarExclusao (idCliente, nomeCompleto){
                if (window.confirm("Deseja realmente excluir o registro: \n" + idCliente + nomeCompleto + " ?")){
                    window.location = "excluircliente.php?idCliente=" + idCliente;
                }
            }
         </script>   
        

</body>
</html>