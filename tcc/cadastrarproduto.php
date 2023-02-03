<?php
include 'conexao.php';
$nome_Produto = $_POST["txtNomeProduto"];
$descricao_Produto = $_POST["txtDescricao"];
$preco_Produto = $_POST["txtPreco"];
$idCategoria_Produto = $_POST["ddlCategoria"];
$idSubCategoria_Produto = $_POST["ddlSubCategoria"];

//verifica se foi enviado algum valor (arquivo)
if (isset($_FILES["upload"])) {
    //recebe os valores enviados pelo formulário
    $file = $_FILES["upload"];
    //permite debugar e ver o que foi enviado
    //var_dump($file);
    //conta quantas imagens foram enviadas
    
    //define qual pasta a imagem será salva
    $folder = "produtos";
    /*
    define os tipos suportados de arquivos enviados
    apesar de o exemplo estar mais voltado para imagem,
    pode usar para outros tipos de arquivos também
    */
    $permite = array("tif", "jpg", "jpeg", "png");
    $maxSize = 1024 * 1024 * 5;
    //Mensagens
    $msg = array(); //cria um array vazio
    //cria um array e já atribui valores das mensagens a ele.
    $erroMsg = array(
    1 =>"O arquivo é maior que o limite definido no max_filesize",
    2 => "O aquivo ultrapassa o limite de tamanho permitido no
    MAX_FILE_SIZE",
    3 => "O upload do arquivo foi feito parcialmente",
    4 => "Não foi feito o upload do arquivo"
    );
        $name = $file["name"]; //pega o nome do arquivo
        $type = $file["type"]; //pega o tipo do arquivo
        $size = $file["size"]; //pega o tamanho do arquivo
        $error = $file["error"]; //pega os erros
        $tmp = $file["tmp_name"]; //pega o nome temporário do
        //echo "Nome da imagem: $tmp";
        //pega a largura e a altura da imagem (resolução)
        //list($largura, $altura) = getimagesize($tmp);
        //echo "<br>Largura: $largura, altura: $altura<br>";
        $extensao = @end(explode(".", $name)); //pega extensão de cada

        $novoNome = rand() . ".$extensao";
        if ($error != 0) { //se não houver erro ao carregar a imagem
            $msg[] = "<b>$name: </b>".$erroMsg[$error];         
        } else if(!in_array($extensao, $permite)) {
            $msg[] = "<b>$name: </b> Erro - Tipo de arquivo não
            suportado. Escolha arquivo do tipo .tif, .jpg, .jpeg e .png";
        } else if ($size > $maxSize) {
            $msg[] = "<b>$name: </b>Erro - Tamanho do arquivo é maior
            que o permitido.";
        } else {
            //move o arquivo para a pasta definida
            if (move_uploaded_file($tmp, $folder."/".$novoNome)) {
                    $sql = "INSERT INTO tbproduto (nome, descricao, preco, idcategoria, idsubcategoria,nomeImg, extensao)
                        VALUES ('".$nome_Produto."', '".$descricao_Produto."','".$preco_Produto."', 
                        ".$idCategoria_Produto.", ".$idSubCategoria_Produto.",'".$novoNome."', '".$extensao."')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script>alert('Registro inserido com sucesso.');</script>";
                            echo "<script>window.location = 'princmicro.php';</script>";
                        } else {
                            echo "Erro: " . $sql . "<br>" . $conn->error;
                            echo "<script>window.history.back();</script>";
                        }
                    echo $sql;
                }
            
        }       
    
} else{
    
}        
$conn->close();
?>