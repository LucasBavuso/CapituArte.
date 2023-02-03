<?php
    require_once("conexao.php");
    session_start();
    //require_once("checarLogin.php");  
    $email = $conn->real_escape_string($_POST["txtEmail"]);
    $senha = $_POST["txtSenha"];
    $tipo = $_POST["usuario"];
    //echo $tipo;

    $selecao = $tipo == "C" ? "tbcliente" : "tbmicroemp";

    
    $sql = "SELECT * from $selecao where email = '$email' and senha = '$senha'";

    //echo $sql;

    $resultado = $conn->query($sql);    
    $pagina = $tipo == "C" ? "princlog.php" : "princmicro.php";

    if($resultado->num_rows > 0){
        $dados_usuário = $resultado->fetch_assoc();
        $_SESSION["email"] = $dados_usuário["email"];
        $_SESSION["senha"] = $dados_usuário["senha"];
        //$_SESSION["tipo"] = $dados_usuário["type"];
        echo "<script>window.location = '" . $pagina. "';</script>";
        if(isset($_SESSION['carrinho'])){
            unset($_SESSION['carrinho']);
            //session_destroy();
        }
        //header("location: princlog.php")
    } else{
        echo "<script>alert('Erro');</script>";
        $_SESSION["erro"]="Erro";
        ?>
        <script>widow.history.back();</script>
        <?php
    }    
?>