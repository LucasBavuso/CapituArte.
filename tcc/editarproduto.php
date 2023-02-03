<?php
    include_once("conexao.php");
    require_once("checarLogin.php");    
    if(isset($_POST["txtNomeProduto"])){
        $idProduto2 = $_GET["idProduto"];
        $nome_Produto = $_POST["txtNomeProduto"];
        $descricao_Produto = $_POST["txtDescricao"];
        $preco_Produto = $_POST["txtPreco"];
        $idCategoria_Produto = $_POST["ddlCategoria"];
        $idSubCategoria_Produto = $_POST["ddlSubCategoria"];
        

        $sqlUpdate = "UPDATE tbproduto
            SET nome = '$nome_Produto',
            descricao =  '$descricao_Produto',
            preco = '$preco_Produto',
            idCategoria = $idCategoria_Produto,
            idSubCategoria = $idSubCategoria_Produto,
            

            WHERE idProduto = $idProduto2";
            //echo $sqlUpdate;
        if($conn->query($sqlUpdate) === TRUE){
?>
            <script>
                alert ("Registro atualizado com sucesso!");
                window.location = "selectproduto.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert ("Erro ao altualizar registro");
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
    <title>Editar Produto</title>

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
            <h3 style="text-align: center;color:#9B2915">EDITAR OS DADOS DO PRODUTO</h3>
        </div>


        <?php
            if(isset($_GET["idProduto"])){
                $idProduto2 = $_GET["idProduto"];
                $sql = "SELECT * FROM tbproduto WHERE idProduto = $idProduto2";
                $consulta = $conn->query($sql);
                $produto = $consulta->fetch_assoc();
            }
        ?>


        <div class="container mt-3">

            <div class="borda p-5 rounded">
                <h2>EDITAR OS DADOS DO PRODUTO</h2>
                <hr>
                <form action="editarproduto.php?idProduto= <?php echo $_GET['idProduto'] ?>" method="post">

                    <label for="Nome do produto">Nome</label>
                    <input type="text" name="txtNomeProduto" value="<?php echo $produto["nome"] ?>"
                        style="width: 100%; height: 40px; border-radius:5px" autofocus required
                        placeholder="Insira o nome do produto" id="nome" />
                    <br>
                    <br>
                    <label for="Nome do produto">Descrição</label>
                    <input type="text" name="txtDescricao" value="<?php echo $produto["descricao"] ?>"
                        style="width: 100%; height: 40px; border-radius:5px" required
                        placeholder="Insira a descrição do produto" id="descricao" />
                    <br>
                    <br>



                    <label for="SelecionarCategoria">Categoria</label>
                    <select name="ddlCategoria" id="ddlCategoria" style="width: 100%; height: 40px; border-radius:5px"
                        required>
                        <?php 
                        
                            $sql2 = "SELECT idCategoria, nomeCategoria
                            FROM tbcategoria
                            ORDER BY nomeCategoria";
                            
                            $categoria = $conn->query($sql2);

                            while($rowcategoria = $categoria->fetch_assoc()){
                                ?>
                        <option value="<?php echo $rowcategoria["idCategoria"]; ?>"
                            <?php echo ($rowcategoria["idCategoria"] == $produto["idcategoria"])? "selected": ""?>>
                            <?php echo $rowcategoria["nomeCategoria"]; ?> </option>
                        <?php
                            }
                        ?>

                    </select>
                    <br>
                    <br>

                    <label for="SelecionarSubCategoria">Subcategoria</label>
                    <select name="ddlSubCategoria" id="ddlSubCategoria"
                        style="width: 100%; height: 40px; border-radius:5px" required>

                        <?php 
                            $sql3 = "SELECT idSubCategoria, nomeSubCategoria
                            FROM tbsubcategoria
                            ORDER BY nomeSubCategoria";

                            $subcategoria = $conn->query($sql3);

                            while($rowsubcategoria = $subcategoria ->fetch_assoc()){
                                ?>
                        <option value="<?php echo $rowsubcategoria["idSubCategoria"]; ?>"
                            <?php echo ($rowsubcategoria["idSubCategoria"] == $produto["idsubcategoria"])? "selected": ""?>>
                            <?php echo $rowsubcategoria["nomeSubCategoria"]; ?> </option>
                        <?php
                            }
                        ?>

                        <option value="0">Selecione uma subcategoria ... </option>
                        <option value="1">Roupas Femininas Adulto</option>
                        <option value="2">Roupas Femininas Infantil</option>
                        <option value="3">Roupas Masculinas Adulto</option>
                        <option value="4">Roupas Masculinas Infantil</option>
                        <option value="5">Acessórios para cabeça/cabelo</option>
                        <option value="6">Bolsas</option>
                        <option value="7">Óculos</option>
                        <option value="8">Joias e bijuterias</option>
                        <option value="9">Maquiagem para olhos</option>
                        <option value="10">Maquiagem para rosto</option>
                        <option value="11">Decoração de interiores</option>
                        <option value="12">Decoração para festas</option>
                        <option value="13">Roupas para pets</option>
                        <option value="14">Acessórios para pets</option>
                        <option value="15">Alimentos padaria</option>
                        <option value="16">Bebidas Alcoólicas</option>
                        <option value="17">Bebidas sem alcóol</option>
                    </select>

                    <br>
                    <br>
                    <label for="Preco do produto">Preço</label>
                    <input type="text" name="txtPreco" value="<?php echo $produto["preco"] ?>"
                        style="width: 100%; height: 40px; border-radius:5px" required
                        placeholder="Insira o preço do produto" id="preco" />
                    <br>
                    <br>
                    <button type="submit" class="btn btn-warning">Enviar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
</body>

</html>