<?php
include_once 'conexao.php';
//require_once("checarLogin.php");    
$sql = "SELECT * FROM tbproduto order by nomeImg desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($exibir = $result->fetch_assoc()){
        ?>
        <?php
    }
}
else {
    echo "Nenhum registro encontrado.";
}

?>