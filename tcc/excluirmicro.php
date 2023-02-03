<?php
    include ("conexao.php");
    require_once("checarLogin.php");    
    if(isset($_GET["idMicro"])){
        $idMicro = $_GET["idMicro"];
        $sql = "DELETE FROM tbmicroemp WHERE idMicro = $idMicro ";

        if($conn->query($sql) === TRUE ){
            ?>

            <script>
                alert("Registro excluído com sucesso.");
                window.location = "selectmicro.php";
            </script>

            <?php
        }else{
            ?>

            <script>
                alert("Erro ao excluir registro.");
                window.location = "selectmicro.php";
            </script>

            <?php
        }
    }


?>