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
    <title>Select Produto</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .table{
            border: 2px solid black;
            radius: 10px;
        }
    </style>
</head>
<body>
<meta charset="UTF-8">
    <title>Carrinho de compras</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

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
            <h3 style="text-align: center;color:#9B2915">PRODUTOS CADASTRADOS</h3>
        </div>
    <?php
        $sql = "SELECT * FROM tbproduto order by idproduto";
        $dadosProduto = $conn->query($sql);

        if($dadosProduto-> num_rows > 0){
    ?>
            <table class="table table-strip">
            <thead>
                <tr>
                <th scope="col">Imagem</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Subcategoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
                </tr>
            </thead>
            
            <?php    
        }
        ?>
        <?php
            while($exibir = $dadosProduto -> fetch_assoc()){
        ?>
                <tr>
                <td><img src="produtos/<?php echo $exibir["nomeImg"]?>" class="card-img-top" alt="..." style="width:5rem; height:5rem"></td>
                    <td><?php echo $exibir["nome"]?></td>
                    <td><?php echo $exibir["descricao"]?></td>
                    <td><?php echo $exibir["preco"]?></td>
                    <?php
                        $sqlidCategoria = "SELECT * FROM tbcategoria WHERE idCategoria = ".$exibir["idcategoria"];
                        $dadosidCategoria = $conn->query($sqlidCategoria);
                        $Categoria = $dadosidCategoria->fetch_assoc();
                        
                    ?>
                    <td><?php echo $Categoria["nomeCategoria"] ?></td>
                    <?php
                        $sqlidSubCategoria = "SELECT * FROM tbsubcategoria WHERE idSubCategoria = ".$exibir["idsubcategoria"];
                        $dadosidSubCategoria = $conn->query($sqlidSubCategoria);
                        $SubCategoria = $dadosidSubCategoria->fetch_assoc();
                    ?>
                    <td><?php echo $SubCategoria["nomeSubCategoria"] ?></td>
                    
                    
                    <td> <a href= "editarproduto.php?idProduto=<?php echo $exibir['idProduto'] ?>"> Editar</td>
                    <td> <a href= "#" onclick = "confirmarExclusao(
                            '<?php echo $exibir["idProduto"] ?> ',
                            '<?php echo $exibir["nome"]?>'
                        )">Excluir
                    </td>
                    
                </tr>
                
                <?php
            }
            ?>
            </table>
           

         <script>
            function confirmarExclusao (idProduto, nome){
                if (window.confirm("Deseja realmente excluir o registro: \n" + idProduto + nome + " ?")){
                    window.location = "excluirproduto.php?idProduto=" + idProduto;
                }
            }
         </script>   
        

</body>
</html>