<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="princss.css">
    <title>Cadastro Produto</title>

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
    <?php 
        //require_once("checarLogin.php");    
    ?>
</head>

<body>
    <div style="background-color: #1c110a; height: 120px; margin: 0;">
        <a href="princmicro.php"><img src="imagens/logore.png" alt="logo"
                style="width:220px; height:220px; position: absolute; top: -57px; left: -30px;">
        </a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="background-color: #e9b44c;">
            <h3 style="text-align: center;color:#9B2915">CADASTRO PRODUTO</h3>
        </div>
        <br>
        <div class="container mt-3">

            <div class="borda p-5 rounded">
                <h2>INSIRA OS DADOS DO PRODUTO</h2>
                <hr>
                <form action="cadastrarproduto.php" method="post" enctype="multipart/form-data">

                    <label for="Nome do produto">Nome</label>
                    <br>
                    <input type="text" name="txtNomeProduto" style="width: 60%; height: 40px; border-radius:5px"
                        autofocus required placeholder="Insira o nome do produto" id="nome" />
                    <br>
                    <br>
                    <label for="Nome do produto">Descrição</label>
                    <br>
                    <input type="text" name="txtDescricao" style="width: 60%; height: 40px; border-radius:5px" required
                        placeholder="Insira a descrição do produto" id="descricao" />
                    <br>
                    <br>
                    <label for="SelecionarCategoria">Categoria</label>
                    <br>
                    <select name="ddlCategoria" id="ddlCategoria" style="width: 60%; height: 40px; border-radius:5px"
                        required>
                        <option value="0">Selecione uma categoria ... </option>
                        <option value="1">Roupas</option>
                        <option value="2">Acessórios</option>
                        <option value="3">Maquiagem</option>
                        <option value="4">Decoração</option>
                        <option value="5">Pets</option>
                        <option value="6">Sapatos</option>
                        <option value="7">Personalizados</option>
                        <option value="8">Alimentos</option>
                        <option value="9">Bebidas</option>
                    </select>
                    <br>
                    <br>

                    <label for="SelecionarSubCategoria">Subcategoria</label>
                    <br>
                    <select name="ddlSubCategoria" id="ddlSubCategoria"
                        style="width: 60%; height: 40px; border-radius:5px" required>
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
                    <br>
                    <input type="text" name="txtPreco" style="width: 60%; height: 40px; border-radius:5px" required
                        placeholder="Insira o preço do produto" id="preco" />
                    <br>
                    <br>
                    <input type="file" id="flfoto" accept="image/png, image/jpeg, image/jpg" name="upload" required>
                    <!--<script>
                    let imagem = document.getElementById('foto');
                    let file = document.getElementById('flfoto');

                    imagem.addEventListener('click', () => {
                        file.click();
                    })
                    </script>-->
                    <br><br>
                    <button type="submit" class="btn btn-warning">Enviar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
           
        </div>
</body>

</html>