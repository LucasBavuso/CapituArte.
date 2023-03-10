<?php
session_start();
//require_once("checarLogin.php");  
function limparCarrinho()
{
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Finalizar pedido</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
            <h3 style="text-align: center;color:#9B2915">RESUMO DO PEDIDO</h3>
        </div>
            <?php
            require_once("conexao.php");

            if (isset($_SESSION['carrinho']) && isset($_SESSION['total'])) {
                if (is_numeric($_SESSION['total'])) {
                    $valorVenda = $_SESSION['total'];
                    $sqlInserirVenda = "INSERT INTO tbvendas (totalVenda) VALUES ($valorVenda)";
                    $conn->query("$sqlInserirVenda");
                    $idVenda = $conn->insert_id; //pegando o id da última venda realizada
                    foreach ($_SESSION['carrinho'] as $id => $qtd) {
                        $sqlInserirItensVenda = "INSERT INTO tbitensvenda(idVenda, idProduto, qtd) VALUES($idVenda, $id, $qtd)";
                        $conn->query("$sqlInserirItensVenda");
                    }
                    ?>
                    <div class="alert alert-success text-center" role="alert">
                        Pedido realizado com sucesso!
                        <a href="princlog.php" class="btn btn-primary">Continuar comprando</a>
                    </div>
                    <table class="table table-strip">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                                <th>Subtotal</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                if (count($_SESSION['carrinho']) == 0) {
                                    ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-warning text-center">
                                            Nenhum produto no carrinho.
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                } else {
                                    require_once('conexao.php');
                                    $total = 0;
                                    var_dump($_SESSION['carrinho']);
                                    foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                        $sql = "SELECT * FROM tbproduto WHERE idProduto = $id";
                                        //echo $sql;
                                        $dados = $conn->query($sql) or die(mysqli_error($conn));
                                        $produto = $dados->fetch_assoc();
                                        $nome = $produto['nome'];
                                        $preco = number_format($produto['preco'], 2, ',', '.');
                                        $sub = number_format($produto['preco'] * $qtd, 2, ',', '.');
                                        $total += floatval(str_replace('.', '', $sub));
                                        ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td>
                                            <?php echo $nome; ?>
                                        </td>
                                        <td><?php echo $qtd; ?></td>
                                        <td style="text-align: right;">
                                            <?php echo $preco; ?>
                                        </td>
                                        <td style="text-align: right;"><?php echo $sub; ?></td>

                                    </tr>


                                <?php
                                    }

                                    ?>
                                <tr>
                                    <td colspan="4" style="text-align: right; font-weight: bold;">Total</td>
                                    <td style="text-align: right; font-weight: bold;">
                                        <?php echo number_format($total, 2, ',', '.'); ?>
                                    </td>
                                </tr>
                                <?php
                                $_SESSION['total'] = $total;
                                }
                                ?>
                    </table>
                    <br>
                    <div class="text-center">
                    <h1>MUITO OBRIGADO!</h1>
                    <h2>Em breve enviaremos o pedido!</h2>
                    </div>

                </div>
            <?php
                }
                limparCarrinho();
            } else {
                ?>
            <div class="alert alert-warning text-center" role="alert">
                Nenhum item foi escolhido para compra!
                <a href="princlog.php" class="btn btn-primary">Continuar comprando</a>
            </div>
        <?php
            }
            ?>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    </body>

</html>