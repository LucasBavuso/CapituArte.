<?php
include 'conexao.php';
$nome = $_POST["txtNome"];
$email = $_POST["txtEmail"];
$senha = $_POST["txtSenha"];
$cpf = $_POST["txtCPF"];
$telefone = $_POST["txtTelefone"];
$cep = $_POST["txtCep"];
$rua = $_POST["txtRua"];
$numero = $_POST["txtNumero"];
$cidade = $_POST["txtCidade"];
$complemento = $_POST["txtComplemento"];
$pix = $_POST["txtPix"];

$sql = "INSERT INTO tbmicroemp (nomeCompleto, email, senha, cpf, telefone, cep, rua, numeroCasa, cidade, complemento, chavePix)
VALUES ('".$nome."', '".$email."','".$senha."','".$cpf."','".$telefone."','".$cep."','".$rua."','".$numero."','".$cidade."','".$complemento."', '".$pix."')";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registro inserido com sucesso.');</script>";
    echo "<script>window.location = 'princmicro.php';</script>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
    //echo "<script>window.history.back();</script>";
}
$conn->close();
?>

