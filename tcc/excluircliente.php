<?php
    include ("conexao.php");
    require_once("checarLogin.php");    
    if(isset($_GET["idCliente"])){
        $idCliente = $_GET["idCliente"];
        $sql = "DELETE FROM tbcliente WHERE idCliente = $idCliente ";

        if($conn->query($sql) === TRUE ){
            ?>

            <script>
                alert("Registro excluído com sucesso.");
                window.location = "selectcliente.php";
            </script>

            <?php
        }else{
            ?>

            <script>
                alert("Erro ao excluir registro.");
                window.location = "selectcliente.php";
            </script>

            <?php
        }
    }


?>