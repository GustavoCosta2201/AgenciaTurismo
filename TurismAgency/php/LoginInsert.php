<?php
include ('config.php');  

if ($_POST['botao'] == 'Acessar') {
    $usuario = $_POST['USUARIO'];
    $senha = $_POST['SENHA'];
    $email = $_POST['EMAIL'];

  
    $insere = "INSERT INTO LOGIN (USUARIO, SENHA, EMAIL) VALUES ('$usuario', '$senha', '$email')";

    $result = mysqli_query($mysqli, $insere);

    if ($result) {
        header("Location: /Trabalho/TurismAgency/card.html");
        exit;
    } else {
        echo "Não foi possível inserir os dados: " . mysqli_error($mysqli);
    }
}

?>
