<?php
    function calcularIdade($data) {
        $dataAtual = new DateTime();
        $data = new DateTime($data);
        $idade = $dataAtual->diff($data);
        return $idade->y;
    }


    // Captura os dados do formulário
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $bio = isset($_POST['bio']) ? $_POST['bio'] : '';
    // Cria um array com os dados

    $idade = calcularIdade($data);

    $dados = array(
        "nome" => $nome,
        "data" => $data,
        "idade" => $idade,
        "email" => $email,
        "bio" => $bio
    );

    // Nome do arquivo JSON
    $arquivo = 'dados.json';

    // Verifica se o arquivo já existe
    if (file_exists($arquivo)) {
        // Lê o conteúdo do arquivo
        $conteudo = file_get_contents($arquivo);
        // Decodifica o JSON para um array PHP
        $dados_existentes = json_decode($conteudo, true);
        // Adiciona os novos dados ao array existente
        $dados_existentes[] = $dados;
    } else {
        // Cria um novo array para armazenar os dados
        $dados_existentes = array($dados);
    }

    // Codifica o array em formato JSON
    $json = json_encode($dados_existentes, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // Salva os dados no arquivo JSON
    if (file_put_contents($arquivo, $json)) {
        header('Location: exibindodados.php');
    exit();
    } else {
        echo "Erro ao salvar os dados.";
    }
    
?>