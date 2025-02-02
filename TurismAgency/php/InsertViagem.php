<?php
session_start();

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['botaum']) && $_POST['botaum'] == 'botao') {

        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $valor = $_POST['valor'];
        $destino = $_POST['destino'];

        $insere = "INSERT INTO vendas (CHECKIN, CHECKOUT, VALOR, DESTINO) VALUES (?, ?, ?, ?)";
        

        $params = array($checkin, $checkout, $valor, $destino);

        $resultInsert = sqlsrv_query($conn, $insere, $params);

        if ($resultInsert === false) {

            die(print_r(sqlsrv_errors(), true));
        } else {

            header("Location: /AgenciaTurismo/TurismAgency/views/cart.php");
        }
    }
}
?>

