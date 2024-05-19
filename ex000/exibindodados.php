<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dados Salvos</title>
</head>
<body>

<?php
$arquivo = 'dados.json';

if (file_exists($arquivo)) {
    
    $conteudo = file_get_contents($arquivo);
    
    $dados_salvos = json_decode($conteudo, true);

    if (!empty($dados_salvos)) {
        echo "<h1>Dados Salvos:</h1>";
        echo "<ul>";
        foreach ($dados_salvos as $dados) {
            echo "<li><strong>Nome:</strong> " . $dados['nome'] . "</li>";
            echo "<li><strong>Data:</strong> " . $dados['data'] . "</li>";
            echo "<li><strong>Idade:</strong> " . $dados['idade'] . " anos</li>";
            echo "<li><strong>Email:</strong> " . $dados['email'] . "</li>";
            echo "<li><strong>Bio:</strong> " . $dados['bio'] . "</li>";
            echo "<hr>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhum dado foi encontrado.</p>";
    }
} else {
    echo "<p>O arquivo de dados não foi encontrado.</p>";
}
?>
<p><a href="index.php">Voltar para o formulário</a></p>
</body>
</html>