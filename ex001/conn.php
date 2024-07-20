<?php 

    $conn = new mysqli("localhost", "root", "1111", "cadastro");
                
    if ($conn->connect_error) {
        die("Deu Ruim");
    }

?>