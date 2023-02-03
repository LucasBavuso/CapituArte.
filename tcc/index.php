<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapituArte</title>
    <link rel="stylesheet" href="princss.css">

    <?php 
    include_once("exibirImg.php"); 
    //require_once("checarLogin.php");  
    ?>
    <?php include_once('conexao.php');
    $sql = "SELECT * FROM tbproduto";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <h3 style="text-align: center; color:#9B2915">BEM-VINDOS A CAPITUARTE</h3>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imagens/carrosel1.jpg" style="height: 600px; width: 400px" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imagens/carrosel2.jpg" style="height: 600px; width: 400px" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imagens/carrosel3.jpg" style="height: 600px; width: 400px" class="d-block w-100"
                            alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
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
                    <li><a class="dropdown-item" href="cadastro.php">Cadastrar como cliente</a></li>
                    <li><a class="dropdown-item" href="cadastromicro.php">Cadastrar como Microempreendedor</a></li>
                    <li>
                </ul>
                </li>
            </nav>

            <nav class="navbar" style="background-color:#1c110a; position:absolute; top: 40px; left: 25%;">
                <div class="container-fluid">
                    <form method="POST" class="d-flex" role="search" action="pesquisar.php">
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
        <div style="background-color:black;">
            <div style="position:relative;">
                <div class="row row-cols-1 row-cols-md-5 g-4 "
                    style="position: absolute; margin-left: 8%; margin-right:8%">
                    <?php
                    while ($exibir = $result->fetch_assoc()){
                    ?>
                    <div class="col">
                        <div class="card h-100 border-warning" style="width: 18rem;height: 18rem">
                            <img src="produtos/<?php echo $exibir["nomeImg"]?>" class="card-img-top" alt="..." style="width:18rem; height:15rem">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $exibir["nome"]?></h5>
                                <label for="txtvalor">Valor: </label>
                                <p class="card-text"><?php echo $exibir["preco"]?></p>
                                <a href="produto.php?idProduto=<?=$exibir['idProduto']?>" class="btn btn-warning">Ver mais</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
        

</body>

</html>