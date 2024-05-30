<?php
session_start();

include('config.php');

// Verifique se o botão foi clicado
if (isset($_POST['botaum']) && $_POST['botaum'] == 'botaum') {
    // Receba os dados do formulário
    $checkin = htmlspecialchars($_POST['checkin']);
    $checkout = htmlspecialchars($_POST['checkout']);
    $pais = htmlspecialchars($_POST['pais']);
    $cidade = htmlspecialchars($_POST['cidade']);
    $valor = htmlspecialchars($_POST['valor']);
    $destino = htmlspecialchars($_POST['destino']);

    // Insira os dados na tabela VIAGEM
    $insere = "INSERT INTO vendas (CHECKIN, CHECKOUT, VALOR, DESTINO) VALUES (?, ?, ?, ?)";
    $params = array($checkin, $checkout, $valor, $destino);
    $resultInsert = sqlsrv_query($conn, $insere, $params);

    if ($resultInsert === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Registro inserido com sucesso!";
    }
}
?>
