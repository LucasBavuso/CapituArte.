<?php
include 'conexao.php';
session_start();
//require_once("checarLogin.php");
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

//adicionar produto
if (isset($_GET['acao'])) {
    //adicionar carrinho
    if ($_GET['acao'] == 'add') {
        $idProduto = $_GET["idProduto"]; 
        if (!isset($_SESSION['carrinho'][$idProduto])) {
            $_SESSION['carrinho'][$idProduto] = 1;
        } else {
            $_SESSION['carrinho'][$idProduto]++;
        }
    }
    //remover produto
    if ($_GET['acao'] == 'del') {
        $idProduto = $_GET["idProduto"];
        if (isset($_SESSION['carrinho'][$idProduto])) {
            unset($_SESSION['carrinho'][$idProduto]);
        }
    }

    //atualizar carrinho
    if ($_GET['acao'] == 'up') {
        
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $idProduto => $qtd) {
                //intval() verifica se o número vindo é um inteiro
                //trim() remove o caracter indicado
                $idProduto = intval(trim($idProduto, "'")); 
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd <> 0) {
                    $_SESSION['carrinho'][intval($idProduto)] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$idProduto]);
                }
            }
        }
    }
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Carrinho de compras</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

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
            <h3 style="text-align: center;color:#9B2915">CARRINHO DE COMPRAS</h3>
        </div>
        <?php
        //<a href="index.php">Lista de Produtos</a>
          ?>

    </div>
    <br><br><br>
    <div class="container mt-3">

        <form action="carrinholog.php?acao=up" method="post">
            <table class="table table-strip">
                <thead>
                    <tr>
                        <th>Codigo do produto</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Subtotal</th>
                        <th>Ação</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        if (count($_SESSION['carrinho']) == 0) {
                        ?>
                    <tr>
                        <td colspan="5">Nenhum produto no carrinho.</td>
                    </tr>
                    <?php
                        } else {
                            //require_once('conexao.php');
                            $total = 0;
                            //session_destroy();
                            //var_dump($_SESSION['carrinho']);
                            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                $sql        = "SELECT * FROM tbproduto WHERE idProduto = $id";
                                //echo $sql;
                                $dados      = $conn->query($sql) or die(mysqli_error($conn));
                                $produto    = $dados->fetch_assoc();
                                $nome       = $produto['nome'];
                                $preco      = number_format(floatval($produto['preco']),2,',','.');
                                $sub        = number_format(floatval($produto['preco']) * floatval($qtd),2,',','.');
                                $total      += floatval(str_replace('.', '', $sub));
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $nome; ?></td>
                        <td>
                            <input type="text" size="3" name="prod['<?php echo $id; ?>']" value="<?php echo $qtd; ?>">

                        </td>
                        <td style="text-align: right;"><?php echo $preco; ?></td>
                        <td style="text-align: right;"><?php echo $sub; ?></td>
                        <td><a class="btn btn-danger" href="?acao=del&idProduto=<?php echo $idProduto; ?>">Remover</a>
                        </td>

                    </tr>


                    <?php
                            }
                    ?>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Total</td>
                        <td style="text-align: right; font-weight: bold;">
                            <?php echo number_format($total, 2, ',', '.'); ?></td>
                    </tr>
                    <?php
                       $_SESSION['total'] = $total;
                    }


                ?>
            </table>

            <a class="btn btn-info" href="princlog.php">Continuar Comprando</a>
            <button class="btn btn-primary" type="submit">Atualizar Carrinho</button>
            <a class="btn btn-success" href="finalizarcarrinholog.php">Finalizar Pedido</a>
            <br><br>

        </form>

    </div>

</body>

</html>