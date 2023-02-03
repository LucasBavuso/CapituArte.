<?php
    include ("conexao.php");
    require_once("checarLogin.php");    
    if(isset($_GET["idProduto"])){
        $idProduto = $_GET["idProduto"];
        $sql = "DELETE FROM tbproduto WHERE idProduto = $idProduto ";

        if($conn->query($sql) === TRUE ){
            ?>

            <script>
                alert("Registro excluído com sucesso.");
                window.location = "selectproduto.php";
            </script>

            <?php
        }else{
            ?>

            <script>
                alert("Erro ao excluir registro.");
                window.location = "selectproduto.php";
            </script>

            <?php
        }
    }


?>