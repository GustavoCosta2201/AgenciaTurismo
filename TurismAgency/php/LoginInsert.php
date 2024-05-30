<?php
session_start();

include('config.php');

if ($_POST['botao'] == 'Acessar') {
    $usuario = $_POST['USUARIO'];
    $senha = $_POST['SENHA'];
    $email = $_POST['EMAIL'];
    ValidationLogin($usuario, $senha, $email, $conn);
}

function ValidationLogin($usuario, $senha, $email, $conn)
{
    if ($usuario == "" || $senha == "" || $email == '') {
        header("Location: /AgenciaTurismo/TurismAgency/views/login.html?error=true");
        exit;
    } else {
        $query = "SELECT * FROM LOGIN WHERE EMAIL = ?";
        $params = array($email);
        $result = sqlsrv_query($conn, $query, $params);

        if ($result === false) {
            echo "Erro na consulta: " . print_r(sqlsrv_errors(), true);
            exit;
        }

        if (sqlsrv_has_rows($result) === false) {
            $insere = "INSERT INTO LOGIN (USUARIO, SENHA, EMAIL) VALUES (?, ?, ?)";
            $params = array($usuario, $senha, $email);
            $resultInsert = sqlsrv_query($conn, $insere, $params);

            if ($resultInsert) {
                header("Location: /AgenciaTurismo/TurismAgency/views/login.html?success=true");
                $_SESSION['usuario'] = $usuario;
                exit;
            } else {
                header("Location: /AgenciaTurismo/TurismAgency/views/login.html?error=true");
                exit;
            }
        } else {
            header("Location: /AgenciaTurismo/TurismAgency/views/login.html?usuariofound=true");
            exit;
        }
    }
}
?>