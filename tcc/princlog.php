<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapituArte</title>
    <link rel="stylesheet" href="princss.css">

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

    <?php 
    include_once("exibirImg.php"); 
    //require_once("checarLogin.php");  
    ?>

    <?php
    include_once('conexao.php');
    $sql = "SELECT * FROM tbproduto";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
</head>

<body style="margin: 0;">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <div style="background-color: #1c110a; height: 10rem; margin: 0;">
        <a href="princlog.php"><img src="imagens/logore.png" alt="logo"
                style="width: 15rem; height:14rem; position: absolute; top: -3.5rem; left: -2rem;">
        </a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="background-color: #e9b44c;">
            <h3 style="text-align: center;color:#9B2915">BEM-VINDOS A CAPITUARTE</h3>
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
        </div>
        </nav>
        <nav class="navbar" style="background-color:#1c110a; position:absolute; top: 2.5rem; left:38rem;">
            <div class="container-fluid">
                <form class="d-flex" role="search" method="POST" action="pesquisarlog.php">
                    <input class="form-control me-2" style="width: 40rem;" type="search" placeholder="Search"
                        aria-label="Search" name="pesquisar" id="pesquisar">
                    <button class="btn btn-outline-warning" type="submit" style="background-color: #e9b44c;">
                        <img src="imagens/lupare1.png" style="width:1.5rem; height:1.5rem" alt="">
                    </button>

                </form>
            </div>
        </nav>
        <div>
            <a href="carrinholog.php">
            <img src="imagens/carrinho.png" alt=""
                style="height: 5rem; width: 6rem; position: absolute; top: 1.5rem; right: 12rem;">
            </a>
        </div>
        <div class="posi" style=" right: 9rem; ">
            <a href="logout.php">
                <button id=""
                    style="height: 2.5rem; background-color: #e9b44c;position: absolute; top:0rem;border-radius:0.5rem">DESCONECTAR</button>
            </a>
        </div>
        <br>
        <br>

        <div style="position:relative">
            <div class="row row-cols-1 row-cols-md-5 g-4" style="position: absolute; margin-left: 12rem; margin-right:12rem">
                <?php
            
            while ($exibir = $result->fetch_assoc()){
            ?>
                <div class="col">
                    <div class="card h-100 border-warning" style="width: 18rem; height: 18rem;">
                        <img src="produtos/<?php echo $exibir["nomeImg"]?>" class="card-img-top" alt="..." style="width:18rem; height:15rem">
                        <div class="card-body ">
                            <h5 class="card-title"><?php echo $exibir["nome"]?></h5>
                            <label for="txtvalor">Valor: </label>
                                <p class="card-text"><?php echo $exibir["preco"]?></p>
                                <a href="produtolog.php?idProduto=<?=$exibir['idProduto']?>" class="btn btn-warning">Ver mais</a>
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