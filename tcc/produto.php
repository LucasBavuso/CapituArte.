<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once("conexao.php");
include_once("exibirImg.php");
//require_once("checarLogin.php");  
$idProduto = "";
if(isset($_GET['idProduto']))$idProduto = $_GET['idProduto'];
$SQL = "SELECT tp.idProduto, tp.nome, tp.preco, tp.descricao, tp.nomeImg, tc.nomeCategoria, ts.nomeSubCategoria FROM tbproduto tp, tbcategoria tc, tbsubcategoria ts WHERE tp.idcategoria = tc.idCategoria and tp.idsubcategoria = ts.idSubCategoria and tp.idProduto=$idProduto";
//echo $idProduto;
$result = $conn->query($SQL);
$exibir = $result->fetch_assoc();


?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapituArte</title>
    <link rel="stylesheet" href="princss.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script type="text/javascript">
    function abrir() {
        document.getElementById('popuplog').style.display = 'block';
        document.getElementById('popupcad').style.display = 'block';
        document.getElementById('popupcad2').style.display = 'block';
    }

    function fechar() {
        document.getElementById('popuplog').style.display = 'none';
        document.getElementById('popupcad').style.display = 'none';
        document.getElementById('popupcad2').style.display = 'none';
    }
    </script>

    <style>
    .borda {
        border: 2px solid black;
        background-color: #E4D6A7;
        radius: 10px;
    }
    </style>

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
        <div style="background-color: #e9b44c">

            <h3 style="text-align: center; color:#9B2915">DADOS DO PRODUTO</h3>
            <div class="posi" style="left: 93%; top:4.5%">
                <a href="logar.php">
                    <button style="height: 45px; background-color: #e9b44c; border-radius: 10px;">ENTRAR</button>
                </a>
            </div>
            <nav class="navbar navbar-expand-lg rounded"
                style="background-color: #e9b44c; position:absolute ;left: 85%; top:4.8%; ">
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
            <nav class="navbar" style="background-color:#1c110a; position:absolute; top: 40px; left: 32%;">
                <div class="container-fluid">
                    <form class="d-flex" role="search" method="Post" action="pesquisarlog.php">
                        <input class="form-control me-2" style="width: 600px;" type="search" placeholder="Search"
                            aria-label="Search" name="pesquisar" id="pesquisar">
                        <button class="btn btn-outline-warning" type="submit" style="background-color: #e9b44c;">
                            <img src="imagens/lupare1.png" style="width:20px; height:20px" alt="">
                        </button>
                    </form>
                </div>
            </nav>
        </div>
        <br>
        <br><br>
        <div class="container mt-3">
            <hr>
            <div class="borda p-5 rounded">
                <form action="cadastrarproduto.php" method="post" enctype="multipart/form-data" style="height: "> 
                    
                    <img src="produtos/<?php echo $exibir["nomeImg"]?>" alt="" id="foto" style="height: 25rem; width: 28rem;
                    position: absolute; top: 20rem; right: 69rem; border: solid 5px;border-radius:1%">
                    <h1 style="position: absolute; left: 55rem;">Produto: <?php echo $exibir["nome"]?></h1> 
                    <br>
                    <br>
                    <br>
                    <br>
                    <h2 style="position: absolute; left: 55rem;">Descrição: <?php echo $exibir["descricao"]?></h2>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h2 style="position: absolute; left: 55rem;">Preço: <?php echo $exibir["preco"]?></h2>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="carrinho.php?acao=add&idProduto=<?php echo $exibir['idProduto'] ?>" class="btn btn-success"  
                    style="position: absolute; left: 55rem;top: 42rem; ">Comprar</a>

                    <a href="index.php" class="btn btn-danger"  
                    style="position: absolute; left: 70rem;top: 42rem">Cancelar</a>
                    
                </form>
            </div>
        </div>

</body>

</html>