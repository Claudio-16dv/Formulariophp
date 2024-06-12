<?php
    session_start();

    $erros = [];

    //validação
    if(!isset($_POST['nome']) && !isset($_POST['data']) && !isset($_POST['email']) && !isset($_POST['bio'])){
        $erros[] = 'Erro - Campos necessários não existem';
    }

    if(empty($_POST['nome'])){
        $erros[] = 'O nome tem que ser preenchido';
    }

    if(empty($_POST['data'])){
        $erros[] = 'A data tem que ser preenchida';
    }

    if(empty($_POST['email'])){
        $erros[] = 'O e-mail tem que ser preenchido';
    }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'O email informado é inválido.';
    }

    if(empty($_POST['bio'])){
        $erros[] = 'Sobre tem que ser preenchido';
    }

    //Função para calculo da idade
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



    //Validação de numero de caractares
    if(strlen($_POST['nome']) < 5 || strlen($_POST['nome']) > 90){
        $erros[] = 'O nome tem que ter de 5 a 90 caracteres';
    }

    if(strlen($_POST['bio']) < 5 || strlen($_POST['bio']) > 180){
        $erros[] = 'O bio tem que ter de 5 a 180 caracteres';
    }

    
    // Variavel usando função de callculo de idade para criar um array
    $idade = calcularIdade($data);
    
    if($idade < 18){
        $erros[] = 'A idade mínima é 18 anos.';
    }

    if (!empty($erros)) {
        $_SESSION['erros'] = $erros;
        header('Location: index.php');
        exit();
    }


    // Cria um array com os dados
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